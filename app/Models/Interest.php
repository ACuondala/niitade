<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    use HasFactory;

    /*public function user(){
        return $this->belongsToMany(User::class, 'interest_users');
    }*/
    public function interests(){
        return $this->hasMany(Interest::class,);
    }
}
