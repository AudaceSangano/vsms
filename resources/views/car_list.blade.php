@extends('includes.main')
@section('body_content')
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
      <div class="container-fluid">
        <div class="row g-3 mb-3 align-items-center">
          <div class="col">
            <ol class="breadcrumb bg-transparent mb-0">
              <li class="breadcrumb-item"><a class="text-secondary" href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Cars</li>
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
            <!-- Cars: all -->
            <div class="card fieldset border border-muted">
              <span class="fieldset-tile text-muted bg-body">All Cars:</span>
              <table id="car_list" class="table card-table align-middle mb-0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Car Model</th>
                    <th>Registration Number</th>
                    <th>Color</th>
                    <th>Capacity</th>
                    <th>Driver</th>
                    <th>Status</th>
                    <th>Date Added</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $cnt = 0;
                    @endphp
                    @foreach ($cars as $car)
                    @php
                        $cnt++;
                    @endphp
                    <tr class="row-selectable">
                        <td> #{{$cnt}} </td>
                        <td class="fw-bold">{{$car->car_model}}</td>
                        <td class="fw-bold">{{$car->car_registration_number}}</td>
                        <td class="fw-bold">{{$car->car_color}}</td>
                        <td class="fw-bold">{{$car->car_capacity}}</td>
                        @php
                            $driver = DB::table('car_assignment_drivers')->join('users', 'users.id', 'car_assignment_drivers.driver_id')->where('car_id', $car->car_id)->first();
                        @endphp
                        <td>{{$driver ? $driver->name." | ".$driver->phone : 'N/A'}}</td>
                        <td>{{$car->is_active == '1' ? 'Active' : 'Inactive'}}</td>
                        <td>{{$car->created_at}}</td>
                        <td class="text-center">
                        <button
                        type="button"
                        class="btn btn-link btn-sm color-400"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        onclick="editCar({{ $car->car_id }}, '{{ $car->car_model }}', '{{ $car->car_registration_number }}', '{{ $car->car_color }}', '{{ $car->car_capacity }}', '{{ $car->is_active }}')"
                        title="Edit"><i class="fa fa-pencil"></i></button>
                        @php
                            if ($car->is_active == '1') {
                                @endphp
                                <a href="{{route('car.status', $car->car_id)}}"><button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Deactivate"><i class="fa fa-lock"></i></button></a>
                                @php
                            } else {
                                @endphp
                                <a href="{{route('car.status', $car->car_id)}}"><button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Activate"><i class="fa fa-unlock"></i></button></a>
                                @php
                            }
                        @endphp
                        <a href="{{route('car.remove', $car->car_id)}}" class="delete-car"><button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
                        </td>
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
                $('#car_list').addClass('nowrap').dataTable({
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
