<?php

namespace App\Listeners;

use App\Events\MessageTicket;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

class SendTicket
{

    public function __construct()
    {
        //
    }
    public function handle(MessageTicket $event)
    {
        $message = "Reservering bevestigd!";
        $ticketArr = $event->ticket;
        $maaltijdArr = $event->maaltijd;
        $userArr = $event->user;
        $pdf = $event->pdf;
        $email = Input::get('email');
        
        
        Mail::Send('emails.send', [
            'message' => $message,
            'tickets' => $ticketArr,
            'maaltijden' => $maaltijdArr,
            'users' => $userArr], function($m) use ($message, $pdf, $email){
            $m->from("roykuijper1997@hotmail.com", "Conferentie");
            $m->to($email);
            $m->subject($message);
            $m->attachData($pdf->output(), "ticketAttachment.pdf");
        });
    }
}
