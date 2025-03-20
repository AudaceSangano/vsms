@extends('includes.main')
@section('body_content')
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
      <div class="container-fluid">
        <div class="row g-3 mb-3 align-items-center">
          <div class="col">
            <ol class="breadcrumb bg-transparent mb-0">
              <li class="breadcrumb-item"><a class="text-secondary" href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
        </div> <!-- .row end -->
      </div>
    </div>

    <!-- start: page body -->
    @if ( config('role') == 'admin' || config('role') == 'supervisor')
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
      <div class="container-fluid">
        <div class="row g-3 mb-5 row-deck">
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-body d-flex align-items-center">
                <div class="avatar lg rounded-circle no-thumbnail">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16">
                    <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0m10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17s2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276"/>
                    <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.8.8 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155s4.037-.084 5.592-.155A1.48 1.48 0 0 0 15 9.611v-.413q0-.148-.03-.294l-.335-1.68a.8.8 0 0 0-.43-.563 1.8 1.8 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3z"/>
                    </svg>
                </div>
                <div class="flex-fill ms-3">
                  <div class="h5 mb-1">CARS</div>
                  <div class="text-muted small">Total : {{ $totalCar }}</div>
                  <div class="small">Active : {{ $activeCar }}</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-body d-flex align-items-center">
                <div class="avatar lg rounded-circle no-thumbnail">
                  <svg class="avatar" viewBox="0 0 512 512">
                    <path class="fill-muted" d="M121,68.5H45c-8.291,0-15,6.709-15,15s6.709,15,15,15h76c8.291,0,15-6.709,15-15S129.291,68.5,121,68.5z" />
                    <path class="fill-muted" d="M121,188.5H45c-8.291,0-15,6.709-15,15s6.709,15,15,15h76c8.291,0,15-6.709,15-15S129.291,188.5,121,188.5z" />
                    <path class="fill-muted" d="M91,128.5H15c-8.291,0-15,6.709-15,15s6.709,15,15,15h76c8.291,0,15-6.709,15-15S99.291,128.5,91,128.5z" />
                    <path class="fill-primary" d="M482,203.5h-91v-60c0-26.346-32.229-40.218-51.22-21.202L219.789,242.289c-11.719,11.719-11.719,30.703,0,42.422    l68.789,68.789l-83.789,83.789c-11.719,11.719-11.719,30.703,0,42.422c11.718,11.718,30.703,11.719,42.422,0l105-105    c11.719-11.719,11.719-30.703,0-42.422L283.422,263.5L331,215.922V233.5c0,16.567,13.433,30,30,30h121c16.567,0,30-13.433,30-30    S498.567,203.5,482,203.5z" />
                    <path class="fill-primary" d="M280.14,51.04c-11.924-7.925-27.744-6.357-37.852,3.75l-82.5,82.5c-11.719,11.719-11.719,30.703,0,42.422    s30.704,11.718,42.423-0.001l65.112-65.112l21.934,15.8l29.306-29.306c4.902-4.902,10.684-8.707,17.007-11.678L280.14,51.04z" />
                    <path class="fill-primary" d="M198.578,305.922c-7.601-7.601-12.675-16.956-15.35-27.072L24.789,437.289c-11.719,11.719-11.719,30.703,0,42.422    c11.718,11.718,30.703,11.719,42.422,0l152.578-152.578L198.578,305.922z" />
                    <circle class="fill-primary" cx="406" cy="68.5" r="45" />
                  </svg>
                </div>
                <div class="flex-fill ms-3">
                  <div class="h5 mb-1">USERS</div>
                  <div class="text-muted small">System user: {{ $totalUsers }}</div>
                  <div class="small">Active user: {{ $activeUsers }}</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-body d-flex align-items-center">
                <div class="avatar lg rounded-circle no-thumbnail">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                        <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z"/>
                    </svg>
                </div>
                <div class="flex-fill ms-3">
                  <div class="h5 mb-1">{{ $totalActiveDriver }}</div>
                  <div class="text-muted small">Drivers</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="card">
              <div class="card-body d-flex align-items-center">
                <div class="avatar lg rounded-circle no-thumbnail">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                        <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022M6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z"/>
                        <path d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z"/>
                    </svg>
                </div>
                <div class="flex-fill ms-3">
                  <div class="h5 mb-1">Pick-up</div>
                  <div class="text-muted small">Expected :{{ $pickUp }}</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="card">
              <div class="card-body d-flex align-items-center">
                <div class="avatar lg rounded-circle no-thumbnail">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" class="bi bi-houses" viewBox="0 0 16 16">
                        <path d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207z"/>
                      </svg>
                </div>
                <div class="flex-fill ms-3">
                    <div class="h5 mb-1">Drop-off</div>
                    <div class="text-muted small">Expected : {{ $dropOff }}</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title mb-0">Workout Statistic</h6>
              </div>
              <div class="card-body">
                <div class="apexcharts-canvas" id="apex-WorkoutStatistic"></div>
              </div>
            </div> <!-- .card end -->
          </div>
          <div class="col-xl-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title mb-0">Workout Statistic</h6>
              </div>
              <div class="card-body">
                <table id="invoice_list" class="table card-table align-middle mb-0">
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
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $cnt = 0;
                        @endphp
                        @foreach ($schedules as $user)
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div> <!-- .card end -->
          </div>
        </div> <!-- .row end -->
      </div>
    </div>
    @elseif (config('role') == 'employee')
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
      <div class="container-fluid">
        <div class="row g-3 mb-5 row-deck">
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-body d-flex align-items-center">
                <div class="avatar lg rounded-circle no-thumbnail">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16">
                    <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0m10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17s2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276"/>
                    <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.8.8 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155s4.037-.084 5.592-.155A1.48 1.48 0 0 0 15 9.611v-.413q0-.148-.03-.294l-.335-1.68a.8.8 0 0 0-.43-.563 1.8 1.8 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3z"/>
                    </svg>
                </div>
                <div class="flex-fill ms-3">
                  <div class="h5 mb-1">MY CAR</div>
                  <div class="h4 text-muted small">{{ $myCar }}</div>
                  <div class="h4 text-muted small">{{ $myDriver }} | {{ $driverContact }}</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-body d-flex align-items-center">
                <div class="avatar lg rounded-circle no-thumbnail">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                      </svg>
                </div>
                <div class="flex-fill ms-3">
                  <div class="h5 mb-1">MY LOCATION</div>
                  <div class="text-muted small">{{ $myAddress }}</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-body d-flex align-items-center">
                <div class="avatar lg rounded-circle no-thumbnail">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" class="bi bi-calendar2-date" viewBox="0 0 16 16">
                        <path d="M6.445 12.688V7.354h-.633A13 13 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"/>
                        <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z"/>
                      </svg>
                </div>
                <div class="flex-fill ms-3">
                  <div class="h5 mb-1">Schedule</div>
                  <div class="text-muted small">Pick-up : {{ $pickupTime }}</div>
                  <div class="text-muted small">Drop-off : {{ $dropoffTime }}</div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- .row end -->
      </div>
    </div>
    @elseif (config('role') == 'driver')
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
      <div class="container-fluid">
        <div class="row g-3 mb-5 row-deck">
          <div class="col-lg-6 col-md-6">
            <div class="card">
              <div class="card-body d-flex align-items-center">
                <div class="avatar lg rounded-circle no-thumbnail">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16">
                    <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0m10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17s2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276"/>
                    <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.8.8 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155s4.037-.084 5.592-.155A1.48 1.48 0 0 0 15 9.611v-.413q0-.148-.03-.294l-.335-1.68a.8.8 0 0 0-.43-.563 1.8 1.8 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3z"/>
                    </svg>
                </div>
                <div class="flex-fill ms-3">
                  <div class="h5 mb-1">{{ $myCar }}</div>
                  <div class="h4 text-muted small">MY CAR</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="card">
              <div class="card-body d-flex align-items-center">
                <div class="avatar lg rounded-circle no-thumbnail">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                      </svg>
                </div>
                <div class="flex-fill ms-3">
                  <div class="h5 mb-1">Assigned Employees</div>
                  <div class="text-muted small">Pick-up : {{ $pickUp }}</div>
                  <div class="text-muted small">Drop-off : {{ $dropOff }}</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title mb-0">Work Statistic</h6>
              </div>
              <div class="card-body">
                <table id="invoice_list" class="table card-table align-middle mb-0">
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
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $cnt = 0;
                        @endphp
                        @if ($schedules)
                        @foreach ($schedules as $user)
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
                                $driver = DB::table('car_assignment_drivers')->join('users', 'users.id', 'car_assignment_drivers.driver_id')->where('car_assignment_drivers.car_id', $car->car_id)->first();
                            @endphp
                            <td>{{$car ? $car->car_registration_number : 'N/A'}} | {{$driver ? $driver->name."(".$driver->phone.")" : 'No Driver'}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
              </div>
            </div> <!-- .card end -->
          </div>
        </div> <!-- .row end -->
      </div>
    </div>
    @endif

  <script>
    $(function() {
      "use strict";;

      var options = {
        series: [{
          name: "Pick-up",
          data: [23,12,1]
        }, {
          name: "Drop-Off",
          data: [12,34,34,1]
        }],
        chart: {
          height: 345,
          type: 'line', // line, bar, area
          toolbar: {
            show: false,
          },
          zoom: {
            enabled: false
          },
        },
        colors: ['var(--chart-color1)', 'var(--chart-color2)'],
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: [2, 2, 2],
          curve: 'smooth', // straight, smooth
          dashArray: [0, 8, 5]
        },
        legend: {
          tooltipHoverFormatter: function(val, opts) {
            return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
          }
        },
        markers: {
          size: 0,
          hover: {
            sizeOffset: 6
          }
        },
        xaxis: {
          categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sut', 'Sun'],
        },
        tooltip: {
          y: [{
            title: {
              formatter: function(val) {
                return val
              }
            }
          }, {
            title: {
              formatter: function(val) {
                return val
              }
            }
          }, {
            title: {
              formatter: function(val) {
                return val
              }
            }
          }]
        },
      };
      var chart = new ApexCharts(document.querySelector("#apex-WorkoutStatistic"), options);
      chart.render();
    });
  </script>
@endsection
