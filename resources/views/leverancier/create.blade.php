@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-white">{{ __('Nieuwe Leverancier toevoegen') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('leverancier.store') }}" >
                            @csrf
                            @method('post')
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="leverancier">Leverancier</label>
                                    <input type="text" name ="leverancier" class="form-control"  required>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                    <label for="telefoon">Telefoon</label>
                                    <input type="text" name ="telefoon" class="form-control"  required>
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
