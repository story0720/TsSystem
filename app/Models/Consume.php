<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consume extends Model
{
    use HasFactory;
    protected $table = 'consumes';
    protected $primaryKey='id';
    //protected $fillable = ['ca_Name','ca_Memo'];
}
