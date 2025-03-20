@extends('includes.main')
@section('body_content')
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
      <div class="container-fluid">
        <div class="row g-3 mb-3 align-items-center">
          <div class="col">
            <ol class="breadcrumb bg-transparent mb-0">
              <li class="breadcrumb-item"><a class="text-secondary" href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Students</li>
            </ol>
          </div>
        </div> <!-- .row end -->
      </div>
    </div>
    <!-- start: page body -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
      <div class="container-fluid">
        <div class="row g-3">
          <div class="col-12">
            <!-- invoices: all -->
            <div class="card fieldset border border-muted">
              <span class="fieldset-tile text-muted bg-body">All Department:</span>
              <table id="driver_list" class="table card-table align-middle mb-0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Pick-Up Time</th>
                    <th>Drop-Off Time</th>
                    <th>Car</th>
                    @if (config('role') != 'driver')
                    <th class="text-center">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                    @php
                        $cnt = 0;
                    @endphp
                    @if ($users)
                    @foreach ($users as $user)
                    @php
                        $cnt++;
                    @endphp
                    <tr class="row-selectable">
                        <td> #{{$cnt}} </td>
                        <td class="fw-bold">{{$user->name}}</td>
                        <td class="fw-bold">{{$user->phone}}</td>
                        <td class="fw-bold">{{$user->gender}}</td>
                        <td>{{$user->is_active=='1'?'Active':'Inactive'}}</td>

                        @php
                            $pickup = null;
                            $dropoff = null;
                            $schedule = DB::table('employee_schedules')->where('employee_id', $user->id)->first();
                        @endphp
                        @if ($schedule)
                        @php
                            $pickup = $schedule->pickup_time;
                            $dropoff = $schedule->dropoff_time;
                        @endphp
                        <td>{{$schedule->pickup_time}}</td>
                        <td>{{$schedule->dropoff_time}}</td>
                        @else
                        <td>N/A</td>
                        <td>N/A</td>
                        @endif
                        @php
                            $car = DB::table('car_assignment_employees')
                                        ->join('cars', 'cars.car_id', 'car_assignment_employees.car_id')
                                        ->select('cars.car_registration_number', 'cars.car_id')
                                        ->where('employee_id', $user->id)->first();
                            $driver = $car ? DB::table('car_assignment_drivers')->join('users', 'users.id', 'car_assignment_drivers.driver_id')->where('car_assignment_drivers.car_id', $car->car_id)->first():false;
                        @endphp
                        <td>{{$car ? $car->car_registration_number : 'N/A'}} | {{$driver ? $driver->name."(".$driver->phone.")" : 'No Driver'}}</td>
                        @if (config('role') != 'driver')
                        <td class="text-center">
                        <button
                        type="button"
                        class="btn btn-link btn-sm color-success"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        onclick="editSchedule('{{ $user->id }}', '{{ $pickup }}', '{{ $dropoff }}')"
                        title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" class="bi bi-sliders2-vertical" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M0 10.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1H3V1.5a.5.5 0 0 0-1 0V10H.5a.5.5 0 0 0-.5.5M2.5 12a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 1 0v-2a.5.5 0 0 0-.5-.5m3-6.5A.5.5 0 0 0 6 6h1.5v8.5a.5.5 0 0 0 1 0V6H10a.5.5 0 0 0 0-1H6a.5.5 0 0 0-.5.5M8 1a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 1 0v-2A.5.5 0 0 0 8 1m3 9.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1H14V1.5a.5.5 0 0 0-1 0V10h-1.5a.5.5 0 0 0-.5.5m2.5 1.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 1 0v-2a.5.5 0 0 0-.5-.5"/>
                          </svg> Change Time</button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    @endif
                </tbody>
              </table>
            </div>
            <!-- Plugin Js -->
            <script src="./assets/js/bundle/dataTables.bundle.js"></script>
            <!-- Jquery Page Js -->
            <script>
              $(document).ready(function() {
                $('#invoice_list').addClass('nowrap').dataTable({
                  responsive: true,
                  searching: false,
                  paging: false,
                  ordering: true,
                  info: false,
                });
                $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                  $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();
                });
              });
            </script>
          </div>
        </div> <!-- .row end -->
      </div>
    </div>
@endsection
