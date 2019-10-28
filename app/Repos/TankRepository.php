<?php

namespace App\Repos;

use App\Models\Fuel;
use App\Models\Tank;
use Carbon\Carbon;

class TankRepository {

	public function getTanksWithRelativeModels() {

		return Tank::with(['dispensers', 'fuels', 'fuel'])->get();

	}

	public function addTank(string $name, float $volume){
		
		if($name && $volume){
			return Tank::create([
					'name' => $name,
					'volume' => $volume,
				]);
		}

		return null;
	}

	public function find(int $id){
		
		return Tank::with(['dispensers', 'fuels' =>  function($query){
			$query->whereDate('transaction_date', 'like', Carbon::today()->format('Y-m-d'));
		}, 'fuel'])->find($id);
	}

	public function loadFuelsByDate(int $id, $date){

		$date = $date ? Carbon::instance($date) : Carbon::today();
		
		return Tank::with(['dispensers', 'fuels' =>  function($query) use ($date){
			$query->whereDate('transaction_date', 'like', $date->format('Y-m-d'));
		}, 'fuel'])->find($id);
	}

	public function updateTank(Tank $tank, string $name, float $volume){
		
		if($name && $volume){
			$tank->update([
					'name' => $name,
					'volume' => $volume,
				]);
		}

		return $tank;
	}

	public function delivery(Tank $tank, Fuel $fuel){
		
		if($tank && $fuel){
			$tank->update([
					'fuel_level' => $fuel->current_litre,
					'last_fuel_id' => $fuel->id,
				]);
		}

		return $tank;
	}

	public function sold(Tank $tank, Fuel $fuel){
		
		if($tank && $fuel){
			$tank->update([
					'fuel_level' => $fuel->current_litre,
					'last_fuel_id' => $fuel->id,
				]);
		}

		return $tank;
	}

}