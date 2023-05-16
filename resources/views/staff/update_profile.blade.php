@extends('staff_master')

@section('sidebar')

<div class="list-group list-group-flush my-3">
                <a href="{{ route('staff.dashboard') }}" class=" list-group-item list-group-item-action bg-transparent fw-bold" onclick="addClass(this);">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="" class=" list-group-item list-group-item-action bg-transparent  fw-bold" >
                    <i class="bi bi-people-fill me-2 fs-5"></i>
                    Customers</a>
                <a href="{{route('staff.table_index')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-box-seam me-2 fs-5 fw-bold"></i>
                                   Tables</a>
                <a href="{{route('staff.reservation_index')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-bookmark-check me-2 fs-5 fw-bold"></i>
                                  Reservation</a>
                
            
            </div>

@endsection

@section('content')

<div class="bg-white p-3 mx-5">
@if(Session::has('msg'))
                      <div class="col-12 text-center text-lora text-danger fw-bold">
                        <span>{{ session::get('msg') }}</span>
                      </div>
                      @endif
    <div class="p-3">
    <h3 class="text-lora text-orange fw-bold text-center mb-4">Update Profile Details</h3>
    <form action="{{route('staff.update_profile')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$staff->id}}">

    <div class="text-center my-5">
        <img src="{{asset('images/'.$staff->photo)}}" alt="staff-photo" style="width:150px; height:150px;">
        <input type="hidden" name="old_photo" value="{{$staff->photo}}">
    </div>

    <div class="row text-lora fs-5 text-end">
        <div class="col-4" >
            <p>Photo</p>
        </div>
        <div class="col-8">
            <input type="file" name="new_photo" class="form form-control mb-3 @error('new_photo') is-invalid @enderror" style="width:60%">
        </div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-8">
        @error('new_photo')
            <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row text-lora fs-5 text-end">
        <div class="col-4" >
            <p>Name</p>
        </div>
        <div class="col-8">
            <input type="text" name="name" value="{{$staff->name}}" class="form form-control mb-3 @error('name') is-invalid @enderror" style="width:60%">
        </div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-8">
        @error('name')
            <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row text-lora text-end fs-5">
        <div class="col-4" >
            <p>Email</p>
        </div>
        <div class="col-8">
            <input type="email" name="email" value="{{$staff->email}}" class="form form-control mb-3 @error('email') is-invalid @enderror" style="width:60%">
        </div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-8">
        @error('email')
            <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
    <div class="row text-lora text-end fs-5">
        <div class="col-4" >
            <p>Phone No.</p>
        </div>
        <div class="col-8">
            <input type="text" name="phone" value="{{$staff->phone}}" class="form form-control mb-3 @error('phone') is-invalid @enderror" style="width:60%">
        </div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-8">
        @error('phone')
            <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
    
        <div class="text-center">
        <input type="submit" value="Update" class="btn btn-warning">
        </div>

    </form>
</div>
</div>


@endsection