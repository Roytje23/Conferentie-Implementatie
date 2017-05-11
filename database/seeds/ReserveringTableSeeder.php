<?php

use Illuminate\Database\Seeder;
use App\Reservering;

class ReserveringTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservering = new Reservering();
        $reservering->idUser = 1;
        $reservering->betaalmethode = "PayPal";
        $reservering->prijs = 100;
        $reservering->save();
        
        $reservering = new Reservering();
        $reservering->idUser = 2;
        $reservering->betaalmethode = "CreditCard";
        $reservering->prijs = 80;
        $reservering->save();
    }
}
