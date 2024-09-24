<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class store extends Model
{
    use HasFactory,Notifiable;

    public function products()
    {
       return $this->hasMany(product::class,'store_id','id');
    }
}
