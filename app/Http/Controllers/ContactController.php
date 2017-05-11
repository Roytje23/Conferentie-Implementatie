<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Events\MessageContact;
use App\Aanmelding;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

class ContactController extends Controller
{
    public function ContactForm(Request $request)
    {
        $message = "Vraag spreker!";
        $naam = $request["naam"];
        $email = $request["email"];
        $bericht = $request["bericht"];
        $sprekeremail = Input::get('aanvraag');
        
        Mail::raw("Naam: $naam\nEmail: $email \nBericht: $bericht", function($m) use ($message, $email, $sprekeremail){
            $m->from($email, "Converentie");
            $m->to($sprekeremail);
            $m->subject($message);
        });
        
        return redirect()->route("home")->with(["success" => "Uw vraag is succesvol verstuurd"]);
    }
}
