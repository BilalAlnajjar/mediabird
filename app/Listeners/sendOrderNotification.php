<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\newOrder;
use App\Mail\NewOrderMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class sendOrderNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle(newOrder $event)
    {
        //
        $order = $event->getOrder();
        $user_id = $order->user_id;

        $user = User::findOrFail($user_id);

        Mail::to($user)->send(new NewOrderMail($user->name,$order));
    }
}
