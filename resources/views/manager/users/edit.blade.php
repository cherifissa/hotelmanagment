@extends('layouts.manager.app')

@section('titre')
    Utilisateurs
@endsection

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editer l'utilisateurs</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @php
                        $url = Route::current()->uri;
                        $segments = explode('/', $url);
                        $firstSegment = $segments[0];
                        
                        if ($firstSegment == 'admin') {
                            $prefix = 'admin';
                        } else {
                            $prefix = 'recept';
                        }
                    @endphp
                    <form action="{{ '/' . $prefix . '/users' . '/' . $user->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group">
                                <label for="nom">Nom & Prénom </label>
                                <input type="text" class="form-control" name="nom"
                                    value="{{ old('email', $user->nom) }}">
                                @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tel">Téléphone</label>
                                <input type="text" class="form-control" name="tel"
                                    value="{{ old('email', $user->tel) }}">
                                @error('tel')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type_piece">Type Pièce</label>
                                <select class="form-control" name="type_piece">
                                    <option value="">Selectionner le type de pièce </option>
                                    <option value="cni"
                                        {{ old('type_piece', $user->type_piece) === 'cni' ? 'selected' : '' }}>CNI
                                    </option>
                                    <option value="passeport"
                                        {{ old('type_piece', $user->type_piece) === 'passeport' ? 'selected' : '' }}>
                                        Passeport
                                    </option>
                                    <option value="carte consulaire"
                                        {{ old('type_piece', $user->type_piece) === 'carte consulaire' ? 'selected' : '' }}>
                                        Carte
                                        Consulaire
                                    </option>
                                </select>
                                @error('type_piece')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="numero_piece">Numero de pièce</label>
                                <input type="text" class="form-control" name="numero_piece"
                                    value="{{ old('numero_piece', $user->numero_piece) }}">
                                @error('numero_piece')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" class="form-control" name="adresse"
                                    value="{{ old('numero_piece', $user->adresse) }}">
                                @error('adresse')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @if ($user->isadmin != 'client')
                                <div class="form-group">
                                    <label for="isadmin">Type</label>
                                    <select class="form-control" name="isadmin">
                                        <option value="admin"
                                            {{ old('isadmin', $user->isadmin) === 'admin' ? 'selected' : '' }}>
                                            Admin
                                        </option>
                                        <option value="recept"
                                            {{ old('isadmin', $user->isadmin) === 'recept' ? 'selected' : '' }}>
                                            Réceptionniste
                                        </option>
                                        <option value="server"
                                            {{ old('isadmin', $user->isadmin) === 'server' ? 'selected' : '' }}>
                                            Serveur
                                        </option>
                                    </select>

                                    @error('isadmin')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                        </div>

                        <div class="card-footer">
                            <a class="btn btn-danger " href="#">Annuler</a>
                            <button type="submit" class="btn btn-info float-right">Modifier</button>
                        </div>

                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
