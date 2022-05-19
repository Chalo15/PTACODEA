<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sports = [
            ['description' => 'Ajedrez'],
            ['description' => 'Atletismo'],
            ['description' => 'Baloncesto'],
            ['description' => 'Balonmano'],
            ['description' => 'Beisbol'],
            ['description' => 'Boxeo'],
            ['description' => 'Ciclismo de Ruta y de Montaña'],
            ['description' => 'Fútbol'],
            ['description' => 'Futsal'],
            ['description' => 'Gimnasia Artística'],
            ['description' => 'Gimnasia Rítmica'],
            ['description' => 'Halterofilia'],
            ['description' => 'Judo'],
            ['description' => 'Karate Do'],
            ['description' => 'Natación'],
            ['description' => 'Patinaje'],
            ['description' => 'Tae Kwon Do'],
            ['description' => 'Tenis'],
            ['description' => 'Tenis de Mesa'],
            ['description' => 'Triatlón'],
            ['description' => 'Voleibol'],
            ['description' => 'Voleibol De Playa'],
            ['description' => 'Tiro Con Arco'],
            ['description' => 'Football Americano'],
        ];

        DB::table('sports')->insert($sports);
    }
}
