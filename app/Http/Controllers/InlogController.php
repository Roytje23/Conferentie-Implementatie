<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Events\MessageTicket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Auth;

class InlogController extends Controller
{
public function getDashboard()
    {
        return view("organisator.organisator-dashboard");
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route("user.login");
    }
    public function postInlogArray(Request $request) {
        /* Validation */
        $this->validate($request, [
            'gebruikersnaam' => 'required',
            'password' => 'required'
        ]);
        
        if (!Auth::attempt(['gebruikersnaam' => $request["gebruikersnaam"], 'password'=> $request["password"], 'rol' => 'organisator'])) {
            return redirect()->back()->with(["fail" => "Gebruiker niet gevonden! Probeer opnieuw!"]);
            
        }
        return redirect()->route("dashboard");
    }
}
