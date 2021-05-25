<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Food; 
use App\Models\Review; 

class Restaurant extends Model
{
    use HasFactory;

    public function user() {
        return $this->hasOne(User::class);
    }

    public function review() {
        return $this->hasMany(Review::class);
    }

    public function food() {
        return $this->hasMany(Food::class);
    }
}
