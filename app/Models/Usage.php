<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    use HasFactory;
    protected $fillable = ['StandardName','Specification','quantity','receiver','memo'];
    public function Consume(){
        return $this->belongsTo(Consume::class,'co_id','id');
    }
}
