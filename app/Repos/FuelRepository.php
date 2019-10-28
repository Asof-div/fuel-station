<?php

namespace App\Repos;

use App\Models\Fuel;
use Carbon\Carbon;
use Facades\App\Repos\TankRepository;

class FuelRepository {

	public function getFuelsWithRelativeModels($date = null ) {
		$date = $date == null ? Carbon::today() : Carbon::createFromFormat('Y-m-d', $date);
		
		return Fuel::with(['tank', 'dispenser'])->get();

	}

	public function fuelDelivery($tank, $litre, $user_id, $date){
		
		if($litre && $tank){
			$current_litre = $tank->fuel_level + $litre;

			$fuel = Fuel::create([
					'tank_id' => $tank->id,
					'direction' => 'Delivery',
            		'user_id' => $user_id,
            		'last_fuel_id' => $tank->last_fuel_id,
            		'litre' => $litre,
            		'previous_litre' => $tank->fuel_level,
            		'current_litre' => $current_litre,
            		'transaction_date' => $date,
				]);

			return $fuel;
		}

		return null;
	}

	public function sellFuel($tank, $dispenser_id, $litre, $user_id, $date ){
		$current_litre = $tank->fuel_level - $litre;
		return Fuel::create([
					'tank_id' => $tank->id,
					'direction' => 'Sold',
            		'dispenser_id' => $dispenser_id,
            		'user_id' => $user_id,
            		'last_fuel_id' => $tank->last_fuel_id,
            		'litre' => $litre,
            		'previous_litre' => $tank->fuel_level,
            		'current_litre' => $current_litre,
            		'transaction_date' => $date,
				]);

	}

	public function find(int $id){
		
		return Fuel::with(['tank', 'dispenser'])->find($id);
	}


}