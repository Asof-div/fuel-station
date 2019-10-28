<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class DispenserResource extends Resource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		
        $parent = parent::toArray($request);
        unset($parent['fuels']);
        return array_merge(
            $parent,
            [
            'tank' => $this->tank->name,
			'sold'    => $this->fuels->reduce(function($sum, $fuel, $initial = 0){

	            	if($fuel->direction == 'Sold'){
	            		return $sum + $fuel->litre;
	            	}
	            	return $sum;
	            }).' Litres',
            ]);
        	
	}
}
