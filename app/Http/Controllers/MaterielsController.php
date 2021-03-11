<?php

namespace App\Http\Controllers;
use App\User;
use App\Materiels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterielsController extends Controller
{

    // Ajout permission
    function __construct()
    {
         $this->middleware('permission:materiel-list|materiel-create|materiel-edit|materiel-delete', ['only' => ['index','show']]);
         $this->middleware('permission:materiel-create', ['only' => ['create','store']]);
         $this->middleware('permission:materiel-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:materiel-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $materiels = Materiels::orderBy('id','DESC')->paginate(10);
        return view('materiels.index',compact('materiels'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('materiels.create');
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
            'codeMateriaux' => 'required',
            'prix' => 'required',
            'designation' => 'required',
            'type' => 'required',
            'users_id' => 'required',

        ]);
        Materiels::create($request->all());
        return redirect()->route('materiels.index')
                        ->with('success','Materiel enregistré coorectement.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materiels  $materiels
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $materiel=Materiels::find($id);
        return view('materiels.show', compact('materiel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materiels  $materiels
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $materiels = Materiels::find($id);
        return view('materiels.edit', compact('materiels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materiels  $materiels
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'codeMateriaux' => 'required',
            'prix' => 'required',
            'designation' => 'required',
            'type' => 'required',
            'users_id' => 'required',
        ]);
        $materiels=Materiels::find($id);
        $materiels->update($request->all());
        return redirect()->route('materiels.index')
                        ->with('success','Materiel ou Service modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materiels  $materiels
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table("materiels")->where('id',$id)->delete();
        return redirect()->route('materiels.index')->with('success','Materiel supprimé avec succès');
    }
}
