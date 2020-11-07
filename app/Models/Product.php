<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function productImages(){
        return $this->hasMany('App\Models\ProductImage');
    }
    public function variations(){
        return $this->hasMany('App\Models\Variation');
    }
}
