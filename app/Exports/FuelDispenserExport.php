<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FuelDispenserExport implements FromView
{
	use Exportable;

	public function __construct($fuels = null){
		$this->fuels = is_null($fuels) ? [] : $fuels;
	}


    public function mapping(): array
    {
        return [
            'dispenser_name' => 'A1',
            'liter' => 'B1',
            'Date' => 'C1',
        ];
    }



    public function view(): View
    {
        return view('exports.fuel_dispenser', [
            'fuels' => $this->fuels
        ]);
    }

}
