<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        "matricula",
        'Carimages',
        'delivery_id',
        'kind_vehicle_id',
        'modelo_id',
    ];

    public function image()
    {
        return $this->hasMany(VehicleImage::class);
    }


    public function kind()
    {
        return $this->belongsTo(KindVehicle::class);
    }


    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }
}
