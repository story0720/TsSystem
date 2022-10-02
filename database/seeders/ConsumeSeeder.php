<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ConsumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consumes')->insert([
            ['co_standardName'=>"耗材名稱1"],
            ['co_standardName'=>"耗材名稱2"],
        ]);
    }
}
