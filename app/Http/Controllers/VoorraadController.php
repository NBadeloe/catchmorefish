<?php

namespace App\Http\Controllers;

use App\Voorraad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoorraadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $voorraden = DB::table('voorraad')
            ->join('locaties', 'voorraad.locatie_code', '=','locaties.Locatie_code')
            ->join('artikel', 'voorraad.product_code', '=','artikel.product_code')
            ->select('voorraad.id', 'voorraad.locatie_code', 'voorraad.product_code', 'voorraad.aantal')
            ->orderBy('voorraad.locatie_code', 'asc')

            ->get();

        return View('voorraad.index')
            ->with('voorraden', $voorraden);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $locatie= DB::table('locaties')
            ->select('locatie')
            ->get();

        $product= DB::table('artikel')
            ->select('product')
            ->get();

        return view('voorraad.create',compact('locatie', $locatie,'product', $product));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $locaties= $request->locatieCode;


        $locatie = DB::table('locaties')
            ->where('locatie', '=', $locaties)
            ->select('locatie_code')
            ->get();
        $locatieCode = json_decode($locatie[0]->{"locatie_code"});


        $producten = $request->productCode;
        $product = DB::table('artikel')
            ->where('product', '=', $producten)
            ->select('product_code')
            ->get();
        $productCode = json_decode($product[0]->{"product_code"});

        $aantal  = $request->aantal;

        DB::table('Voorraad')
            ->insert(["locatie_code"=>$locatieCode, "product_code"=>$productCode, "voorraad.aantal"=>$aantal, "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')]);

        return redirect('/voorraad');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voorraad  $voorraad
     * @return \Illuminate\Http\Response
     */
    public function show(Voorraad $voorraad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voorraad  $voorraad
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
    $voorraad = Voorraad::find($id);


        $locatie= DB::table('locaties')
            ->select('locatie')
            ->get();

        $product= DB::table('artikel')
            ->select('product')
            ->get();


        return view('voorraad.edit', compact(  'voorraad', $voorraad ,'locatie', $locatie,'product', $product));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voorraad  $voorraad
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {

        $voorraad = $request->id;

        $locaties= $request->locatieCode;


        $locatie = DB::table('locaties')
            ->where('locatie', '=', $locaties)
            ->select('locatie_code')
            ->get();
        $locatieCode = json_decode($locatie[0]->{"locatie_code"});


        $producten = $request->productCode;
        $product = DB::table('artikel')
            ->where('product', '=', $producten)
            ->select('product_code')
            ->get();
        $productCode = json_decode($product[0]->{"product_code"});

        $aantal  = $request->aantal;

        DB::table('Voorraad')
            ->update(["locatie_code"=>$locatieCode, "product_code"=>$productCode, "voorraad.aantal"=>$aantal, "updated_at" => date('Y-m-d H:i:s')]);
        return redirect('/voorraad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voorraad  $voorraad
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $voorraad = Voorraad::find($id);
        $voorraad ->delete();

        return redirect('/voorraad');
    }


}
