@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-white">{{ __('Nieuwe Medewerker toevoegen') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('user.store') }}" >
                            @csrf
                            @method('post')
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="is_admin">Is_admin</label>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="checkbox" id="is_admin" name="is_admin" value="1" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                    <label for="name">Naam</label>
                                    <input type="text" name ="name" class="form-control"  required>
                            </div>

                            <div class="col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" name ="email" class="form-control"  required>
                            </div>

                            <div class="col-md-6 mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name ="password" class="form-control"  required>
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
