<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

     <!-- Google Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Lora:ital,wght@0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">

    <!-- bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="{{asset('css/manager_master.css')}}" />
    <script src="{{asset('js/manager.js')}}"></script>
    <title>Hot Hot Buffet - Staff Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">

        <!-- /#sidebar-wrapper -->
        <div class="bg-white" id="sidebar-wrapper"> 
            <div class="sidebar-heading py-4  fs-4 fw-bold text-uppercase border-bottom">
                <a href="{{url('/')}}" target="_blank" class="text-decoration-none primary-text">
                <div class="d-flex m-auto" style="">
                    <img  src="{{asset('images/logo.png')}}" alt="logo" class="me-2">
                    <span class="text-lora fs-5">Hot Hot Buffet</span>
                </div>
                </a>
            </div>
            <div>
                @section('sidebar')

                @show
            </div>

        </div>

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center text-white">
                <i class="bi bi-text-left fs-1"></i>
                    <h2 class="fs-2 m-0">Staff Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle  fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>{{Auth::guard('staff')->user()->name}}
                            </a>
                            <ul class="dropdown-menu text-lora" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('staff.profile')}}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{route('staff.serve_reservation')}}">My Reservation</a></li>
                                <li><a class="dropdown-item" href="{{route('staff.logout')}}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div>
                @section('content')

                @show
            </div>

            

                       
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>