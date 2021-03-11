<?php

namespace App\Http\Controllers;

use App\Projets;
use Illuminate\Http\Request;

class ProjetsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:projet-list|projet-create|projet-edit|projet-delete', ['only' => ['index','show']]);
         $this->middleware('permission:projet-create', ['only' => ['create','store']]);
         $this->middleware('permission:projet-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:projet-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $projets = Projets::orderBy('id','DESC')->where('etatprojet','<>','Terminer')->paginate(10);
        return view('projets.index',compact('projets'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function finis(Request $request)
    {
        //
        $projets = Projets::orderBy('id','DESC')->where('etatprojet','=','Terminer')->paginate(10);
        return view('projets.finis',compact('projets'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('projets.create');
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
            'codeProjet'=>'required',
            'nomProjet'=>'required',
            'client_id'=>'required',
            'contact_id'=>'required',
            'datedebut'=>'required',
            'datefin'=>'required |after_or_equal:datedebut',
            'description'=>'required',
            'methodepaiement'=>'required',
            'etatprojet'=>'required',
            'agent_id'=>'required',
            'BudgetProjet'=>'required',
            'users_id'=>'required',

        ]);
        Projets::create($request->all());
        return redirect()->route('projets.index')

                        ->with('success','Projet enregistré correctement.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projets  $projets
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $projets = Projets::find($id);
        return view('projets.show', compact('projets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projets  $projets
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projets = Projets::find($id);
        return view('projets.edit', compact('projets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projets  $projets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request, [
            'codeProjet'=>'required',
            'nomProjet'=>'required',
            'client_id'=>'required',
            'contact_id'=>'required',
            'datedebut'=>'required',
            'datefin'=>'required |after_or_equal:datedebut',
            'description'=>'required',
            'methodepaiement'=>'required',
            'etatprojet'=>'required',
            'agent_id'=>'required',
            'BudgetProjet'=>'required',
            'users_id'=>'required',
        ]);
        $projets=Projets::find($id);
        $projets->update($request->all());
        return redirect()->route('projets.index')
                        ->with('success','Projet modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projets  $projets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projets $projets)
    {
        //
    }
}
