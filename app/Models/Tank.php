<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tank extends Model
{
    protected $guarded = ['id'];


    public function dispensers(){
    	return $this->hasMany(Dispenser::class, 'tank_id');
    }

    public function fuels(){
    	return $this->hasMany(Fuel::class, 'tank_id');
    }




}
