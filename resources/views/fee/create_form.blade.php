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
                <a href="{{route('manager.fee')}}" class="active list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-currency-dollar me-2 fs-5"></i>Fees</a>
                

                
            
            </div>

@endsection

@section('content')
<div class="bg-light m-5 text-lora" style="height:72vh;">
        <h1 class="text-center text-warning py-3 ">Insert New Fees</h1>
        <div class="p-5">
        <form class="forms-sample" action="{{route('manager.fee_store')}}" method="post">
            @csrf


                    <div class="form-group row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label text-end fw-bold">Amount</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount"   id="exampleInputUsername2" placeholder="Enter Amount for Cancellation">
                        @error('amount')
                          <div class="text text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-5">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label text-end fw-bold">Date</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('date') is-invalid @enderror" name="date"  id="exampleInputEmail2" placeholder="Choose Date" onclick="this.type='date';">
                        @error('date')
                          <div class="text text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="text-center">
                    <button type="submit" class="btn btn-success me-2">Submit</button>
                    <a href="{{route('manager.fee')}}">
                        <button class="btn btn-warning">Cancel</button>
                    </a>
                    </div>
                  </form>            
        </div>            
        </div>

@endsection