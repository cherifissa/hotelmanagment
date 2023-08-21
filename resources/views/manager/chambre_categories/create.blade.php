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
                        <h3 class="card-title">Créer une catégorie
                            de chambre</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('chambre_categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nom">Nom Catégorie </label>
                                <select class="form-control" name="nom">
                                    <option value="">Selectionner un type</option>
                                    <option value="standard" {{ old('nom') === 'standard' ? 'selected' : '' }}>standard
                                    </option>
                                    <option value="privilege" {{ old('nom') === 'privilege' ? 'selected' : '' }}>privilege
                                    </option>
                                    <option value="suite junior" {{ old('nom') === 'suite junior' ? 'selected' : '' }}>
                                        suite junior</option>
                                    <option value="suite famille" {{ old('nom') === 'suite famille' ? 'selected' : '' }}>
                                        suite famille
                                    </option>
                                    <option value="suite VIP" {{ old('nom') === 'suite VIP' ? 'selected' : '' }}>suite VIP
                                    </option>
                                    <option value="suite presidentielle"
                                        {{ old('nom') === 'suite presidentielle' ? 'selected' : '' }}>suite presidentielle
                                    </option>
                                </select>
                                @error('nom')
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
                                <label for="nbr_chb">Nombre de chambre</label>
                                <input type="number" maxlength="1" max="5" min="1" class="form-control"
                                    name="nbr_chb" value="{{ old('nbr_chb') }}">
                                @error('nbr_chb')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nbr_lit">Nombre de lit</label>
                                <input type="number" maxlength="1" max="5" min="1" class="form-control"
                                    name="nbr_lit" value="{{ old('nbr_lit') }}">
                                @error('nbr_lit')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="images">Images (Selectioner plusieurs images à la fois)</label>
                                <input type="file" class="form-control" name="images[]" value="{{ old('images') }}"
                                    multiple>
                                @error('images')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <div class="row" id="image-preview"></div>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description"
                                    value="{{ old('description') }}">
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4 mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="wifi" type="checkbox">
                                    <label class="form-check-label">wifi</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="petit_dej" type="checkbox">
                                    <label class="form-check-label">petit_dej</label>
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
                            <button type="submit" class="btn btn-info float-right">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        function previewImages() {
            var preview = document.querySelector('#image-preview');
            var files = document.querySelector('input[type=file]').files;

            preview.innerHTML = '';

            function readAndPreview(file) {
                if (/\.(jpe?g|png|gif)$/i.test(file.name)) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        var image = new Image();
                        image.src = event.target.result;
                        image.style.maxWidth = '150px';
                        preview.appendChild(image);
                    }

                    reader.readAsDataURL(file);
                }
            }

            if (files) {
                [].forEach.call(files, readAndPreview);
            }
        }

        document.querySelector('input[type=file]').addEventListener('change', previewImages);
    </script>
@endsection
