<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <title>Covid-19</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- DataTable --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    {{-- FIM CSS --}}

    {{-- JS --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    {{-- DataTable --}}
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    {{-- FIM JS --}}
</head>
<body>
    <img src="{{ asset('img/favicon.png') }}" id="movingImage" alt="">

    <div class="content-center">
        <div class="content">

        </div>
    </div>

<script>

    function animateImage() {
        var movingImage = $('#movingImage');
        var windowWidth = $(window).width();
        var windowHeight = $(window).height();
        var imageWidth = movingImage.width();
        var imageHeight = movingImage.height();

        var x = 0;
        var y = 0;
        var dx = 5; // Velocidade horizontal
        var dy = 5; // Velocidade vertical

        function moveImage() {
        x += dx;
        y += dy;

        if (x + imageWidth >= windowWidth || x <= 0) {
            dx = -dx;
        }

        if (y + imageHeight >= windowHeight || y <= 0) {
            dy = -dy;
        }

        movingImage.css({ 'left': x, 'top': y });

        requestAnimationFrame(moveImage);
        }

        moveImage();
    }

    animateImage();
</script>
</body>
</html>
