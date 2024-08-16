<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;



    protected $fillable = [
        "companyName",
        "companySlogna",
        "address",
        "companyImage",
        "companyAlvara",
        "companyDiario",
        "companyNif",
        "companyCertidao",
        "user_id",
        "neighbor_id",
        "category_id",
        "kind_company_id",
        "status"
    ];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /*
    public function post()
    {
        return $this->HasMany(Post::class);
    }*/

    public function kindCompany()
    {
        return $this->belongsTo(KindCompany::class);
    }

    public function documentCompany()
    {
        return $this->belongsToMany(DocumentCompany::class, 'document_company');
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }


    public function product(){
        return $this->hasMany(Products::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function following()
    {
        return $this->belongsToMany(Follower::class,'followers','company_id','user_id',);
    }
}


