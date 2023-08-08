@extends('layouts.restaurant.app')
@section('titre')
    Restaurant clt
@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">Liste des clients</h3>
        </div><!-- /.card-header -->
    </div>
    <table class="table table-bordered border-secondary">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Email</th>
                <th scope="col">Adresse</th>
                <th scope="col">Type</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($users as $user)
                <tr class="table-active">
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->tel }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->adresse }}</td>
                    <td>{{ $user->isadmin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links('pagination::bootstrap-5') }}
@endsection
