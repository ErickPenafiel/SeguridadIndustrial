<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Notifications\StockNotification;
use Illuminate\Support\Facades\Notification;

class StockListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
        User::all()->each(function (User $user) use ($event) {
            Notification::send($user, new StockNotification($event->insumo));
        });
    }
}
