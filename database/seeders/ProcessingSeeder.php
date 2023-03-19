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
        DB::table('users')->insert([
            ['name'=>"admin",'email'=>"test@gmail.com",'password'=>'$2y$10$CsMygBIbRADgFvscacosv.swlPkP0hYB1jpuxS4GhCeh7/LHUmJAO'],
        ]);
        DB::table('factorymannagements')->insert([
            ['mn_id'=>"1",'mn_Contact'=>'','ca_id'=>1,'mn_Tel1'=>'','mn_Name'=>"廠商1號"],
            ['mn_id'=>"2",'mn_Contact'=>'','ca_id'=>2,'mn_Tel1'=>'','mn_Name'=>"廠商2號"],
        ]);
        DB::table('processings')->insert([
            ['pr_categoryname'=>"加工方法1",'pr_memo'=>999],
            ['pr_categoryname'=>"加工方法2",'pr_memo'=>999],
            ['pr_categoryname'=>"加工方法3",'pr_memo'=>999],
            ['pr_categoryname'=>"加工方法4",'pr_memo'=>999],
            ['pr_categoryname'=>"加工方法5",'pr_memo'=>999],
            ['pr_categoryname'=>"加工方法6",'pr_memo'=>999],
            ['pr_categoryname'=>"加工方法7",'pr_memo'=>999],
            ['pr_categoryname'=>"加工方法8",'pr_memo'=>999],
            ['pr_categoryname'=>"加工方法9",'pr_memo'=>999],
            ['pr_categoryname'=>"加工方法10",'pr_memo'=>999],
            ['pr_categoryname'=>"加工方法11",'pr_memo'=>999],
        ]);
        DB::table('prtags')->insert([
            ['pr_standard'=>"10",'pr_price'=>"20"],
            ['pr_standard'=>"10",'pr_price'=>"20"],
            ['pr_standard'=>"10",'pr_price'=>"20"],
            ['pr_standard'=>"10",'pr_price'=>"20"],
            ['pr_standard'=>"10",'pr_price'=>"20"],
            ['pr_standard'=>"10",'pr_price'=>"20"],
            ['pr_standard'=>"10",'pr_price'=>"20"],
            ['pr_standard'=>"10",'pr_price'=>"20"],
            ['pr_standard'=>"10",'pr_price'=>"20"],
            ['pr_standard'=>"10",'pr_price'=>"20"],
            ['pr_standard'=>"10",'pr_price'=>"20"],
        ]);
        DB::table('processing_prtag')->insert([
            ['processing_id'=>"1",'prtag_id'=>"1"],
            ['processing_id'=>"2",'prtag_id'=>"2"],
            ['processing_id'=>"3",'prtag_id'=>"3"],
            ['processing_id'=>"4",'prtag_id'=>"4"],
            ['processing_id'=>"5",'prtag_id'=>"5"],
            ['processing_id'=>"6",'prtag_id'=>"6"],
            ['processing_id'=>"7",'prtag_id'=>"7"],
            ['processing_id'=>"8",'prtag_id'=>"8"],
            ['processing_id'=>"9",'prtag_id'=>"9"],
            ['processing_id'=>"10",'prtag_id'=>"10"],
            ['processing_id'=>"2",'prtag_id'=>"1"],
            ['processing_id'=>"1",'prtag_id'=>"2"],
            ['processing_id'=>"11",'prtag_id'=>"3"],
        ]);
        

        
    }
}
