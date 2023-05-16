@extends('manager_master')

@section('sidebar')

<div class="list-group list-group-flush my-3">
                <a href="{{ route('manager.dashboard') }}" class=" list-group-item list-group-item-action bg-transparent fw-bold" onclick="addClass(this);">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>

                    <a href="{{route('manager.customer_feedback')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Customer Feedback</a>
                <a href="{{route('manager.info')}}" class=" list-group-item list-group-item-action bg-transparent  fw-bold" ><i
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
<div class="bg-white text-center p-5 mx-5 shadow">
@if(Session::has('msg'))
                      <div class="col-12 text-center text-lora text-danger fw-bold">
                        <span>{{ session::get('msg') }}</span>
                      </div>
                      @endif
    
    <h2 class="text-orange text-lora mb-4 fw-bold">Update Manager Profile</h2>
    <div class="text-end">
    <form action="{{route('manager.update_profile')}}" class="" method="post" enctype="multipart/form-data">
    

        @csrf
        <input type="hidden" name="id" value="{{$manager->id}}">


        <div class=" row my-5 justify-content-center">
            <img src="{{asset('images/'.$manager->photo)}}" alt="manager-photo" style="width:200px; height:200px;">
            <input type="hidden" name="old_photo" value="{{$manager->photo}}">

            </div>
        </div>

        <div class=" row mb-3">
            <div class="col-md-5 col-6 justify-content-end d-flex m-auto">
                <label for="photo" class="text-lora text-orange  fs-5">Photo</label>
            </div>
            <div class="col-md-7 col-6">
                <input type="file" name="new_photo"  class="form form-control fw-bold profileForm @error('new_photo') is-invalid @enderror">
                @error('new_photo')
    <p class="text text-danger">{{ $message }}</p>
@enderror
            </div>
        </div>


        <div class=" row mb-3">
            <div class="col-md-5 col-6 justify-content-end d-flex m-auto">
                <label for="name" class="text-lora text-orange  fs-5">Name</label>
            </div>
            <div class="col-md-7 col-6">
                <input type="text" name="name" value="{{$manager->name}}" class="form form-control fw-bold profileForm @error('name') is-invalid @enderror">
                @error('name')
    <p class="text text-danger">{{ $message }}</p>
@enderror
            </div>
        </div>

        <div class=" row mb-3">
            <div class="col-md-5 col-6 justify-content-end d-flex m-auto">
                <label for="email" class="text-lora text-orange  fs-5">Email</label>
            </div>
            <div class="col-md-7 col-6">
                <input type="email" name="email" value="{{$manager->email}}" class="form form-control fw-bold profileForm @error('email') is-invalid @enderror">
                @error('email')
    <p class="text text-danger">{{ $message }}</p>
@enderror
            </div>
        </div>


        <div class=" row mb-3">
            <div class="col-md-5 col-6 justify-content-end d-flex m-auto">
                <label for="phone" class="text-lora text-orange  fs-5">Phone</label>
            </div>
            <div class="col-md-7 col-6">
                <input type="text" name="phone" value="{{$manager->phone}}" class="form form-control fw-bold profileForm @error('phone') is-invalid @enderror">
                @error('phone')
    <p class="text text-danger">{{ $message }}</p>
@enderror
            </div>
        </div>

        <div class=" row mb-3 justify-content-center text-lora">
            <button class="btn btn-warning shadow my-3 me-5" type="submit" style="width:15%;">
                Update
            </button>
        </div>
    </form>

    



</div>

@endsection