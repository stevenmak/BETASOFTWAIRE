<?php

namespace App\Http\Controllers;

use App\Lignes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LignesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Lignes  $lignes
     * @return \Illuminate\Http\Response
     */
    public function show(Lignes $lignes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lignes  $lignes
     * @return \Illuminate\Http\Response
     */
    public function edit(Lignes $lignes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lignes  $lignes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lignes $lignes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lignes  $lignes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table("roles")->where('id',$id)->delete();
    }
}
