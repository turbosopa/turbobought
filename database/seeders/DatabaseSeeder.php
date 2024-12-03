<?php



namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'jo',
            'email' => 'admin@example.com',
            'password' => bcrypt('asdfasdf'),
            'admin' => true,
        ]);
        User::factory()->create([
            'name' => 'Pol Culló',
            'email' => 'proba@example.com',
            'password' => bcrypt('asdfasdf'),
        ]);
        User::factory()->create([
            'name' => 'Genis KTifa',
            'email' => 'proba2@example.com',
            'password' => bcrypt('asdfasdf'),
        ]);

        DB::table('categoria')->insert(['nom'=>"Aliments",'descripcio'=>"Són aliments"]);
        DB::table('categoria')->insert(['nom'=>"Tecnologia"]);
        DB::table('categoria')->insert(['nom'=>"Casa",'descripcio'=>"Són productes de casa"]);

        DB::table('producte')->insert(['nom'=>"Poma",'preu'=>2,'quantitat'=>10,'categoria_id'=>1]);
        DB::table('producte')->insert(['nom'=>"Telefon",'preu'=>69,'quantitat'=>34,'categoria_id'=>2]);
        DB::table('producte')->insert(['nom'=>"Taula",'preu'=>40,'quantitat'=>2,'categoria_id'=>3]);
        DB::table('producte')->insert(['nom'=>"Pera",'preu'=>3,'quantitat'=>87,'categoria_id'=>1]);
        DB::table('producte')->insert(['nom'=>"Portatil",'preu'=>169,'quantitat'=>4,'categoria_id'=>2]);
        DB::table('producte')->insert(['nom'=>"Cadira",'preu'=>2,'quantitat'=>7,'categoria_id'=>3]);

        DB::table('comanda')->insert(['data'=>now(),'estat'=>true,'usuari_id'=>1]);
        DB::table('comanda')->insert(['data'=>now(),'estat'=>false,'usuari_id'=>3]);
        DB::table('comanda')->insert(['data'=>now(),'usuari_id'=>2]);
        DB::table('comanda')->insert(['data'=>now(),'estat'=>true,'usuari_id'=>1]);

        DB::table('pagament')->insert(['data'=>now(),'estat'=>true,'tipus'=>'bizum','comanda_id'=>1]);
        DB::table('pagament')->insert(['data'=>now(),'estat'=>false,'tipus'=>'targeta','comanda_id'=>3]);
        DB::table('pagament')->insert(['data'=>now(),'tipus'=>'bizum','comanda_id'=>2]);
        DB::table('pagament')->insert(['data'=>now(),'estat'=>true,'tipus'=>'paypal','comanda_id'=>4]);

        DB::table('comanda_producte')->insert(['quantitat'=>30,'producte_id'=>5,'comanda_id'=>1]);
        DB::table('comanda_producte')->insert(['quantitat'=>29,'producte_id'=>6,'comanda_id'=>4]);
        DB::table('comanda_producte')->insert(['quantitat'=>57,'producte_id'=>2,'comanda_id'=>1]);
        DB::table('comanda_producte')->insert(['quantitat'=>4,'producte_id'=>4,'comanda_id'=>3]);
        DB::table('comanda_producte')->insert(['quantitat'=>1,'producte_id'=>1,'comanda_id'=>2]);
        DB::table('comanda_producte')->insert(['quantitat'=>67,'producte_id'=>3,'comanda_id'=>2]);
    }
}
