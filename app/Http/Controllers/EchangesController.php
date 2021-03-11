<?php

namespace App\Http\Controllers;
use App\Echanges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EchangesController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:echange-list|echange-create|echange-edit|echange-delete', ['only' => ['index','show']]);
         $this->middleware('permission:echange-create', ['only' => ['create','store']]);
         $this->middleware('permission:echange-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:echange-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $echanges = Echanges::orderBy('id','DESC')->paginate(10);
        return view('echanges.index',compact('echanges'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('echanges.create');

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
            'valeurEchanges' => 'required',

        ]);
        Echanges::create($request->all());
        return redirect()->route('echanges.index')

                        ->with('success','Taux enregistré coorectement.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Echanges  $echanges
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $echanges = Echanges::find($id);
        return view('echanges.show', compact('echanges'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Echanges  $echanges
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $echanges = Echanges::find($id);
        return view('echanges.edit', compact('echanges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Echanges  $echanges
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'valeurEchanges'=>'required',
        ]);
        $echanges=Echanges::find($id);
        $echanges->valeurEchanges=$request->input('valeurEchanges');
        $echanges->save();
        return redirect()->route('echanges.index')
                        ->with('success','Taux modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Echanges  $echanges
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table("echanges")->where('id',$id)->delete();
        return redirect()->route('echanges.index')->with('success','Taux supprimé avec succès');
    }
}
