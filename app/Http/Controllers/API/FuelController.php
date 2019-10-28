<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repos\FuelRepository;
use App\Services\FuelDelivery;
use App\Services\FuelDispenser;
use App\Traits\APIResponseTrait;

class FuelController extends Controller
{
    use APIResponseTrait;
    
            public function index(FuelRepository $fuelRepos)
    {
        $dispensers = $fuelRepos->getFuelsWithRelativeModels(); 

        $response = $this->success([
            'dispensers' => $dispensers
        ]);

        return $response;
    }

    public function fuelDelivery(Request $request, FuelDelivery $deliveryService){
    	$validator = $this->handleValidation([
    		'litre' => 'required|numeric',
    		'tank_id' => 'required|exists:tanks,id',
    	]);

    	if($validator){
    		return $validator;
    	}

    	$fuel = $deliveryService->delivery($request->tank_id, $request->litre, $request->user()->id, new \DateTime );

        return $this->handleAddResponse($fuel);   
    }
    
    
    public function fuelDispenser(Request $request, FuelDispenser $dispenserService){
    	$validator = $this->handleValidation([
    		'litre' => 'required|numeric',
    		'dispenser_id' => 'required|exists:tanks,id',
    	]);

    	if($validator){
    		return $validator;
    	}

    	$fuel = $dispenserService->dispense($request->dispenser_id, $request->litre, $request->user()->id, new \DateTime );

        return $this->handleAddResponse($fuel);   
    }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FuelRepository $fuelRepos, $id)
    {
        
        $dispenser = $fuelRepos->find($id);

        return $this->handleShow($dispenser);
    }




}
