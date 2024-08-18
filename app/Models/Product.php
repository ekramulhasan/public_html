<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function category(){

       return $this->belongsTo(category::class,'category_id','id');
    }


    public function productImage(){
        return $this->hasMany(ProductImage::class);
    }

    public function sizes(){
        return $this->belongsToMany(Size::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    public function billings(){
        return $this->belongsToMany(Billing::class);
    }

}
