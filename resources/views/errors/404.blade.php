<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>404</title>

    <!-- Google font -->

    <!-- Font Awesome Icon -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/errorstyles.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('fonts/fontfamilly.css') }}" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>

    <div id="notfound">
        <div class="notfound-bg">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="notfound">
            <div class="notfound-404">
                <h1>404</h1>
            </div>
            <h2>Page introuvable</h2>
            <p>La page que vous recherchez a peut-être été supprimée, son nom a changé ou est temporairement
                indisponible.
            </p>
            @php
                $url = request()->getPathInfo(); // Get the path from the request
                $segments = explode('/', $url);
                $firstSegment = $segments[0];
                
                if ($firstSegment == 'admin') {
                    $prefix = 'admin';
                } elseif ($firstSegment == 'recept') {
                    $prefix = 'recept';
                } else {
                    $prefix = '';
                }
                
            @endphp

            <a href="{{ '/' . $prefix }}">Page d'accueil</a>

        </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
