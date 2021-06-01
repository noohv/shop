<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Food;
use App\Models\OrderItem;
use App\Models\User;


class Order extends Model
{
    use HasFactory;

    public function orderItem() {
        return $this->belongsTo(OrderItem::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
