<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dispenser extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    //
    
    public function tank(){
    	return $this->belongsTo(Tank::class, 'tank_id');
    }

    public function fuels(){
    	return $this->hasMany(Fuel::class, 'fuel_id');
    }

}
