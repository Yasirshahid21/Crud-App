<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Mail;
class SendMailNotification
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
     * @param  \App\Events\SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        //
        $user = User::find($event->user_id)->first();
        // dd($event->user_id);
        Mail::send('admin.mail', [$user], function($message) use($user){
            $message->to($user->email);
            $message->subject('Mail Testing');
        });
    }
}
