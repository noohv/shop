<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Model\Food;
use App\Model\Order;

class OrderItem extends Model
{
    use HasFactory;

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function food() {
        return $this->hasMany(Food::class);
    }

}
