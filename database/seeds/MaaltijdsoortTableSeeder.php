<?php

use Illuminate\Database\Seeder;
use App\Maaltijdsoort;

class MaaltijdsoortTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maaltijdsoort = new Maaltijdsoort();
        $maaltijdsoort->soort = "lunch";
        $maaltijdsoort->prijs = 20;
        $maaltijdsoort->beschikbaar = "all";
        $maaltijdsoort->save();
        
        $maaltijdsoort = new Maaltijdsoort();
        $maaltijdsoort->soort = "diner";
        $maaltijdsoort->prijs = 30;
        $maaltijdsoort->beschikbaar = "weekend";
        $maaltijdsoort->save();
        
        $maaltijdsoort = new Maaltijdsoort();
        $maaltijdsoort->soort = "combo";
        $maaltijdsoort->prijs = 50;
        $maaltijdsoort->beschikbaar = "weekend";
        $maaltijdsoort->save();
    }
}
