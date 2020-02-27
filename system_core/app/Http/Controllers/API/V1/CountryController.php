<?php

namespace App\Http\Controllers\API\V1;

// use Exception;

class CountryController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index()
    {
        return response()->json(\App\Country::select(['code', 'name', 'phone', 'postal_code_regex'])->orderBy('name', 'asc')->get(), 200);
    }

}
