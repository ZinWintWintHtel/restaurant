<?php

namespace App\Models;

use App\Models\RestaurantDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phone extends Model
{
    use HasFactory;

    public function restaurantDetail(){
        return $this->belongsTo(RestaurantDetail::class);
    }
}
