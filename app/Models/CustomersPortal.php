<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomersPortal extends Model
{
    use HasFactory;
    public function users(){
        return $this->hasOne('App\Models\User' , 'id' , 'user_id');
    }
}
