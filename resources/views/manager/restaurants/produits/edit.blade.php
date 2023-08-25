@extends('layouts.restaurant.app')

@section('titre')
    Réservation
@endsection

@section('content')
    <div class="container ">
        <div class="col-md-7">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Créer une Service</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">

                        <div class="form-group">
                            <label for="status">Statut</label>
                            <select class="form-control" name="status">
                                <option value="checkin"
                                    {{ old('status', $reservation->status) === 'checkin' ? 'selected' : '' }}>
                                    Check-in
                                </option>
                                <option value="checked"
                                    {{ old('status', $reservation->status) === 'checked' ? 'selected' : '' }}>
                                    Checked
                                </option>
                                <option value="pending"
                                    {{ old('status', $reservation->status) === 'checked' ? 'selected' : '' }}>
                                    Pending
                                </option>
                                <option value="annule"
                                    {{ old('status', $reservation->status) === 'annule' ? 'selected' : '' }}>
                                    Annulé
                                </option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="date_arrive">Date d'arrivée</label>
                            <input type="date" class="form-control" name="date_arrive"
                                value="{{ old('date_arrive', $reservation->date_arrive) }}">
                            @error('date_arrive')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="date_depart">Date de départ</label>
                            <input type="date" class="form-control" name="date_depart"
                                value="{{ old('date_depart', $reservation->date_depart) }}">
                            @error('date_depart')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nbr_jour">Nombre de jours</label>
                            <input type="number" class="form-control" name="nbr_jour"
                                value="{{ old('nbr_jour', $reservation->nbr_jour) }}">
                            @error('nbr_jour')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-danger" href="#">Annuler</a>
                        <button type="submit" class="btn btn-info float-right">Modifier</button>
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
                </form>
            </div>
        </div>
    </div>
@endsection
