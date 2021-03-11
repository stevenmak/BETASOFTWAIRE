<?php

namespace App\Http\Controllers;

use App\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

    // Ajout permission
    function __construct()
    {

         $this->middleware('permission:client-list|client-create|client-edit|client-delete', ['only' => ['index','show']]);
         $this->middleware('permission:client-create', ['only' => ['create','store']]);
         $this->middleware('permission:client-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:client-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Clients::orderBy('id','DESC')->paginate(10);
        return view('clients.index',compact('clients'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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

                                'codeClient' => 'required',
                                'nom' => 'required',
                                'prenomClient' => 'required',
                                'nomClient' => 'required',
                                'titreClient' => 'required',
                                'genreClient' => 'required',
                                'professionClient' => 'required',
                                'adresseClient' => 'required',
                                'villeClient' => 'required',
                                'provinceClient' => 'required',
                                'paysClient' => 'required',
                                'domaineActivite' => 'required',
                                'termepaiement' => 'required',
                                'telephone' => 'required',
                                'mobile' => 'required',
                                'courriel' => 'required',
                                'siteweb' => 'required',
                                'typeclient' => 'required',
                                'users_id' => 'required',

                ]);

                Clients::create($request->all());
                return redirect()->route('clients.index')->with('success','Client enregistré coorectement.');
        }
    /**
     * Display the specified resource.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client=Clients::find($id);
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = Clients::find($id);
        return view('clients.edit', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request, [
                        'codeClient' => 'required',
                        'nom' => 'required',
                        'prenomClient' => 'required',
                        'nomClient' => 'required',
                        'titreClient' => 'required',
                        'genreClient' => 'required',
                        'professionClient' => 'required',
                        'adresseClient' => 'required',
                        'villeClient' => 'required',
                        'provinceClient' => 'required',
                        'paysClient' => 'required',
                        'domaineActivite' => 'required',
                        'termepaiement' => 'required',
                        'telephone' => 'required',
                        'mobile' => 'required',
                        'courriel' => 'required',
                        'siteweb' => 'required',
                        'typeclient' => 'required',
                        'users_id' => 'required',
        ]);
        $clients=Clients::find($id);
        $clients->update($request->all());
        return redirect()->route('clients.index')
                        ->with('success','Client modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        DB::table("clients")->where('id',$id)->delete();
        return redirect()->route('clients.index')->with('success','Client supprimé avec succès!');
    }
}
