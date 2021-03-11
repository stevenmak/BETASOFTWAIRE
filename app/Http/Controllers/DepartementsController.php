<?php

namespace App\Http\Controllers;

use App\Departements;
use Illuminate\Http\Request;

class DepartementsController extends Controller
{
    // Ajout permission
    function __construct()
    {
         $this->middleware('permission:departement-list|departement-create|departement-edit|departement-delete', ['only' => ['index','show']]);
         $this->middleware('permission:departement-create', ['only' => ['create','store']]);
         $this->middleware('permission:departement-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:departement-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $departements = Departements::orderBy('id','DESC')->paginate(10);
        return view('departements.index',compact('departements'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('departements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'designation' => 'required',
            'nbreAgent' => 'required',
            'users_id' => 'required',

        ]);
        Departements::create($request->all());
        return redirect()->route('departements.index')
                        ->with('success','Departement enregistré coorectement.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departements  $departements
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departements = Departements::find($id);
        return view('departements.show', compact('departements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departements  $departements
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $departements = Departements::find($id);
        return view('departements.edit', compact('departements'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departements  $departements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            request()->validate([
            'designation' => 'required',
            'nbreAgent' => 'required',

        ]);
        $departements=Departements::find($id);
        $departements->update($request->all());
        return redirect()->route('departements.index')
                        ->with('success','Etape projet modifiée avec succès!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departements  $departements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departements $departements)
    {
        //
    }
}
