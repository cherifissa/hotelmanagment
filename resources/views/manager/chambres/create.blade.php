@extends('layouts.manager/app')

@section('titre')
    Chambre
@endsection

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Créer une chambre</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('chambres.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="num">Numéro chambre</label>
                                <input type="number" maxlength="5" class="form-control" name="id"
                                    value="{{ old('id') }}">
                                @error('id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" name="type">
                                    <option value="">Selectionner un type</option>
                                    <option value="standard" {{ old('type') === 'standard' ? 'selected' : '' }}>standard
                                    </option>
                                    <option value="privilege" {{ old('type') === 'privilege' ? 'selected' : '' }}>privilege
                                    </option>
                                    <option value="suite junior" {{ old('type') === 'suite junior' ? 'selected' : '' }}>
                                        suite junior</option>
                                    <option value="suite famille" {{ old('type') === 'suite famille' ? 'selected' : '' }}>
                                        suite famille
                                    </option>
                                    <option value="suite VIP" {{ old('type') === 'suite VIP' ? 'selected' : '' }}>suite VIP
                                    </option>
                                    <option value="suite presidentielle"
                                        {{ old('type') === 'suite presidentielle' ? 'selected' : '' }}>suite presidentielle
                                    </option>
                                </select>
                                @error('type')
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
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option value="occupé" {{ old('status') === 'occupé' ? 'selected' : '' }}>occupé
                                    </option>
                                    <option value="libre" {{ old('status') === 'libre' ? 'selected' : '' }}>libre</option>
                                    <option value="hors service" {{ old('status') === 'hors service' ? 'selected' : '' }}>
                                        hors service</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description"
                                    value="{{ old('description') }}">
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->

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
