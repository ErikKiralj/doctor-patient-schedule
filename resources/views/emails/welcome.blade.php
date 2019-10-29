<!DOCTYPE <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Podaci za prijavu</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css">
        <script src="main.js"></script>
    </head>

    <body>
        <div style="outline:solid">
            <h1 style="text-align:center">Dobrodošli u web aplikaciju za automatsko zauzeće termina,</h1>
            <h1 style="text-align:center">{{ $data1["name"] }}</h1>
            <h2 style="text-align:center">Vaš račun kreiran je od strane administratora.</h2>
            <h3 style="text-align:center">Podaci za prijavu:</h3>
            <p style="text-align:center">Email: {{ $data1["email"] }}</p>
            <p style="text-align:center">Lozinka: {{ $data1["password"] }}</p>
            <h3 style="text-align:center">Za više informacija posjetite našu <a href="http://dipl.local/">početnu stranicu</a> ili nas kontaktirajte na e-mail adresi info@example.com</h3>
            <br>
        </div>
    </body>
</html>