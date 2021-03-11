<?php

namespace App\Http\Controllers;

use App\Entreprises;
use Illuminate\Http\Request;

class EntreprisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $entreprises = Entreprises::orderBy('id','DESC')->paginate(10);
        return view('entreprises.index',compact('entreprises'))->with('i', ($request->input('page', 1) - 1) * 10);
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
     * @param  \App\Entreprises  $entreprises
     * @return \Illuminate\Http\Response
     */
    public function show(Entreprises $entreprises)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entreprises  $entreprises
     * @return \Illuminate\Http\Response
     */
    public function edit(Entreprises $entreprises)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entreprises  $entreprises
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entreprises $entreprises)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entreprises  $entreprises
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entreprises $entreprises)
    {
        //
    }
}
