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
                        <h3 class="card-title">Créer un utilisateurs</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="card-body">

                            <div class="form-group">
                                <label for="nom">Nom & Prénom </label>
                                <input type="text" class="form-control" name="nom" value="{{ old('nom') }}">
                                @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tel">Téléphone</label>
                                <input type="text" class="form-control" name="tel" value="{{ old('tel') }}">
                                @error('tel')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type_piece">Type Pièce</label>
                                <select class="form-control" name="type_piece">
                                    <option value="">Selectionner le type de pièce </option>
                                    <option value="cni" {{ old('type_piece') === 'cni' ? 'selected' : '' }}>CNI
                                    </option>
                                    <option value="passeport" {{ old('type_piece') === 'passeport' ? 'selected' : '' }}>
                                        Passeport
                                    </option>
                                    <option value="carte consulaire"
                                        {{ old('type_piece') === 'carte consulaire' ? 'selected' : '' }}>Carte Consulaire
                                    </option>
                                </select>
                                @error('type_piece')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="numero_piece">Numero de pièce</label>
                                <input type="text" class="form-control" name="numero_piece"
                                    value="{{ old('numero_piece') }}">
                                @error('numero_piece')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" class="form-control" name="adresse" value="{{ old('adresse') }}">
                                @error('adresse')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="isadmin">Type Utilisateur</label>
                                <select class="form-control" name="isadmin">
                                    <option value="">Selectionner le type </option>
                                    <option value="admin" {{ old('isadmin') === 'admin' ? 'selected' : '' }}>Admin
                                    </option>
                                    <option value="recept" {{ old('isadmin') === 'recept' ? 'selected' : '' }}>Recept
                                    </option>
                                    <option value="server" {{ old('isadmin') === 'server' ? 'selected' : '' }}>Server
                                    </option>
                                    <option value="client" {{ old('isadmin') === 'client' ? 'selected' : '' }}>Client
                                    </option>
                                </select>
                                @error('isadmin')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    value="{{ old('password_confirmation') }}">
                            </div>

                        </div>

                        <div class="card-footer">
                            <a class="btn btn-danger " href="#">Annuler</a>
                            <button type="submit" class="btn btn-info float-right">Ajouter</button>
                        </div>

                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
