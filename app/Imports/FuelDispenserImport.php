<?php

namespace App\Imports;

use App\Models\Fuel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Facades\App\Services\FuelDispenser;
use Facades\App\Repos\DispenserRepository;

class FuelDispenserImport implements ToModel, WithHeadingRow
{
    // HeadingRowFormatter::default('none');

    private $statusMsg = [];
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $dispenser_name = isset($row['dispenser_name']) ? $row['dispenser_name'] : ''; 
        $litre = isset($row['litre']) ? $row['litre'] : null; 
        $date = isset($row['date']) ? $row['date'] : null; 
        
        $dispenser = DispenserRepository::findByName($dispenser_name);
        
        if (!$dispenser) {
            $this->statusMsg[] = ['msg' => $dispenser_name .' - dispenser does not exists.', 'status' => 'failed'];
            return null;
        }

        $result = FuelDispenser::dispense($dispenser->id, $litre, \Auth::id(), new \DateTime($date) );

        if($result instanceof Fuel){
            $this->statusMsg[] = ['msg' => $dispenser_name. ' Successfully dispense '. $litre .' Litres', 'status' => 'success'];
            return $result;   
        }

        $this->statusMsg[] = ['msg' => $dispenser_name. ' Cannot dispense '. $litre .' Litres', 'status' => 'failed'];

        return null; 
        
    }

    public function getStatusMessage(){

        return $this->statusMsg;
    }
}
