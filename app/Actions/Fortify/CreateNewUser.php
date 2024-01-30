<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::where('email', $input['email'])->firstOrFail();

        return DB::transaction(function () use ($input, $user) {
            $user->update([
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'password' => Hash::make($input['password']),
                'email_verified_at' => now(),
            ]);

            $team = $user->currentTeam;
            $role = $user->roles()->first();

            $team->users()->updateExistingPivot($user->id, ['role' => $role->name]);

            return $user->fresh();
        });
    }
}
