<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\DispenserResource;
use App\Repos\DispenserRepository;
use App\Traits\APIResponseTrait;

class DispenserController extends Controller
{
    use APIResponseTrait;
    
    public function index(DispenserRepository $dispenserRepos)
    {
        $dispensers = $dispenserRepos->getDispensersWithRelativeModels(); 

        $response = $this->success([
            'dispensers' => $dispensers
        ]);

        return $response;
    }

    public function store(Request $request, DispenserRepository $dispenserRepos){
    	$validator = $this->handleValidation([
    		'name' => 'required|unique:dispensers,name',
    		'tank_id' => 'required|exists:tanks,id',
    	]);

    	if($validator){
    		return $validator;
    	}

    	$dispenser = $dispenserRepos->addDispenser($request->name, $request->tank_id);

        return $this->handleAddResponse($dispenser);   
    }

    public function dispenserSummary(Request $request, DispenserRepository $dispenserRepos, $id)
    {
        
		$date = new \DateTime($request->date);
        $dispenser = $dispenserRepos->loadFuelsByDate($id, $date);
        
        return $this->handleShow(new DispenserResource($dispenser));
    }

    
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DispenserRepository $dispenserRepos, $id)
    {
        
		$date = new \DateTime($request->date);
        $dispenser = $dispenserRepos->loadFuelsByDate($id, $date);
        return $this->handleShow($dispenser);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DispenserRepository $dispenserRepos, $id)
    {
        $validator = $this->handleValidation([
            'name' => 'required|max:200|unique:dispensers,name,'.$id,
    		'tank_id' => 'required|exists:tanks,id',
        ]);
    
        $dispenser = $dispenserRepos->find($id);

        if ($validator) {
            return $validator;
        }

        if (!$dispenser) {
            return $this->notFoundResponse();
        }

        $dispenser = $dispenserRepos->updateDispenser($dispenser, $request->name, $request->tank_id);

        return $this->handleUpdateResponse($dispenser);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(DispenserRepository $dispenserRepos, $id)
    {

        $dispenser = $dispenserRepos->find($id);
        
        return $this->handleDelete($dispenser);
    }


}
