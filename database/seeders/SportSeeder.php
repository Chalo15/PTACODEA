<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $sport = new Sport();
        $sport->description = "Ajedrez";
        $sport->save();


        $sport1 = new Sport();
        $sport1->description = "Atletismo";
        $sport1->save();



        $sport2 = new Sport();
        $sport2->description = "Baloncesto";
        $sport2->save();
<<<<<<< Updated upstream


        $sport3 = new Sport();
        $sport3->description = "Balonmano";
        $sport3->save();



        $sport4 = new Sport();
        $sport4->description = "Beisbol";
        $sport4->save();


        $sport5 = new Sport();
        $sport5->description = "Boxeo";
        $sport5->save();


        $sport6 = new Sport();
        $sport6->description = "Ciclismo";
        $sport6->save();


        $sport7 = new Sport();
        $sport7->description = "Fútbol";
        $sport7->save();


        $sport8 = new Sport();
        $sport8->description = "Futsal";
        $sport8->save();


        $sport9 = new Sport();
        $sport9->description = "Gimnasia Artística";
        $sport9->save();


        $sport10 = new Sport();
        $sport10->description = "Gimnasia Rítmica";
        $sport10->save();


        $sport11 = new Sport();
        $sport11->description = "Halterofilia";
        $sport11->save();


        $sport12 = new Sport();
        $sport12->description = "Judo";
        $sport12->save();


        $sport13 = new Sport();
        $sport13->description = "Karate Do";
        $sport13->save();


        $sport14 = new Sport();
        $sport14->description = "Natación";
        $sport14->save();


        $sport15 = new Sport();
        $sport15->description = "Patinaje";
        $sport15->save();


        $sport16 = new Sport();
        $sport16->description = "Taekwon Do";
        $sport16->save();


        $sport17 = new Sport();
        $sport17->description = "Tenis de campo";
        $sport17->save();


        $sport18 = new Sport();
        $sport18->description = "Tenis de Mesa";
        $sport18->save();


        $sport19 = new Sport();
        $sport19->description = "Triatlón";
        $sport19->save();


        $sport20 = new Sport();
        $sport20->description = "Voleibol";
        $sport20->save();

        $sport20 = new Sport();
        $sport20->description = "Voleibol De Playa";
        $sport20->save();

        $sport21 = new Sport();
        $sport21->description = "Tiro Con Arco";
        $sport21->save();



        $sport22 = new Sport();
        $sport22->description = "Football Americano";
        $sport22->save();



    }
}
