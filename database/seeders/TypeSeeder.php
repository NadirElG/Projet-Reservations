<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use App\Models\Type;

class TypeSeeder extends Seeder
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
        Type::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        //Define data
       $types = [
        ['type' => 'Comédien'],
        ['type' => 'Scénographe'],
        ['type' => 'Auteur'],
        ['type' => 'Metteur en scène'],
        ['type' => 'Costumier'],
        ['type' => 'Chorégraphe'],
        ['type' => 'Musicien'],
        ['type' => 'Producteur'],
        ['type' => 'Technicien son et lumière'],
        ['type' => 'Dramaturge'],
        ];
        
        //Insert data in the table
        DB::table('types')->insert($types);
    }

}
