<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the table first
        Role::truncate();
        //Define data
        $roles = [
            ['role'=>'admin'],
            ['role'=>'member'],
            ['role'=>'author'],
        ];
        //Insert data in the table
        DB::table('roles')->insert($roles);
    }
}
