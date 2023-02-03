<?php

namespace App\Http\Controllers;

use App\Models\onsen;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($area)
    {
        if ($area == "all")
        return $this->JsonResponse(onsen::all());
    else
        return $this->JsonResponse(onsen::where('region',$area)->get());
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
     * @param  \App\Models\onsen  $onsen
     * @return \Illuminate\Http\Response
     */
    public function show(onsen $onsen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\onsen  $onsen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, onsen $onsen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\onsen  $onsen
     * @return \Illuminate\Http\Response
     */
    public function destroy(onsen $onsen)
    {
        //
    }
}
