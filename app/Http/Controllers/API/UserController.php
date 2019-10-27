<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Traits\APIResponseTrait;

class UserController extends Controller
{
    use APIResponseTrait;
    
	public function index()
    {
        $users = User::get();

        $response = $this->success([
            'users' => $users
        ]);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = $this->handleValidation([
            'name' => 'required|string|min:3|max:200',
            'email'     => 'required|email|unique:users',
            'password'    => 'required|string|min:6|max:25|confirmed',

        ]);


        if ($validator) {
            return $validator;
        }

        $data = $request->all();

        $user = User::create([
            'name'        => ucfirst($data['name']),
            'email'           => strtolower($data['email']),
            'password'        => bcrypt($data['password']),
            
        ]);

        return $this->handleAddResponse($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user = User::find($id);

        return $this->handleShow($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->handleValidation([
            'name' => 'required|string|min:3|max:200',
            'email'     => 'required|email|unique:users,email,'.$id,
        ]);
    
        $user = User::find($id);

        if ($validator) {
            return $validator;
        }

        if (!$user) {
            return $this->notFoundResponse();
        }

        $data = $request->all();

        $user->update([
                'name'        => ucfirst($data['name']),
                'email'           => strtolower($data['email']),
                
            ]);

        return $this->handleUpdateResponse($user);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $user = User::find($id);
        
        return $this->handleDelete($user);
    }
}
