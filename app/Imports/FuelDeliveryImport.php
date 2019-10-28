<?php

namespace App\Imports;

use App\Models\Fuel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Facades\App\Services\FuelDelivery;
use Facades\App\Repos\TankRepository;

class FuelDeliveryImport implements ToModel, WithHeadingRow
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
        $tank_name = isset($row['tank_name']) ? $row['tank_name'] : ''; 
        $litre = isset($row['litre']) ? $row['litre'] : null; 
        $date = isset($row['date']) ? $row['date'] : null; 
        
        $tank = TankRepository::findByName($tank_name);
        
        if (!$tank) {
            $this->statusMsg[] = ['msg' => $tank_name .' - tank does not exists.', 'status' => 'failed'];
            return null;
        }

        $result = FuelDelivery::delivery($tank->id, $litre, \Auth::id(), new \DateTime($date) );

        if($result instanceof Fuel){
            $this->statusMsg[] = ['msg' => ' Successfully deliver '. $litre .' Litres tank - '. $tank_name, 'status' => 'success'];
            return $result;   
        }

        $this->statusMsg[] = ['msg' => 'Tank - '.$tank_name. ' is full ', 'status' => 'failed'];

        return null; 
        
    }

    public function getStatusMessage(){

        return $this->statusMsg;
    }
}
