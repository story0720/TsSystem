<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restock extends Model
{
    use HasFactory;
    protected $table = 'restocks';
    protected $fillable = ['ca_id','co_id','re_time','re_quantity','re_unitprice','re_count','re_memo','re_date'];

    //耗材管理(名稱、規格)
    public function Consume(){
        return
         $this->belongsTo(Consume::class,'co_id','id');
    }
    //廠商種類管理
    public function FactoryCategory(){
        return $this->belongsTo(FactoryCategory::class,'id','ca_id');
    }
}

