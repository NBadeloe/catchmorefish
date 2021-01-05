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
                            <th scope="col">Is_admin</th>
                            <th scope="col">Naam</th>
                            <th scope="col">Email</th>
                            <th scope="col"><a class=" btn btn-outline-primary" href="{{ route('user.create') }}">Toevoegen</a>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->is_admin}}</td>
                                <td>{{ $value->name}}</td>
                                <td>{{ $value->email}}</td>
                                <td>
                                    <!-- for delete and update it gets the id of the row that needs to be edited/updated. then sends it ro the delete/update page -->

                                    <a class="btn btn-small btn-outline-primary" href="{{ route('user.edit', $value->id) }}">Bewerken</a>
                                    <form action="{{ route('user.destroy', $value->id)}}" method="post">
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
