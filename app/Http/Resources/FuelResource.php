<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class FuelResource extends Resource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		
        $parent = parent::toArray($request);
        unset($parent['created_at']);
        unset($parent['updated_at']);

        return array_merge(
            $parent,
            [
	            'tank' => $this->tank ? $this->tank->name : '',
	            'dispenser' => $this->dispenser ? $this->dispenser->name : '',
            ]);
        	
	}
}
