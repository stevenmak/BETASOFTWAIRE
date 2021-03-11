<?php

namespace App\Http\Controllers;

use App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
     // Ajout permission
     function __construct()
     {
          $this->middleware('permission:service-list|service-create|service-edit|service-delete', ['only' => ['index','show']]);
          $this->middleware('permission:service-create', ['only' => ['create','store']]);
          $this->middleware('permission:service-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:service-delete', ['only' => ['destroy']]);
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $services = Services::orderBy('id','DESC')->paginate(10);
        return view('services.index',compact('services'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('services.create');
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
            'nbreAgent' => 'required',
            'chefservice' => 'required',
            'users_id' => 'required',
            'departement_id' => 'required',

        ]);
        Services::create($request->all());
        return redirect()->route('services.index')
                        ->with('success','Service enregistré coorectement.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service=Services::find($id);
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Services::find($id);
        return view('services.edit', compact('services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'designation' => 'required',
            'nbreAgent' => 'required',
            'chefservice' => 'required',
            'users_id' => 'required',
            'departement_id' => 'required',
        ]);
        $services=Services::find($id);
        $services->update($request->all());
        return redirect()->route('services.index')
                        ->with('success','Service modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $services)
    {
        //
    }
}
