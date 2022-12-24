<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consume extends Model
{
    use HasFactory;
    protected $table = 'consumes';
    protected $primaryKey='id';
    protected $fillable = ['ca_Name','ca_Memo','co_Standard'];


    //進貨管理
    public function Restocks(){
        return $this->hasMany(Restock::class,'co_id','id');
    }
    //標籤管理
    public function Tags(){
        return $this->belongsToMany(Tag::class);
    }

}
