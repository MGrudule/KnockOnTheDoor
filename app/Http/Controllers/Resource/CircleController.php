<?php

namespace App\Http\Controllers\Resource;

use App\Circle;
use App\Http\Controllers\ResourceController;
use App\Http\Resources\CircleResource;
use Illuminate\Http\Request;

class CircleController extends ResourceController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CircleResource::collection(Circle::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Circle  $circle
     * @return \Illuminate\Http\Response
     */
    public function edit(Circle $circle)
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
        //
    }
}
