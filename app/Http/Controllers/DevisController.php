<?php

namespace App\Http\Controllers;

use App\Devis;
use App\Lignes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    // Ajout permission
    function __construct()
    {
         $this->middleware('permission:devis-list|devis-create|devis-edit|devis-delete', ['only' => ['index','show']]);
         $this->middleware('permission:devis-create', ['only' => ['create','store']]);
         $this->middleware('permission:devis-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:devis-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $devis = Devis::orderBy('id','DESC')->paginate(10);
        return view('devis.index',compact('devis'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('devis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Inserer le deivs et les lignes devis
        //insertion devis
        $devis=Devis::create($request->devis);
        //recuperation derniere devis inserer
        //inserer des multiples lignes du devis
        for ($i=0; $i < count($request->materiaux_id) ; $i++)
        {
            if (isset($request->quantite[$i]) && isset($request->prix[$i]) )
            {
                Lignes::create([
                    'devis_id' => $devis->id,
                    'materiaux_id' => $request->materiaux_id[$i],
                    'quantite' => $request->quantite[$i],
                    'prix' => $request->prix[$i],

                ]);

            }
        }
        return redirect()->route('devis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Devis  $devis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $devis = Devis::find($id);
        return view('devis.show', compact('devis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Devis  $devis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $devis = Devis::where('id',$id)->with('lignes')->first();
        return view('devis.edit', compact('devis','$devis'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Devis  $devis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Devis $devis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Devis  $devis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devis $devis,$id)
    {
        DB::table("lignes")->where('id',$id)->delete();
        return redirect()->route('devis.show',$devis->$id)->with('success','Roles supprimé avec succès');
    }
}
