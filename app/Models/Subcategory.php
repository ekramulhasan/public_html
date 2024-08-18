<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function category() {

        return $this->belongsTo(category::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function subsubcategories(){

       return $this->hasMany(SubsubCategory::class);
    }
}
