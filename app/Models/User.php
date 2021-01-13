<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory, Notifiable;
    
    public function advertiser(){
        return $this->hasOne('App\Models\CustomersPortal' , 'user_id' , 'id');
    }
    public function designer(){
        return $this->hasOne('App\Models\Designers' , 'user_id' , 'id');
    }
    public function printer(){
        return $this->hasOne('App\Models\Printers' , 'user_id' , 'id');
    }
    public function fleet(){
        return $this->hasOne('App\Models\Commercialfleets' , 'user_id' , 'id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
