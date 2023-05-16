@extends('manager_master')

@section('sidebar')

<div class="list-group list-group-flush my-3">
                <a href="{{ route('manager.dashboard') }}" class=" list-group-item list-group-item-action bg-transparent fw-bold" onclick="addClass(this);">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="{{route('manager.customer_feedback')}}" class="active list-group-item list-group-item-action bg-transparent  fw-bold"><i
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

<div class="bg-gray p-3" style="min-height:85vh;">
    <div class="p-3 row">
      <div class="col-lg-6 col-12">
        <h3 class="text-lora">All Customer Feedback</h3>
      </div>
      <div class="col-lg-6 col-12">
        <form action="{{route('manager.monthly_customer_feedback')}}" method="get">
                @csrf
          <div class="row text-lora">
                <div class="col-6">
                  <input type="text" onclick="this.type='month';" placeholder="Choose Month" name="month" class="form form-control p-2">
                </div>
                <div class="col-6">
                  <button type="submit" class="btn btn-success">Generate</button>
                </div>
                @if(isset($msg))
                    <div class="col-12 text-center text-lora text-danger fw-bold">
                        <span>{{ $msg }}</span>
                      </div>
                      @endif
          </div>
        </form>
      </div>
    </div>
    
    @if(isset($customer_feedbacks))
    <div class="p-3 text-lora">
    @foreach($customer_feedbacks as $customer_feedback)
        <div class="lh-1 mb-3 bg-white  p-3 border border-secondary-subtle shadow">
        <p class="text-center">
        @for ($i = 0; $i < $customer_feedback->rating; $i++)
            <i class="bi bi-star-fill text-orange"></i>
        @endfor
        @for ($i = 0; $i < 5 - $customer_feedback->rating; $i++)
            <i class="bi bi-star text-orange"></i>
        @endfor
        </p>
        <p class="px-5">
            {{$customer_feedback->review}}
        </p>
        <p class="fw-bold fs-5 text-center">
           {{ $customer_feedback->user->name}}
        </p>
        <p class="text-center">{{$customer_feedback->date}}</p>
        </div>
    @endforeach
    </div>
  {{$customer_feedbacks->links()}}

    @endif

    @if(isset($monthly_feedbacks))
    <div class="p-3 text-lora">
    @foreach($monthly_feedbacks as $monthly_feedback)
        <div class="lh-1 mb-3 bg-white  p-3 border border-secondary-subtle shadow">
        <p class="text-center">
        @for ($i = 0; $i < $monthly_feedback->rating; $i++)
            <i class="bi bi-star-fill text-orange"></i>
        @endfor
        @for ($i = 0; $i < 5 - $monthly_feedback->rating; $i++)
            <i class="bi bi-star text-orange"></i>
        @endfor
        </p>
        <p class="px-5">
            {{$monthly_feedback->review}}
        </p>
        <p class="fw-bold fs-5 text-center">
           {{ $monthly_feedback->user->name}}
        </p>
        <p class="text-center">{{$monthly_feedback->date}}</p>
        </div>
    @endforeach
    </div>
    {{$monthly_feedbacks->links()}}

    @endif


</div>

@endsection