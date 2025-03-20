<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Bootstrap 5 admin dashboard template & web App ui kit.">
  <meta name="keyword" content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal">
  <link rel="icon" href="../assets/img/logo/favicon.ico" type="image/x-icon"> <!-- Favicon-->
  <title>VSMS | Vehicle</title>
  <!-- project css file  -->
  <link rel="stylesheet" href="{{asset('assets/css/luno-style.css')}}">
  <!-- Jquery Core Js -->
  <script src="{{asset('assets/js/plugins.js')}}"></script>
</head>

<body class="layout-1" data-luno="theme-blue">
    @if ( config('role') == 'admin')
        @include('includes.sideBar_admin')
    @elseif (config('role') == 'supervisor')
        @include('includes.sideBar_supervisor')
    @elseif (config('role') == 'employee')
        @include('includes.sideBar_employee')
    @elseif (config('role') == 'driver')
        @include('includes.sideBar_employee')
    @endif
  <!-- start: body area -->
  <div class="wrapper">
    @include('includes.header')
    @yield('body_content')
    @include('includes.footer')
  </div>
  <!-- Modal: Setting -->
  <div class="modal fade" id="SettingsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-vertical right-side modal-dialog-scrollable">
      <div class="modal-content">
        <div class="px-xl-4 modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="px-xl-4 modal-body custom_scroll">
          <!-- start: Light/dark -->
          <div class="card fieldset border setting-mode mb-4">
            <span class="fieldset-tile bg-card">Light/Dark & Contrast Layout</span>
            <div class="c_radio d-flex text-center">
              <label class="m-1 theme-switch" for="theme-switch">
                <input type="checkbox" id="theme-switch" />
                <span class="card p-2">
                  <img class="img-fluid" src="{{asset('assets/img/dark-version.svg')}}" alt="Dark Mode" />
                </span>
              </label>
              <label class="m-1 theme-dark" for="theme-dark">
                <input type="checkbox" id="theme-dark" />
                <span class="card p-2">
                  <img class="img-fluid" src="{{asset('assets/img/dark-theme.svg')}}" alt="Theme Dark Mode" />
                </span>
              </label>
              <label class="m-1 theme-high-contrast" for="theme-high-contrast">
                <input type="checkbox" id="theme-high-contrast" />
                <span class="card p-2">
                  <img class="img-fluid" src="{{asset('assets/img/high-version.svg')}}" alt="High Contrast" />
                </span>
              </label>
              <label class="m-1 theme-rtl" for="theme-rtl">
                <input type="checkbox" id="theme-rtl" />
                <span class="card p-2">
                  <img class="img-fluid" src="{{asset('assets/img/rtl-version.svg')}}" alt="RTL Mode!" />
                </span>
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('modal')
  <!-- Jquery Page Js -->
  <!-- Jquery Page Js -->
  <script src="{{asset('assets/js/theme.js')}}"></script>
  <!-- Plugin Js -->
  <script src="{{asset('assets/js/bundle/apexcharts.bundle.js')}}"></script>
  <!-- Vendor Script -->
  <script src="{{asset('assets/js/bundle/apexcharts.bundle.js')}}"></script>
  <!-- Plugin Js -->
  <script src="./assets/js/bundle/dataTables.bundle.js"></script>
  <!-- Jquery Page Js -->
  <script>
    $(document).ready(function() {
      $('#driver_list').addClass('nowrap').dataTable({
        responsive: true,
        searching: true,
        paging: true,
        ordering: true,
        info: true,
      });
      $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();
      });
    });
  </script>
</body>

</html>
