@extends('staff_master')

@section('sidebar')

<div class="list-group list-group-flush my-3">
                <a href="{{ route('staff.dashboard') }}" class=" list-group-item list-group-item-action bg-transparent fw-bold" onclick="addClass(this);">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="{{route('staff.view_customers')}}" class=" list-group-item list-group-item-action bg-transparent  fw-bold" >
                    <i class="bi bi-people-fill me-2 fs-5"></i>
                    Customers</a>
                <a href="{{route('staff.table_index')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-box-seam me-2 fs-5 fw-bold"></i>
                                   Tables</a>
                <a href="{{route('staff.reservation_index')}}" class=" list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-bookmark-check me-2 fs-5 fw-bold"></i>
                                  Reservation</a>
                
            
            </div>

@endsection

@section('content')

<div class="bg-white p-3 mx-5">

@if(Session::has('msg'))
                <p class="text-center text-lora text-danger">{{ session::get('msg') }}</p>
            @endif

    <div class="p-3">
    <h3 class="text-lora text-orange fw-bold text-center mb-4">Profile Details</h3>

    <div class="text-end">
    <button class="btn btn-danger">
        <a href="{{route('staff.update_password_form')}}" class="text-decoration-none text-lora text-white">
            Change Password
        </a>
    </button>
    </div>

    <form action="{{route('staff.update_profile_form')}}" method="get" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$staff->id}}">

    <div class="text-center my-5">
        <img src="{{asset('images/'.$staff->photo)}}" alt="staff-photo" style="width:150px; height:150px;">
    </div>

    <div class="row text-lora fs-5 text-end">
        <div class="col-4" >
            <p>Name</p>
        </div>
        <div class="col-8">
            <input disabled type="text" name="name" value="{{$staff->name}}" class="form form-control mb-3" style="width:60%">
        </div>
    </div>
    <div class="row text-lora text-end fs-5">
        <div class="col-4" >
            <p>Email</p>
        </div>
        <div class="col-8">
            <input type="email" disabled name="email" value="{{$staff->email}}" class="form form-control mb-3" style="width:60%">
        </div>
    </div>
    <div class="row text-lora text-end fs-5">
        <div class="col-4" >
            <p>Phone No.</p>
        </div>
        <div class="col-8">
            <input type="text" disabled name="phone" value="{{$staff->phone}}" class="form form-control mb-3" style="width:60%">
        </div>
    </div>
    
        <div class="text-center">
        <input type="submit" value="Edit" class="btn btn-warning">
        </div>
    </form>
</div>
</div>


@endsection