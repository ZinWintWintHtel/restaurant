@extends('master');

@section('content')
<section id="contactus">
      <div class="container-fluid">
        <h1 class="text-center my-4 text-lora contactTitle">Contact</h1>

        <div class="row">
          <div class="col-md-6">
            <form action="" class=" mt-4 px-5">
              <input type="text" name="" id="" placeholder="Name" class="form-control mb-3 py-2 text-lora">
              <input type="text" name="" id="" placeholder="Email" class="form-control mb-3 py-2 text-lora">
              <input type="text" name="" id="" placeholder="Subject" class="form-control mb-3 py-2 text-lora">
              <textarea name="" id="" cols="30" rows="10" placeholder="Message" class="form-control mb-3 py-2 text-lora"></textarea>
              <input type="submit" name="" id="" value="Submit" class="btn-submit text-lora">
            </form>
          </div>
          <div class="col-md-6 px-5 text-lora">
            <h3 class="my-4 text-orange">Address</h3>
            <p>No(99), Baho Street, Kamaryat Township</p>
            <p>Near Khaing Shwe Wah Bus Stop, Yagnon, Myanmar</p>
            <br>
            <p>info@hothotbuffet.com</p>
            <p>Ph:(95-1) 632102</p>
            <p>(95-9) 963852147</p>
            <p>(95-9) 746321951</p>
            <br>
            <h3 class="my-4 text-orange">Inquiries</h3>
            <p>For any inquiries, questions or commendations, please call: (95-9) 963852147 or fill out the form</p>
          </div>
        </div>        
      </div>
    </section>

    

@endsection