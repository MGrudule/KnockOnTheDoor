<?php

namespace App\Http\Controllers\Web;

use App\Circle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CircleController extends Controller
{
    private $validationRules = [
        'title' => 'required',
    ];

    public $pageSize = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $circles = Circle::orderBy('title', 'asc')->paginate($request->size ?: $this->pageSize);
        return view('circles.index', compact('circles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('circles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);
        $circle = Circle::create($request->all());

        flash('Successfully created circle ' . $circle->id);
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Circle  $circle
     * @return \Illuminate\Http\Response
     */
    public function show(Circle $circle)
    {
        return view('circles.show', compact('circle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Circle  $circle
     * @return \Illuminate\Http\Response
     */
    public function edit(Circle $circle)
    {
        return view('circles.edit', compact('circle'));
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
        $request->validate($this->validationRules);
        $circle->update($request->all());

        flash('Successfully updated circle ' . $circle->id);
        return redirect()->route('circles.index');
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
        flash('Successfully deleted circle ' . $circle->id);
        return back();
    }
}
