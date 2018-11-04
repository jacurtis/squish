<?php

namespace App\Listeners\Users;

use App\Events\Users\UserCreating;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class GenerateApiToken
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserCreating  $event
     * @return void
     */
    public function handle(UserCreating $event)
    {
        $event->user->api_token = User::generateApiToken();
    }
}
