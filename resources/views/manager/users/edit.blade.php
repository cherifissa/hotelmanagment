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
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group">
                                <label for="nom">Nom & Prénom </label>
                                <input type="text" class="form-control" name="nom" value="{{ $user->nom }}">
                                @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tel">Téléphone</label>
                                <input type="text" class="form-control" name="tel" value="{{ $user->tel }}">
                                @error('tel')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" class="form-control" name="adresse" value="{{ $user->adresse }}">
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
