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

<div class="bg-white text-center p-5 mx-5 shadow" style="min-height:75vh;">
    
    <h2 class="text-orange text-lora mb-4 fw-bold">Change Password</h2>
    @if(Session::has('msg'))
                <p class="text-center text-danger text-lora">{{ session::get('msg') }}</p>
            @endif
    <div class="text-end">
    <form action="{{route('staff.change_password')}}" class="" method="post" >
    

        @csrf

        <div class=" row mb-3">
            <div class="col-md-5 col-6">
                <label for="old_password" class="text-lora text-orange  fs-5">Old Password *</label>
            </div>
            <div class="col-md-7 col-6">
                <input type="password" name="old_password" value="" required class="form form-control fw-bold profileForm @error('old_password') is-invalid @enderror">
            </div>           
        </div>

        

        


        <div class=" row mb-3">
            <div class="col-md-5 col-6 justify-content-end d-flex m-auto">
                <label for="new_password" class="text-lora text-orange  fs-5">New Password *</label>
            </div>
            <div class="col-md-7 col-6">
                <input type="password" name="new_password" value="" required class="form form-control fw-bold profileForm @error('new_password') is-invalid @enderror">
            </div>
        </div>

        <div class=" row mb-3">
            <div class="col-md-5 col-6 justify-content-end d-flex m-auto">
                <label for="confirm_password" class="text-lora text-orange  fs-5 ">Confirm Password *</label>
            </div>
            <div class="col-md-7 col-6">
                <input type="password" name="confirm_password" value="" required class="form form-control fw-bold profileForm @error('confirm_password') is-invalid @enderror">
            </div>
        </div>



        <div class=" row mb-3 justify-content-center text-lora">
            <button class="btn btn-warning shadow my-3" type="submit" style="width:15%;">
                Update
            </button>
        </div>
       

    </form>
    </div>



</div>


@endsection