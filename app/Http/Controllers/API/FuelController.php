<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\FuelResource;

use App\Models\Fuel;
use App\Repos\FuelRepository;
use App\Services\FuelDelivery;
use App\Services\FuelDispenser;
use App\Traits\APIResponseTrait;

class FuelController extends Controller
{
    use APIResponseTrait;
    
    public function index(Request $request, FuelRepository $fuelRepos)
    {
		$date = new \DateTime($request->date);
        $fuels = $fuelRepos->getAll($date); 

        $response = $this->success([
            'fuels' => FuelResource::collection($fuels)
        ]);

        return $response;
    }

    public function fuelDelivery(Request $request, FuelDelivery $deliveryService){
    	$validator = $this->handleValidation([
    		'litre' => 'required|numeric',
    		'tank_id' => 'required|exists:tanks,id',
    		'date' => 'date|nullable',
    	]);

    	if($validator){
    		return $validator;
    	}

    	$result = $deliveryService->delivery($request->tank_id, $request->litre, $request->user()->id, new \DateTime($request->date) );
    	if($result instanceof Fuel){
	        return $this->handleAddResponse($result);   
    	}

    	return $this->error($result);
    }
    
    
    public function fuelDispenser(Request $request, FuelDispenser $dispenserService){
    	$validator = $this->handleValidation([
    		'litre' => 'required|numeric',
    		'dispenser_id' => 'required|exists:tanks,id',
    		'date' => 'date|nullable',
    	]);

    	if($validator){
    		return $validator;
    	}

    	$result = $dispenserService->dispense($request->dispenser_id, $request->litre, $request->user()->id, new \DateTime($request->date) );

	  	if($result instanceof Fuel){
	        return $this->handleAddResponse($result);   
    	}

    	return $this->error($result); 
    }

    
    public function uploadDispense(Request $request, FuelDispenser $dispenserService){
    	$validator = $this->handleValidation([
    		'file' => 'required|mimes:xls,xlsx',
    	]);

    	if($validator){
    		return $validator;
    	}
        $file = $request->file;

    	$result = $dispenserService->upload($file );

    	return $this->success(['result' => $result]); 
    }

    public function uploadDelivery(Request $request, FuelDelivery $deliveryService){
    	$validator = $this->handleValidation([
    		'file' => 'required|mimes:xls,xlsx',
    	]);

    	if($validator){
    		return $validator;
    	}
        $file = $request->file;

    	$result = $deliveryService->upload($file);

    	return $this->success(['result' => $result]); 
    }


     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FuelRepository $fuelRepos, int $id)
    {
        
        $fuel = $fuelRepos->find($id);

        return $this->handleShow($fuel);
    }



        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deliveryTemplate(Request $request, FuelDelivery $deliveryService)
    {
        return response()->download($deliveryService->template());
    }


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dispenserTemplate(Request $request, FuelDispenser $dispenserService)
    {
        return response()->download($dispenserService->template());
    }


}
