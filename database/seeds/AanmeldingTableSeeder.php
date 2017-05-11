<?php

use Illuminate\Database\Seeder;
use App\Aanmelding;

class AanmeldingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aanmelding = new Aanmelding();
        $aanmelding->idSlot = 4;
        $aanmelding->idUser = 1;
        $aanmelding->onderwerp = "Templates";
        $aanmelding->omschrijving = "So many choices!!";
        $aanmelding->wensen = "Stoel";
        $aanmelding->voorkeur = 3;
        $aanmelding->save();
    }
}
