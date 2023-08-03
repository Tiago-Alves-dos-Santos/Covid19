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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    {{-- FIM CSS --}}

    {{-- JS --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- DataTable --}}
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    {{-- FIM JS --}}
</head>
<body>
    <img src="{{ asset('img/favicon.png') }}" id="movingImage" alt="">
    <div class="index-navbar w-100">
        @include('includes.navbar')
    </div>
    <div class="content-center">
        <div class="content">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('State') }}</th>
                        <th>{{ __('State acronym') }}</th>
                        <th>{{ __('Confirmed cases') }}</th>
                        <th>{{ __('Deaths') }}</th>
                        <th>{{ __('Suspects') }}</th>
                        <th>{{ __('Refused') }}</th>
                        <th>{{ __('Update date') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($covid as $value)
                    @php
                        $value = (object)$value;
                        $date = new \DateTime($value->datetime);
                        $date_formatted = $date->format('d/m/Y H:i:s');
                    @endphp
                    <tr>
                        <td>{{ $value->uid }}</td>
                        <td>{{ $value->state }}</td>
                        <td>{{ $value->uf }}</td>
                        <td>{{ $value->cases }}</td>
                        <td>{{ $value->deaths }}</td>
                        <td>{{ $value->suspects }}</td>
                        <td>{{ $value->refuses }}</td>
                        <td>{{ $date_formatted }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('State') }}</th>
                        <th>{{ __('State acronym') }}</th>
                        <th>{{ __('Confirmed cases') }}</th>
                        <th>{{ __('Deaths') }}</th>
                        <th>{{ __('Suspects') }}</th>
                        <th>{{ __('Refused') }}</th>
                        <th>{{ __('Update date') }}</th>
                    </tr>
                </tfoot>
            </table>

            <div class="w-100 d-flex justify-content-end mt-3">
                <a href="{{ $url_whatsaap }}" target="_blank" class="btn btn-success">{{ __('Share whatsapp') }}</a>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $('#example').DataTable({
        "language": {
            decimal: "",
            emptyTable: "{{ __('No data available') }}",
            info: "{{ __('Showing to of records') }}",
            infoEmpty:"{{ __('Showing from 0 to 0 of 0 records') }}",
            infoFiltered: "{{ __('Filtered from records in total') }}",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "{{ __('Show records') }}",
            loadingRecords: "{{ __('Loading data') }}"+'...',
            processing: "{{ __('Processing') }}"+'...',
            search:"{{ __('Search') }}:",
            zeroRecords: "{{ __('No results were found') }}",
            paginate: {
                first: "{{ __('First') }}",
                last: "{{ __('Last') }}",
                next: "{{ __('Next') }}",
                previous: "{{ __('Previous') }}"
            },
            aria: {
                sortAscending: ": {{ __('Click to sort ascending (ASC)') }}",
                sortDescending: ": {{ __('Click to sort descending (DESC)') }}"
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
