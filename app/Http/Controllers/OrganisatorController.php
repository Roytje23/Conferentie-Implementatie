<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Aanmelding;
use App\SlotTag;
use App\Reservering;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use App\Events\MessageOverzicht;
use Illuminate\Support\Facades\Input;

class OrganisatorController extends Controller
{
    public function postacceptaanmelding(Request $request)
    {
        $aanmeldingsId = DB::table('aanmeldings')->where('idAanmelding', $request["aanmelding"])->first();
        DB::table('slots')->where('id', $aanmeldingsId->idSlot)->update(['idStatus' => 3]);
        
        $idSlot = DB::table('slots')->where('id', $aanmeldingsId->idSlot)->first();
        
        $slottag1 = new SlotTag();
        $slottag1->idSlot = $idSlot->id;
        $slottag1->idTag = $request["tag1"];
        $slottag1->save();
        
        $slottag1 = new SlotTag();
        $slottag1->idSlot = $idSlot->id;
        $slottag1->idTag = $request["tag2"];
        $slottag1->save();
        
        $slottag1 = new SlotTag();
        $slottag1->idSlot = $idSlot->id;
        $slottag1->idTag = $request["tag3"];
        $slottag1->save();
        
        return redirect()->route("dashboard")->with(["success" => "U heeft succesvol een aanmelding geaccepteerd!"]);
    }
    
    public function postdeclineaanmelding(Request $request)
    {
        DB::table('slots')->where('id', $request["aanmelding"])->update(['idStatus' => 1]);
        
        
        return redirect()->route("dashboard")->with(["success" => "U heeft succesvol een aanmelding verworpen!"]);
    }
    
    public function sendoverzichtsemail(Request $request)
    {
        $slots = DB::table('slots')->get();
        $email = Input::get('test123');
        $tags = DB::table('tags')->get();
        $statuses = DB::table('statuses')->get();
        $aanmeldingen = DB::table('aanmeldings')->get();
        $users = DB::table('users')->get();
        $pdf = PDF::loadView('pdf.pdfoverzicht', ["slots" => $slots, "tags" => $tags, "statuses" => $statuses, "aanmeldingen" => $aanmeldingen, "users" => $users]);
        
        foreach($email as $emails){
            
            if ($emails == ''){
                
                
                
            } else {
        
                Mail::Send('emails.sendoverzicht', [
                'slots' => $slots,
                'tags' => $tags,
                'statuses' => $statuses,
                'aanmeldingen' => $aanmeldingen,
                'users' => $users], function($m) use ($pdf, $email, $emails){
                $m->from("roykuijper1997@hotmail.com", "Converentie");
                $m->to($emails);
                $m->cc($email);
                $m->subject("OverzichtDagen");
                $m->attachData($pdf->output(), "OverzichtAttachment.pdf");
                
                });
                
            }
        }
            
        return redirect()->route("home")->with(["success" => "Overzicht is succesvol verstuurd"]);
    }
    
}