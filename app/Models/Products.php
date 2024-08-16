<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "images",
        "price",
        "subprice",
        "quatity",
        "reference",
        "status",
        "bonus",
        "description",
        "company_id",
        'kind_product_id',
        'delivery_mode_id'
    ];

    public function kind()
    {
        return $this->belongsTo(KindProduct::class);
    }

    public function mode()
    {
        return $this->belongsTo(DeliveryMode::class);
    }

    public function image()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
