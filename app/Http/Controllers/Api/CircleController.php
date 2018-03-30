<?php

namespace App\Http\Controllers\Api;

use App\Circle;
use App\Http\Controllers\ApiController;
use App\Http\Resources\CircleResource;
use Illuminate\Http\Request;

class CircleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CircleResource::collection(Circle::orderBy('title')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Circle  $circle
     * @return \Illuminate\Http\Response
     */
    public function show(Circle $circle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Circle  $circle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Circle $circle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Circle  $circle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Circle $circle)
    {
        $circle->delete();
        return response()->json();
    }
}