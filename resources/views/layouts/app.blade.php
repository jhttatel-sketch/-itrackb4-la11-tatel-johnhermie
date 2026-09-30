<!DOCTYPE html>
<html>
<head>

    <title>@yield('title', 'Book Portal')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <h1 class="display-4 fw-bold">Book Portal</h1>

    <p class="text-secondary">
        Prepared by: John Hermie T. Tatel
    </p>

    {{-- Success message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</div>

</body>
</html>