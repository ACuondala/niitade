<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        "companyOtherDocument",
        "company_id"

    ];

    public function company()
    {
        return $this->belongsTMany(Company::class);
    }
}
