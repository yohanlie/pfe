<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function product()
    {
        return $this->hasOne('App\Models\Product','id','product_id');
    }

    public function accessory()
    {
        return $this->hasOne('App\Models\Accessories','id','accessory_id');
    }

    public function gcard()
    {
        return $this->hasOne('App\Models\GreetingCard','id','gcard_id');
    }
}
