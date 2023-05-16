@extends('manager_master')

@section('sidebar')

<div class="list-group list-group-flush my-3">
                <a href="{{ route('manager.dashboard') }}" class="active list-group-item list-group-item-action bg-transparent fw-bold" onclick="addClass(this);">
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
                <a href="{{route('manager.fee')}}" class=" list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-currency-dollar me-2 fs-5"></i>Fees</a>
                
            
            </div>

@endsection

@section('content')

<div class="container-fluid p-5 mt-1 text-lora bg-gray" style="min-height:85vh;">
                <div class="row g-3 ">
                    <div class="col-md-3">
                        <div class="p-3 secondary-bg shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">{{$reservation_count}}</h3>
                                <p class="fs-5">Reservations</p>
                            </div>
                            <i class="bi bi-bookmark-star-fill fs-1 second-text border rounded-full primary-bg p-3"></i>
                            <!-- <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i> -->
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 secondary-bg shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">{{$customer_count}}</h3>
                                <p class="fs-5">Customers</p>
                            </div>
                            <i class="bi bi-person-fill-check fs-1 second-text border rounded-full primary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 secondary-bg shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">{{$staff_count}}</h3>
                                <p class="fs-5">Staffs</p>
                            </div>
                            <i class="bi bi-people-fill fs-1 second-text border rounded-full primary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 secondary-bg shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">{{$table_count}}</h3>
                                <p class="fs-5">Tables</p>
                            </div>
                            <i class="bi bi-box-seam-fill fs-1 primary-text border rounded-full primary-bg p-3"></i>
                        </div>
                    </div>
                </div>




                <form action="{{route('manager.monthly_guest_count_report')}}" method="get">
                <div class="row my-5">
                    <div class="col-lg-4 col-12">
                        <h4 class="text-orange">Monthly Customer Number Report</h4>
                    </div>
                        @csrf
                    <div class="col-lg-3 col-4">
                        <input type="text" placeholder="Start Month" id="start_month" onclick="this.type='month';" name="start_month" class="form form-control p-2">
                    </div>

                    <div class="col-lg-3 col-4">
                        <input type="text" placeholder="End Month" id="end_month" onclick="this.type='month';" name="end_month" class="form form-control p-2">
                    </div>
                    <div class="col-lg-2 col-4">
                        <button type="submit" class="btn btn-success" onclick="validateMonthRange(event);">Generate</button>
                    </div>
                    
                    @if(isset($monthly_customer))
                    <div class="col-12 text-center text-lora text-danger fw-bold">
                        <span>{{ $monthly_customer }}</span>
                      </div>
                      @endif             
                </div>


<script>
function validateMonthRange(event) {
    // Get the value of the start date and end date input elements
    var startMonth = document.getElementById("start_month").value;
    var endMonth = document.getElementById("end_month").value;

    // Convert the date strings to Date objects
    var start = new Date(startMonth);
    var end = new Date(endMonth);

    // Compare the dates
    if (end < start) {
        // If the end date is less than the start date, prevent the form from being submitted
        event.preventDefault();
        alert("End Month cannot be less than start month.");
    }
}
</script>




                </form>

                @if(isset($default_monthly_guests))
                <div class="d-flex justify-content-between">
                    <div class="w-100 me-3 bg-white rounded shadow-sm px-5 py-3">
                    <h5 class="text-success">Monthly Guest Number Report for 2023</h5>
                    <table class="table    table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Month</th>
                                    <th scope="col">Total Guests</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <span style="display:none;">{{$no = 1;}}</span>
                                @foreach($default_monthly_guests as $default_monthly_guest)
                                <tr>
                                    
                                    <th scope="row">{{$no}}</th>
                                    <td>{{$default_monthly_guest->month}}</td>
                                    <td class="ps-5">{{$default_monthly_guest->total_guests}}</td>
                                    <span style="display:none;">{{$no += 1;}}</span>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="w-100 rounded bg-white shadow">
                        <canvas id="defaultMonthlyCustomerReport"></canvas>
                    </div>
                </div>


                <script>
                // Initialize the chart object
        var ctx = document.getElementById('defaultMonthlyCustomerReport').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach($default_monthly_guests as $default_monthly_guest)
                    '{{ $default_monthly_guest->month }}',
                @endforeach
            ],
            datasets: [{
                label: 'Monthly Customer Report',
                data: [
                    @foreach($default_monthly_guests as $default_monthly_guest)
                        {{ $default_monthly_guest->total_guests }},
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
            </script>

                @endif



                @if(isset($monthly_guests))
                <div class="d-flex justify-content-between">
                    <div class="w-100 me-3 bg-white rounded shadow-sm px-5 py-3">
                    <h5 class="text-success">Monthly Guest Number Report by chosen date</h5>
                    <table class="table  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Month</th>
                                    <th scope="col">Total Guests</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <span style="display:none;">{{$no = 1;}}</span>
                                @foreach($monthly_guests as $monthly_guest)
                                <tr>
                                    
                                    <th scope="row">{{$no}}</th>
                                    <td>{{$monthly_guest->month}}</td>
                                    <td class="ps-5">{{$monthly_guest->total_guests}}</td>
                                    <span style="display:none;">{{$no += 1;}}</span>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="w-100 rounded bg-white shadow">
                        <canvas id="monthlyCustomerReport"></canvas>
                    </div>
                </div>


                <script>
                // Initialize the chart object
        var ctx = document.getElementById('monthlyCustomerReport').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach($monthly_guests as $monthly_guest)
                    '{{ $monthly_guest->month }}',
                @endforeach
            ],
            datasets: [{
                label: 'Monthly Customer Report',
                data: [
                    @foreach($monthly_guests as $monthly_guest)
                        {{ $monthly_guest->total_guests }},
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
            </script>

                @endif


                <form action="{{route('manager.reservation_count_report')}}" method="get">
                <div class="row my-5">
                    <div class="col-lg-4 col-12">
                        <h4 class="text-orange">Number of Reservations</h4>
                    </div>
                        @csrf
                    <div class="col-lg-3 col-4">
                        <input type="text" placeholder="Start Date" id="start_date" onclick="this.type='date';" name="start_date" class="form form-control p-2">
                    </div>
                    <div class="col-lg-3 col-4">
                        <input type="text" placeholder="End Date" id="end_date" onclick="this.type='date';" name="end_date" class="form form-control p-2">
                    </div>
                    <div class="col-lg-2 col-4">
                        <button type="submit" class="btn btn-success" onclick="validateDateRange(event)">Generate</button>
                    </div>
                    @if(isset($reservation_msg))
                    <div class="col-12 text-center text-lora text-danger fw-bold">
                        <span>{{ $reservation_msg }}</span>
                      </div>
                      @endif               
                </div>

                <script>
function validateDateRange(event) {
    // Get the value of the start date and end date input elements
    var startDate = document.getElementById("start_date").value;
    var endDate = document.getElementById("end_date").value;

    // Convert the date strings to Date objects
    var start = new Date(startDate);
    var end = new Date(endDate);

    // Compare the dates
    if (end < start) {
        // If the end date is less than the start date, prevent the form from being submitted
        event.preventDefault();
        alert("End date cannot be less than start date.");
    }
}
</script>





                </form>

                @if(isset($default_reservations))
                <div class="d-flex justify-content-between">
                    <div class="w-100 me-3 bg-white rounded shadow-sm px-5 py-3">
                    <h5 class="text-success">Number of Reservation for 2023</h5>
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <span style="display:none;">{{$no = 1;}}</span>
                                @foreach($default_reservations as $default_reservation)
                                <tr>
                                    
                                    <th scope="row">{{$no}}</th>
                                    <td>{{$default_reservation->reservation_date}}</td>
                                    <td class="ps-5">{{$default_reservation->reservation_count}}</td>
                                    <span style="display:none;">{{$no += 1;}}</span>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="w-100 rounded bg-white shadow">
                        <canvas id="defaultReservationCountChart"></canvas>
                    </div>
                </div>


                <script>
                // Initialize the chart object
        var ctx = document.getElementById('defaultReservationCountChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach($default_reservations as $default_reservation)
                    '{{ $default_reservation->reservation_date }}',
                @endforeach
            ],
            datasets: [{
                label: 'Number of Reservation',
                data: [
                    @foreach($default_reservations as $default_reservation)
                        {{ $default_reservation->reservation_count }},
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
            </script>

                @endif


                
                @if(isset($reservations))
                <div class="d-flex justify-content-between">
                    <div class="w-100 me-3 bg-white rounded shadow-sm px-5 py-3">
                    <h5 class="text-success">Number of Reservation by chosen date</h5>
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <span style="display:none;">{{$no = 1;}}</span>
                                @foreach($reservations as $reservation)
                                <tr>
                                    
                                    <th scope="row">{{$no}}</th>
                                    <td>{{$reservation->reservation_date}}</td>
                                    <td class="ps-5">{{$reservation->reservation_count}}</td>
                                    <span style="display:none;">{{$no += 1;}}</span>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="w-100 rounded bg-white shadow">
                        <canvas id="reservationCountChart"></canvas>
                    </div>
                </div>


                <script>
                // Initialize the chart object
        var ctx = document.getElementById('reservationCountChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach($reservations as $reservation)
                    '{{ $reservation->reservation_date }}',
                @endforeach
            ],
            datasets: [{
                label: 'Number of Reservation',
                data: [
                    @foreach($reservations as $reservation)
                        {{ $reservation->reservation_count }},
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
            </script>

                @endif


                <form action="{{route('manager.reservation_guest_count_report')}}" method="get">
                <div class="row my-5">
                    <div class="col-lg-4 col-12">
                        <h4 class="text-orange">Reservations By Guest Number</h4>
                    </div>
                        @csrf
                    <div class="col-lg-3 col-4">
                        <input type="text" placeholder="Start Date" id="start" onclick="this.type='date';" name="start_date" class="form form-control p-2">
                    </div>
                    <div class="col-lg-3 col-4">
                        <input type="text" placeholder="End Date" id="end" onclick="this.type='date';" name="end_date" class="form form-control p-2">
                    </div>
                    <div class="col-lg-2 col-4">
                        <button type="submit" class="btn btn-success" onclick="validateRange(event)">Generate</button>
                    </div>
                    @if(isset($guest_msg))
                    <div class="col-12 text-center text-lora text-danger fw-bold">
                        <span>{{ $guest_msg }}</span>
                      </div>
                      @endif              
                </div>
                <script>
function validateRange(event) {
    // Get the value of the start date and end date input elements
    var startDate = document.getElementById("start").value;
    var endDate = document.getElementById("end").value;

    // Convert the date strings to Date objects
    var start = new Date(startDate);
    var end = new Date(endDate);

    // Compare the dates
    if (end < start) {
        // If the end date is less than the start date, prevent the form from being submitted
        event.preventDefault();
        alert("End date cannot be less than start date.");
    }
}
</script>



                </form>


                @if(isset($default_guest_reservations))

                <div class="d-flex justify-content-between">
                    <div class="w-100 me-3 bg-white rounded shadow-sm px-5 py-3">
                    <h5 class="text-success">Number of Reservation by Guests Report for 2023</h5>
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Guest Number</th>
                                    <th scope="col">Reservation Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <span style="display:none;">{{$no = 1;}}</span>
                                @foreach($default_guest_reservations as $default_guest_reservation)
                                <tr>
                                    
                                    <th scope="row">{{$no}}</th>
                                    <td>{{$default_guest_reservation->guest_number}}</td>
                                    <td class="ps-5">{{$default_guest_reservation->reservations}}</td>
                                    <span style="display:none;">{{$no += 1;}}</span>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="w-100 rounded bg-white shadow">
                        <canvas id="defaultGuestReservationCountChart" class="p-5"></canvas>
                    </div>
                </div>

                <?php
$data = [];
foreach ($default_guest_reservations as $default_guest_reservation) {
    $data[$default_guest_reservation->guest_number] = $default_guest_reservation->reservations;
}

                ?>

<script>
var data = @json($data);
var labels = Object.keys(data);
var values = Object.values(data);

var ctx = document.getElementById('defaultGuestReservationCountChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            label: 'Reservations by Guest Number',
            data: values,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>




                @endif


                      

                @if(isset($guest_reservations))

                <div class="d-flex justify-content-between">
                    <div class="w-100 me-3 bg-white rounded shadow-sm px-5 py-3">
                    <h5 class="text-success">Number of Reservation by Guests Report for chosen date</h5>
                    <table class="table   table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Guest Number</th>
                                    <th scope="col">Reservation Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <span style="display:none;">{{$no = 1;}}</span>
                                @foreach($guest_reservations as $guest_reservation)
                                <tr>
                                    
                                    <th scope="row">{{$no}}</th>
                                    <td>{{$guest_reservation->guest_number}}</td>
                                    <td class="ps-5">{{$guest_reservation->reservations}}</td>
                                    <span style="display:none;">{{$no += 1;}}</span>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="w-100 rounded bg-white shadow">
                        <canvas id="guestReservationCountChart" class="p-5"></canvas>
                    </div>
                </div>

                <?php
$data = [];
foreach ($guest_reservations as $guest_reservation) {
    $data[$guest_reservation->guest_number] = $guest_reservation->reservations;
}

                ?>

<script>
var data = @json($data);
var labels = Object.keys(data);
var values = Object.values(data);

var ctx = document.getElementById('guestReservationCountChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            label: 'Reservations by Guest Number',
            data: values,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>




                @endif



            </div>

            

@endsection