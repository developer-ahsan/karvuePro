<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designers extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasOne('App\Models\User' , 'id' , 'user_id');
    }
    public function sampledesigner(){
        return $this->hasMany('App\Models\SampleDesigner' , 'designer_id' , 'id');
    }
    public function servicePlans(){
        return $this->hasMany('App\Models\DesignerService' , 'designer_id' , 'id');
    }
}
