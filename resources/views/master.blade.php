<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hot Hot Buffet</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- External JS -->
    <script src="script.js"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Lora:ital,wght@0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">

</head>
<body>



    <header id="home">
        <div class="fixed-top shadow">
                    <!-- Header Info -->
                    <div class="container-fluid text-lora ">
                      <div class="row bg-orange text-white py-1 px-5 ">
                          <div class="col-lg-6 col-12 mb-lg-0 mb-2 text-center">
                              <i class="bi bi-telephone-fill me-1"></i><span class="">{{$phones[0]->number}}</span>
                              <i class="bi bi-envelope-at-fill ms-3 me-1"></i><span>{{$restaurant_detail->email}}</span>
                          </div>
                          <div class="col-lg-6 col-12 text-center">
                              <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                            <a href="{{url('/login')}}" class="text-white text-decoration-none"><i class="bi bi-person-circle me-2"></i>Log In</a>

                            @endif
                        @else
                        <a href="{{url('/home')}}" class="text-white text-decoration-none"><i class="bi bi-person-circle me-2"></i>{{ Auth::user()->name }}</a>

                        @endguest
                          
                          
                          
                          
                          </div>
                      </div>
                    </div>
          
                    <!-- Navbar -->
                  <nav class="navbar navbar-expand-lg bg-body-tertiary">
                      <div class="container-fluid">
                        <a class="navbar-brand ps-5 ms-5" href="{{url('/')}}">
                          <img src="{{asset('images/'.$restaurant_detail->logo)}}" alt="Logo" width="70" height="70" class="d-inline-block align-text-center">
                          <span class="text-lobster fs-2">{{$restaurant_detail->name}}</span>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center text-lora" id="navbarNavDropdown">
                          <ul class="navbar-nav">
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{url('/home')}}">Reservation</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{url('/about')}}">About Us</a>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#services" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Features
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{url('/services')}}">Services</a></li>
                                <li><a class="dropdown-item" href="{{url('/review')}}">Review</a></li>
                                <li><a class="dropdown-item" href="{{url('/gallery')}}">Gallery</a></li>
                              </ul>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{url('/contact')}}">Contact Us</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </nav>
        </div>

          <!-- Header Cover -->
          <div class="header-cover">
            <div class="container-fluid headerCoverBackground">
              <div class="text-center mt-5 p-5">
                <p class=" text-lora text-white welcomeText">Welcome to Our Restaurant</p>
                <h1 class="text-lobster welcomeTextHeader">Taste & Enjoy the moment</h1>
                <div class="reservation">
                  <form action="{{route('reservation_form')}}" method="get" class="reservationForm">
                    @csrf
                    <div class="row">
                      <div class="col-lg-4 col-6">
                        <input type="text" name="date" id="" placeholder="Date" onclick="this.type='date';" class="userInput" required> 
                        
                      </div>
                      <div class="col-lg-4 col-6">
                        <input type="text" name="time" id="" placeholder="Time" onclick="this.type='time';" class="userInput" required>
                      </div>
                      <div class="col-lg-4 col-6">
                        <input type="number" name="guest_number" id="" placeholder="Guest Num" class="userInput" required>
                      </div>
                      @if(Session::has('msg'))
                      <div class="col-12 text-center text-sm text-lora text-danger fw-bold">
                        <span>{{ session::get('msg') }}</span>
                      </div>
                      @endif

                      <div class="col-lg-12">
                        <input type="submit" value="Reserve Now" class="reserveNowBtn">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

    </header>

    @section('content')


    @show
    

    

    

    

    

    <section id="footer">
      <div class="footerBackgroundBox">
        <div class="container-fluid p-5 footerBox text-white">
          <div class="row">
          <div class="col-md-6 ps-5">
            <h2 class="text-lobster">{{$restaurant_detail->name}}</h2>
            <p class="text-lora">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod repudiandae vitae aut atque laudantium debitis fuga consequatur cumqu</p>
            <p class="footer-icon">
              <i class="bi bi-facebook"></i>
              <i class="bi bi-instagram"></i>
              <i class="bi bi-twitter"></i>
              <i class="bi bi-youtube"></i>
            </p> 
          </div>
          <div class="col-md-6 ps-5">
            <h2 class="text-lobster">Opening Hours</h2>
            <p class="text-lora">Everyday : {{date('h:i A', strtotime($restaurant_detail->opening_hour))}} - {{date('h:i A', strtotime($restaurant_detail->closing_hour))}}</p>
            <p class="text-lora">P.S : Closed Days are announced ahead of days on Social Media</p>
          </div>
          </div>
          <hr>
          <p class="text-center text-lora">Copyright to All Reserved</p>         
        </div>
      </div>
    </section>


</body>
</html>