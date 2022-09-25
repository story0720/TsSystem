<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactoryCategory extends Model
{
    use HasFactory;
    protected $table = 'factorycategorys';
    protected $primaryKey='ca_id';
    protected $fillable = ['ca_Name','ca_Memo'];

}
