@extends('layouts.reservations.app')
@section('title')
    Dashboard
@endsection
@section('contente')
    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Tableau de bord</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  contact -->

    <div class="mx-3">
        <table class="table table-bordered border-secondary">
            <h3 class="text text-bold mt-4">Liste de reservations</h3>
            <thead class="table-dark">
                <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">nombre de jours</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Date d'arrivé</th>
                    <th scope="col">Date de depart</th>
                    <th scope="col">Client</th>
                    <th scope="col">Chambre</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($reservations as $reservation)
                    <tr class="table-active">
                        <th scope="row">{{ $reservation->numero }}</th>
                        <td>{{ $reservation->nbr_jour }}</td>
                        <td>{{ $reservation->status }}</td>
                        <td>{{ $reservation->date_arrive }}</td>
                        <td>{{ $reservation->date_depart }}</td>
                        <td>{{ $reservation->client_id }}</td>
                        <td>{{ $reservation->chambre_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
