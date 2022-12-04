<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProcessingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('processings')->insert([
            ['pr_categoryname'=>"加工方法1",'pr_standard'=>"加工規格1"],
            ['pr_categoryname'=>"加工方法2",'pr_standard'=>"加工規格2"],
        ]);
    }
}
