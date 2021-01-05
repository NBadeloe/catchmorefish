@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <table class="table">
                        <thead class="table-info">
                        <tr>
                            <th scope="col">Product code</th>
                            <th scope="col">Product</th>
                            <th scope="col">type</th>
                            <th scope="col">Leverancier code</th>
                            <th scope="col">Inkoopprijs</th>
                            <th scope="col">Verkoopprijs</th>
                            <th scope="col"><a class=" btn btn-outline-primary" href="{{ route('artikel.create') }}">Toevoegen</a>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($artikels as $value)
                            <tr>
                                <td>{{ $value->product_code }}</td>
                                <td>{{ $value->product }}</td>
                                <td>{{ $value->type }}</td>
                                <td>{{ $value->lev_code }}</td>
                                <td>{{ $value->inkoopprijs }}</td>
                                <td>{{ $value->verkoopprijs }}</td>
                                <td>
                                    <!-- for delete and update it gets the id of the row that needs to be edited/updated. then sends it ro the delete/update page -->

                                    <a class="btn btn-small btn-outline-primary" href="{{ route('artikel.edit', $value->product_code) }}">Bewerken</a>

                                    <form action="{{ route('artikel.destroy', $value->product_code)}}" method="post">
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
