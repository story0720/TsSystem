<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['mn_id', 'pr_id', 'serialnumber', 'materialdate', 'shipdate', 'estimateddate', 'estimateddate', 'memo', 'pr_id',];

    //廠商列表
    public function Factorymannagement()
    {
        return $this->hasOne(FactoryManagement::class, 'mn_id', 'mn_id');
    }
    //加工種類
    public function Processing()
    {
        return $this->hasOne(Processing::class, 'id', 'pr_id');
    }
}
