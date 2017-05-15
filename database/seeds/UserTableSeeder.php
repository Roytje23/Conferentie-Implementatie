 <?php
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->naam = "Roy";
        $user->tussenvoegsel = "";
        $user->achternaam = "kuijper";
        $user->email = "roykuijper1997@hotmail.com";
        $user->telnummer = "0628645882";
        $user->adres = "Van exelstraat 23";
        $user->woonplaats = "Maarssen";
        $user->gebruikersnaam = "Roy";
        $user->password = bcrypt("admin");
        $user->rol = "organisator";
        $user->save();
        
        $user = new User();
        $user->naam = "Rob";
        $user->tussenvoegsel = "van der";
        $user->achternaam = "Heijden";
        $user->email = "Robberto23@gmail.com";
        $user->telnummer = "0675758484";
        $user->adres = "Randomstraat 12";
        $user->woonplaats = "Berghem";
        $user->gebruikersnaam = "Rob";
        $user->password = bcrypt("admin");        
        $user->rol = "bezoeker";
        $user->save();
    }
}
