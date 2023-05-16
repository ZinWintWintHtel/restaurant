@extends('master');

@section('content')
<section id="contactus">
      <div class="container-fluid mb-3">
        <h1 class="text-center my-4 text-lora contactTitle">Contact</h1>

        <div class="row">
          <div class="col-lg-6 col-12 ps-5">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.9890322983697!2d96.1225522148686!3d16.826900188416793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ec887964ce11%3A0xfae2d1df2c421441!2sGIC%20Myanmar%20Co.%2CLtd!5e0!3m2!1smy!2smm!4v1684079111170!5m2!1smy!2smm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

          </div>
          <div class="col-lg-6 px-lg-0 px-5 text-lora col-12">
            <h3 class="my-4 text-orange">Address</h3>
            <p>{{$restaurant_detail->address}}</p>
            <br>
            <p>Email : {{$restaurant_detail->email}}</p>
            <br>
            @foreach($phones as $phone)
            <p>Ph: {{$phone->number}}</p>
            @endforeach
            <br>
            <h3 class="my-4 text-orange">Inquiries</h3>
            <p>For any inquiries, questions or commendations, please call: (95-9) 963852147 or fill out the form</p>
          </div>
        </div>        
      </div>
    </section>

    

@endsection