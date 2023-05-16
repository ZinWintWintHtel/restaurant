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
                <a href="{{route('staff.reservation_index')}}" class="active list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-bookmark-check me-2 fs-5 fw-bold"></i>
                                  Reservation</a>
                
            
            </div>

@endsection

@section('content')

<div class="row ps-5 py-5 mx-4  bg-white text-lora" >


<div class="row mb-5">
    <h3 class="text-warning fw-bold">
            Payment Screenshot
            <form action="{{route('staff.payment_confirm_edit')}}" method="get" style="display:inline-block;">
            @csrf
              <input type="hidden" name="id" value="{{$payment->id}}">
              <button type="submit" style="background-color:transparent; border:none; "><i class="bi bi-pen-fill fs-5 text-warning"></i></button>
            </form>
    </h3>
</div>

<div class="row">
<div class="col-lg-6 col-12">
<div class="row fs-5 mb-3">
        <div class="col-lg-5 col-12">Payment Method</div>
        <div class="col-lg-7 col-12"><span class="me-2">:</span>{{$payment->payment_method->method_name}}</div>
    </div>
    <div class="row fs-5 mb-3">
        <div class="col-lg-5 col-12">Payment Date</div>
        <div class="col-lg-7 col-12"><span class="me-2">:</span>{{$payment->date}}</div>
    </div>
@if($payment_confirm == NULL)
<div class="row fs-5 mb-3">
        <div class="col-lg-5 col-12">Payment confirm</div>
        <div class="col-lg-7 col-12"><button class="btn btn-warning">Pending</button></div>
</div>

@else
@if($payment_confirm->is_confirm == 1)
<div class="row fs-5 mb-3">
    <div class="col-lg-5 col-12">Payment Confirm</div>
    <div class="col-lg-7 col-12"><span class="me-2">:</span>Confirmed by {{$payment_confirm->staff->name}}</div>
</div>
<div class="row fs-5 mb-3">
    <div class="col-lg-5 col-12">Confirm Date</div>
    <div class="col-lg-7 col-12"><span class="me-2">:</span>{{$payment_confirm->confirm_date}}</div>
</div>
@else
<div class="row fs-5 mb-3">
    <div class="col-lg-5 col-12">Payment Confirm</div>
    <div class="col-lg-7 col-12"><span class="me-2">:</span>Denied by {{$payment_confirm->staff->name}}</div>
</div>
<div class="row fs-5 mb-3">
    <div class="col-lg-5 col-12">Confirm Date</div>
    <div class="col-lg-7 col-12"><span class="me-2">:</span>{{$payment_confirm->confirm_date}}</div>
</div>
@endif
@endif
</div>



<div class="col-lg-6 col-12">
    <img src="{{asset('images/'.$payment->payment_screenshot)}}" alt="payment-screenshot-photo" style="width:40%; height:auto;">
</div>
</div>

<div class="row mb-5">
            <form action="{{route('staff.reservation_details')}}" method="get">
            @csrf
              <input type="hidden" name="id" value="{{$payment->reservation->id}}">
              <button type="submit" class="btn btn-dark">Back</button>
            </form>
</div>
      
</div>


@endsection