<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagoriy extends Model
{
    use HasFactory;
    protected $table="catagories";

    public function oneto(){
        return $this->hasMany(Product::class,'cat_id','id');
    }
}