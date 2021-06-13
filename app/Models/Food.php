<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

}
