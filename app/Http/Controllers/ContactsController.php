<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    // Ajout permission
    function __construct()
    {

         $this->middleware('permission:contact-list|contact-create|contact-edit|contact-delete', ['only' => ['index','show']]);
         $this->middleware('permission:contact-create', ['only' => ['create','store']]);
         $this->middleware('permission:contact-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $contacts = Contacts::orderBy('id','DESC')->paginate(10);
        return view('contacts.index',compact('contacts'))->with('i', ($request->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contacts.create');
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
            'codeContact' => 'required',
            'prenomContact' => 'required',
            'nomContact' => 'required',
            'titreContact' => 'required',
            'genreContact' => 'required',
            'professionContact' => 'required',
            'telephone' => 'required',
            'mobile' => 'required',
            'courriel' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'province' => 'required',
            'pays' => 'required',
            'domaineActivite' => 'required',
            'client_id' => 'required',
            'users_id' => 'required',
        ]);
        Contacts::create($request->all());
        return redirect()->route('contacts.index')
                        ->with('success','Contact enregistré correctement.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $contacts = Contacts::find($id);
        return view('contacts.show', compact('contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contacts = Contacts::find($id);
        return view('contacts.edit', compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'codeContact' => 'required',
            'prenomContact' => 'required',
            'nomContact' => 'required',
            'titreContact' => 'required',
            'genreContact' => 'required',
            'professionContact' => 'required',
            'telephone' => 'required',
            'mobile' => 'required',
            'courriel' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'province' => 'required',
            'pays' => 'required',
            'domaineActivite' => 'required',
            'client_id' => 'required',
            'users_id' => 'required',
        ]);
        $contacts=Contacts::find($id);
        $contacts->update($request->all());
                        return redirect()->route('contacts.index')
                                        ->with('success','Contact modifié correctement.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table("contacts")->where('id',$id)->delete();
        return redirect()->route('contacts.index')->with('success','Contact supprimé avec succès');
    }
}
