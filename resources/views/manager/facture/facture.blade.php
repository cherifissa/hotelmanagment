<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Facture</title>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/pdfstyle.css') }}" rel="stylesheet">
</head>

<body>

    <div class="row justify-content-around mb-3">
        <div class="col-5">
            <a class="btn btn-danger" href="{{ route('reservations.index') }}">Retourner</a>
        </div>
        <div class="col-4">
            <a href="javascript:void(0)" class="btn-download btn btn-warning">Imprimer la facture</a>
        </div>
    </div>

    <div id="invoice">
        <header>
            <h1>Facture</h1>
            <address>
                <p> contact@keto.com </p>
                <p> 46PP+Q2 Lomé, Togo </p>
                <p> Phone: +228 70056985 </p>
            </address>
            <span><img alt="it"
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIcAAAA2CAYAAADtcYraAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQyIDc5LjE2MDkyNCwgMjAxNy8wNy8xMy0wMTowNjozOSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTggKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjlGNkZBMjUxMTAyRjExRUE5NERDQzVBNjcwQkE5OTVDIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjlGNkZBMjUyMTAyRjExRUE5NERDQzVBNjcwQkE5OTVDIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6OUY2RkEyNEYxMDJGMTFFQTk0RENDNUE2NzBCQTk5NUMiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6OUY2RkEyNTAxMDJGMTFFQTk0RENDNUE2NzBCQTk5NUMiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6YaXwYAAALiElEQVR42uxd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"
                    width="150"></span>
        </header>
        <article>

            <address class="norm">
                <h4>{{ $client->nom }}</h4>
                <p> {{ $client->email }} <br></p>
                <p>{!! nl2br(e($client->adresse)) !!}</p>
                <p> Phone: {{ $client->tel }}</p>
            </address>

            <table class="meta">
                <tr>
                    <th><span>Facture N°</span></th>
                    <td><span>
                            {{ substr($reservation->numero, 3) }}
                        </span></td>
                </tr>
                <tr>
                    <th><span>Date d'émmission</span></th>
                    <td><span>{{ $date }}</span></td>
                </tr>
                <tr>
                    <th><span>Date d'arrivée</span></th>
                    <td><span>le
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $reservation->date_arrive)->format('d/m/Y') }}
                        </span></td>
                </tr>
            </table>
            <table class="inventory">
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
                        <td>{{ $reservation->prix / $reservation->nbr_jour }} FCFA</td>
                        <td>{{ $reservation->prix }} FCFA</td>
                    </tr>
                    @foreach ($services as $serviceGroup)
                        <tr>
                            <span>
                                <td>{{ $loop->iteration + 1 }}.</td>
                                <td><strong>{{ $serviceGroup['name'] }}</strong></td>
                                <td><span>{{ $serviceGroup['quantity'] }}</span></td>
                                <td><span>{{ $serviceGroup['totalPrice'] / $serviceGroup['quantity'] }} FCFA</span>
                                </td>
                                <td><span>{{ $serviceGroup['totalPrice'] }} FCFA</span></td>
                            </span>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <table class="sign">
                <tr>
                    <td></td>
                </tr>
            </table>

            <table class="balance">
                <tr>
                    <th><span>Prix Service</span></th>
                    <td><span><b>{{ $totalPrixFromServices }} FCFA </b>
                        </span></td>
                </tr>
                <tr>
                    <th><span>Prix Réservation</span></th>
                    <td><span><b>{{ $reservation->prix }} FCFA</b></span></td>
                </tr>
                <tr>
                    <th><span>Payé</span></th>
                    <td><span><b>{{ $totalPrixservice }} FCFA</b></span></td>
                </tr>
                <tr>
                    <th><span>Total à payer</span></th>
                    <td><span><b>{{ $totalprix - $totalPrixservice }} FCFA</b></span></td>
                </tr>
            </table>
        </article>
        <aside>
            <h1><span>Notes complémentaires</span></h1>
            Veuillez régler cette facture à la reception.
        </aside>
    </div>

    <script src="{{ asset('js/jspdf.debug.js') }}"></script>
    <script src="{{ asset('js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('js/html2pdf.min.js') }}"></script>

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

</body>

</html>
