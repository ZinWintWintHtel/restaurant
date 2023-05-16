<?php

namespace App\Models;

use App\Models\Reservation;
use App\Models\PaymentMethod;
use App\Models\PaymentConfirm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function payment_confirm(){
        return $this->hasOne(PaymentConfirm::class);
    }
}
