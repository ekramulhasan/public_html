<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model {
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function billing() {

        return $this->hasOne( Billing::class, 'id', 'billing_id' );

    }

    public function orderDetails() {

        return $this->hasMany( OrderDetails::class, 'order_id', 'id' );
    }

    public function orderStatus() {
        return $this->hasOne( OrderStatus::class );
    }
}
