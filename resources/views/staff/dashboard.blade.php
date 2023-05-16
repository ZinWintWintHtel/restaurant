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

<div class="p-5 bg-gray" style="min-height:85vh;">
        <div class="text-end me-5">
                <a href="{{route('manager.staff_create')}}">
                        <button class="btn btn-danger">Create New</button>
                </a>
        </div>

        <div class="row p-4">
       @foreach($staffs as $staff)
        <div class=" col-6">
          <div class="row bg-white mb-3 p-3 me-3">
            <div class="col-4">
                <img src="{{asset('images/'.$staff->photo)}}" alt="staff-photo" class="img img-fluid">
            </div>
            <div class="col-6 lh-1">
                <p class="fw-bold fs-5 text-lora">{{$staff->name}}</p>
                <p class=" fs-5 text-lora">{{$staff->email}}</p>
                <p class=" fs-5 text-lora">{{$staff->phone}}</p>
            </div>
            <div class="col-2 d-flex flex-column align-items-center">
            <!-- <form action="{{route('manager.staff_update_form')}}" method="get">
                
                <button type="submit" style="background-color:transparent; border:none;"><i class="bi bi-pencil-square fs-4 text-orange"></i></button>
                <input type="hidden" name="id" value="{{$staff->id}}">
                </form> -->

                <form action="{{route('manager.staff_delete')}}" method="get" onclick="confirmation(event)">
                  @csrf
                  <input type="hidden" name="id" value="{{$staff->id}}">
                  <button type="submit" style="background-color:transparent; border:none;"><i class="bi bi-trash3-fill fs-4 text-orange"></i></button>
                </form>
            
            </div>
          </div>
        </div>

        <script type="text/javascript">
                function confirmation(ev)
                {
                  var flag = confirm("Are you sure to delete?");
                  if(flag == false)
                  {
                      ev.preventDefault();
                  }
                  
                }
            </script>

            

       @endforeach
       </div>
       {{$staffs->links()}}


</div>




@endsection