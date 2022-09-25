<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactoryManagement extends Model
{
    use HasFactory;
    protected $table = 'factorymannagements';
    protected $primaryKey='mn_id';
    protected $fillable = ['ca_id','mn_Name','mn_Contact','mn_Tel1','mn_Tel2','mn_Fax','mn_Address','mn_Memo'];

    public function category()
    {
        return $this->hasOne(FactoryCategory::class,'ca_id','ca_id');
    }
}
