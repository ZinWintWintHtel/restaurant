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
    <h1 class="text-lobster ps-5 text-shadow">Complete Your Reservation</h1>
    <hr class="fw-bold">
    <div class="ps-5 text-lora text-white">
    <span class="lh-1 fs-4 me-3">
      <i class="bi bi-people-fill me-2"></i>{{$data['guest_number']}} Guest
    </span>
    <span class="lh-1 fs-4 me-3">
      <i class="bi bi-calendar2-check-fill me-2"></i>{{$data['date']}}
    </span>
    <span class="lh-1 fs-4">
        <i class="bi bi-clock me-2"></i>{{date('h:i A', strtotime($data['time']))}}
    </span>
    </div>
    <hr class="mb-4">
    <div class="px-5 row mb-3">
        <div class="col-md-2 col-6 fs-5 text-lora fw-bold">
            Cancellation Fee  
        </div>
        <div class="col-md-10 col-6 fs-5 text-lora fw-bold">
          Cancelling this reservation may charge a fee of {{$fee->amount}}MMK per guest.
        </div>
    </div>
    <div class="px-5 row">
        <div class="col-md-2 col-6 fs-5 text-lora fw-bold">
            About 
        </div>
        <div class="col-md-10 col-6 fs-5 text-lora fw-bold">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur, et quibusdam aliquam, nam ipsum dolore quasi perferendis incidunt sit vero necessitatibus assumenda, velit fugit nisi totam at dignissimos sint odio.
        </div>
    </div>
    <hr class="my-4">
    <div class="px-5">
    <form action="{{route('reservation.store')}}" method="post" >
        @csrf
        <input type="hidden" name="fee" value="{{$fee->id}}" >
        <input type="hidden" name="user" value="{{Auth::user()->id}}">
        <input type="hidden" name="guest_number" value="{{$data['guest_number']}}" id="">
        <input type="hidden" name="date"  value="{{$data['date']}}" id="">
        <input type="hidden" name="time" value="{{$data['time']}}" id="">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="row">
                <div class="col-4 fs-5 text-lora fw-bold d-flex m-auto">
                Choose Your Table
            </div>
            <div class="col-8">
              <select name="table" id="" class="text-lora selectInput">
                @foreach($tables as $table)
                <option value="{{$table->id}}" class="">{{$table->table_name}} ({{$table->max_capacity}} seats)</option>
                @endforeach
              </select>
              @if(Session::has('msg'))
                      <div class="col-12 text-sm text-lora text-white fw-bold">
                        <span>{{ session::get('msg') }}</span>
                      </div>
                      @endif
            </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
            <div class="row">
                <div class="col-6 fs-5 text-lora fw-bold d-flex m-auto">
                Choose Payment Method
            </div>
            <div class="col-6">
              <select name="payment_method" id="" class="text-lora paymentMethodForm">
                @foreach($payment_methods as $payment_method)
                <option name="payment_method" value="{{$payment_method->id}}" class="">{{$payment_method->method_name}}</option>
                @endforeach
              </select>
            </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <input type="submit" value="Reserve Now" class="submitBtn shadow">
        </div>

    </form>
    </div>


    
    
    

    </div>
    
</div>


</body>
</html>