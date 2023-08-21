@extends('layouts.manager/app')

@section('titre')
    Categorie chambre
@endsection

@section('content')
    @if (session('success'))
        <script type="text/javascript">
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Ajout fait avec succès'
            })
        </script>
    @endif
    @if (session('successUpdate'))
        <script type="text/javascript">
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Mise à jour faite avec succès'
            })
        </script>
    @endif
    @if (session('successDelete'))
        <script type="text/javascript">
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Suppression faite avec succès'
            })
        </script>
    @endif

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
    <div class="card">
        <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">Liste des catégories de chambre</h3>
            @if ($prefix == 'admin')
                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item">
                        <a class="btn btn-block btn-success"
                            href="/admin/{{ request()->segment(count(request()->segments())) }}/create">Ajouter</a>
                    </li>
                </ul>
            @endif
        </div><!-- /.card-header -->
    </div>
    <table class="table table-bordered border-secondary">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Nombre de chambre</th>
                <th scope="col">Nombre de lit</th>
                <th scope="col">Images</th>
                <th scope="col">Description</th>

                @if ($prefix == 'admin')
                    <th scope="col">Actions</th>
                @endif
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($categories as $categorie)
                <tr class="table-active">
                    <th scope="row">{{ $categorie->id }}</th>
                    <td>{{ $categorie->nom }}</td>
                    <td>{{ $categorie->prix }}</td>
                    <td>{{ $categorie->nbr_chb }}</td>
                    <td>{{ $categorie->nbr_lit }}</td>
                    <td>{{ $categorie->images }}</td>
                    <td>{{ $categorie->description }}</td>
                    @if ($prefix == 'admin')
                        <td>
                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('chambre_categories.edit', $categorie) }}" class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path
                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                    </svg>
                                </a>
                                <form action="{{ route('chambre_categories.destroy', $categorie) }}" id="delete-form"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-link" onclick="confirmeSuppression(event)">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                            <path
                                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links('pagination::bootstrap-5') }}

    <script>
        window.confirmeSuppression = function(e, id) {
            e.preventDefault();

            var form = document.getElementById('delete-form');
            Swal.fire({
                title: 'Êtes-vous sûr(e) de vouloir supprimer ?',
                text: "Cette action est irréversible !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Annuler',
                confirmButtonText: 'Oui, supprimer !'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }
    </script>
@endsection
