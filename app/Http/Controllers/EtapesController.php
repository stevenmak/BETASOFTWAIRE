<?php

namespace App\Http\Controllers;

use App\Etapes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EtapesController extends Controller
{

     // Ajout permission
     function __construct()
     {
          $this->middleware('permission:etape-list|etape-create|etape-edit|etape-delete', ['only' => ['index','show']]);
          $this->middleware('permission:etape-create', ['only' => ['create','store']]);
          $this->middleware('permission:etape-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:etape-delete', ['only' => ['destroy']]);
     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $etapes = Etapes::orderBy('id','DESC')->paginate(10);
        return view('etapes.index',compact('etapes'))->with('i', ($request->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('etapes.create');
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
            'nomEtape' => 'required',
            'projet_id' => 'required',
            'debutEtape' => 'required',
            'debutFin' => 'required|after_or_equal:debutEtape',
            'depenseEstimer'=> 'required',
            'tempsprevu' => 'required',
            'avancement' => 'required',
            'description' => 'required',
            'etatEtape' => 'required',
            'etapeprerequise' => 'required',
            'users_id' => 'required',
        ]);
        Etapes::create($request->all());
        return redirect()->route('etapes.index')
                        ->with('success','Etape projet enregistrée coorectement.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Etapes  $etapes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etapes = Etapes::find($id);
        return view('etapes.show', compact('etapes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Etapes  $etapes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etapes = Etapes::find($id);
        return view('etapes.edit', compact('etapes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Etapes  $etapes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            request()->validate([
            'nomEtape' => 'required',
            'projet_id' => 'required',
            'debutEtape' => 'required',
            'debutFin' => 'required',
            'depenseEstimer'=> 'required',
            'tempsprevu' => 'required',
            'avancement' => 'required',
            'description' => 'required',
            'etatEtape' => 'required',
            'etapeprerequise' => 'required',
            'users_id' => 'required',
        ]);
        $etapes=Etapes::find($id);
        $etapes->update($request->all());
        return redirect()->route('etapes.index')
                        ->with('success','Etape projet modifiée avec succès!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Etapes  $etapes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("etapes")->where('id',$id)->delete();
        return redirect()->route('etapes.index')->with('success','Etape projet supprimée avec succès!');
    }
}
