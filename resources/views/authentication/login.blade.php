<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Bootstrap 5 admin dashboard template & web App ui kit.">
  <meta name="keyword" content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal">
  <link rel="icon" href="./assets/img/logo/favicon.ico" type="image/x-icon"> <!-- Favicon-->
  <title>VSMS | Sign In</title>
  <!-- Application vendor css url -->
  <!-- project css file  -->
  <link rel="stylesheet" href="./assets/css/luno-style.css">
  <!-- Jquery Core Js -->
  <script src="./assets/js/plugins.js"></script>
  <style>
      .rotating-img {
          width: 500px;
          height: 400px;
          animation: rotate45deg 2s infinite alternate ease-in-out;
      }

      @keyframes rotate45deg {
          0% {
              transform: rotate(5deg);
          }
          100% {
              transform: rotate(-5deg);
          }
      }
  </style>
</head>

<body id="layout-1" data-luno="theme-blue">
  <!-- start: body area -->
  <div class="wrapper">
    <!-- Sign In version 1 -->
    <!-- start: page body -->
    <div class="page-body auth px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
      <div class="container-fluid">
        <div class="row g-0">
          <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center">
            <div style="max-width: 25rem;">
              <div class="mb-4">
                <h1>
                <img src="assets/img/logo/logo-white.png" alt="" width="500" height="400" class="rotating-img">
                </h1>
              </div>
              <div class="mb-5">
                <h2 class="text-info">VSMS</h2>
                <h2 class="color-900">Seamless Mobility, Smarter Commutes.</h2>
              </div>
            </div>
          </div>
          <div class="col-lg-6 d-flex justify-content-center align-items-center">
            <div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 32rem;">
              <!-- Form -->
              <form class="row g-3" action="{{route('login.operation')}}" method="POST">
                @csrf
                @error('error')
                    <div class="alert alert-danger text-primary font-18 text-center">{{ $message }}</div>
                @enderror
                <div class="col-12 text-center mb-5">
                  <h1>Sign in</h1>
                </div>
                <div class="col-12">
                  <div class="mb-2">
                    <label class="form-label">Email address</label>
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="name@example.com">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-2">
                    <div class="form-label">
                      <span class="d-flex justify-content-between align-items-center"> Password
                      </span>
                    </div>
                    <input id="password" name="password" class="form-control form-control-lg" type="password" placeholder="Enter the password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-between mt-3">
                  <a class="text-mutel" href="{{ route('password.reset') }}">Forgot Password?</a>
                </div>
                <div class="col-12 text-center mt-4">
                  <button class="btn btn-lg btn-block btn-dark lift text-uppercase">SIGN IN</button>
                </div>
              </form>
              <!-- End Form -->
            </div>
          </div>
        </div> <!-- End Row -->
      </div>
    </div>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script>
      $(function() {
        $('#password').password()
      })
    </script>
  </div>
  <!-- Jquery Page Js -->
  <!-- Jquery Page Js -->
  <script src="./assets/js/theme.js"></script>
  <!-- Plugin Js -->
  <!-- Vendor Script -->
</body>

</html>
