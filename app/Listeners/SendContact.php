<?php

namespace App\Listeners;

use App\Events\MessageContact;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendContact
{

    public function __construct()
    {
        //
    }
    public function handle(MessageContact $event)
    {
        $message = "Reservering bevestigd!";
        
        
        Mail::Send('emails.sendcontact', [
            'message' => $message], function($m) use ($message){
            $m->from("roykuijper1997@hotmail.com", "Conferentie");
            $m->to("Testerrete123@test.com", "Hallo");
            $m->subject($message);
        });
    }
}
