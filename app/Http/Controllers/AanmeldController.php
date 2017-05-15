<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Events\MessageTicket;
use App\Aanmelding;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Auth;

class AanmeldController extends Controller
{
public function postAanmelding(Request $request)
    {
        /*$this->validate($request, [
            'naam' => 'required',
            'email' => 'required|email'
        ]);*/
           
        $user = new User();
        $user->id = DB::table('users')->max('id') + 1;
        $user->naam = $request["naam"];
        $user->tussenvoegsel = $request["tussenvoegsel"];
        $user->achternaam = $request["achternaam"];
        $user->email = $request["email"];
        $user->telnummer = $request["telnummer"];
        $user->adres = $request["adres"];
        $user->woonplaats = $request["woonplaats"];
        $user->rol = "spreker";
        $user->save();
        
        $aanmelding = new Aanmelding();
        $aanmelding->idAanmelding = DB::table('aanmeldings')->max('id') + 1;
        $aanmelding->idSlot = $request["slot"];
        $aanmelding->idUser = $user->id;
        $aanmelding->onderwerp = $request["onderwerp"];
        $aanmelding->omschrijving = $request["omschrijving"];
        $aanmelding->wensen = $request["wensen"];
        $aanmelding->voorkeur = $request["slot-voorkeur"];
        $aanmelding->save();
        
        
        DB::table('slots')->where('id', $request["slot"])->update(['idStatus' => 2]);
        
        
        return redirect()->route("complete")->with(["success" => "U heeft succesvol gereserveerd!"]);
    }

public function getVrijdag()
    {
        $slots = DB::table('slots')->get();
        $tags = DB::table('tags')->get();
        $statuses = DB::table('statuses')->get();
        $aanmeldingen = DB::table('aanmeldings')->get();
        $users = DB::table('users')->get();

        return view('agenda.vrijdag', ['slots' =>$slots, 'tags' => $tags, 'aanmeldingen'=> $aanmeldingen, 'users'=> $users, 'statuses' => $statuses]);
    }
    
public function getZaterdag()
    {
        $slots = DB::table('slots')->get();
        $statuses = DB::table('statuses')->get();
        $aanmeldingen = DB::table('aanmeldings')->get();
        $users = DB::table('users')->get();

        return view('agenda.zaterdag', ['slots' =>$slots, 'aanmeldingen'=> $aanmeldingen, 'users'=> $users, 'statuses' => $statuses]);
    }
    
public function getZondag()
    {
        $slots = DB::table('slots')->get();
        $statuses = DB::table('statuses')->get();
        $aanmeldingen = DB::table('aanmeldings')->get();
        $users = DB::table('users')->get();

        return view('agenda.zondag', ['slots' =>$slots, 'aanmeldingen'=> $aanmeldingen, 'users'=> $users, 'statuses' => $statuses]);
    }
}

