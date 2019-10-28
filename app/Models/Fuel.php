<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fuel extends Model
{
    protected $guarded = ['id'];
    

    public function dispenser(){
    	return $this->belongsTo(Dispenser::class, 'dispenser_id');
    }

    public function tank(){
    	return $this->belongsTo(Tank::class, 'tank_id');
    }

    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }
}
