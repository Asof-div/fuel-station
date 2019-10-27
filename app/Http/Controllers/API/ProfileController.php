<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;

use App\Traits\APIResponseTrait;


class ProfileController extends Controller
{
    use APIResponseTrait;
    
   public function update(Request $request)
   {

        $user = $request->user();
        $validator = $this->handleValidation([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        if ($validator) {
            return $validator;
        }


        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();

        return $this->success([
            'user' => $user,
            'msg' => 'Profile successfully updated'
        ]);
   }

   public function changePassword(Request $request)
   {
        $user = $request->user();
        $validator = $this->handleValidation([
            'old_password' => 'required|min:6|validpassword:'.$user->password,
            'password' => 'required|confirmed|min:6',

        ]);

        if ($validator {
            return $validator;
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return $this->success([
            'user' => $user
            'msg' => 'Password successfully updated'
        ]);
   }
}
