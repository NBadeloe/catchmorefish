@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <table class="table">
                        <thead class="table-info">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Locatie code</th>
                            <th scope="col">Product code</th>
                            <th scope="col">aantal</th>
                            <th scope="col"><a class=" btn btn-outline-primary" href="{{ route('voorraad.create') }}">Toevoegen</a>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($voorraden as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->locatie_code }}</td>
                                <td>{{ $value->product_code }}</td>
                                <td>{{ $value->aantal }}</td>
                                <td>
                                    <!-- for delete and update it gets the id of the row that needs to be edited/updated. then sends it ro the delete/update page -->

                                    <a class="btn btn-small btn-outline-primary" href="{{ route('voorraad.edit', $value->id) }}">Bewerken</a>

                                    <form action="{{ route('voorraad.destroy', $value->id)}}" method="post">
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
