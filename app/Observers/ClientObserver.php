<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Team;

class ClientObserver
{
    /**
     * Handle the Client "created" event.
     */
    public function created(Client $client): void
    {
        $team = new Team();
        $team->name = $client->name;
        $team->client()->associate($client);
        $team->save();
    }

    /**
     * Handle the Client "updated" event.
     */
    public function updated(Client $client): void
    {
        if ($client->isDirty('name')) {
            $client->team->update([
                'name' => $client->name,
            ]);
        }
    }
}
