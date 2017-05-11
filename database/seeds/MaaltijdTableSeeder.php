<?php

use App\Maaltijd;
use Illuminate\Database\Seeder;

class MaaltijdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maaltijd = new Maaltijd();
        $maaltijd->reservering = 2;
        $maaltijd->soort = 1;
        $maaltijd->barcode = "042069";
        $maaltijd->save();
        
        $maaltijd = new Maaltijd();
        $maaltijd->reservering = 2;
        $maaltijd->soort = 2;
        $maaltijd->barcode = "3370013";
        $maaltijd->save();
        
        $maaltijd = new Maaltijd();
        $maaltijd->reservering = 2;
        $maaltijd->soort = 3;
        $maaltijd->barcode = "2145671";
        $maaltijd->save();
    }
}
