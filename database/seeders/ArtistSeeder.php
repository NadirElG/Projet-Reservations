<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Artist;


class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //Empty the table first
        Artist::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        //Define data
       $artists = [
            ['firstname'=>'Daniel','lastname'=>'Marcelin'],
            ['firstname'=>'Philippe','lastname'=>'Laurent'],
            ['firstname'=>'Marius','lastname'=>'Von Mayenburg'],
            ['firstname'=>'Olivier','lastname'=>'Boudon'],
            ['firstname'=>'Anne Marie','lastname'=>'Loop'],
            ['firstname'=>'Pietro','lastname'=>'Varasso'],
            ['firstname'=>'Laurent','lastname'=>'Caron'],
            ['firstname'=>'Élena','lastname'=>'Perez'],
            ['firstname'=>'Guillaume','lastname'=>'Alexandre'],
            ['firstname'=>'Claude','lastname'=>'Semal'],
            ['firstname'=>'Laurence','lastname'=>'Warin'],
            ['firstname'=>'Pierre','lastname'=>'Wayburn'],
            ['firstname'=>'Gwendoline','lastname'=>'Gauthier'],
            ['firstname'=>'Isaac','lastname'=>'Vivancos'],
            ['firstname'=>'Julien','lastname'=>'Martin'],
            ['firstname'=>'Marie','lastname'=>'Dupont'],
            ['firstname'=>'Sophie','lastname'=>'Lemoine'],
            ['firstname'=>'Jean','lastname'=>'Lucas'],
            ['firstname'=>'Lucie','lastname'=>'Robert'],
            ['firstname'=>'Paul','lastname'=>'Lefevre'],
            ['firstname'=>'Mathilde','lastname'=>'Mercier'],
            ['firstname'=>'Gabriel','lastname'=>'Fournier'],
            ['firstname'=>'Julie','lastname'=>'Girard'],
            ['firstname'=>'Maxime','lastname'=>'Morin'],
            ['firstname'=>'Camille','lastname'=>'Lemoine'],
            ['firstname'=>'Alexandre','lastname'=>'Clerc'],
            ['firstname'=>'Sarah','lastname'=>'Fontaine'],
            ['firstname'=>'Antoine','lastname'=>'Roux'],
            ['firstname'=>'Clara','lastname'=>'Vincent'],
            ['firstname'=>'Thomas','lastname'=>'Lefevre'],
            ['firstname'=>'Charlotte','lastname'=>'Lemoine'],
            ['firstname'=>'François','lastname'=>'Fournier'],
            ['firstname'=>'Emilie','lastname'=>'Moreau'],
            ['firstname'=>'Guillaume','lastname'=>'Dumas'],
            ['firstname'=>'Manon','lastname'=>'Lefevre'],
            ['firstname'=>'David','lastname'=>'Pereira'],
            ['firstname'=>'Chloé','lastname'=>'Marchand'],
            ['firstname'=>'Nicolas','lastname'=>'Da Silva'],
            ['firstname'=>'Laura','lastname'=>'Lemoine'],
            ['firstname'=>'Tristan','lastname'=>'Barbier'],
            ['firstname'=>'Emma','lastname'=>'Arnaud'],
            ['firstname'=>'Raphaël','lastname'=>'Caron'],
            ['firstname'=>'Agathe','lastname'=>'Robin'],
            ['firstname'=>'Adrien','lastname'=>'Lemoine'],
            ['firstname'=>'Eva','lastname'=>'Picard'],
            ['firstname'=>'Lucas','lastname'=>'Garnier'],
            ['firstname'=>'Léa','lastname'=>'Roger'],
            ['firstname'=>'Vincent','lastname'=>'Lemoine'],
            ['firstname'=>'Anaïs','lastname'=>'Paris'],
        ];
        
        //Insert data in the table
        DB::table('artists')->insert($artists);
    }

}
