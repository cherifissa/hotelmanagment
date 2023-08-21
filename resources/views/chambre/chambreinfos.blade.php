@extends('layouts.reservations.app')
@section('contente')
    <style>
        div#carousel {
            perspective: 1200px;
            background: #100000;
            padding-top: 2%;
            font-size: 0;
            margin-bottom: 3rem;
            overflow: hidden;
        }

        figure#spinner {
            transform-style: preserve-3d;
            height: 300px;
            transform-origin: 50% 50% -500px;
            transition: 1s;
        }

        figure#spinner img {
            width: 70%;
            height: 350px;
            max-width: 425px;
            position: absolute;
            left: 30%;
            transform-origin: 50% 50% -500px;
            outline: 1px solid transparent;
        }

        figure#spinner img:nth-child(1) {
            transform: rotateY(0deg);
        }

        figure#spinner img:nth-child(2) {
            transform: rotateY(-45deg);
        }

        figure#spinner img:nth-child(3) {
            transform: rotateY(-90deg);
        }

        figure#spinner img:nth-child(4) {
            transform: rotateY(-135deg);
        }

        figure#spinner img:nth-child(5) {
            transform: rotateY(-180deg);
        }

        figure#spinner img:nth-child(6) {
            transform: rotateY(-225deg);
        }

        figure#spinner img:nth-child(7) {
            transform: rotateY(-270deg);
        }

        figure#spinner img:nth-child(8) {
            transform: rotateY(-315deg);
        }

        div#carousel~span {
            color: #fff;
            margin: 5%;
            display: inline-block;
            text-decoration: none;
            font-size: 2rem;
            transition: 0.6s color;
            position: relative;
            margin-top: -6rem;
            border-bottom: none;
            line-height: 0;
        }

        div#carousel~span:hover {
            color: #888;
            cursor: pointer;
        }
    </style>
    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Détails supplémentaires</h2>
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
                    <base href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/wanaka-tree.jpg">
                    <div id="carousel">
                        <figure id="spinner">
                            <img src="{{ asset('images/banner1.jpg') }}" alt>
                            <img src="{{ asset('images/banner2.jpg') }}" alt>
                            <img src="{{ asset('images/banner3.jpg') }}" alt>
                            <img src="{{ asset('images/banner1.jpg') }}" alt>
                            <img src="{{ asset('images/banner2.jpg') }}" alt>
                            <img src="{{ asset('images/banner3.jpg') }}" alt>
                            <img src="{{ asset('images/banner1.jpg') }}" alt>
                            <img src="{{ asset('images/banner2.jpg') }}" alt>
                        </figure>
                    </div>
                    <span style="float:left" class="ss-icon" onclick="galleryspin('-')">&lt;</span>
                    <span style="float:right" class="ss-icon" onclick="galleryspin('')">&gt;</span>

                </div>

            </div>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
                integrity="sha384-xxxxxx" crossorigin="anonymous">

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Équipements de la chambre</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><i class="fas fa-bath"></i> Salle de bain</li>
                            <li class="list-group-item"><i class="fas fa-bath"></i> Peignoirs</li>
                            <li class="list-group-item"><i class="fas fa-bath"></i> Articles de toilette gratuits</li>
                            <li class="list-group-item"><i class="fas fa-shower"></i> Pomme de douche hydromassante</li>
                            <li class="list-group-item"><i class="fas fa-shower"></i> Pomme de douche à effet pluie</li>
                            <li class="list-group-item"><i class="fas fa-shower"></i> Shampoing</li>
                            <li class="list-group-item"><i class="fas fa-shower"></i> Douche</li>
                            <li class="list-group-item"><i class="fas fa-soap"></i> Savon</li>
                            <li class="list-group-item"><i class="fas fa-toilet-paper"></i> Papier toilette</li>
                            <li class="list-group-item"><i class="fas fa-towel"></i> Serviettes</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4>Chambre</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><i class="fas fa-wind"></i> Climatisation</li>
                            <li class="list-group-item"><i class="fas fa-bed"></i> Draps</li>
                            <li class="list-group-item"><i class="fas fa-bed"></i> Literie de qualité supérieure</li>
                            <li class="list-group-item"><i class="fas fa-door-closed"></i> Chambre séparée</li>
                            <li class="list-group-item"><i class="fas fa-calendar-alt"></i> Unité d'hébergement rénovée en
                                juin 2016</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Divertissement</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><i class="fas fa-tv"></i> Télévision LED 42 pouces</li>
                            <li class="list-group-item"><i class="fas fa-tv"></i> Télévision avec chaînes du câble</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4>Nourriture et boissons</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><i class="fas fa-concierge-bell"></i> Service en chambre 24 h/24
                            </li>
                            <li class="list-group-item"><i class="fas fa-coffee"></i> Cafetière ou bouilloire à thé</li>
                            <li class="list-group-item"><i class="fas fa-wine-glass-alt"></i> Eau minérale gratuite</li>
                            <li class="list-group-item"><i class="fas fa-wine-bottle"></i> Minibar</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Internet</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><i class="fas fa-wifi"></i> Accès Wi-Fi à Internet gratuit</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4>Autres</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><i class="fas fa-housekeeping"></i> Service de ménage quotidien</li>
                            <li class="list-group-item"><i class="fas fa-laptop"></i> Bureau</li>
                            <li class="list-group-item"><i class="fas fa-iron"></i> Fer et planche à repasser</li>
                            <li class="list-group-item"><i class="fas fa-laptop"></i> Coffre-fort pouvant accueillir un
                                ordinateur portable</li>
                            <li class="list-group-item"><i class="fas fa-phone"></i> Téléphone</li>
                            <li class="list-group-item"><i class="fas fa-city"></i> Vue : sur la ville</li>
                        </ul>
                    </div>
                </div>
            </div>

            <script>
                var angle = 0;

                function galleryspin(sign) {
                    spinner = document.querySelector("#spinner");
                    if (!sign) {
                        angle = angle + 45;
                    } else {
                        angle = angle - 45;
                    }
                    spinner.setAttribute("style", "-webkit-transform: rotateY(" + angle + "deg); -moz-transform: rotateY(" + angle +
                        "deg); transform: rotateY(" + angle + "deg);");
                }
            </script>
        </div>
    </div>
    <!-- end our_room -->
@endsection
