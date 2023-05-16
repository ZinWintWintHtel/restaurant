@extends('manager_master')

@section('sidebar')

<div class="list-group list-group-flush my-3">
                <a href="{{ route('manager.dashboard') }}" class=" list-group-item list-group-item-action bg-transparent fw-bold" onclick="addClass(this);">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('manager.customer_feedback')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Customer Feedback</a>
                <a href="{{route('manager.info')}}" class=" list-group-item list-group-item-action bg-transparent  fw-bold" ><i
                        class="fas fa-project-diagram me-2"></i>Information</a>
                <a href="{{route('manager.staff')}}" class=" list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-people-fill me-2 fs-5"></i>
                Staff</a>
                <a href="{{route('manager.paymentmethod')}}" class="active list-group-item list-group-item-action bg-transparent  fw-bold" ><i
                        class="fas fa-paperclip me-2"></i>Payment Methods</a>
                <a href="{{route('manager.fee')}}" class=" list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-currency-dollar me-2 fs-5"></i>Fees</a>
                
            
            </div>

@endsection

@section('content')

<div class="bg-light m-5 text-lora">
        <h1 class="text-center text-warning py-3">Update Payment Method</h1>
        <div class="px-5 pb-3">
        <form class="forms-sample" action="{{route('manager.paymentmethod_update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$payment_method->id}}">
            <div class="row mb-3">
                <div class="text-center">
                    <img src="{{asset('images/'.$payment_method->method_image)}}" alt="payment-method-image" style="width:200px; height:200px;">
                    <input type="hidden" name="old_method_image" value="{{$payment_method->method_image}}"> 
                </div>                    
            </div>

            <div class="form-group row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Payment Method Logo</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control @error('title') is-invalid @enderror" name="new_method_image" id="exampleInputUsername2" >
                        @error('new_method_image')
                          <div class="text text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Payment Method Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('method_name') is-invalid @enderror" value="{{$payment_method->method_name}}" name="method_name" id="exampleInputUsername2" placeholder="Enter Payment Method Name">
                        @error('method_name')
                          <div class="text text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-3">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Account Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('account_name') is-invalid @enderror" name="account_name" value="{{$payment_method->account_name}}" id="exampleInputEmail2" placeholder="Enter Account Name">
                        @error('account_name')
                          <div class="text text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-3">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Account Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('account_number') is-invalid @enderror" value="{{$payment_method->account_number}}" name="account_number" id="exampleInputEmail2" placeholder="Enter Account Number">
                        @error('account_number')
                          <div class="text text-danger">{{ $message }}</div>
                        @enderror
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