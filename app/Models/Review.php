<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Model\User;
use App\Model\Restaurant;

class Review extends Model
{
    use HasFactory;

    public function user() {
        return $this->hasOne(User::class);
    }

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }
}
