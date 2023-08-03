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
                        <h2>Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  contact -->
    <div class="contact">
        <div class="container">
            @if (session('success'))
                <script type="text/javascript">
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Ajout fait avec succès'
                    })
                </script>
            @endif

        </div>
        <div class="container">

            <table class="table table-bordered border-secondary">
                <h3 class="text text-bold">Liste de reservations</h3>
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
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
                            <th scope="row">{{ $reservation->id }}</th>
                            <td>{{ $reservation->numero }}</td>
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
    </div>
@endsection
