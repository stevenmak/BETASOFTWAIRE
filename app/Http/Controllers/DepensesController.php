<?php

namespace App\Http\Controllers;

use App\Depenses;
use Illuminate\Http\Request;

class DepensesController extends Controller
{
    // Ajout permission
    function __construct()
    {
         $this->middleware('permission:depense-list|depense-create|depense-edit|depense-delete', ['only' => ['index','show']]);
         $this->middleware('permission:depense-create', ['only' => ['create','store']]);
         $this->middleware('permission:depense-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:depense-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $depenses = Depenses::orderBy('id','DESC');
        return view('depenses.index',compact($depenses));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('depenses.create');
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
        request()->validate([
            'reference'=>'required',
            'devis_id'=>'required',
            'datedepense'=>'required',
            'projet_id'=>'required',
            'etape_id'=>'required',
            'tache_id'=>'required',
            'service_id'=>'required',
            'montant'=>'required',
            'libelle'=>'required',
            'description'=>'required',
            'users_id'=>'required',
        ]);
        Depenses::create($request->all());
        return redirect()->route('depenses.index')

                        ->with('success','Depense enregistrée correctement.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Depenses  $depenses
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $depenses = Depenses::find($id);
        return view('depenses.show', compact('depenses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Depenses  $depenses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $depenses = Depenses::find($id);
        return view('depenses.edit', compact('depenses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Depenses  $depenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'reference'=>'required',
            'devis_id'=>'required',
            'datedepense'=>'required',
            'projet_id'=>'required',
            'etape_id'=>'required',
            'tache_id'=>'required',
            'service_id'=>'required',
            'montant'=>'required',
            'libelle'=>'required',
            'description'=>'required',
            'users_id'=>'required',
        ]);
        $depenses=Depenses::find($id);
        $depenses->update($request->all());
        return redirect()->route('depenses.index')
                        ->with('success','Projet modifié avec succès!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Depenses  $depenses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depenses $depenses)
    {
        //
    }
}
