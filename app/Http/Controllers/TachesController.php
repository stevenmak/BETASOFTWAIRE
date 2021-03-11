<?php

namespace App\Http\Controllers;

use App\Taches;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TachesController extends Controller
{
     // Ajout permission
     function __construct()
     {
          $this->middleware('permission:taches-list|taches-create|taches-edit|taches-delete', ['only' => ['index','show']]);
          $this->middleware('permission:taches-create', ['only' => ['create','store']]);
          $this->middleware('permission:taches-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:taches-delete', ['only' => ['destroy']]);
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $taches = Taches::orderBy('id','DESC')->paginate(10);
        return view('taches.index',compact('taches'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('taches.create');
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
            'designation' => 'required',
            'description' => 'required',
            'dateDebut' => 'required',
            'dateFin' => 'required|after_or_equal:dateDebut',
            'depenseEstimerTache' => 'required',
            'priorite' => 'required',
            'avancement' => 'required',
            'etat' => 'required',
            'etape_id' => 'required',
            'users_id' => 'required',
            'service_id' => 'required',

        ]);
        Taches::create($request->all());
        return redirect()->route('taches.index')

                        ->with('success','Tâche enregistrée correctement.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Taches  $taches
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $taches = Taches::find($id);
        return view('taches.show', compact('taches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Taches  $taches
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $taches = Taches::find($id);
        return view('taches.edit', compact('taches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Taches  $taches
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request, [
            'designation' => 'required',
            'description' => 'required',
            'dateDebut' => 'required',
            'dateFin' => 'required|after_or_equal:dateDebut',
            'depenseEstimerTache' => 'required',
            'priorite' => 'required',
            'avancement' => 'required',
            'etat' => 'required',
            'etape_id' => 'required',
            'users_id' => 'required',
            'service_id' => 'required',
        ]);
        $taches=Taches::find($id);
        $taches->update($request->all());
        return redirect()->route('taches.index')
                        ->with('success','Tache modifiée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Taches  $taches
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taches $taches)
    {
        //
    }

    public function taskofDay(Taches $taches)
    {
        $aujourdhui = new Carbon('now');
        $taskdujour = Taches::whereBetween($aujourdhui,[$taches->dateDebut,$taches->dateFin] );
        return $taskdujour;
    }
}
