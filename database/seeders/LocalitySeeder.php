<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Locality;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Locality::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        //Define data
        $localities = [
            ['postal_code'=>'1000','locality'=>'Bruxelles'],
            ['postal_code'=>'1030','locality'=>'Schaerbeek'],
            ['postal_code'=>'1020','locality'=>'Laeken'],
            ['postal_code'=>'1050','locality'=>'Ixelles'],
            ['postal_code'=>'1070','locality'=>'Anderlecht'],
            ['postal_code'=>'1080','locality'=>'Molenbeek-Saint-Jean'],
            ['postal_code'=>'1090','locality'=>'Jette'],
            ['postal_code'=>'1040','locality'=>'Etterbeek'],
            ['postal_code'=>'1060','locality'=>'Saint-Gilles'],
            ['postal_code'=>'1082','locality'=>'Berchem-Sainte-Agathe'],
            ['postal_code'=>'1120','locality'=>'Neder-Over-Heembeek'],
            ['postal_code'=>'1130','locality'=>'Haren'],
            ['postal_code'=>'2000','locality'=>'Anvers'],
            ['postal_code'=>'3000','locality'=>'Louvain'],
            ['postal_code'=>'4000','locality'=>'Liège'],
            ['postal_code'=>'5000','locality'=>'Namur'],
            ['postal_code'=>'6000','locality'=>'Charleroi'],
            ['postal_code'=>'7000','locality'=>'Mons'],
            ['postal_code'=>'8000','locality'=>'Bruges'],
            ['postal_code'=>'9000','locality'=>'Gand'],
        ];
        //Insert data in the table
        DB::table('localities')->insert($localities);
    }
}
