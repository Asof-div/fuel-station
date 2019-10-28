<?php

namespace App\Repos;

use App\Models\Dispenser;
use Carbon\Carbon;

class DispenserRepository {

	public function getDispensersWithRelativeModels() {

		return Dispenser::with(['tank', 'fuels'])->get();

	}

	public function addDispenser(string $name, int $tank_id){
		
		if($name && $tank_id){
			return Dispenser::create([
					'name' => $name,
					'tank_id' => $tank_id,
				]);
		}

		return null;
	}


	public function find(int $id){
		
		return Dispenser::with(['tank', 'fuels' =>  function($query){
			$query->whereDate('transaction_date', 'like', Carbon::today()->format('Y-m-d'));
		}])->find($id);
	}

	public function loadFuelsByDate(int $id, $date){

		$date = $date ? Carbon::instance($date) : Carbon::today();
		
		return Dispenser::with(['tank', 'fuels' =>  function($query) use ($date){
			$query->whereDate('transaction_date', 'like', $date->format('Y-m-d'));
		}])->find($id);
	}

	public function updateDispenser(Dispenser $dispenser, string $name, int $tank_id){
		
		if($name && $tank_id){
			$dispenser->update([
					'name' => $name,
					'tank_id' => $tank_id,
				]);
		}

		return $dispenser;
	}




}