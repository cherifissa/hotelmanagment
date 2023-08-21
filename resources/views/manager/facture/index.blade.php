@extends('layouts.manager/app')

@section('titre')
    Facture
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                </div>
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
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <span><img alt="it"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIcAAAA2CAYAAADtcYraAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQyIDc5LjE2MDkyNCwgMjAxNy8wNy8xMy0wMTowNjozOSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTggKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjlGNkZBMjUxMTAyRjExRUE5NERDQzVBNjcwQkE5OTVDIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjlGNkZBMjUyMTAyRjExRUE5NERDQzVBNjcwQkE5OTVDIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6OUY2RkEyNEYxMDJGMTFFQTk0RENDNUE2NzBCQTk5NUMiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6OUY2RkEyNTAxMDJGMTFFQTk0RENDNUE2NzBCQTk5NUMiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6YaXwYAAALiElEQVR42uxd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"
                                        width="150"></span>
                                <small class="float-right">Date: 2/10/2014</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            De
                            <address>
                                <strong> Hotel Keto Eco .</strong><br>
                                46PP+Q2 Avenu Nilson Mandella<br>
                                Lomé, Togo <br>
                                Phone: (+228) 70056985 <br>
                                Email: contact@keto.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            A
                            <address class="norm">
                                <strong> {{ $client->nom }}</strong><br>
                                {!! nl2br(e($client->adresse)) !!}<br>
                                Phone: {{ $client->tel }}
                                Email: {{ $client->email }} <br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #{{ substr($reservation->numero, 3) }}</b><br>
                            <br>
                            <b>Resérvation N°: {{ $reservation->numero }}</b><br>
                            <b>Date d'émmission: {{ $date }}</b><br>
                            <b>Account:</b> 968-34567
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Description</th>
                                        <th>Qté/Jrs</th>
                                        <th>Taux par quantité</th>
                                        <th>Prix total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>N°
                                            <strong>{{ $reservation->numero . ', chambre : ' . $reservation->chambre->type }}</strong>
                                        </td>
                                        <td>{{ $reservation->nbr_jour }} jour(s)</td>
                                        <td>{{ $reservation->prix / $reservation->nbr_jour }} FCFA</td>
                                        <td>{{ $reservation->prix }} FCFA</td>
                                    </tr>
                                    @foreach ($services as $serviceGroup)
                                        <tr>
                                            <span>
                                                <td>{{ $loop->iteration + 1 }}.</td>
                                                <td><strong>{{ $serviceGroup['name'] }}</strong></td>
                                                <td><span>{{ $serviceGroup['quantity'] }}</span></td>
                                                <td><span>{{ $serviceGroup['totalPrice'] / $serviceGroup['quantity'] }}
                                                        FCFA</span>
                                                </td>
                                                <td><span>{{ $serviceGroup['totalPrice'] }} FCFA</span></td>
                                            </span>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <p class="lead">Payment Methods:</p>
                            <img src="{{ asset('dist/img/credit/visa.png') }}" alt="Visa">
                            <img src="{{ asset('dist/img/credit/mastercard.png') }}" alt="Mastercard">
                            <img src="{{ asset('dist/img/credit/american-express.png') }}" alt="American Express">
                            <img src="{{ asset('dist/img/credit/paypal2.png') }}" alt="Paypal">

                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango
                                imeem
                                plugg
                                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <p class="lead">Amount Due 2/22/2014</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th style="width:50%">Prix Service</th>
                                            <td>{{ $totalPrixFromServices }} FCFA
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Prix Réservation</th>
                                            <td>{{ $reservation->prix }} FCFA</td>
                                        </tr>
                                        <tr>
                                            <th>Payé</th>
                                            <td>{{ $totalPrixservice }} FCFA</td>
                                        </tr>
                                        <tr>
                                            <th>Total à payer</th>
                                            <td>{{ $totalprix - $totalPrixservice }} FCFA</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="{{ '/' . $prefix . '/' . 'print_facture' }}" rel="noopener" class="btn btn-default"><i
                                    class="fas fa-print"></i> Print</a>
                            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i>
                                Submit
                                Payment
                            </button>
                            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Generate PDF
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div>
    </div>
@endsection
