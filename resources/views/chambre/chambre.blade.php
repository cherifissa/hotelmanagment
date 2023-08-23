@extends('layouts.reservations.app')
@section('contente')
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
                title: 'Commentaire envoyé avec succès'
            })
        </script>
    @endif
    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Nos chambres</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our_room -->
    <div class="our_room">
        <div class="container">

            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <a href="chambre/standard">
                        <div id="serv_hover" class="room">
                            <div class="room_img">
                                <figure><img src="images/litavetablepc.jpg" alt="#" /></figure>
                            </div>
                            <div class="bed_room">
                                <h3>Chambre Standard </h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-sm-6">
                    <a href="chambre/Chambre Privilege">
                        <div id="serv_hover" class="room">
                            <div class="room_img">
                                <figure><img src="images/room2.jpg" alt="#" /></figure>
                            </div>
                            <div class="bed_room">
                                <h3>Chambre Privilege </h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-sm-6">
                    <a href="chambre/Suite Junior">
                        <div id="serv_hover" class="room">
                            <div class="room_img">
                                <figure><img src="images/room3.jpg" alt="#" /></figure>
                            </div>
                            <div class="bed_room">
                                <h3>Suite Junior</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-sm-6">
                    <a href="chambre/Suite Famille">
                        <div id="serv_hover" class="room">
                            <div class="room_img">
                                <figure><img src="images/room4.jpg" alt="#" /></figure>
                            </div>
                            <div class="bed_room">
                                <h3>Suite Famille </h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-sm-6">
                    <a href="chambre/Suite VIP">
                        <div id="serv_hover" class="room">
                            <div class="room_img">
                                <figure><img src="images/room5.jpg" alt="#" /></figure>
                            </div>
                            <div class="bed_room">
                                <h3>Suite VIP</h3>
                            </div>
                        </div>$
                    </a>
                </div>
                <div class="col-md-6 col-sm-6">
                    <a href="chambre/Suite Presidentielle">
                        <div id="serv_hover" class="room">
                            <div class="room_img">
                                <figure><img src="images/room6.jpg" alt="#" /></figure>
                            </div>
                            <div class="bed_room">
                                <h3>Suite Presidentielle</h3>
                                <p>Experience the pinnacle of luxury and grandeur in our presidential suite.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @if (session()->has('client'))
                <form action="{{ route('commentairesend') }}" method="POST">
                    @csrf
                    <input type="hidden" name="client_id" value="{{ session('client') }}">
                    <div class="form-group">
                        <label for="contenu">Laisser un commentaire</label>
                        <textarea name="contenu" rows="3" class="form-control"></textarea>
                        @error('contenu')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </form>
            @endif

        </div>
    </div>
    <!-- end our_room -->
@endsection
