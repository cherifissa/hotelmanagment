@extends('layouts.restaurant.app')

@section('titre')
    Réservation
@endsection

@section('content')
    <div class="container ">
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
                            <label for="type_payement">Type de payement</label>
                            <select class="form-control" name="type_payement">
                                <option selected>Sélectioner le mode de payement</option>

                                <option value="cash" {{ old('type_payement') === 'cash' ? 'selected' : '' }}>
                                    Cash
                                </option>
                                <option value="reservation" {{ old('type_payement') === 'reservation' ? 'selected' : '' }}>
                                    Reservation
                                </option>
                                <option value="gratuite" {{ old('type_payement') === 'gratuite' ? 'selected' : '' }}>
                                    Gratuité
                                </option>
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
                        <div class="form-group">
                            <label for="reservation_id">ID du réservation</label>
                            <select class="form-control" name="reservation_id">
                                <option selected>Sélectioner une réservation</option>
                                @foreach ($reservations as $reservation)
                                    <option value="{{ $reservation->id }}">
                                        {{ $reservation->numero }}-{{ ' ' . $reservation->chambre_id }}
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
            </div>
        </div>

    </div>
@endsection
