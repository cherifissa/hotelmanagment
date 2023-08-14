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
                <div class="col-md-12">
                    <div class="titlepage">
                        <p class="margin_0">Lorem Ipsum available, but the majority have suffered </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="images/room1.jpg" alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Chambre Standard </h3>
                            <p>A cozy and comfortable room with all essential amenities for a pleasant stay.</p>
                            <h4>
                                <div class="row mb-3 mt-1">
                                    <div class="col align-items-start">
                                        <i class="fa fa-wifi"></i> <span class="ml-3">wifi gratuite</span>
                                    </div>
                                    <div class="col  align-items-start">
                                        <i class="fa fa-users"></i> <span class="ml-3">2 Personnes</span>
                                    </div>
                                </div>

                                <div class="row align-items-start">
                                    <div class="col">
                                        <i class="fa fa-bed"></i> <span class="ml-3">1 très grand lit</span>
                                    </div>
                                    <div class="col">
                                        <i class="fas fa-water"></i> <span class="ml-3">Vue sur la mer</span>
                                    </div>
                                </div>
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="images/room2.jpg" alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Chambre Privilege </h3>
                            <p>Indulge in luxury and exclusivity with our privilege room. Ideal for a lavish experience.</p>
                            <h4>
                                <div class="row mb-3 mt-1">
                                    <div class="col align-items-start">
                                        <i class="fa fa-wifi"></i> <span class="ml-3">wifi gratuite</span>
                                    </div>
                                    <div class="col align-items-start">
                                        <i class="fa fa-users"></i> <span class="ml-3">3 Personnes</span>
                                    </div>
                                </div>
                                <div class="row align-items-start">
                                    <div class="col">
                                        <i class="fa fa-bed"></i> <span class="ml-3">1 très grand lit</span>
                                    </div>
                                    <div class="col">
                                        <i class="fas fa-city"></i> <span class="ml-3">Vue sur la ville</span>
                                    </div>
                                </div>
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="images/room3.jpg" alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Suite Junior</h3>
                            <p>Experience spaciousness and elegance in our suite junior. Perfect for relaxation and comfort.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="images/room4.jpg" alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Suite Famille </h3>
                            <p>Designed for families, our family suite provides ample space and comfort for everyone.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="images/room5.jpg" alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Suite VIP</h3>
                            <p>The epitome of luxury and sophistication. Our suite VIP offers an unforgettable stay.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="images/room6.jpg" alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Suite Presidentielle</h3>
                            <p>Experience the pinnacle of luxury and grandeur in our presidential suite.</p>
                        </div>
                    </div>
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
