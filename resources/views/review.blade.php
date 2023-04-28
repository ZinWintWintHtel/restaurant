@extends('master')

@section('content')

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

@endsection