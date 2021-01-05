@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-dark">{{ __('leverancier Bewerken') }}</div>

                    <div class="card-body">
                        <form action="{{ route('artikel.update', $artikel->product_code) }}" method="post">
                            @method('patch')
                            @csrf
                            <input type="hidden" name ="product_code" class="form-control" value="{{$artikel->product_code}}"  required>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="product">Product</label>
                                    <input type="text" name ="product" class="form-control" value="{{$artikel->product}}"  required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="type">Type</label>
                                    <input type="text" name ="type" class="form-control" value="{{$artikel->type}}" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="levCode">Leverancier code</label>

                                    <select name="levCode" id="levCode" class="form-control">
{{--                                        todo: if value is selected dont dubble print--}}
                                        <option>{{$artikel->lev_code}}</option>
                                        @foreach($levCode as $value)
                                            <option>{{$value->lev_code}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="inkoopprijs">Inkoopprijs</label>
                                    <input type="text" name ="inkoopprijs" class="form-control" value="{{$artikel->inkoopprijs}}" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="verkoopprijs">Verkoopprijs</label>
                                    <input type="text" name ="verkoopprijs" class="form-control" value="{{$artikel->verkoopprijs}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-outline-primary" type="submit">Toevoegen</button>
                            </div>

                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
