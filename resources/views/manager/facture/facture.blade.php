<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>HTML TO PDF</title>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('css/pdfstyle.css') }}" rel="stylesheet">
</head>

<body>

    <div id="invoice">
        <header>
            <h1>Facture</h1>
            <address>
                <p> contact@keto.com </p>
                <p> 46PP+Q2 Lomé, Togo </p>
                <p> Phone: +228 70056985 </p>
            </address>
            <span><!--<img alt="it" src="base64imagecodehere" width="150">--></span>
        </header>
        <article>

            <address class="norm">
                <h4>Jan Denean Banister</h4>
                <p> name@client.com <br>
                <p> 1613 bethany church road,belton,South <br>
                <p> Carolina,29627,USA <br>
                <p> Phone: 1-864-933-0793</p>
            </address>

            <table class="meta">
                <tr>
                    <th><span>Facture N°</span></th>
                    <td><span>101138</span></td>
                </tr>
                <tr>
                    <th><span>Date</span></th>
                    <td><span>January 1, 2019</span></td>
                </tr>
                <tr>
                    <th><span>Montante</span></th>
                    <td><span id="prefix">$</span><span>600.00</span></td>
                </tr>
            </table>
            <table class="inventory">
                <thead>
                    <tr>
                        <th><span>S. No</span></th>
                        <th><span>Description</span></th>
                        <th><span>Qté</span></th>
                        <th><span>Taux par quantité</span></th>
                        <th><span>Prix</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span>1.</span></td>
                        <td><span>Experience Review</span></td>
                        <td><span data-prefix>$</span><span>150.00</span></td>
                        <td><span>4</span></td>
                        <td><span data-prefix>$</span><span>600.00</span></td>
                    </tr>
                </tbody>
            </table>
            <table class="sign">
                <tr>
                    <td></td>
                </tr>
            </table>

            <table class="balance">
                <tr>
                    <th><span>Total</span></th>
                    <td><span data-prefix>$</span><span>600.00</span></td>
                </tr>
            </table>
        </article>
        <aside>
            <h1><span>Additional Notes</span></h1>
            <div class="card col-md-8 mx-4 container text-center">
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
                type: 'jpeg',
                quality: 500
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
