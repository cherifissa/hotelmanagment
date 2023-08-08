@extends('layouts.restaurant.app')

@section('titre')
    Réservation
@endsection

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Créer une serice</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('services.store') }}" method="POST">
                        @csrf

                        <div class="card-body">

                            <div class="form-group">
                                <label for="type_service">Type du service</label>
                                <select class="form-control" name="type_service" id="type_service">
                                    <option value="">Sélectionner le type du service</option>
                                    <option value="ptdej" {{ old('type_service') === 'ptdej' ? 'selected' : '' }}>Petit
                                        dejeuner</option>
                                    <option value="dej" {{ old('type_service') === 'dej' ? 'selected' : '' }}>Dejeuner
                                    </option>
                                    <option value="diner" {{ old('type_service') === 'diner' ? 'selected' : '' }}>Dinner
                                    </option>
                                </select>
                                @error('type_service')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type_payement">Type de payement</label>
                                <select class="form-control" name="type_payement" id="type_payement">
                                    <option value="">Sélectionner le mode de payement</option>
                                    <option value="cash" {{ old('type_payement') === 'cash' ? 'selected' : '' }}>Cash
                                    </option>
                                    <option value="reservation"
                                        {{ old('type_payement') === 'reservation' ? 'selected' : '' }}>Reservation</option>
                                    <option value="gratuite" {{ old('type_payement') === 'gratuite' ? 'selected' : '' }}>
                                        Gratuité</option>
                                </select>
                                @error('type_payement')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="prix">Prix</label>
                                <input type="number" class="form-control" name="prix" value="{{ old('prix') }}">
                                @error('prix')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group" id="reservationSection">
                                <label for="reservation_id">ID du réservation</label>
                                <select class="form-control" name="reservation_id">
                                    <option value="">Sélectionner une réservation</option>
                                    @foreach ($reservations as $reservation)
                                        <option value="{{ $reservation->numero }}"
                                            {{ old('reservation_id') == $reservation->numero ? 'selected' : '' }}>
                                            {{ $reservation->numero }}-{{ ' ' . $reservation->chambre_id . ' ' . $reservation->user->nom }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('reservation_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-danger " href="#">Annuler</a>
                            <button type="submit" class="btn btn-info float-right">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
