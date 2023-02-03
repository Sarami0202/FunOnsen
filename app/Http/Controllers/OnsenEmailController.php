<?php

namespace App\Http\Controllers;

use App\Models\onsen_mail;
use Illuminate\Http\Request;

class OnsenEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (onsen_mail::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = onsen_mail::where('email', $request["email"])->get();
        if (count($data)==0)
            onsen_mail::insert([
                'email' => $request->email
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\onsen_mail  $onsen_mail
     * @return \Illuminate\Http\Response
     */
    public function show(onsen_mail $onsen_mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\onsen_mail  $onsen_mail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, onsen_mail $onsen_mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\onsen_mail  $onsen_mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(onsen_mail $onsen_mail)
    {
        //
    }
}
