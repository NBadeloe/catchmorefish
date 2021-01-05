<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        //joins tables
        $artikels = DB::table('artikel')
            ->join('leveranciers', 'leveranciers.lev_code', '=','artikel.lev_code')
            ->select('artikel.product_code', 'artikel.product', 'artikel.type', 'Leveranciers.lev_code','artikel.inkoopprijs', 'artikel.verkoopprijs')
            ->orderBy('artikel.product_code', 'asc')

            ->get();

        return View('artikel.index')
            ->with('artikels', $artikels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $levCode= DB::table('leveranciers')
            ->select('lev_code')
            ->get();

        return view('artikel.create',compact('levCode', $levCode));
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
        $artikel = new Artikel();
        //gets request from input name
        $artikel->lev_code = $request->input('levCode');
        $artikel->product = $request->input('product');
        $artikel->type = $request->input('type');
        $artikel->inkoopprijs = $request->input('inkoopprijs');
        $artikel->verkoopprijs = $request->input('verkoopprijs');

        //saves/inserts in db
        $artikel->save();

        return redirect('/artikel');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        //looks for id
        $artikel = Artikel::find($id);

        $levCode= DB::table('leveranciers')
            ->select('lev_code')
            ->get();


        return view('artikel.edit', compact('artikel', $artikel, 'levCode', $levCode));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Artikel $artikel)
    {

                // tells that value needs to be put in productcode
                $artikel->product_code = (int)$request->input('product_code');
                $artikel->lev_code = $request->input('levCode');
                $artikel->product = $request->input('product');
                $artikel->type = $request->input('type');
                $artikel->inkoopprijs = $request->input('inkoopprijs');
                $artikel->verkoopprijs = $request->input('verkoopprijs');

                //saves/updates
                $artikel->save();
        return redirect('/artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);
        $artikel->delete();

        return redirect('/artikel');
    }
}
