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
        $sold = $this->fuels->reduce(function($sum, $fuel){

	            	if($fuel->direction == 'Sold'){
	            		return $sum + $fuel->litre;
	            	}	            	
	            	return $sum;
	            });
        unset($parent['fuels']);
        unset($parent['created_at']);
        unset($parent['updated_at']);
        unset($parent['delete_at']);
        return array_merge(
            $parent,
            [
	            'tank' => $this->tank->name,
				'sold'    => $sold ? $sold.' Litres' : '0 Litres'
            ]);
        	
	}
}
