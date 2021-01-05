@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-dark">{{ __('leverancier Bewerken') }}</div>

                    <div class="card-body">
                        <form action="{{ route('leverancier.update', $leverancier->lev_code) }}" method="post">
                            @method('patch')
                            @csrf
                            <div class="form-row">
                                <input type="hidden" name="lev_code" value="{{$leverancier->lev_code}}">
                                <div class="col-md-6 mb-3">
                                    <label for="leverancier">Leverancier</label>
                                    <input type="text" name="leverancier" class="form-control" value="{{$leverancier->leverancier}}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="telefoon">Telefoon</label>
                                    <input type="tel" name="telefoon" class="form-control" value="{{$leverancier->telefoon}}" required>
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
