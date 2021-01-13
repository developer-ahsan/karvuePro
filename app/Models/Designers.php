<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designers extends Model
{
    use HasFactory;
    public function sampledesigner(){
        return $this->hasMany('App\Models\SampleDesigner' , 'designer_id' , 'id');
    }
}
