<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Conference Registration')</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="{{ url('/') }}"> Ticket 2023 </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarMain">
                <ul class="navbar-nav mb-2 mb-lg-0 align-items-lg-center gap-2">
                    <li class="nav-item">
                        <a href="{{ url('/register') }}" class="btn btn-primary btn-ms text-center"
                            style="min-width: 100px;">
                            ลงทะเบียน
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/ticket') }}" class="btn btn-success btn-ms text-center"
                            style="min-width: 100px;">
                            ซื้อตั๋ว
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>



    <main class="py-4">
        <div class="container">


            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light mt-auto py-3">
        <div class="container text-center">
            <small>&copy; 2025 Jittiphat Sunanta | Powered by Laravel & Bootstrap 5</small>
        </div>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')



</body>

</html>
