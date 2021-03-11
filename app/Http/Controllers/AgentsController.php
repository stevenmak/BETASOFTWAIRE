<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Agents;
use Illuminate\Http\Request;

class AgentsController extends Controller
{

    // Ajout permission
    function __construct()
    {

         $this->middleware('permission:agent-list|agent-create|agent-edit|agent-delete', ['only' => ['index','show']]);
         $this->middleware('permission:agent-create', ['only' => ['create','store']]);
         $this->middleware('permission:agent-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:agent-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $agents = Agents::orderBy('id','DESC')->where('statut',0)->paginate(10);
        return view('agents.index',compact('agents'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('agents.create');
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
            'prenom' => 'required',
            'nom' => 'required',
            'codeAgent' => 'required',
            'matriculeAgent' => 'required',
            'genre' => 'required',
            'telephone' => 'required',
            'mobile' => 'required',
            'courriel' => 'required',
            'titreAgent' => 'required',
            'profession' => 'required',
            'niveauEtude' => 'required',
            'etatCivil' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'province' => 'required',
            'pays' => 'required',
        ]);
        Agents::create($request->all());
        return redirect()->route('agents.index')
                        ->with('success','Agent enregistré coorectement.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $agents = Agents::find($id);
        return view('agents.show', compact('agents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $agents = Agents::find($id);
        return view('agents.edit', compact('agents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'codeAgent' => 'required',
            'matriculeAgent' => 'required',
            'genre' => 'required',
            'telephone' => 'required',
            'mobile' => 'required',
            'courriel' => 'required',
            'titreAgent' => 'required',
            'profession' => 'required',
            'niveauEtude' => 'required',
            'etatCivil' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'province' => 'required',
            'pays' => 'required',
        ]);
        $agents=Agents::find($id);
        $agents->update($request->all());
        return redirect()->route('agents.index')
                        ->with('success','Agent modifié coorectement.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table("agents")->where('id',$id)->delete();
        return redirect()->route('agents.index')->with('success','Agent supprimé avec succès');
    }

    public function archiverAgent(Agents $agents,$id)
    {
        DB::table('agents')->where('id','=',$id)->update(['statut'=>'1']);
        return redirect()->route('agents.index')
                        ->with('success','agents archive avec succès');

    }
}
