<?php

use Illuminate\Database\Seeder;
use App\Ticketsoort;

class TicketsoortTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ticketsoort = new Ticketsoort();
        $ticketsoort->soort = "vrijdag";
        $ticketsoort->prijs = 45;
        $ticketsoort->beschikbaar = 250;
        $ticketsoort->save();
        
        $ticketsoort = new Ticketsoort();
        $ticketsoort->soort = "zaterdag";
        $ticketsoort->prijs = 60;
        $ticketsoort->beschikbaar = 250;
        $ticketsoort->save();
        
        $ticketsoort = new Ticketsoort();
        $ticketsoort->soort = "zondag";
        $ticketsoort->prijs = 30;
        $ticketsoort->beschikbaar = 250;
        $ticketsoort->save();
        
        $ticketsoort = new Ticketsoort();
        $ticketsoort->soort = "passe-partout";
        $ticketsoort->prijs = 100;
        $ticketsoort->beschikbaar = 250;
        $ticketsoort->save();
        
        $ticketsoort = new Ticketsoort();
        $ticketsoort->soort = "weekend";
        $ticketsoort->prijs = 80;
        $ticketsoort->beschikbaar = 250;
        $ticketsoort->save();
    }
}
