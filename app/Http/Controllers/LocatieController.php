<?php

namespace App\Http\Controllers;

use App\Locatie;
use Illuminate\Http\Request;

class LocatieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        //gets all data from table and sends it in var to the view
       $locaties = Locatie::all();

        return View('locatie.index')->with('locaties', $locaties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('locatie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //call model
        $locatie = new Locatie();
        //gets request from input name
        $locatie->locatie = $request->input('locatie');
        //saves/inserts in db
        $locatie->save();


        return redirect('/locatie');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locatie  $locatie
     * @return \Illuminate\Http\Response
     */
    public function show(Locatie $locatie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locatie  $locatie
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        //looks for id
        $locatie = Locatie::find($id);



        return view('locatie.edit', compact('locatie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locatie  $locatie
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Locatie $locatie)
    {
        //turns id from string to int
        $locatie_code = (int)$request->input('locatie_code');
        // tells that value needs to be put in locatie_code
        $locatie->locatie_code = $locatie_code;
        //gets input
        $locatie->locatie = $request->input('locatie');

        //saves/updates
        $locatie->save();

        return redirect('/locatie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locatie  $locatie
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        //finds given id
        $locatie = Locatie::find($id);
        $locatie->delete();

        return redirect('/locatie');



    }
}
