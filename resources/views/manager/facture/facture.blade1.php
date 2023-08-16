<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <!-- Bootstrap CSS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #invoice {
            padding: 30px;
            border-radius: 10px;
            width: 210mm;
            height: 297mm;
            page-break-after: always;
        }

        .body-main {
            border-bottom: 15px solid #1E1F23;
            border-top: 15px solid #1E1F23;
            margin-top: 30px;
            margin-bottom: 30px;
            position: relative;
            font-size: 16px;
        }

        .main thead {
            background: #1E1F23;
            color: #fff;
        }

        .img {
            height: 100px;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="page-header">
            <h1>Facture </h1>
        </div>

        <div class="row">
            <div class="col-md-7 col-md-offset-3 body-main" id="invoice">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img" alt="logo" src="{{ asset('images/logo.png') }}" width="100px"
                                height="90px" />
                            <p> contact@keto.com </p>
                            <p> 46PP+Q2 Lomé, Togo </p>
                            <p> Phone: +228 70056985 </p>
                        </div>
                        <div class="col-md-8 text-right">

                            <h4> A: {{ $client->nom }}</h4>
                            <p> {{ $client->email }} <br>
                            <p>{!! nl2br(e($client->adresse)) !!}</p>
                            <p> Phone: {{ $client->tel }}</p>

                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3> Facture N° {{ substr($reservation->numero, 3) }}</h3>
                        </div>
                    </div>
                    <br />
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><span>N°</span></th>
                                    <th><span>Description</span></th>
                                    <th><span>Qté/Jrs</span></th>
                                    <th><span>Taux par quantité</span></th>
                                    <th><span>Prix total</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>N°
                                        <strong>{{ $reservation->numero . ', chambre : ' . $reservation->chambre->type }}</strong>
                                    </td>
                                    <td>{{ $reservation->nbr_jour }} jour(s)</td>
                                    <td>{{ $reservation->prix }} FCFA</td>
                                    <td>{{ $reservation->prix * $reservation->nbr_jour }}</td>
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
                        <div class="row mb-4">
                            <div class="col-md-5 align-items-end align-items-lg-end">
                                <table class="table">
                                    <tr>
                                        <th><span>Prix Service</span></th>
                                        <td class="text-right"><span><b>{{ $totalPrixFromServices }}
                                                    FCFA</b></span></td>
                                    </tr>
                                    <tr>
                                        <th><span>Prix Réservation</span></th>
                                        <td class="text-right"><span><b>{{ $reservation->prix }} FCFA</b></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><span>Payé</span></th>
                                        <td class="text-right"><span><b>{{ $totalPrixservice }} FCFA</b></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><span>Total à payer</span></th>
                                        <td class="text-right"><span><b>{{ $totalprix - $totalPrixservice }}
                                                    FCFA</b></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12 d-flex justify-content-between">
                            <p><b>Date :</b> {{ $date }}</p>
                            <p><b>Signature</b></p>
                        </div>
                    </div>
                    <div class="row mb-5"></div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col col-lg-2">
                    <a class="btn btn-danger" href="{{ route('reservations.index') }}">Retourner </a>
                </div>

                <div class="col-md-4">
                </div>
                <div class="col col-lg-5">
                    <a href="javascript:void(0)" class="btn-download btn btn-warning">Imprimer la facture</a>
                </div>
            </div>
        </div>

        <script>
            const options = {
                margin: 0.5,
                filename: 'invoice.pdf',
                image: {
                    type: 'png',
                    quality: 400
                },
                html2canvas: {
                    scale: 1
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            }

            $('.btn-download').click(function(e) {
                e.preventDefault();
                const element = document.getElementById('invoice');
                html2pdf().from(element).set(options).save();
            });


            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
        </script>

    </div>
    <script src="{{ asset('js/jspdf.debug.js') }}"></script>
    <script src="{{ asset('js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('js/html2pdf.min.js') }}"></script>
</body>

</html>
