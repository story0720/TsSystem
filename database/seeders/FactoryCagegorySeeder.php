<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FactoryCagegorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('factorycategorys')->insert([
            ['ca_name'=>"廠商種類1",'ca_Memo'=>'廠商種類1備註'],
            ['ca_name'=>"廠商種類2",'ca_Memo'=>'廠商種類2備註'],
        ]);
    }
}
