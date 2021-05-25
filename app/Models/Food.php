<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Restaurant;

class Food extends Model
{
    use HasFactory;

    public function restaurant() {
        return $this->belongsTo(restaurant::class);
    }

    public function category() {
        return $this->hasOne(Category::class);
    }

}
