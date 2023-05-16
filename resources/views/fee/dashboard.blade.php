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
<div class="text-end me-5">
                <a href="{{route('manager.fee_create')}}">
                        <button class="btn btn-danger">Create New</button>
                </a>
</div>

<div class="table-responsive px-5 ">
                    <table class="table table-striped bg-white mt-4 text-lora">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <span style="display:none;">{{$no = 1;}}</span>
                        @foreach($fees as $fee)
                          <tr>
                           <td>{{$no}}</td>
                           <td>{{$fee->amount}}</td>
                           <td class="ps-5">{{$fee->date}}</td>
                           <td class="">

                           <div class="d-flex">
                           <form action="{{route('manager.fee_show')}}" method="get">
                           @csrf
                           <input type="hidden" name="id" value="{{$fee->id}}">
                             <button type="submit" style="background-color:transparent; border:none;">
                             <i class="bi bi-pencil-square text-warning fs-4 fw-bold me-2"></i>
                             </button>
                           </form>

                           <form action="{{route('manager.fee_delete')}}"  method="get" onclick="confirmation(event)">
                           @csrf
                           <input type="hidden" name="id" value="{{$fee->id}}">
                             <button type="submit" style="background-color:transparent; border:none;">
                             <i class="bi bi-trash3-fill text-danger fs-4 fw-bold"></i>
                             </button>
                           </form>
                           </div>


                           </td>
                           <span style="display:none;">{{$no += 1;}}</span>
                          </tr>

                        @endforeach
                        
                      </tbody>


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
                     
                    </table>
                    {{$fees->links()}}
</div>

@endsection