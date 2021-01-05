@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <table class="table">
                        <thead class="table-info">
                        <tr>
                            <th scope="col">Locatie code</th>
                            <th scope="col">Locatie</th>
                            <th scope="col"><a class=" btn btn-outline-primary" href="{{ route('locatie.create') }}">Toevoegen</a>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($locaties as $value)
                            <tr>
                                <td>{{ $value->locatie_code }}</td>
                                <td>{{ $value->locatie }}</td>
                                <td>
                                    <!-- for delete and update it gets the id of the row that needs to be edited/updated. then sends it ro the delete/update page -->

                                    <a class="btn btn-small btn-outline-primary" href="{{ route('locatie.edit', $value->locatie_code) }}">Bewerken</a>
                                    <form action="{{ route('locatie.destroy', $value->locatie_code)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-small btn-outline-primary" type="submit">Verwijderen</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endsection
