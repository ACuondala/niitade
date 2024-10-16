<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'namePost',
        'titlePost',
        'description',
        'category_id',
        'product_id',
        'company_id',
        'post_link_id',
        'plan_id',
        'sponsor_id',
        'expecific_public_id'
    ];

    public function plan(){return $this->belongsTo(Plan::class);}
    public function sponsor(){return $this->belongsTo(Sponsor::class);}
    public function public(){return $this->belongsTo(ExpecificPublic::class);}
    public function postLink(){return $this->belongsTo(PostLink::class);}

    public function product(){return $this->belongsTo(Products::class);}

    public function contents(){return $this->hasMany(PostContent::class);}

    public function company(){return $this->belongsTo(Company::class);}

    public function comment(){return $this->hasMany(Comment::class);}
    public function likes(){return $this->hasMany(Like::class);}

    public function favorites(){return $this->hasMany(Favorite::class);}

    public function postview(){return $this->hasMany(Postview::class);}


    public function interest(){return $this->belongsToMany(Interest::class);}
    public function region(){return $this->belongsToMany(Municipe::class);}



}
