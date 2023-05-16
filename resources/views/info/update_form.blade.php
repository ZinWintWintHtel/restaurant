@extends('manager_master')

@section('sidebar')

<div class="list-group list-group-flush my-3">
                <a href="{{ route('manager.dashboard') }}" class=" list-group-item list-group-item-action bg-transparent fw-bold" onclick="addClass(this);">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('manager.customer_feedback')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Customer Feedback</a>
                <a href="{{route('manager.info')}}" class="active list-group-item list-group-item-action bg-transparent  fw-bold" ><i
                        class="fas fa-project-diagram me-2"></i>Information</a>
                <a href="{{route('manager.staff')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-people-fill me-2 fs-5"></i>
                Staff</a>
                <a href="{{route('manager.paymentmethod')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold" ><i
                        class="fas fa-paperclip me-2"></i>Payment Methods</a>
                <a href="{{route('manager.fee')}}" class=" list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-currency-dollar me-2 fs-5"></i>Fees</a>
                
                
            
            </div>

@endsection

@section('content')
<div class="bg-white text-center p-5 m-5 shadow">
    
@if(Session::has('msg'))
                      <div class="col-12 text-center text-lora text-danger fw-bold">
                        <span>{{ session::get('msg') }}</span>
                      </div>
                      @endif
                      
    <form action="{{route('restaurant.update',$restaurant_detail->id)}}" class="" method="post">
    <h2 class="text-orange text-lora mb-4 fw-bold">{{$restaurant_detail->name}}</h2>

        @csrf
        <input type="hidden" name="name" value="{{$restaurant_detail->name}}">
        <input type="hidden" name="logo" value="{{$restaurant_detail->logo}}">
        <div class=" row mb-5 ">
            <div class="col-md-6 offset-md-3 col-12">
                <img src="{{asset('images/'.$restaurant_detail->logo)}}" alt="manager-photo" class="profileImg">
            </div>
        </div>

        <div class=" row mb-3">
            <div class="col-md-5 col-6 justify-content-end d-flex m-auto">
                <label for="email" class="text-lora text-orange  fs-5">Email</label>
            </div>
            <div class="col-md-7 col-6">
                <input type="email" name="email" value="{{$restaurant_detail->email}}" class="form form-control fw-bold profileForm @error('email') is-invalid @enderror">
            </div>
        </div>

       <div class=" row mb-3">
            <div class="col-md-5 col-6 justify-content-end d-flex m-auto">
                <label for="phone" class="text-lora text-orange  fs-5">Phone</label>
            </div>
            <div class="col-md-7 col-6">
                <input type="text" name="phone" value="{{$phone->number}}" class="form form-control fw-bold profileForm @error('phone') is-invalid @enderror">
            </div>
        </div> 

       <div class=" row mb-3">
            <div class="col-md-5 col-6 justify-content-end d-flex m-auto">
                <label for="address" class="text-lora text-orange  fs-5">Address</label>
            </div>
            <div class="col-md-7 col-6">
                <!-- <input type="text" name="address" value="{{$restaurant_detail->address}}" class="form form-control fw-bold profileForm">
             -->
             <textarea name="address" row="5" class="form form-control fw-bold profileForm @error('address') is-invalid @enderror">{{$restaurant_detail->address}}</textarea>
            </div>
        </div>

        <div class=" row mb-3">
            <div class="col-md-5 col-6 justify-content-end d-flex m-auto">
                <label for="opening_hour" class="text-lora text-orange  fs-5">Opening Hour</label>
            </div>
            <div class="col-md-7 col-6">
                <input type="time" name="opening_hour" value="{{$restaurant_detail->opening_hour}}" class="form form-control fw-bold profileForm @error('opening_hour') is-invalid @enderror">
            </div>
        </div>

        <div class=" row mb-3">
            <div class="col-md-5 col-6 justify-content-end d-flex m-auto">
                <label for="closing_hour" class="text-lora text-orange  fs-5">Closing Hour</label>
            </div>
            <div class="col-md-7 col-6">
                <input type="time" name="closing_hour" value="{{$restaurant_detail->closing_hour}}" class="form form-control fw-bold profileForm @error('closing_hour') is-invalid @enderror">
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-warning me-3">Update</button>
            
        </div>

    </form>



</div>




@endsection