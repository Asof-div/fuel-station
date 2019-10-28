<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class TankResource extends Resource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		
        $parent = parent::toArray($request);
        unset($parent['fuels']);
        unset($parent['fuel']);
        unset($parent['dispensers']);
        $deliver = $this->fuels->reduce(function($sum, $fuel){
		            	if($fuel->direction == 'Delivery'){
		            		return $sum + $fuel->litre;
		            	}
		            	return $sum;
		            });
        
        $sold = $this->fuels->reduce(function($sum, $fuel){

	            	if($fuel->direction == 'Sold'){
	            		return $sum + $fuel->litre;
	            	}	            	
	            	return $sum;
	            });

        return array_merge(
            $parent,
            [
            'opening_litres' => $this->fuels->first() ? $this->fuels->first()->previous_litre .' Litres': '0 Litres',

			'sold'    => $sold ? $sold.' Litres' : '0 Litres',
            'deliver' => $deliver ? $deliver. ' Litres' : '0 Litres',
            'closing_litres' => $this->fuels->last() ? $this->fuels->last()->current_litre .' Litres': '0 Litres',
            ]);
	}
}
