<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restock extends Model
{
    use HasFactory;
    protected $table = 'restocks';
    protected $fillable = ['consume_id', 'factorycategory_id', 'mn_id','specification', 're_time', 're_quantity', 're_unitprice', 're_count', 're_memo', 're_date'];

    //耗材管理(名稱、規格)
    public function Consume()
    {
        return
            $this->belongsTo(Consume::class, 'consume_id', 'id');
    }
    //廠商種類管理
    public function FactoryCategory()
    {
        return $this->belongsTo(FactoryCategory::class, 'factorycategory_id', 'ca_id');
    }   
    //耗材規格對應
    public function Tag()
    {
        return $this->hasOne(Tag::class, 'id', 'specification');
    }
    //取得廠商名稱
    public function GetFactoryName()
    {
        return $this->hasOne(FactoryManagement::class, 'mn_id','mn_id');
    }
}
