<?php



namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@turbobought.com',
            'password' => bcrypt('asdfasdf'),
            'admin' => true,
        ]);
        User::factory()->create([
            'name' => 'Pep Poose',
            'email' => 'peppoo@gmail.com',
            'password' => bcrypt('asdfasdf'),
        ]);
        User::factory()->create([
            'name' => 'Franscisco Alarcón',
            'email' => 'iscobalondeoro@gmail.com',
            'password' => bcrypt('asdfasdf'),
        ]);

        DB::table('categoria')->insert(['nom'=>"Aliments",'descripcio'=>"Són aliments"]);
        DB::table('categoria')->insert(['nom'=>"Tecnologia"]);
        DB::table('categoria')->insert(['nom'=>"Casa",'descripcio'=>"Són productes de casa"]);

        DB::table('producte')->insert(['nom'=>"Poma",'descripcio'=>"Una poma fresca, sucosa i perfecta per a un snack saludable. Ideal per portar a tot arreu o per complementar els teus àpats amb un toc de dolçor natural.",'preu'=>2.99,'categoria_id'=>1,'imatge'=>"https://m.media-amazon.com/images/I/51znL-gmtXL._AC_SL1500_.jpg"]);
        DB::table('producte')->insert(['nom'=>"Telefon",'descripcio'=>"Telèfon intel·ligent amb un disseny modern i funcionalitats avançades. Perfecte per mantenir-te connectat i gestionar les teves activitats diàries amb facilitat.",'preu'=>69.79,'categoria_id'=>2,'imatge'=>"https://m.media-amazon.com/images/I/61w2t-0Mc2L._AC_SL1296_.jpg"]);
        DB::table('producte')->insert(['nom'=>"Taula",'descripcio'=>"Taula robusta i elegant, ideal per a qualsevol espai. Fabricada amb materials d’alta qualitat, combina estil i durabilitat per a la teva llar o oficina.",'preu'=>40.49,'categoria_id'=>3,'imatge'=>"https://m.media-amazon.com/images/I/417kpkcifgL._AC_SL1500_.jpg"]);
        DB::table('producte')->insert(['nom'=>"Taronja",'descripcio'=>"Taronja madura amb una textura suau i un gust dolç irresistible. Perfecta per consumir sola, en postres o per preparar sucs i batuts naturals.",'preu'=>3.19,'categoria_id'=>1,'imatge'=>"https://m.media-amazon.com/images/I/21YmQkPzXwL._AC_.jpg"]);
        DB::table('producte')->insert(['nom'=>"Portatil",'descripcio'=>"Ordinador portàtil lleuger i potent, equipat amb la tecnologia més avançada per a treballar, estudiar o gaudir del teu contingut preferit des de qualsevol lloc.",'preu'=>169.69,'categoria_id'=>2,'imatge'=>"https://m.media-amazon.com/images/I/8104DpftbZL._AC_SL1500_.jpg"]);
        DB::table('producte')->insert(['nom'=>"Cadira",'descripcio'=>"Cadira ergonòmica amb un disseny còmode i funcional. Ideal per a llargues hores d’ús, ja sigui treballant, estudiant o relaxant-te.",'preu'=>2.98,'categoria_id'=>3,'imatge'=>"https://m.media-amazon.com/images/I/61fUzPuKHfL._AC_SL1500_.jpg"]);

        DB::table('comanda')->insert(['data'=>now(),'preutot'=>9068.73,'usuari_id'=>1]);
        DB::table('comanda')->insert(['data'=>now(),'preutot'=>2715.82,'usuari_id'=>3]);
        DB::table('comanda')->insert(['data'=>now(),'preutot'=>12.76,'usuari_id'=>2]);
        DB::table('comanda')->insert(['data'=>now(),'preutot'=>86.42,'usuari_id'=>1]);

        DB::table('pagament')->insert(['tipus'=>'bizum','comanda_id'=>1]);
        DB::table('pagament')->insert(['tipus'=>'targeta','comanda_id'=>3]);
        DB::table('pagament')->insert(['tipus'=>'bizum','comanda_id'=>2]);
        DB::table('pagament')->insert(['tipus'=>'paypal','comanda_id'=>4]);

        DB::table('comanda_producte')->insert(['quantitat'=>30,'producte_id'=>5,'comanda_id'=>1]);
        DB::table('comanda_producte')->insert(['quantitat'=>29,'producte_id'=>6,'comanda_id'=>4]);
        DB::table('comanda_producte')->insert(['quantitat'=>57,'producte_id'=>2,'comanda_id'=>1]);
        DB::table('comanda_producte')->insert(['quantitat'=>4,'producte_id'=>4,'comanda_id'=>3]);
        DB::table('comanda_producte')->insert(['quantitat'=>1,'producte_id'=>1,'comanda_id'=>2]);
        DB::table('comanda_producte')->insert(['quantitat'=>67,'producte_id'=>3,'comanda_id'=>2]);
    }
}
