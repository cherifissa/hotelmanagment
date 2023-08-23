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
                                <label for="categorie_id">ID Catégorie</label>
                                <select class="form-control" name="categorie_id">
                                    <option selected>Sélectioner un catégorie</option>
                                    @foreach ($categories as $categories)
                                        <option value="{{ $categories->id }}">
                                            {{ $categories->id }}-{{ $categories->nom }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('categorie_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option selected>Sélectioner un status</option>
                                    <option value="libre" {{ old('status') === 'libre' ? 'selected' : '' }}>libre</option>
                                    <option value="occupé" {{ old('status') === 'occupé' ? 'selected' : '' }}>occupé
                                    </option>
                                    <option value="hors service" {{ old('status') === 'hors service' ? 'selected' : '' }}>
                                        hors service</option>
                                </select>
                                @error('status')
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
