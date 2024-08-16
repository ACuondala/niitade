<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        "firstname",
        "lastname",
        "bi",
        "carta",
        "registroCriminal",
        "phone",
        "address",
        "neighbor_id",
        "deliveryImage",
    ];


    public function neighbor()
    {
        return $this->belongsTo(Neighbor::class);
    }

    public function vehicle()
    {
        return $this->hasMany(Vehicle::class);
    }
}
