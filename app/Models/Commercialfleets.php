<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;
class Commercialfleets extends Model
{
    use HasFactory;
    use Notifiable;
     protected $guard = 'fleet';

     public function users(){
        return $this->hasOne('App\Models\User' , 'id' , 'user_id');
    }
     public function waypoint(){
        return $this->hasMany('App\Models\WayPoint' , 'fleet_id' , 'id');
    }
    public function vehicle(){
        return $this->hasMany('App\Models\CommercialVehicle' , 'fleet_id' , 'id');
    }
}
