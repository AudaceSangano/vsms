<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Bootstrap 5 admin dashboard template & web App ui kit.">
  <meta name="keyword" content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal">
  <link rel="icon" href="{{asset('assets/img/logo/favicon.ico')}}" type="image/x-icon"> <!-- Favicon-->
  <title>VSMS | Sign In</title>
  <!-- Application vendor css url -->
  <!-- project css file  -->
  <link rel="stylesheet" href="{{asset('assets/css/luno-style.css')}}">
  <!-- Jquery Core Js -->
  <script src="{{asset('assets/js/plugins.js')}}"></script>

  <style>
    .fire-icon {
        width: 100px;
        animation: fire-flash 1.5s infinite alternate;
    }

    @keyframes fire-flash {
        0% {
            opacity: 1;
            transform: scale(1) rotate(0deg);
        }
        50% {
            opacity: 0.5;
            transform: scale(1.1) rotate(10deg);
        }
        100% {
            opacity: 1;
            transform: scale(1) rotate(-10deg);
        }
    }
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
    <!-- start: page body -->
    <div class="page-body auth px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
      <div class="container-fluid">
        <div class="row g-3">
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
              <form class="row g-3" action="{{ route('password.forget') }}" method="POST">
                @csrf
                <div class="col-12 text-center mb-5">
                  <img src="./assets/img/auth-password-reset.svg" class="w240 mb-4" alt="" />

                  @if(session('error'))
                  <div class="alert alert-danger">
                      {{ session('error') }}
                  </div>
              @endif
                  <h1>Forgot password?</h1>
                  <span>Enter the phone number you used when you joined and we'll send you instructions to reset your password.</span>
                </div>
                <div class="col-12">
                  <div class="mb-2">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="telephone" value="{{ old('telephone') }}" class="form-control form-control-lg" placeholder="0780000001">
                    @error('telephone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-12 text-center mt-4">
                  <button title="" class="btn btn-lg btn-block btn-dark lift text-uppercase" type="submit">SUBMIT</button>
                </div>
                <div class="col-12 text-center mt-4">
                  <span class="text-muted"><a href="{{ route('login') }}">Back to Sign in</a></span>
                </div>
              </form>
              <!-- End Form -->
            </div>
          </div>
        </div> <!-- End Row -->
      </div>
    </div>
  </div>
  <!-- Jquery Page Js -->
  <!-- Jquery Page Js -->
  <script src="{{asset('assets/js/theme.js')}}"></script>
  <!-- Plugin Js -->
  <!-- Vendor Script -->
</body>

</html>
