<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Models\User;
use App\Traits\APIResponseTrait;

class AuthController extends Controller
{
    use APIResponseTrait;
    
	public function login(Request $request)
	{


        $validator = $this->handleValidation([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);


        if ($validator) {
            return $validator;
        }
		        
        $credentials = $request->only('email', 'password');
        
		if (!Auth::attempt($credentials)) {
			return $this->error('Invalid Login Credentials!', 401);
		}

		$user = $request->user();
		$token_result = $user->createToken('Personal Access Token');
		$token = $token_result->token;

		if ($request->remember_me) {
			$token->expires_at = Carbon::now()->addWeeks(1);
			$token_result->token = $token;
        }
        
        return $this->success([
                'access_token' => $token_result->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($token_result->token->expires_at)->toDateTimeString(),
                'user' => $user
            ]);
	}


	public function logout(Request $request)
	{
		$request->user()->token()->revoke();

        return $this->success(['msg' => 'Successfully logged out']);
	}

	public function user(Request $request)
	{
		$user = $request->user();
		return $this->success([
			'user' => $user
		]);
	}

}
