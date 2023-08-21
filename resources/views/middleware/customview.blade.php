<!DOCTYPE html>
<html>

<head>
    <title>Access Denied</title>

</head>

<body>
    <div style="text-align: center; margin-top: 100px;">
        <h2 style="text-color:  red;">Accès refusé</h2>
        <p>Vous n'êtes pas autorisé à accéder à cette page.</p>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "{{ route('login') }}";
        }, 1500);
    </script>
</body>

</html>
