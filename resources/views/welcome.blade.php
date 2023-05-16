@extends('master')

@section('content')
    
<section id="about">
        <div class="row container-fluid p-5">
          <div class="col-lg-6 col-12 text-center mb-lg-0 mb-5">
            <img src="./images/about.jpg" alt="" class="img-fluid" width="500" height="500">
          </div>
          <div class="col-lg-6 col-12 px-5 ps-lg-0">
            <h2 class="mb-4 text-lora">About Us</h2>
            <p class="text-lora">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae tempore delectus est repudiandae ipsum error ducimus harum mollitia nisi magni, nobis architecto rerum corporis iure quo pariatur, labore accusamus eaque?
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate delectus doloremque modi at. Deserunt magni est sapiente, possimus debitis voluptas rerum excepturi culpa tempore, suscipit harum sunt asperiores soluta unde!
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex id assumenda ducimus quasi Voluptate delectus doloremque modi at. Deserunt magni
            </p>
          </div>
        </div>
    </section>

    <section id="services" class="p-lg-5 bg-body-secondary">
      <div class=" serviceSection m-5">
        <div class="container-fluid serviceBackground pb-1">
          <div class="px-5 mb-5 text-white serviceTiteDiv">
            <h1 class="text-center text-lora fw-bold mb-4 pt-5">Why to Choose Us?</h1>
            <p class="text-lora text-center px-5 ">
              Accusamus non voluptatum et quasi placeat ab, fugit quia dolor architecto repellendus officiis temporibus! Incidunt totam doloremque illo error facere facilis similique!
            </p>
          </div>
          <div class="row px-5 justify-content-center mb-5">
            <div class="col-lg-3 col-md-6 col-12 mb-lg-0 mb-3">
              <div class="text-center serviceBox">
                <i class="bi bi-wifi"></i>
                <h3 class="text-lora mb-3">Free WiFi</h3>
                <p class="text-lora">
                  Oluptatum aut aliquid. Debitis, sit.voluptatum aut aliquid. Debitis, sit.
                </p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-lg-0 mb-3">
              <div class="text-center serviceBox">
                <i class="bi bi-list"></i>
                <h3 class="text-lora mb-3">Variety of Food</h3>
                <p class="text-lora">
                  Oluptatum aut aliquid. Debitis, sit.voluptatum aut aliquid. Debitis, sit.
                </p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-lg-0 mb-3">
              <div class="text-center serviceBox">
                <i class="bi bi-person-hearts"></i>
                <h3 class="text-lora mb-3">Friendly Staff</h3>
                <p class="text-lora">
                  Oluptatum aut aliquid. Debitis, sit.voluptatum aut aliquid. Debitis, sit.
                </p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-lg-0 mb-3">
              <div class="text-center serviceBox">
                <i class="bi bi-bookmark-star-fill"></i>
                <h3 class="text-lora mb-3">Highly Recommend</h3>
                <p class="text-lora">
                  Oluptatum aut aliquid. Debitis, sit.voluptatum aut aliquid. Debitis, sit.
                </p>
              </div>
            </div>
          </div>          
        </div>          
      </div>
    </section>

    <section id="review">
      <div class="container-fluid mb-5">
        <h1 class="text-center text-lora py-5 fw-bold text-pink">Our Customer Saying</h1>
        <div id="carouselExampleIndicators" class="carousel slide">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="reviewBox">
                <p>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                </p>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem necessitatibus enim expedita, velit facilis magni deleniti dolore distinctio eaque consequuntur beatae animi fugit quis eum, similique sunt a ipsa exercitationem.
                </p>
                <p class="personIcon"><i class="bi bi-person-circle"></i></p>
                <h2>Stella</h2>
                <p>11/06/2022</p>
              </div>
            </div>
            <div class="carousel-item">
              <div class="reviewBox">
                <p>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star"></i>
                </p>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem necessitatibus enim expedita, velit facilis magni deleniti dolore distinctio eaque consequuntur beatae animi fugit quis eum, similique sunt a ipsa exercitationem.
                </p>
                <p class="personIcon"><i class="bi bi-person-circle"></i></p>
                <h2>James</h2>
                <p>05/02/2022</p>
              </div>
            </div>
            <div class="carousel-item">
              <div class="reviewBox">
                <p>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star"></i>
                </p>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem necessitatibus enim expedita, velit facilis magni deleniti dolore distinctio eaque consequuntur beatae animi fugit quis eum, similique sunt a ipsa exercitationem.
                </p>
                <p class="personIcon"><i class="bi bi-person-circle"></i></p>
                <h2>John</h2>
                <p>30/12/2022</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev reviewControlBtn" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span aria-hidden="true"><i class="bi bi-chevron-double-left"></i></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next reviewControlBtn" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span aria-hidden="true"><i class="bi bi-chevron-double-right"></i></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        

      </div>
    </section>

    <section id="gallery ">
      <div class="container-fluid p-lg-5 bg-body-secondary">
        <div class="row g-0">
          <div class="col-lg-3 col-md-6 col-12">
            <div class="galleryBox">
              <img src="./images/gallery-1.jfif" alt="">
              <a href="#">
                <i class="bi bi-instagram"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="galleryBox">
              <img src="./images/gallery-2.jfif" alt="">
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="galleryBox">
              <img src="./images/gallery-3.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="galleryBox">
              <img src="./images/gallery-4.jfif" alt="">
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="galleryBox">
              <img src="./images/gallery-5.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="galleryBox">
              <img src="./images/gallery-6.jfif" alt="">
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="galleryBox">
              <img src="./images/gallery-7.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="galleryBox">
              <img src="./images/gallery8.jpg" alt="">
            </div>
          </div>                                 
        </div>                        
      </div>        
      </div>
    </section>

    <section id="contactus">
      <div class="container-fluid mb-5">
        <h1 class="text-center my-4 text-lora contactTitle">Contact</h1>

        <div class="row">
          <div class="col-lg-6 col-12 ps-5">
            <!-- <form action="" class=" mt-4 px-5">
              <input type="text" name="" id="" placeholder="Name" class="form-control mb-3 py-2 text-lora">
              <input type="text" name="" id="" placeholder="Email" class="form-control mb-3 py-2 text-lora">
              <input type="text" name="" id="" placeholder="Subject" class="form-control mb-3 py-2 text-lora">
              <textarea name="" id="" cols="30" rows="10" placeholder="Message" class="form-control mb-3 py-2 text-lora"></textarea>
              <input type="submit" name="" id="" value="Submit" class="btn-submit text-lora">
            </form> -->

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
