<?php

namespace App\Models;

use App\Models\Phone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestaurantDetail extends Model
{
    use HasFactory;

    public function phones(){
        return $this->hasMany(Phone::class);
    }
}
