@extends('layouts.reservations.app')
@section('contente')
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
                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="images/room1.jpg" alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Standard Room</h3>
                            <p>A cozy and comfortable room with all essential amenities for a pleasant stay.</p>
                            <p>Price: 46000 per night</p> <!-- Replace $X.XX with the actual price -->
                            <!-- Button trigger modal -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="images/room2.jpg" alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Privilege Room</h3>
                            <p>Indulge in luxury and exclusivity with our privilege room. Ideal for a lavish experience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
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
                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="images/room4.jpg" alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Suite VIP</h3>
                            <p>The epitome of luxury and sophistication. Our suite VIP offers an unforgettable stay.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="images/room5.jpg" alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Family Suite</h3>
                            <p>Designed for families, our family suite provides ample space and comfort for everyone.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="images/room6.jpg" alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Presidential Suite</h3>
                            <p>Experience the pinnacle of luxury and grandeur in our presidential suite.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end our_room -->
@endsection
