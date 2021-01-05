<?php

namespace App\Http\Controllers;

use App\Leverancier;
use Illuminate\Http\Request;

class LeverancierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        //gets all data from table and sends it in var to the view
        $leveranciers = Leverancier::all();

        return View('leverancier.index')->with('leveranciers', $leveranciers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('leverancier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //call model
        $leverancier = new Leverancier();
        //gets request from input name
        $leverancier->leverancier = $request->input('leverancier');
        $leverancier->telefoon = $request->input('telefoon');
        //saves/inserts in db
        $leverancier->save();

        return redirect('/leverancier');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leverancier  $leverancier
     * @return \Illuminate\Http\Response
     */
    public function show(Leverancier $leverancier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leverancier  $leverancier
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        //looks for id
        $leverancier = Leverancier::find($id);

        return view('leverancier.edit', compact('leverancier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leverancier  $leverancier
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Leverancier $leverancier)
    {
        //turns id fromg string to int
        $lev_code = (int)$request->input('lev_code');
        // tells that value needs to be put in lev_code
        $leverancier->lev_code = $lev_code;
        //gets input
        $leverancier->leverancier = $request->input('leverancier');
        $leverancier->telefoon = $request->input('telefoon');

        //saves/updates
        $leverancier->save();

        return redirect('/leverancier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leverancier  $leverancier
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        //finds given id
        $leverancier = Leverancier::find($id);
        $leverancier->delete();

        return redirect('/leverancier');
    }
}
