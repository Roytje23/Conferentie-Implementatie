<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Maaltijd;
use App\User;
use App\Reservering;
use QrCode;
use PDF;
use App\Http\Requests;
use App\Events\MessageTicket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class ReserveringController extends Controller
{
    public function getReserveringIndex()
    {
        $query = DB::table('ticketsoorts')->get();
        $maaltijdquery = DB::table('maaltijdsoorts')->get();
        return view('reservering.reservering')->with(['tickets'=>$query, 'maaltijden'=>$maaltijdquery]);
    }
    
    public function getBeschikbaarVrijdag()
    {
         $beschikbaar = DB::table('ticketsoorts')->where('id', 1)->value('beschikbaar');
         return view('reservering.reservering')->with(['beschikbaar'=>$beschikbaar]);
    }
     //User Gegevens van de reservering
    public function postReserveringArray(Request $request){
        $post =  $request->all();
        $user = array('id' => DB::table('users')->max('id') + 1,
        'naam' => $post["naam"],
        'tussenvoegsel' => $post["tussenvoegsel"],
        'achternaam' => $post["achternaam"],
        'email' => $post["email"],
        'telnummer' => $post["telnummer"],
        'adres' => $post["adres"],
        'woonplaats' => $post["woonplaats"],  
        'rol' => "bezoeker",
        );
        $id = DB::table('users')->insertgetId($user);
        
        
        if ($id > 0) {
            $reservering = array('id' => DB::table('reserverings')->max('id') + 1,
                'idUser' => $id,
                'betaalmethode' => $post["betaalmethode"],
                'prijs' => $post["totaal"]
            );
            
            $idReservering = DB::table('reserverings')->insertgetId($reservering);
                
            $ticket = [];    
            for ($i = 0; $i < count($post["ticket"]); $i++)
            {
                $vrijdag = DB::table('ticketsoorts')->where('id', 1)->value('beschikbaar');
                $zaterdag = DB::table('ticketsoorts')->where('id', 2)->value('beschikbaar');
                $zondag = DB::table('ticketsoorts')->where('id', 3)->value('beschikbaar');
                $passe = DB::table('ticketsoorts')->where('id', 4)->value('beschikbaar');
                $weekend = DB::table('ticketsoorts')->where('id', 5)->value('beschikbaar');
                
                $ticket[] = Ticket::create ([
                    'id' => DB::table('tickets')->max('id') + 1,
                    'reservering' => $idReservering,
                    'soort' => $post["ticket"][$i],
                    'barcode' => "123123" . $post["ticket"][$i] . $id 
                ]);
                
                if ($post["ticket"][$i] == 1) {
                    DB::table('ticketsoorts')->where('id', 1)->update(['beschikbaar' => ($vrijdag - 1)]);
                    DB::table('ticketsoorts')->where('id', 4)->update(['beschikbaar' => ($passe - 1)]);
                }
                if ($post["ticket"][$i] == 2) {
                    DB::table('ticketsoorts')->where('id', 2)->update(['beschikbaar' => ($zaterdag - 1)]);
                    DB::table('ticketsoorts')->where('id', 4)->update(['beschikbaar' => ($passe - 1)]);
                    DB::table('ticketsoorts')->where('id', 5)->update(['beschikbaar' => ($weekend - 1)]);
                }
                if ($post["ticket"][$i] == 3) {
                    DB::table('ticketsoorts')->where('id', 3)->update(['beschikbaar' => ($zondag - 1)]);
                    DB::table('ticketsoorts')->where('id', 4)->update(['beschikbaar' => ($passe - 1)]);
                    DB::table('ticketsoorts')->where('id', 5)->update(['beschikbaar' => ($weekend - 1)]);
                }
                if ($post["ticket"][$i] == 4) {
                    DB::table('ticketsoorts')->where('id', 1)->update(['beschikbaar' => ($vrijdag - 1)]);
                    DB::table('ticketsoorts')->where('id', 2)->update(['beschikbaar' => ($zaterdag - 1)]);
                    DB::table('ticketsoorts')->where('id', 3)->update(['beschikbaar' => ($zondag - 1)]);
                    DB::table('ticketsoorts')->where('id', 4)->update(['beschikbaar' => ($passe - 1)]);
                    DB::table('ticketsoorts')->where('id', 5)->update(['beschikbaar' => ($weekend - 1)]);
                }
                if ($post["ticket"][$i] == 5) {
                    DB::table('ticketsoorts')->where('id', 2)->update(['beschikbaar' => ($zaterdag - 1)]);
                    DB::table('ticketsoorts')->where('id', 3)->update(['beschikbaar' => ($zondag - 1)]);
                    DB::table('ticketsoorts')->where('id', 5)->update(['beschikbaar' => ($weekend - 1)]);
                }
            }
            
        $maaltijd = [];
        if(isset($post["maaltijd"])){
            for ($i = 0; $i < count($post["maaltijd"]); $i++)
            {
                $maaltijd[] = Maaltijd::create([ 
                    'id' => DB::table('maaltijds')->max('id') + 1,
                    'reservering' => $idReservering,
                    'soort' => $post["maaltijd"][$i],
                    'barcode' => "123123" . $post["maaltijd"][$i] . $id
                ]);
                //DB::table('maaltijds')->insert($maaltijd);
            }
        }
            foreach ($ticket as $ticketQr) {
                QrCode::format('png')->size(250)->generate('ticketcode: ' . $ticketQr->barcode,public_path(). '/src/tickets/'.$ticketQr->id.'.jpg');
            }
            
            foreach ($maaltijd as $maaltijdQr) {
                QrCode::format('png')->size(250)->generate('maaltijdcode: ' . $maaltijdQr->barcode,public_path(). '/src/maaltijden/' . $maaltijdQr->id . '.jpg');
            }
            $pdf = PDF::loadView('pdf.pdf', ["ticketarray" => $ticket, "maaltijdarray" => $maaltijd]);
            
            Event::fire(new MessageTicket($ticket, $maaltijd, $user, $pdf));
            return redirect()->route("home")->with(["success" => "U heeft succesvol gereserveerd!"]);
        }
    }

    
    /*public function postReservering(Request $request)
    {
        $this->validate($request, [
                'naam' => 'required',
                'achternaam' => 'required',
                'email' => 'required|email'
            ]);
        $user = new User();
        $user->naam = $request["naam"];
        $user->tussenvoegsel = $request["tussenvoegsel"];
        $user->achternaam = $request["achternaam"];
        $user->email = $request["email"];
        $user->telnummer = $request["telnummer"];
        $user->adres = $request["adres"];
        $user->woonplaats = $request["woonplaats"];
        $user->rol = "bezoeker";
        $user->save();
        
        $reservering = new Reservering();
        $reservering->idUser = 1;
        $reservering->idTicket = $request["ticket"];
        $reservering->betaalmethode = $request["betaalmethode"];
        $reservering->barcode = $request["ticket"] * $reservering->idUser . "12345gayporn";
        $reservering->prijs = 70;
        $reservering->save();
        
        return redirect()->route("home")->with(["success" => "U heeft succesvol gereserveerd!"]);
    }*/
}
