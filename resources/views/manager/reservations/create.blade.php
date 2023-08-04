@extends('layouts.manager.app')

@section('titre')
    Réservation
@endsection

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Créer une reservation</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('reservations.store') }}" method="POST">
                        @csrf

                        <div class="card-body">

                            <div class="form-group">
                                <label for="status">Statut</label>
                                <select class="form-control" name="status">
                                    <option value="checkin" {{ old('status') === 'checkin' ? 'selected' : '' }}>Check-in
                                    </option>
                                    <option value="checked" {{ old('status') === 'checked' ? 'selected' : '' }}>Checked
                                    </option>
                                    <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="annule" {{ old('status') === 'annule' ? 'selected' : '' }}>Annulé
                                    </option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="date_arrive">Date d'arrivée</label>
                                <input type="date" class="form-control" name="date_arrive"
                                    value="{{ old('date_arrive') }}">
                                @error('date_arrive')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="date_depart">Date de départ</label>
                                <input type="date" class="form-control" name="date_depart"
                                    value="{{ old('date_depart') }}">
                                @error('date_depart')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nbr_jour">Nombre de jours</label>
                                <input type="number" class="form-control" name="nbr_jour" value="{{ old('nbr_jour') }}">
                                @error('nbr_jour')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="client_id">ID du client</label>
                                <select class="form-control" name="client_id">
                                    <option selected>Sélectioner un client</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->id }}-{{ $user->nom . ' ' . $user->prenom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">

                                @if ($chambres != [])
                                    <label for="chambre_id">ID du chambre</label>
                                    <select class="form-control" name="chambre_id">
                                        <option selected>Sélectioner une chambre</option>
                                        @foreach ($chambres as $chambre)
                                            <option value="{{ $chambre->id }}">
                                                {{ $chambre->id }}-{{ $chambre->type }}
                                            </option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-danger " href="#">Annuler</a>
                            <button type="submit" class="btn btn-info float-right">Ajouter</button>
                        </div>
                        <script>
                            const dateArriveInput = document.querySelector('input[name="date_arrive"]');
                            const dateDepartInput = document.querySelector('input[name="date_depart"]');
                            const nbrJourInput = document.querySelector('input[name="nbr_jour"]');

                            function calculateNumberOfDays(startDate, endDate) {
                                const oneDay = 24 * 60 * 60 * 1000; // One day in milliseconds
                                const start = new Date(startDate);
                                const end = new Date(endDate);
                                const diffDays = Math.round(Math.abs((end - start) / oneDay));
                                return diffDays;
                            }

                            function updateNumberOfDays() {
                                const startDate = dateArriveInput.value;
                                const endDate = dateDepartInput.value;

                                if (startDate && endDate) {
                                    const numberOfDays = calculateNumberOfDays(startDate, endDate);
                                    nbrJourInput.value = numberOfDays;
                                }
                            }

                            dateArriveInput.addEventListener('change', function() {
                                // Ensure "Date de départ" is always greater than "Date d'arrivée"
                                if (dateDepartInput.value < dateArriveInput.value) {
                                    dateDepartInput.value = dateArriveInput.value;
                                }
                                updateNumberOfDays();
                            });

                            dateDepartInput.addEventListener('change', function() {
                                // Ensure "Date de départ" is always greater than "Date d'arrivée"
                                if (dateDepartInput.value < dateArriveInput.value) {
                                    dateDepartInput.value = dateArriveInput.value;
                                }
                                updateNumberOfDays();
                            });
                        </script>

                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
