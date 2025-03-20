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
              <table id="invoice_list" class="table card-table align-middle mb-0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>User Role</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Date Joined</th>
                    <th class="text-center">Action</th>
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
                        <td class="fw-bold"><a href="{{ route('account.setting.set', $user->id) }}">{{$user->name}}</a></td>
                        <td class="fw-bold">{{$user->role}}</td>
                        <td class="fw-bold">{{$user->phone}}</td>
                        <td class="fw-bold">{{$user->gender}}</td>
                        <td>{{$user->is_active=='1'?'Active':'Inactive'}}</td>
                        <td>{{$user->created_at}}</td>
                        <td class="text-center">
                        <button
                        type="button"
                        class="btn btn-link btn-sm color-400"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        onclick="editUser({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}', '{{ $user->phone }}', '{{ $user->gender }}', '{{ $user->is_active }}')"
                        title="Edit"><i class="fa fa-pencil"></i></button>
                        @php
                            if ($user->is_active=='1') {
                                @endphp
                                <a href="{{route('user.status', $user->id)}}"><button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Lock"><i class="fa fa-lock"></i></button></a>
                                @php
                            }else {
                                @endphp
                                <a href="{{route('user.status', $user->id)}}"><button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Unlock"><i class="fa fa-unlock"></i></button></a>
                                @php
                            }
                        @endphp
                        <a href="{{route('user.remove', $user->id)}}" class="delete-link"><button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
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
