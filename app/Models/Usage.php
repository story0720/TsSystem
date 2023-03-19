<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    use HasFactory;
    protected $fillable = ['StandardName', 'Specification', 'quantity', 'receiver', 'memo'];

    //取得耗材名稱
    public function Consume()
    {
        return $this->hasOne(Consume::class, 'id', 'co_id');
    }
    //取得耗材規格名稱
    public function tag()
    {
        return $this->hasOne(Tag::class, 'id', 'tag_id');
    }
}
