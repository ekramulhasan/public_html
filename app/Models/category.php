<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['id'];

    public function product(){

       return $this->hasMany(Product::class,'category_id');

    }

    public function subCategoryes(){

        return $this->hasMany(Subcategory::class);
    }



}
