<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Traits\APIResponseTrait;

class NotFoundController extends Controller
{
    use APIResponseTrait;

    public function index()
    {
        
        return $this->error('Not Found!', 404);
    }
}
