<?php

namespace App\Models;

use App\Models\Staff;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentConfirm extends Model
{
    use HasFactory;

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function staff(){
        return $this->belongsTo(Staff::class);
    }
}
