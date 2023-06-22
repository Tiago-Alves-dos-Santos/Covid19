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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    {{-- FIM CSS --}}

    {{-- JS --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    {{-- DataTable --}}
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"></script>
    {{-- FIM JS --}}
</head>
<body>
    <img src="{{ asset('img/favicon.png') }}" id="movingImage" alt="">

    <div class="content-center">
        <div class="content">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Estado</th>
                        <th>UF</th>
                        <th>Casos</th>
                        <th>Mortes</th>
                        <th>Suspeitos</th>
                        <th>Recusados</th>
                        <th>Data Atualização</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($covid as $value)
                    @php
                        $value = (object)$value;
                        $data = new \DateTime($value->datetime);
                        $dataFormatada = $data->format('d/m/Y H:i:s');
                    @endphp
                    <tr>
                        <td>{{ $value->uid }}</td>
                        <td>{{ $value->state }}</td>
                        <td>{{ $value->uf }}</td>
                        <td>{{ $value->cases }}</td>
                        <td>{{ $value->deaths }}</td>
                        <td>{{ $value->suspects }}</td>
                        <td>{{ $value->refuses }}</td>
                        <td>{{ $dataFormatada }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Estado</th>
                        <th>UF</th>
                        <th>Casos</th>
                        <th>Mortes</th>
                        <th>Suspeitos</th>
                        <th>Recusados</th>
                        <th>Data Atualização</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

<script>
    $('#example').DataTable({
        "language": {
            decimal: "",
            emptyTable: "Sem dados disponíveis",
            info: "Mostrando de _START_ até _END_ de _TOTAL_ registos",
            infoEmpty:"Mostrando de 0 até 0 de 0 registos",
            infoFiltered: "(filtrado de _MAX_ registos no total)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Mostrar _MENU_ registos",
            loadingRecords: "A carregar dados...",
            processing: "A processar...",
            search:"Procurar:",
            zeroRecords: "Não foram encontrados resultados",
            paginate: {
                first: "Primeiro",
                last: "Último",
                next: "Seguinte",
                previous: "Anterior"
            },
            aria: {
                sortAscending: ": clique para ordenar ascendente (ASC)",
                sortDescending: ": clique para ordenar descendente (DESC)"
            }
        }
    });
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
