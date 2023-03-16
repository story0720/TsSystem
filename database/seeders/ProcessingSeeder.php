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
            ['pr_categoryname'=>"加工方法1",'pr_standard'=>"加工規格1",'pr_price'=>999],
            ['pr_categoryname'=>"加工方法2",'pr_standard'=>"加工規格2",'pr_price'=>999],
            ['pr_categoryname'=>"加工方法2",'pr_standard'=>"加工規格3",'pr_price'=>999],
            ['pr_categoryname'=>"加工方法2",'pr_standard'=>"加工規格4",'pr_price'=>999],
            ['pr_categoryname'=>"加工方法2",'pr_standard'=>"加工規格5",'pr_price'=>999],
            ['pr_categoryname'=>"加工方法2",'pr_standard'=>"加工規格6",'pr_price'=>999],
            ['pr_categoryname'=>"加工方法2",'pr_standard'=>"加工規格7",'pr_price'=>999],
            ['pr_categoryname'=>"加工方法2",'pr_standard'=>"加工規格8",'pr_price'=>999],
            ['pr_categoryname'=>"加工方法2",'pr_standard'=>"加工規格8",'pr_price'=>999],
            ['pr_categoryname'=>"加工方法2",'pr_standard'=>"加工規格10",'pr_price'=>999],

        ]);
    }
}
