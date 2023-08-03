@extends('layouts.manager/app')

@section('titre')
    message
@endsection

@section('content')
    <div class="container my-5 text-center">
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
        <div class="card">
            <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Liste des messages</h3>

            </div><!-- /.card-header -->
        </div>
        <table class="table table-bordered border-secondary">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom emmeteur</th>
                    <th scope="col">Email emmeteur</th>
                    <th scope="col">Phone emmeteur</th>
                    <th scope="col">Message</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($messages as $message)
                    <tr class="table-active">
                        <th scope="row">{{ $message->id }}</th>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone }}</td>
                        <td>{{ $message->message }}</td>
                        <td>
                            <div class="d-flex justify-content-evenly">
                                <form action="{{ route('message.destroy', $message) }}" id="delete-form" method="POST">
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

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
