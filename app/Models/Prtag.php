<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prtag extends Model
{
    use HasFactory;
    protected $table = 'prtags';
    protected $fillable = ['pr_standard', 'pr_price'];

    public function Processings()
    {
        return $this->belongsToMany(Processing::class);
    }
}
