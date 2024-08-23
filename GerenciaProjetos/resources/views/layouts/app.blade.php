<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Portal Vagas') }}</title>
    <!-- links de css -->
    <link rel="stylesheet" href="{{ asset('assets/css/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap Icons (opcional, caso esteja usando ícones do Bootstrap) -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    
</head>

<body>
    <!-- header -->
    @include('components.header')

        @yield('content')
    
    <!-- footer -->
    @include('components.footer')
</body>
<!-- scripts js -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>