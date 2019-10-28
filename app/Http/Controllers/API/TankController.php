<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repos\TankRepository;
use App\Traits\APIResponseTrait;
use App\Http\Resources\TankResource;

class TankController extends Controller
{
    use APIResponseTrait;

    public function index(TankRepository $tankRepos)
    {
        $tanks = $tankRepos->getTanksWithRelativeModels(); 

        $response = $this->success([
            'tanks' => $tanks
        ]);

        return $response;
    }

    public function store(Request $request, TankRepository $tankRepos){
    	$validator = $this->handleValidation([
    		'name' => 'required|unique:tanks,name',
    		'volume' => 'required|numeric',
    	]);

    	if($validator){
    		return $validator;
    	}

    	$tank = $tankRepos->addTank($request->name, $request->volume);

        return $this->handleAddResponse($tank);   
    }
    

    public function tankSummary(Request $request, TankRepository $tankRepos, $id){
    	$date = new \DateTime($request->date);
        $tank = $tankRepos->loadFuelsByDate($id, $date);
    
        return $this->handleShow(new TankResource($tank));

    }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TankRepository $tankRepos, $id)
    {
        
    	$date = new \DateTime($request->date);
        $tank = $tankRepos->loadFuelsByDate($id, $date);

        return $this->handleShow($tank);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TankRepository $tankRepos, $id)
    {
        $validator = $this->handleValidation([
            'name' => 'required|max:200|unique:tanks,name,'.$id,
            'volume'     => 'required|numeric',
        ]);
    
        $tank = $tankRepos->find($id);

        if ($validator) {
            return $validator;
        }

        if (!$tank) {
            return $this->notFoundResponse();
        }

        $tank = $tankRepos->updateTank($tank, $request->name, $request->volume);

        return $this->handleUpdateResponse($tank);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(TankRepository $tankRepos, $id)
    {

        $tank = $tankRepos->find($id);
        
        return $this->handleDelete($tank);
    }



}
