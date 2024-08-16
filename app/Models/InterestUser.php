<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestUser extends Model
{
    use HasFactory;
    protected $table="interest_users";
    protected $fillable=[
        'user_id',
        'interest_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function count(){
        return $this->count();
    }
}
