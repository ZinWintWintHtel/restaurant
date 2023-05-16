@extends('staff_master')

@section('sidebar')

<div class="list-group list-group-flush my-3">
                <a href="{{ route('staff.dashboard') }}" class=" list-group-item list-group-item-action bg-transparent fw-bold" onclick="addClass(this);">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="{{route('staff.view_customers')}}" class=" list-group-item list-group-item-action bg-transparent  fw-bold" >
                    <i class="bi bi-people-fill me-2 fs-5"></i>
                    Customers</a>
                <a href="{{route('staff.table_index')}}" class="active list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-box-seam me-2 fs-5 fw-bold"></i>
                                   Tables</a>
                <a href="{{route('staff.reservation_index')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-bookmark-check me-2 fs-5 fw-bold"></i>
                                  Reservation</a>
                
            
            </div>

@endsection

@section('content')

<div class="bg-light m-5 text-lora">
        <h1 class="text-center text-warning py-3 ">Insert New Table</h1>
        <div class="p-5">
        <form class="forms-sample" action="{{route('staff.table_store')}}" method="post" >
            @csrf
                    <div class="form-group row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label text-end">Table Name *</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('table_name') is-invalid @enderror" name="table_name" id="exampleInputUsername2" placeholder="Enter Table Name">
                        @error('table_name')
    <p class="text text-danger">{{ $message }}</p>
@enderror
                      </div>
                    </div>
                    <div class="form-group row mb-3">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label text-end">Max Capacity *</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control @error('max_capacity') is-invalid @enderror" name="max_capacity" id="exampleInputEmail2" placeholder="Enter no of seats">
                        @error('max_capacity')
    <p class="text text-danger">{{ $message }}</p>
@enderror
                      </div>
                    </div>

                    <div class="text-center">
                    <button type="submit" class="btn btn-success me-2">Submit</button>
                    <!-- <a href="{{route('staff.table_index')}}">
                    <button type="submit" class="btn btn-warning">Cancel</button>
                    </a> -->
                    </div>
                  </form>            
        </div>            
        </div>


@endsection