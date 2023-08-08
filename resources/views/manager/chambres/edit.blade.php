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
                                <label for="type">Type</label>
                                <select class="form-control" name="type">
                                    <option value="standard"
                                        {{ old('type', $chambre->type) === 'standard' ? 'selected' : '' }}>standard
                                    </option>
                                    <option value="privilege"
                                        {{ old('type', $chambre->type) === 'privilege' ? 'selected' : '' }}>privilege
                                    </option>
                                    <option value="suite junior"
                                        {{ old('type', $chambre->type) === 'suite junior' ? 'selected' : '' }}>
                                        suite junior</option>
                                    <option value="suite famille"
                                        {{ old('type', $chambre->type) === 'suite famille' ? 'selected' : '' }}>suite
                                        famille
                                    </option>
                                    <option value="suite VIP"
                                        {{ old('type', $chambre->type) === 'suite VIP' ? 'selected' : '' }}>suite VIP
                                    </option>
                                    <option value="suite presidentielle"
                                        {{ old('type', $chambre->type) === 'suite presidentielle' ? 'selected' : '' }}>suite
                                        presidentielle
                                    </option>
                                </select>
                                @error('type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="prix">Prix</label>
                                <input type="number" class="form-control" name="prix"
                                    value="{{ old('prix', $chambre->prix) }}">
                                @error('prix')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option value="occupé"
                                        {{ old('status', $chambre->status) === 'occupé' ? 'selected' : '' }}>occupé
                                    </option>
                                    <option value="libre"
                                        {{ old('status', $chambre->status) === 'libre' ? 'selected' : '' }}>libre</option>
                                    <option value="hors service"
                                        {{ old('status', $chambre->status) === 'hors service' ? 'selected' : '' }}>
                                        hors service</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description"
                                    value="{{ old('description', $chambre->description) }}">
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
