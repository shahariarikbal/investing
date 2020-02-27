<?php

namespace App\Http\Controllers\API\V1;

use App\SupportDepartment;
use Illuminate\Http\Request;

// use Exception;

class SupportDepartmentController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index(Request $request)
    {
        return response()->json(SupportDepartment::all(), 200);
    }

}
