<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    protected static function getData(Request $request)
    {
        return json_decode($request->getContent(), true)['data'];
    }

}
