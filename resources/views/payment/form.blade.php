<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hot Hot Buffet</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Lora:ital,wght@0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('css/reservationForm.css')}}">

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="reservePage bg-orange">
    <div class="container-fluid text-lora ">
        <div class="row bg-light text-black py-3 px-5 ">
            <div class="col-lg-6 col-12 mb-lg-0 mb-2  ps-5">
                <a href="{{url('/')}}" class="text-decoration-none">
                  <img src="{{asset('images/logo.png')}}" alt="logo" class="logoImg">
                  <span class="text-lora text-orange fs-4 fw-bold">Hot Hot Buffet</span>
                </a>
            </div>
            <div class="col-lg-6 col-12 d-flex m-auto justify-content-center">
                <!-- Authentication Links -->
                <a href="" class=" text-decoration-none text-lora fs-5 text-orange">
                    <i class="bi bi-person-circle me-2"></i>{{ Auth::user()->name }}
                </a>
            </div>
        </div>
    </div>
    <div class="px-5 pt-4 fw-bold">
    <h1 class="text-lobster ps-5 text-shadow">Make Payment</h1>
    <hr class="fw-bold">
    <div class="ps-5 text-lora text-white">
    <span class="lh-1 fs-4">
        To complete this reservation, You need to pay  {{$reservation->guest_number * $reservation->fee->amount}} MMK in total.
    </span>
    </div>
    <hr class="mb-4">
    <div class="px-5 row mb-3 text-lora">
        <h3 class="mb-4">Payment Method</h3>
        <div class="d-flex m-auto">
            <div>
                <img src="{{asset('images/'.$payment_method->method_image)}}" alt="payment-method-image" class="paymentMethodImg me-2">
            </div>
            <div class="align-items-center ms-3 fs-5">
                <p class="lh-1">{{$payment_method->method_name}}</p>
                <p class="lh-1">{{$payment_method->account_name}}</p>
                <p class="lh-1">{{$payment_method->account_number}}</p>
            </div>
          </div>
    </div>
    <hr class="my-4">
    <div class="px-5">
        <form action="{{route('payment.store')}}" method="post" enctype="multipart/form-data">
            @csrf 
            <input type="hidden" value="{{$reservation->id}}" name="reservation">
            <input type="hidden" name="payment_method" value="{{$payment_method->id}}">
            <div class="row">
                <div class="col-4 fs-5 text-lora fw-bold d-flex m-auto">
                    Upload Your Payment Transaction
                </div>
                <div class="col-8">
                    <input type="file" name="payment_screenshot" id="" class="form form-control">
                </div>
            </div>
            <div class="text-center mt-5">
            <input type="submit" value="Pay Now" class="submitBtn shadow">
        </div>
        </form>
    </div>


    
    
    

    </div>
    
</div>


</body>
</html>