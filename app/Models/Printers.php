<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printers extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasOne('App\Models\User' , 'id' , 'user_id');
    }
    public function businessHrs(){
        return $this->hasMany('App\Models\PrinterServiceHr' , 'printer_id' , 'id');
    }
}
