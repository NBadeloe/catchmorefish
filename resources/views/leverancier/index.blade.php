@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <table class="table">
                        <thead class="table-info">
                        <tr>
                            <th scope="col">leverancier code</th>
                            <th scope="col">Leverancier</th>
                            <th scope="col">Telefoon</th>
                            <th scope="col"><a class=" btn btn-outline-primary" href="{{ route('leverancier.create') }}">Toevoegen</a>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leveranciers as $value)
                            <tr>
                                <td>{{ $value->lev_code }}</td>
                                <td>{{ $value->leverancier }}</td>
                                <td>{{ $value->telefoon }}</td>
                                <td>
                                    <!-- for delete and update it gets the id of the row that needs to be edited/updated. then sends it ro the delete/update page -->

                                    <a class="btn btn-small btn-outline-primary" href="{{ route('leverancier.edit', $value->lev_code) }}">Bewerken</a>
                                    <form action="{{ route('leverancier.destroy', $value->lev_code)}}" method="post">
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
