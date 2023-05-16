<?php

namespace App\Models;

use App\Models\Fee;
use App\Models\User;
use App\Models\Table;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function fee(){
        return $this->belongsTo(Fee::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
