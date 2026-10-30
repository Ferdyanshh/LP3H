<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Pelatihan Pendamping Proses Produk Halal (PPH)')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-gradient-to-br from-blue-50 via-purple-50 to-blue-100 min-h-screen">

    @include('partials.header-auth')
    @include('partials.flash')

    @yield('content')

    @stack('scripts')
</body>
</html>
