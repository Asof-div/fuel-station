<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Tank;
use App\Traits\APIResponseTrait;

class TankController extends Controller
{
    use APIResponseTrait;

    public function index()
    {
        $tanks = Tank::with(['dispensers', 'fuels'])->get();

        $response = $this->success([
            'tanks' => $tanks
        ]);

        return $response;
    }
    

}
