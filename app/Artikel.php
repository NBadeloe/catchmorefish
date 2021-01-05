<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Artikel extends Model implements searchable
{
    public $table = "artikel";
    protected $primaryKey = 'product_code';

    public function getSearchResult(): SearchResult
    {
        $url = route('klant.productDetail', $this->id);

        return new SearchResult(
            $this,
            $this->product,
            $this->product_code
            );
    }
}
