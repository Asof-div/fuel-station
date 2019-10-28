<?php

namespace App\Services;

use App\Models\Fuel;
use App\Models\Tank;
use Facades\App\Repos\DispenserRepository;
use Facades\App\Repos\FuelRepository;
use Facades\App\Repos\TankRepository;
use Auth;
use Carbon\Carbon;
use App\Exports\FuelDeliveryExport;
use App\Imports\FuelDeliveryImport;
use Maatwebsite\Excel\Facades\Excel;

class FuelDelivery {

	public function checkTankLevel(Tank $tank, $litre) {

		return $tank->volume >= ($litre + $tank->fuel_level);
	}

	public function delivery($tank_id, $litre, $user_id, $date){
		
		$user_id = $user_id ? $user_id : Auth::id();
		$date = $date ? $date : Carbon::now();

		$tank = TankRepository::find($tank_id);	
		
		if($this->checkTankLevel($tank, $litre)){
			$fuel = FuelRepository::fuelDelivery($tank, $litre, $user_id, $date);
			$tank = TankRepository::delivery($tank, $fuel);
			return $fuel;

		}
		elseif ($this->tankSpace($tank, $litre) > 0) {
			$litre = $this->tankSpace($tank, $litre);
			$fuel = FuelRepository::fuelDelivery($tank, $litre, $user_id, $date);
			$tank = TankRepository::delivery($tank, $fuel);
			return $fuel;
		}

		return 'Invalid Input';
	}

	public function tankSpace(Tank $tank, $litre){

		return $tank->volume - ($litre + $tank->fuel_level);
	}


	public function upload($file){
		$importer = new FuelDeliveryImport;
        Excel::import($importer, $file);
        return $importer->getStatusMessage();
	}


	public function template(){
		$collections = (new Fuel)->newCollection();

        Excel::store(new FuelDeliveryExport($collections), 'fuel_delivery_template.xlsx');
        return storage_path('app/fuel_delivery_template.xlsx');
	}
}