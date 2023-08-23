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
                        <h3 class="card-title">Editer une chambre</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('chambres.update', $chambre) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Assuming you want to use PUT method for updating -->

                        <div class="card-body">
                            <div class="form-group">
                                <label for="id">Numéro chambre</label>
                                <input type="number" maxlength="5" class="form-control" name="id"
                                    value="{{ old('id', $chambre->id) }}">
                                @error('id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="categorie_id">ID Catégorie</label>
                                <select class="form-control" name="categorie_id">
                                    <option value="{{ $chambre->categorie_id }}">
                                        {{ $chambre->categorie_id }}
                                    </option>
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
                                    <option value="libre"
                                        {{ old('status', $chambre->status) === 'libre' ? 'selected' : '' }}>libre</option>
                                    <option value="occupé"
                                        {{ old('status', $chambre->status) === 'occupé' ? 'selected' : '' }}>occupé
                                    </option>
                                    <option value="hors service"
                                        {{ old('status', $chambre->status) === 'hors service' ? 'selected' : '' }}>
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
                            <button type="submit" class="btn btn-info float-right">Modifier</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
