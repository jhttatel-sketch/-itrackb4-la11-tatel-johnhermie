<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <h1 class="text-primary fw-bold">books Portal</h1>
        <p class="text-muted">Prepared by: John Hermie T. Tatel</p>

        @include('partials._nav')

        <hr>

        @yield('content')

    </div>

</body>
</html>
