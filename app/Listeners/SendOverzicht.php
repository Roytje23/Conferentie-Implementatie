<?php

namespace App\Listeners;

use App\Events\MessageOverzicht;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendOverzicht
{

    public function __construct()
    {
        //
    }
    public function handle(MessageOverzicht $event)
    {
        $message = "Overzicht Verstuurd";
        $slotArr = $event->slot;
        $tagArr = $event->tag;
        $statusArr = $event->status;
        $aanmeldingArr = $event->aanmelding;
        $userArr = $event->user;
        //$pdf = $event->pdf;
        
        Mail::Send('emails.sendoverzicht', [
            'message' => $message,
            'slot' => $slotArr,
            'tag' => $tagArr,
            'status' => $statusArr,
            'aanmelding' => $aanmeldingArr,
            'users' => $userArr], function($m) use ($message, $email){
            $m->from("roykuijper1997@hotmail.com", "Conferentie");
            $m->to($email);
            $m->cc($email);
            $m->subject($message);
            //$m->attachData($pdf->output(), "OverzichtAttachment.pdf");
        });
    }
}
