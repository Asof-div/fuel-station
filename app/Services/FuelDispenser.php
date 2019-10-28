<?php

namespace App\Services;

use App\Models\Tank;
use Facades\App\Repos\DispenserRepository;
use Facades\App\Repos\FuelRepository;
use Facades\App\Repos\TankRepository;
use Auth;
use Carbon\Carbon;

class FuelDispenser {

	public function checkTankLevel(Tank $tank, $litre) {

		return $tank->fuel_level > $litre;
	}

	public function dispense($dispenser_id, $litre, $user_id, $date){
		
		$user_id = $user_id ? $user_id : Auth::id();
		$date = $date ? $date : Carbon::now();

		$dispenser = DispenserRepository::find($dispenser_id);	
		$tank = $dispenser->tank;

		if($this->checkTankLevel($tank, $litre)){
			$fuel = FuelRepository::sellFuel($tank, $dispenser_id, $litre, $user_id, $date );
			$tank = TankRepository::sold($tank, $fuel);
			return $fuel;
		}

		return null;
	}

}