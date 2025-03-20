<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Bootstrap 5 admin dashboard template & web App ui kit.">
  <meta name="keyword" content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal">
  <link rel="icon" href="./assets/img/logo/favicon.ico" type="image/x-icon"> <!-- Favicon-->
  <title>VSMS | Two Step OTP</title>
  <!-- Application vendor css url -->
  <!-- project css file  -->
  <link rel="stylesheet" href="./assets/css/luno-style.css">
  <!-- Jquery Core Js -->
  <script src="./assets/js/plugins.js"></script>

  <style>
    .fire-icon {
        width: 100px;
        animation: fire-flash 1.5s infinite alternate;
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
        <div class="row">
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
              <form class="row g-3" action="" method="POST">
                @csrf
                <div class="col-12 text-center mb-5">
                  <img src="./assets/img/auth-two-step.svg" class="w240 mb-4" alt="" />
                  <h1>Telephone Number Verification</h1>
                  <span class="text-muted">We sent a verification code to your phone. Enter the code from the phone in the field below.</span>
                </div>
                <div class="col">
                  <div class="mb-2">
                    <input type="text" autofocus class="form-control form-control-lg text-center" placeholder="-" maxlength="1" id="input1" oninput="updateVerificationCode()">
                  </div>
                </div>
                <div class="col">
                  <div class="mb-2">
                    <input type="text" class="form-control form-control-lg text-center" placeholder="-" maxlength="1" id="input2" oninput="updateVerificationCode()">
                  </div>
                </div>
                <div class="col">
                  <div class="mb-2">
                    <input type="text" class="form-control form-control-lg text-center" placeholder="-" maxlength="1" id="input3" oninput="updateVerificationCode()">
                  </div>
                </div>
                <div class="col">
                  <div class="mb-2">
                    <input type="text" class="form-control form-control-lg text-center" placeholder="-" maxlength="1" id="input4" oninput="updateVerificationCode()">
                  </div>
                </div>
                @error('verification_code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="hidden" name="verification_code" id="verification_code">
                <input type="hidden" name="verification_number" value="{{ old('verification_number', session('telephone')) }}">
                <div class="col-12 text-center mt-4">
                  <button title="" class="btn btn-lg btn-block btn-dark lift text-uppercase" type="submit">Verify my account</button>
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
  <script src="./assets/js/theme.js"></script>
  <!-- Plugin Js -->
  <!-- Vendor Script -->

  <script>
    // Function to handle auto-tab behavior for verification inputs
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('input[type="text"]');

        inputs.forEach((input, index) => {
            input.addEventListener('input', function(e) {
                if (e.target.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }

                if (e.target.value.length === 0 && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });
    });
</script>
<script>
    function updateVerificationCode() {
        // Get the values from each input
        var input1 = document.getElementById('input1').value;
        var input2 = document.getElementById('input2').value;
        var input3 = document.getElementById('input3').value;
        var input4 = document.getElementById('input4').value;

        // Concatenate them into a single string
        var verificationCode = input1 + input2 + input3 + input4;

        // Set the hidden field value to the concatenated string
        document.getElementById('verification_code').value = verificationCode;
    }
</script>
</body>

</html>
