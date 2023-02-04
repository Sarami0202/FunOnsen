<?php

namespace App\Http\Controllers;

use App\Models\onsen;
use Illuminate\Http\Request;

class OnsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        return $this->JsonResponse(onsen::where('name', $name)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d_path = array(null, null, null, null, null, null, );
        if ($request['thumbnail'] != null) {
            $thumbnail_file = $request->file('thumbnail');
            foreach ($thumbnail_file as $index => $img) {
                $d_path[$index] = isset($img) ? $img->store('thumbnail', 'public') : '';
            }
        }

        onsen::insert([
            'name' => $request->name,
            'region' => $request->region,
            'prefecture' => $request->prefecture,
            'area' => $request->area,
            'address' => $request->address,
            'category' => $request->category,
            'category_name' => $request->category_name,
            'body' => $request->body,
            'info' => $request->info,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube,
            'thumbnail1' => $d_path[0],
            'thumbnail2' => $d_path[1],
            'thumbnail3' => $d_path[2],
            'thumbnail4' => $d_path[3],
            'thumbnail5' => $d_path[4],
            'thumbnail6' => $d_path[5],
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\onsen  $onsen
     * @return \Illuminate\Http\Response
     */
    public function show(onsen $onsen)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\onsen  $onsen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request["flg"] === "true") {
            $d_path = array(null, null, null, null, null, null, );
            if ($request['thumbnail'] != null) {
                $thumbnail_file = $request->file('thumbnail');
                foreach ($thumbnail_file as $index => $img) {
                    $d_path[$index] = isset($img) ? $img->store('thumbnail', 'public') : '';
                }
            }
            onsen::where('id', $id)->update([
                'name' => $request->name,
                'region' => $request->region,
                'prefecture' => $request->prefecture,
                'area' => $request->area,
                'address' => $request->address,
                'category' => $request->category,
                'body' => $request->body,
                'info' => $request->info,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'facebook' => $request->facebook,
                'youtube' => $request->youtube,
                'thumbnail1' => $d_path[0],
                'thumbnail2' => $d_path[1],
                'thumbnail3' => $d_path[2],
                'thumbnail4' => $d_path[3],
                'thumbnail5' => $d_path[4],
                'thumbnail6' => $d_path[5],
            ]);
        } else {
            onsen::where('id', $id)->update([
                'name' => $request->name,
                'region' => $request->region,
                'prefecture' => $request->prefecture,
                'area' => $request->area,
                'address' => $request->address,
                'category' => $request->category,
                'body' => $request->body,
                'info' => $request->info,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'facebook' => $request->facebook,
                'youtube' => $request->youtube,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\onsen  $onsen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $onsen = onsen::find($id);
        $onsen->delete();
    }
}
