@extends('layouts.restaurant.app')
@section('titre')
    Restaurant rsv
@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">Liste des reservations</h3>
        </div><!-- /.card-header -->
    </div>
    <table class="table table-bordered border-secondary">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Numero</th>
                <th scope="col">nombre de jours</th>
                <th scope="col">Statut</th>
                <th scope="col">Date d'arrivé</th>
                <th scope="col">Date de depart</th>
                <th scope="col">Prix</th>
                <th scope="col">Client</th>
                <th scope="col">Chambre</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($reservations as $reservation)
                <tr class="table-active">
                    <th scope="row">{{ $reservation->id }}</th>
                    <td>{{ $reservation->numero }}</td>
                    <td>{{ $reservation->nbr_jour }}</td>
                    <td>{{ $reservation->status }}</td>
                    <td>{{ $reservation->date_arrive }}</td>
                    <td>{{ $reservation->date_depart }}</td>
                    <td>{{ $reservation->prix }}</td>
                    <td>{{ $reservation->client_id }}</td>
                    <td>{{ $reservation->chambre_id }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $reservations->links('pagination::bootstrap-5') }}
@endsection
