<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processing extends Model
{
    use HasFactory;
    protected $table = 'processings';
    //protected $primaryKey='id';
    protected $fillable = ['pr_categoryname','pr_standard','pr_memo'];
}
