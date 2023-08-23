@extends('layouts.manager/app')

@section('titre')
    Catégorie chambre
@endsection

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editer catégorie
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('chambre_categories.update', $ChambreCategorie) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nom">Nom Catégorie </label>
                                <select class="form-control" name="nom">
                                    <option value="">Selectionner un type</option>
                                    <option value="standard"
                                        {{ old('nom', $ChambreCategorie->nom) === 'standard' ? 'selected' : '' }}>standard
                                    </option>
                                    <option value="privilege"
                                        {{ old('nom', $ChambreCategorie->nom) === 'privilege' ? 'selected' : '' }}>privilege
                                    </option>
                                    <option value="suite junior"
                                        {{ old('nom', $ChambreCategorie->nom) === 'suite junior' ? 'selected' : '' }}>
                                        suite junior</option>
                                    <option value="suite famille"
                                        {{ old('nom', $ChambreCategorie->nom) === 'suite famille' ? 'selected' : '' }}>
                                        suite famille
                                    </option>
                                    <option value="suite VIP"
                                        {{ old('nom', $ChambreCategorie->nom) === 'suite VIP' ? 'selected' : '' }}>suite VIP
                                    </option>
                                    <option value="suite presidentielle"
                                        {{ old('nom', $ChambreCategorie->nom) === 'suite presidentielle' ? 'selected' : '' }}>
                                        suite presidentielle
                                    </option>
                                </select>
                                @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="prix">Prix</label>
                                <input type="number" class="form-control" name="prix"
                                    value="{{ old('prix', $ChambreCategorie->prix) }}">
                                @error('prix')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nbr_chb">Nombre de chambre</label>
                                <input type="number" maxlength="1" max="5" min="1" class="form-control"
                                    name="nbr_chb" value="{{ old('nbr_chb', $ChambreCategorie->nbr_chb) }}">
                                @error('nbr_chb')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nbr_lit">Nombre de lit</label>
                                <input type="number" maxlength="1" max="5" min="1" class="form-control"
                                    name="nbr_lit" value="{{ old('nbr_lit', $ChambreCategorie->nbr_lit) }}">
                                @error('nbr_lit')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description"
                                    value="{{ old('description', $ChambreCategorie->description) }}">
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4 mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="wifi"
                                        value="{{ old('wifi', $ChambreCategorie->wifi) }}" type="checkbox">
                                    <label class="form-check-label">Wifi</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="petit_dej"
                                        value="{{ old('wifi', $ChambreCategorie->petit_dej) }}" type="checkbox">
                                    <label class="form-check-label">Petit déjeuner</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label" for="inlineCheckbox3">Benoir </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label" for="inlineCheckbox3">Jacuzzi </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label" for="inlineCheckbox3">Vue sur la mer </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label" for="inlineCheckbox3">Vue sur la ville </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label" for="inlineCheckbox3">Balcon </label>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a class="btn btn-danger " href="#">Annuler</a>
                            <button type="submit" class="btn btn-info float-right">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
