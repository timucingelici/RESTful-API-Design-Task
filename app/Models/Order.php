<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    const ACCEPTED = 1;
    const REJECTED = 2;
    const CANCELLED = 3;
    const PENDING = 4;
    const SHIPPED = 5;

    public static $statuses = [
        1 => 'accepted',
        2 => 'rejected',
        3 => 'cancelled',
        4 => 'pending',
        5 => 'shipped'
    ];

    public function retailer() {
        return $this->hasOne('App\Models\Retailer', 'id', 'retailerId');
    }

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'userId');
    }

//    public function filterBy($key = null, $value = null) {
//        return $key && $value ? $this->where($key, $value) : $this;
//    }
}
