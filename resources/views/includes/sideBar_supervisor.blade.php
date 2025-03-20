
  <!-- start: sidebar -->
  <div class="sidebar p-2 py-md-3 @@cardClass">
    <div class="container-fluid">
      <!-- sidebar: title-->
      <div class="title-text d-flex align-items-center mb-4 mt-1">
        <h4 class="sidebar-title mb-0 flex-grow-1"><span class="sm-txt">V</span><span>SMS</span></h4>
      </div>
      <!-- sidebar: menu list -->
      <div class="main-menu flex-grow-1">
        <ul class="menu-list">
          <li class="divider py-2 lh-sm"><span class="small">MAIN</span><br> <small class="text-muted">Vehicle Service Management System</small></li>
          <li>
            <a class="m-link {{ Route::currentRouteName() == 'dashboard'?'active':'' }}" href="{{route('dashboard')}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                <path class="fill-secondary" fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
              </svg>
              <span class="ms-2">My Dashboard</span>
            </a>
          </li>
          <li class="collapsed">
            <a class="m-link {{ Route::currentRouteName() == 'account.profile'?'active':'' }} {{ Route::currentRouteName() == 'account.setting'?'active':'' }}" data-bs-toggle="collapse" data-bs-target="#menu-Car" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                    <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
                  </svg>
              <span class="ms-2">Car Management</span>
              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
            </a>
            <!-- Menu: Sub menu ul -->
            <ul class="sub-menu collapse" id="menu-Car">
              <li><a class="ms-link" href="#" data-bs-toggle="modal" data-bs-target="#CreateCar">Add New Car</a></li>
              <li><a class="ms-link {{ Route::currentRouteName() == 'car.list'?'active':'' }}" href="{{ route('car.list') }}">Cars List</a></li>
              <li><a class="ms-link" href="#" data-bs-toggle="modal" data-bs-target="#Car2Driver">Assign Car2Drive</a></li>
              <li><a class="ms-link" href="#" data-bs-toggle="modal" data-bs-target="#Car2Employee">Assign Car2Employee</a></li>
            </ul>
          </li>
          <li>
            <a class="m-link {{ Route::currentRouteName() == 'schedule.list'?'active':'' }}" href="{{route('schedule.list')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                    <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9z"/>
                    <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1zm1.038 3.018a6 6 0 0 1 .924 0 6 6 0 1 1-.924 0M0 3.5c0 .753.333 1.429.86 1.887A8.04 8.04 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5M13.5 1c-.753 0-1.429.333-1.887.86a8.04 8.04 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1"/>
                  </svg>
              <span class="ms-2">Schedules</span>
            </a>
          </li>
        </ul>
        <ul class="menu-list">
          <li class="divider py-2 lh-sm"><span class="small">MANAGEMENT</span><br> <small class="text-muted">Vehicle Service Management System</small></li>
          <li class="collapsed">
            <a class="m-link {{ Route::currentRouteName() == 'user.list'?'active':'' }}" data-bs-toggle="collapse" data-bs-target="#menu-User" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                    <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                  </svg>
              <span class="ms-2">Users</span>
              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
            </a>
            <!-- Menu: Sub menu ul -->
            <ul class="sub-menu collapse {{ Route::currentRouteName() == 'user.list'?'show':'' }}" id="menu-User">
              <li><a class="ms-link" href="#" data-bs-toggle="modal" data-bs-target="#CreateUser">Add User</a></li>
              <li><a class="ms-link {{ Route::currentRouteName() == 'user.list'?'active':'' }}" href="{{route('user.list')}}">Users List</a></li>
            </ul>
          </li>
          <li class="collapsed">
            <a class="m-link {{ Route::currentRouteName() == 'account.profile'?'active':'' }} {{ Route::currentRouteName() == 'account.setting'?'active':'' }}" data-bs-toggle="collapse" data-bs-target="#menu-Account" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">
                <path class="fill-secondary" d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
              </svg>
              <span class="ms-2">Account</span>
              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
            </a>
            <!-- Menu: Sub menu ul -->
            <ul class="sub-menu collapse {{ Route::currentRouteName() == 'account.profile'?'show':'' }} {{ Route::currentRouteName() == 'account.setting'?'show':'' }}" id="menu-Account">
              <li><a class="ms-link {{ Route::currentRouteName() == 'account.profile'?'active':'' }}" href="{{route('account.profile')}}">Profile</a></li>
              <li><a class="ms-link {{ Route::currentRouteName() == 'account.setting'?'active':'' }}" href="{{route('account.setting')}}">Settings</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- sidebar: footer link -->
      <!-- sidebar: footer link -->
      <ul class="menu-list nav navbar-nav flex-row text-center menu-footer-link">
        <li class="nav-item flex-fill p-2">
          <a class="d-inline-block w-100 color-400" href="{{route('logout.operation')}}" title="sign-out">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
              <path d="M7.5 1v7h1V1h-1z" />
              <path class="fill-secondary" d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
            </svg>
          </a>
        </li>
      </ul>
    </div>
  </div>
