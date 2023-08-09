@extends('layouts.manager/app')

@section('titre')
    Chambre
@endsection

@section('content')
    <div class="container">
        <div class="facture">
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{ asset('images/logo.png') }}" alt="">
                            <span class="float-right"> Facture</span>
                        </div>

                        <div class="card-body ">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h6 class="mb-3">De:</h6>
                                    <div>
                                        <strong>Keto Hotel</strong>
                                    </div>
                                    <div>Madalinskiego 8</div>
                                    <div>46PP+Q2 Lomé, Togo</div>
                                    <div>Email: contact@keto.com</div>
                                    <div>Phone: +228 70056985</div>
                                </div>

                                <div class="col-sm-6">
                                    <h6 class="mb-3">A:</h6>
                                    <div>
                                        <strong>Bob Mart</strong>
                                    </div>
                                    <div>Attn: Daniel Marek</div>
                                    <div>43-190 Mikolow, Poland</div>
                                    <div>Email: marek@daniel.com</div>
                                    <div>Phone: +48 123 456 789</div>
                                </div>
                            </div>

                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Éléments</th>
                                            <th>Description</th>
                                            <th class="right">Coût</th>
                                            <th class="right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="center">1</td>
                                            <td class="left strong">Origin License</td>
                                            <td class="left">Extended License</td>
                                            <td class="right">$999,00</td>
                                            <td class="right">$999,00</td>
                                        </tr>
                                        <tr>
                                            <td class="center">2</td>
                                            <td class="left">Custom Services</td>
                                            <td class="left">Instalation and Customization (cost per hour)</td>
                                            <td class="right">$150,00</td>
                                            <td class="right">$3.000,00</td>
                                        </tr>
                                        <tr>
                                            <td class="center">3</td>
                                            <td class="left">Hosting</td>
                                            <td class="left">1 year subcription</td>
                                            <td class="right">$499,00</td>
                                            <td class="right">$499,00</td>
                                        </tr>
                                        <tr>
                                            <td class="center">4</td>
                                            <td class="left">Platinum Support</td>
                                            <td class="left">1 year subcription 24/7</td>
                                            <td class="right">$3.999,00</td>
                                            <td class="right">$3.999,00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5">

                                </div>

                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong>Sous-total</strong>
                                                </td>
                                                <td class="right">$8.497,00</td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Remise (20 %)</strong>
                                                </td>
                                                <td class="right">1 699,40 $</td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>TVA (10%)</strong>
                                                </td>
                                                <td class="right">679,76 $</td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Totale</strong>
                                                </td>
                                                <td class="right">
                                                    <strong>7 477,36 $</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
