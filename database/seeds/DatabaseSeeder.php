<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(ZaalTableSeeder::class);
        $this->call(SlotTableSeeder::class);
        $this->call(ReserveringTableSeeder::class);
        $this->call(SlottagsTableSeeder::class);
        $this->call(AanmeldingTableSeeder::class);
        $this->call(TicketsoortTableSeeder::class);
        $this->call(MaaltijdsoortTableSeeder::class);
        $this->call(TicketTableSeeder::class);
        $this->call(MaaltijdTableSeeder::class);
    }
}
