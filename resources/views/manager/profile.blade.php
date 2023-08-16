@extends('layouts.manager.app')

@section('title')
    Profile
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
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
                        title: 'Mise à jour fait avec succès'
                    })
                </script>
            @endif
            @if (session('successpassword'))
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
                        title: 'Changement du mot de passe fait avec succès'
                    })
                </script>
            @endif
            <div class="row">
                <div class="col-md-6">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                                    alt="User profile picture">
                            </div>

                            <form class="form-horizontal" method="POST" action="{{ route('profile.update', $user->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Nom</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" name="nom"
                                            value="{{ $user->nom }}" placeholder="Nom">
                                        @error('nom')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" name="email"
                                            value="{{ $user->email }}" placeholder="Email">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputAddress" class="col-sm-2 col-form-label">Adresse</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputAddress" name="adresse"
                                            value="{{ $user->adresse }}" placeholder="Adresse">
                                        @error('adresse')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputTel" class="col-sm-2 col-form-label">Téléphone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputTel" name="tel"
                                            value="{{ $user->tel }}" placeholder="Téléphone">
                                        @error('tel')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-danger"><b>Mettre à jour</b></button>
                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <form class="form-horizontal" method="POST" action="{{ route('changePassword', $user) }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Ancien mot de
                                        passe</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" value="{{ old('oldpassword') }}"
                                            name="oldpassword" placeholder="Ancien mot de passe">
                                        @error('oldpassword')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Nouveau mot de
                                        passe</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" value="{{ old('password') }}"
                                            name="password" placeholder="Nouveau mot de passe">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPasswordConfirmation" class="col-sm-2 col-form-label">Confirmation du
                                        mot de passe</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control"
                                            value="{{ old('password_confirmation') }}" name="password_confirmation"
                                            placeholder="Confirmation du mot de passe">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Changer de mot de
                                            passe</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
@endsection
