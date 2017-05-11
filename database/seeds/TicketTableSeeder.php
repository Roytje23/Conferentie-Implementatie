<?php

use App\Ticket;
use Illuminate\Database\Seeder;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ticket = new Ticket();
        $ticket->reservering = 2;
        $ticket->soort = 1;
        $ticket->barcode = "3832795001";
        $ticket->save();
        
        $ticket = new Ticket();
        $ticket->reservering = 2;
        $ticket->soort = 2;
        $ticket->barcode = "3141592653";
        $ticket->save();
        
        $ticket = new Ticket();
        $ticket->reservering = 2;
        $ticket->soort = 3;
        $ticket->barcode = "1234567890";
        $ticket->save();
        
        $ticket = new Ticket();
        $ticket->reservering = 2;
        $ticket->soort = 4;
        $ticket->barcode = "0987654321";
        $ticket->save();
        
        $ticket = new Ticket();
        $ticket->reservering = 2;
        $ticket->soort = 5;
        $ticket->barcode = "0192734763";
        $ticket->save();
    }
}
