<?php

namespace App\Http\Controllers;

use App\Paiements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaiementsController extends Controller
{

    // Ajout permission
    function __construct()
    {
         $this->middleware('permission:paiement-list|paiement-create|paiement-edit|paiement-delete', ['only' => ['index','show']]);
         $this->middleware('permission:paiement-create', ['only' => ['create','store']]);
         $this->middleware('permission:paiement-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:paiement-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $paiements = Paiements::orderBy('id','DESC')->paginate(10);
        return view('paiements.index',compact('paiements'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('paiements.create');
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
            'libelle'=>'required',
            'description'=>'required',
            'datepaiement'=>'required',
            'montant'=>'required',
            'projet_id'=>'required',
            'users_id'=>'required',

        ]);
        Paiements::create($request->all());
        return redirect()->route('paiements.index')
                        ->with('success','Paiement enregistré correctement.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paiements  $paiements
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $paiements = Paiements::find($id);
        return view('paiements.show', compact('paiements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projets  $projets
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paiements = Paiements::find($id);
        return view('paiements.edit', compact('paiements'));
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
                'reference'=>'required',
                'libelle'=>'required',
                'description'=>'required',
                'datepaiement'=>'required',
                'montant'=>'required',
                'projet_id'=>'required',
                'users_id'=>'required',
        ]);
        $paiements=Paiements::find($id);
        $paiements->update($request->all());
        return redirect()->route('paiements.index')
                        ->with('success','Projet modifié avec succès!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paiements  $paiements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paiements $paiements)
    {
        //
    }
    public function archiverPaiement($id)
    {
        DB::table('paiements')->where('id','=',$id)->update(['statut'=>'1']);
        return redirect()->route('paiements.index')
                        ->with('success','paiement authorisé avec succès');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dailyreport()
    {
        //
        return view('paiements.dailyreport');
    }

}
