<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processing extends Model
{
    use HasFactory;
    protected $table = 'processings';
    protected $fillable = ['pr_categoryname', 'pr_standard', 'pr_memo', 'pr_price'];

    //
    public function Prtags()
    {
        return $this->belongsToMany(Prtag::class);
    }
}
