<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseApiController extends Controller
{
    //

    public  $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    }
}
