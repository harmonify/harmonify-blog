<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="User Dashboard">
    <meta name="author" content="Wendy">
    <title>Harmonify{{ $title ? " | {$title}" : '' }}</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    {{-- Bootstrap JS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    {{-- Bootstrap Dashboard Example --}}
    <link href="/css/dashboard.css" rel="stylesheet">
    <script defer src="/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/utilities.css">
    <script src="/js/script.js"></script>

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    {{-- disabling file upload --}}
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
    {{-- disabling the js at /dashboard/posts/create --}}

</head>

<body>
    @include('components/dashboard/navbar')

    <div class="container-fluid min-vh-100">
        <div class="row">
            @include('components/dashboard/sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('container')

                {{-- @yield('table') --}}
            </main>
        </div>
    </div>
</body>

</html>
