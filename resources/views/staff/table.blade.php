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

<div class="text-end me-5">
                <a href="{{route('staff.table_create')}}">
                        <button class="btn btn-danger">Create New</button>
                </a>
</div>

<div class="table-responsive px-5 ">
                    <table class="table table-striped bg-white mt-4 text-lora">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Table Name</th>
                          <th>Max Capacity</th>
                          <th class="ps-3">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <span style="display:none;">{{$no = 1;}}</span>
                        @foreach($tables as $table)
                          <tr>
                           <td>{{$no}}</td>
                           <td>{{$table->table_name}}</td>
                           <td class="ps-5">{{$table->max_capacity}}</td>
                           <td class="">

                           <div class="d-flex">
                           <form action="{{route('staff.table_show')}}" method="get">
                           @csrf
                           <input type="hidden" name="id" value="{{$table->id}}">
                             <button type="submit" style="background-color:transparent; border:none;">
                             <i class="bi bi-pencil-square text-warning fs-4 fw-bold me-2"></i>
                             </button>
                           </form>

                           <form action="{{route('staff.table_delete')}}"  method="get" onclick="confirmation(event)">
                           @csrf
                           <input type="hidden" name="id" value="{{$table->id}}">
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
                    {{$tables->links()}}
                    
                    <!-- <div class="pagination-wrap text-lora">
                      <nav aria-label="Page Navigation example">
                          <ul class="pagination">
                            <li class="page-item">
                              <a href="" class="page-link" ><i class="bi bi-arrow-left-circle-fill"></i></a>
                            </li>
                            <li class="page-item active">
                              <a href="" class="page-link" >1</a>
                            </li>
                            <li class="page-item">
                              <a href="" class="page-link" >2</a>
                            </li>
                            <li class="page-item">
                              <a href="" class="page-link" >3</a>
                            </li>
                            <li class="page-item">
                              <a href="" class="page-link" ><i class="bi bi-arrow-right-circle-fill"></i></a>
                            </li>
                          </ul>
                        </nav>    
                    </div> -->
</div>


@endsection