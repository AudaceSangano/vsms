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
                    <th>Email</th>
                    <th>Car</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Pick-up</th>
                    <th>Drop-off</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $cnt = 0;
                    @endphp
                    @foreach ($users as $user)
                    @php
                        $cnt++;
                    @endphp
                    <tr class="row-selectable">
                        <td> #{{$cnt}} </td>
                        <td class="fw-bold">{{$user->name}}</td>
                        <td class="fw-bold">{{$user->email}}</td>
                        @php
                            $car = DB::table('car_assignment_employees')
                            ->join('users', 'users.id', 'car_assignment_employees.employee_id')
                            ->join('cars', 'cars.car_id', 'car_assignment_employees.car_id')
                            ->where('employee_id', $user->id)
                            ->first();
                        @endphp
                        <td class="fw-bold">{{$car?$car->car_registration_number:"N/A"}}</td>
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
                    </tr>
                    @endforeach
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
