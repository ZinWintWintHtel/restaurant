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
        <h1 class="text-center text-warning pt-5 ">Update Staff Info</h1>
        <div class="p-5">


        <form class="forms-sample" action="{{route('manager.staff_update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$staff->id}}">

            <div class="form-group row mb-3 justify-content-center">
                <img src="{{asset('images/'.$staff->photo)}}" alt="staff-photo" style="width:200px; height:200px;">
                    <input type="hidden" name="old_photo" value="{{$staff->photo}}">
              </div>



            <div class="form-group row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Staff Photo</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" name="new_photo" id="exampleInputUsername2" value="{{$staff->photo}}">
                      </div>
                    </div>

                    <div class="form-group row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Staff Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="exampleInputUsername2" value="{{$staff->name}}">
                      </div>
                    </div>
                    <div class="form-group row mb-3">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="exampleInputEmail2" value="{{$staff->email}}">
                      </div>
                    </div>
                    <div class="form-group row mb-3">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Phone Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail2" value="{{$staff->phone}}">
                      </div>
                    </div>

                    <div class="text-center">
                    <button type="submit" class="btn btn-success me-2">Update</button>
                    <button class="btn btn-warning">Cancel</button>
                    </div>
                  </form>            
        </div>            
        </div>



     







@endsection