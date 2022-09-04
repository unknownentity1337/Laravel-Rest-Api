<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Azathoth - @yield('title')</title>

    @isset($meta)
        {{ $meta }}
    @endisset

    <!-- Styles -->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@400;600;700&family=Open+Sans&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/notyf/notyf.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/summernote-bs4.css') }}">

    <!-- Icon -->
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css"
        media="all">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css"
        media="all">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">

    <livewire:styles />

    <!-- Scripts -->
    <script defer src="{{ asset('vendor/alpine.js') }}"></script>
</head>

<body class="antialiased">
    <div id="app">
        <div class="main-wrapper">
            @include('components.navbar')
            @include('components.admin-sidebar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        @isset($header_content)
                            {{ $header_content }}
                        @else
                            {{ __('Halaman') }}
                        @endisset
                    </div>

                    <div class="section-body">
                        {{ $slot }}
                    </div>
                </section>
            </div>
        </div>
    </div>

    @stack('modals')

    <!-- Custom -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <!-- General JS Scripts -->
    <script src="{{ asset('stisla/js/modules/jquery.min.js') }}"></script>
    <script defer async src="{{ asset('stisla/js/modules/popper.js') }}"></script>
    <script defer async src="{{ asset('stisla/js/modules/tooltip.js') }}"></script>
    <script src="{{ asset('stisla/js/modules/bootstrap.min.js') }}"></script>
    <script defer src="{{ asset('stisla/js/modules/jquery.nicescroll.min.js') }}"></script>
    <script defer src="{{ asset('stisla/js/modules/moment.min.js') }}"></script>
    <script defer src="{{ asset('stisla/js/modules/marked.min.js') }}"></script>
    <script defer src="{{ asset('vendor/notyf/notyf.min.js') }}"></script>
    <script defer src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script defer src="{{ asset('stisla/js/modules/chart.min.js') }}"></script>
    <script defer src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('stisla/js/stisla.js') }}"></script>

    <!-- Lib -->

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="{{ asset('stisla/js/scripts.js') }}"></script>


    {{-- <script src="assets/modules/codemirror/lib/codemirror.js"></script> --}}
    {{-- <script src="assets/modules/codemirror/mode/javascript/javascript.js"></script>
    <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script> --}}



    <livewire:scripts />
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false"></script> --}}
    @isset($script)
        {{ $script }}
    @endisset
    @stack('script')
</body>

</html>
