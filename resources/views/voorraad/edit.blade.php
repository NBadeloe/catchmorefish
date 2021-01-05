@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-dark">{{ __('Voorraad Bewerken') }}</div>

                    <div class="card-body">
                        <form action="{{ route('voorraad.update', $voorraad->id) }}" method="post">
                            @method('patch')
                            @csrf
                            <input type="hidden" name ="product_code" class="form-control" value="{{$voorraad->id}}"  required>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="locatieCode">Locatie</label>
                                <select name="locatieCode" id="locatieCode" class="form-control">
                                    @foreach($locatie as $value)
                                        <option>{{$value->locatie}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="productCode">Product</label>
                                <select name="productCode" id="productCode" class="form-control">
                                    @foreach($product as $value)
                                        <option>{{$value->product}}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="aantal">Aantal</label>
                            <input type="text" name ="aantal" class="form-control"  required>
                        </div>
                    </div>


                            <div class="form-group">
                                <button class="btn btn-outline-primary" type="submit">Toevoegen</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
