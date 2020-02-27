<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;

// use Exception;

class CityController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index(Request $request)
    {
        return response()->json(\App\City::select(['id', 'name'])->where('country_code', $request->country_code)->orderBy('name', 'asc')->get(), 200);
    }

}
