<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Interest;
use App\Models\Neighbor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        //'email',
        'gender',
        'terms',
        'dob',
        'password',
        'otherphone',
        'terms',
        'images',
        'money',
        'neighbor_id'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function interests(){
        return $this->hasMany(Interest::class,);
    }

    public function neighbor(){
        return $this->belongsTo(Neighbor::class);
    }

    public function company()
    {
        return $this->hasMany(Company::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function like(){$this->hasMany(Like::class);}



    public function followers()
    {
        return $this->belongsToMany(Follower::class, 'followers', 'company_id','user_id');
    }

    public function comment(){return $this->hasMany(Comment::class);}

    public function interestUser(){
        $interest=InterestUser::where('user_id',$this->id)->count();
        return $interest;
    }

    public function mobileCompanies(){
        $mobileCompany= Company::where('user_id',Auth::user()->id)->get();
        return $mobileCompany;
    }
    public function activeCompany(){
        
    }
}
