<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected static function getData(Request $request)
    {
        return json_decode($request->getContent(), true)['data'];
    }

}
