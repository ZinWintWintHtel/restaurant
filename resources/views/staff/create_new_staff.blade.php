@extends('manager_master')

@section('sidebar')

<div class="list-group list-group-flush my-3">
                <a href="{{ route('manager.dashboard') }}" class=" list-group-item list-group-item-action bg-transparent fw-bold" onclick="addClass(this);">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('manager.customer_feedback')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Customer Feedback</a>
                <a href="{{route('manager.info')}}" class=" list-group-item list-group-item-action bg-transparent  fw-bold" ><i
                        class="fas fa-project-diagram me-2"></i>Information</a>
                <a href="{{route('manager.staff')}}" class="active list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-people-fill me-2 fs-5"></i>
                Staff</a>
                <a href="{{route('manager.paymentmethod')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold" ><i
                        class="fas fa-paperclip me-2"></i>Payment Methods</a>
                <a href="{{route('manager.fee')}}" class=" list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-currency-dollar me-2 fs-5"></i>Fees</a>
                
                
            
            </div>

@endsection

@section('content')

<div class="bg-light m-5 text-lora">
        <h1 class="text-center text-warning py-3 ">Insert New Staff</h1>
        <div class="p-5">
        <form class="forms-sample" action="{{route('manager.staff_store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Staff Photo</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" id="exampleInputUsername2" >
                        @error('photo')
    <div class="text text-danger">{{ $message }}</div>
@enderror
                      </div>
                    </div>

                    <div class="form-group row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Staff Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInputUsername2"  placeholder="Enter Staff Name">
                        @error('name')
    <div class="text text-danger">{{ $message }}</div>
@enderror
                      </div>
                    </div>
                    <div class="form-group row mb-3">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail2"  placeholder="Enter Email">
                        @error('email')
    <div class="text text-danger">{{ $message }}</div>
@enderror
                      </div>
                    </div>
                    <div class="form-group row mb-3">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Phone Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="exampleInputEmail2"  placeholder="Enter Phone Number">
                        @error('phone')
    <div class="text text-danger">{{ $message }}</div>
@enderror
                      </div>
                    </div>

                    <div class="text-center">
                    <button type="submit" class="btn btn-success me-2">Submit</button>
                    <button class="btn btn-warning">Cancel</button>
                    </div>
                  </form>            
        </div>            
        </div>



     







@endsection