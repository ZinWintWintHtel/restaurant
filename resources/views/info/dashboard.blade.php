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
<div class="">
    

    <form action="{{route('restaurant.show',$restaurant_detail->id)}}" class="bg-white text-center p-5 m-5 shadow" method="get">
    <h2 class="text-orange text-lora mb-4 fw-bold">{{$restaurant_detail->name}}</h2>

        @csrf
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
                <input type="email" disabled name="email" value="{{$restaurant_detail->email}}" class="form form-control fw-bold profileForm">
            </div>
        </div>

       <div class=" row mb-3">
            <div class="col-md-5 col-6 justify-content-end d-flex m-auto">
                <label for="phone" class="text-lora text-orange  fs-5">Phone</label>
            </div>
            <div class="col-md-7 col-6">
                <input type="text" name="phone" disabled value="{{$phone->number}}" class="form form-control fw-bold profileForm">
            </div>
        </div> 

       <div class=" row mb-3">
            <div class="col-md-5 col-6 justify-content-end d-flex m-auto">
                <label for="address" class="text-lora text-orange  fs-5">Address</label>
            </div>
            <div class="col-md-7 col-6">
                <!-- <input type="text" name="address" value="{{$restaurant_detail->address}}" class="form form-control fw-bold profileForm">
             -->
             <textarea name="address" disabled row="5" class="form form-control fw-bold profileForm">{{$restaurant_detail->address}}</textarea>
            </div>
        </div>

        <div class=" row mb-3">
            <div class="col-md-5 col-6 justify-content-end d-flex m-auto">
                <label for="opening_hour" class="text-lora text-orange  fs-5">Opening Hour</label>
            </div>
            <div class="col-md-7 col-6">
                <input type="time" disabled name="opening_hour" value="{{$restaurant_detail->opening_hour}}" class="form form-control fw-bold profileForm">
            </div>
        </div>

        <div class=" row mb-3">
            <div class="col-md-5 col-6 justify-content-end d-flex m-auto">
                <label for="closing_hour" class="text-lora text-orange  fs-5">Closing Hour</label>
            </div>
            <div class="col-md-7 col-6">
                <input type="time" disabled name="closing_hour" value="{{$restaurant_detail->closing_hour}}" class="form form-control fw-bold profileForm">
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-warning me-2">Edit</button>
        </div>

    </form>



</div>




@endsection