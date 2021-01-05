<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Searchable\Search;

class KlantController extends Controller
{
    public function index(){

        return view('klant.index');

    }
    public function productDetail(Request $request){

        return view('klant.product');

    }

    public function search(Request $request)
    {

        $searchterm = $request->input('search');

        $searchResults = (new Search())
            ->registerModel(\App\Artikel::class, 'product', 'product_code')
            ->perform($searchterm);


        return view('klant.index', compact('searchResults'));
    }

}
