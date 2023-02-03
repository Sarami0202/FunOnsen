<?php

namespace App\Http\Controllers;

use App\Models\favorite;
use App\Models\onsen;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = favorite::all();
        $stack = array();
        foreach ($data as $d) {
            array_push($stack, onsen::where('name', $d["name"])->get());
        }
        return $this->JsonResponse($stack);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        favorite::truncate();
        if ($request['name'] != null) {
            $name_file = $request["name"];
            foreach ($name_file as $index => $name) {
                favorite::insert([
                    'name' => $name,
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(favorite $favorite)
    {
        //
    }
}
