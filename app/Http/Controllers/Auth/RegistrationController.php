<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegistrationController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\RedirectResponse|\Inertia\Response
    {
        $email = $request->get('email');

        if (! $email) {
            return redirect()->to('login');
        }

        if (! $user = User::where('email', $email)->first()) {
            return redirect()->to('login');
        }

        if ($user && $user->email_verified_at) {
            return redirect()->to('login');
        }

        return Inertia::render('Auth/Register', [
            'user' => UserResource::make($user),
        ]);
    }
}
