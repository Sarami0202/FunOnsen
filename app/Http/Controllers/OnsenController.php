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

        $check = onsen::where('name', $request[`name`])->get();
        if (count($check) == 0) {
            $d_path = array(null, null, null, null, null, );
            if ($request['thumbnail'] != null) {
                $thumbnail_file = $request->file('thumbnail');
                foreach ($thumbnail_file as $index => $img) {
                    $d_path[$index] = isset($img) ? $img->store('thumbnail', 'public') : null;
                }
            }
            $m_path = null;
            if ($request['main'] != null) {
                $main_file = $request->file('main');
                $m_path = isset($main_file) ? $main_file->store('thumbnail', 'public') : null;
            }

            onsen::insert([
                'name' => $request->name,
                'region' => $request->region,
                'prefecture' => $request->prefecture,
                'area' => $request->area,
                'address' => $request->address,
                'category' => $request->category,
                'categoryname' => $request->categoryname,
                'body' => $request->body,
                'html' => $request->html,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'facebook' => $request->facebook,
                'youtube' => $request->youtube,
                'google' => $request->google,
                'tiktok' => $request->tiktok,
                'info1' => $request->info1,
                'label1' => $request->label1,
                'info2' => $request->info2,
                'label2' => $request->label2,
                'info3' => $request->info3,
                'label3' => $request->label3,
                'info4' => $request->info4,
                'label4' => $request->label4,
                'info5' => $request->info5,
                'label5' => $request->label5,
                'thumbnail1' => $m_path,
                'thumbnail2' => $d_path[0],
                'thumbnail3' => $d_path[1],
                'thumbnail4' => $d_path[2],
                'thumbnail5' => $d_path[3],
                'thumbnail6' => $d_path[4],
                'vote' => $request->vote,
            ]);
            return (1);
        } else
            return (0);

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
            $m_path = null;
            if ($request['main'] != null) {
                $main_file = $request->file('main');
                $m_path = isset($main_file) ? $main_file->store('thumbnail', 'public') : null;
            }
            onsen::where('id', $id)->update([
                'name' => $request->name,
                'region' => $request->region,
                'prefecture' => $request->prefecture,
                'area' => $request->area,
                'address' => $request->address,
                'category' => $request->category,
                'body' => $request->body,
                'html' => $request->html,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'facebook' => $request->facebook,
                'youtube' => $request->youtube,
                'google' => $request->google,
                'tiktok' => $request->tiktok,
                'info1' => $request->info1,
                'label1' => $request->label1,
                'info2' => $request->info2,
                'label2' => $request->label2,
                'info3' => $request->info3,
                'label3' => $request->label3,
                'info4' => $request->info4,
                'label4' => $request->label4,
                'info5' => $request->info5,
                'label5' => $request->label5,
                'thumbnail1' => $m_path,
                'thumbnail2' => $d_path[0],
                'thumbnail3' => $d_path[1],
                'thumbnail4' => $d_path[2],
                'thumbnail5' => $d_path[3],
                'thumbnail6' => $d_path[4],
                'vote' => $request->vote,
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
                'html' => $request->html,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'facebook' => $request->facebook,
                'youtube' => $request->youtube,
                'google' => $request->google,
                'tiktok' => $request->tiktok,
                'info1' => $request->info1,
                'label1' => $request->label1,
                'info2' => $request->info2,
                'label2' => $request->label2,
                'info3' => $request->info3,
                'label3' => $request->label3,
                'info4' => $request->info4,
                'label4' => $request->label4,
                'info5' => $request->info5,
                'label5' => $request->label5,
                'vote' => $request->vote,
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
