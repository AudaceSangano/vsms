@extends('includes.main')
@section('body_content')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
      <div class="container-fluid">
        <div class="row g-3 mb-3 align-items-center">
          <div class="col">
            <ol class="breadcrumb bg-transparent mb-0">
              <li class="breadcrumb-item"><a class="text-secondary" href="/">Home</a></li>
              <li class="breadcrumb-item"><a class="text-secondary" href="#">Account</a></li>
              <li class="breadcrumb-item active" aria-current="page">Settings</li>
            </ol>
          </div>
        </div> <!-- .row end -->
      </div>
    </div>
    <!-- start: page body -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
      <div class="container-fluid">
        <div class="row g-3">
          <div class="col-xxl-12 col-lg-12 col-md-12">
            <div id="list-item-2" class="card fieldset border border-muted mt-5">
                @error('change_password_message')
                    @if ($message)
                    <script>
                        Swal.fire('Confirmed!', "successful password Changed!", 'success').then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            };
                        })
                    </script>
                    @else
                    <script>
                        Swal.fire('Cancelled', 'Your old password not Correct.', 'info');
                    </script>
                    @endif
                @enderror
              <!-- form: Change Password -->
              <span class="fieldset-tile text-muted bg-body">Address / Pick-up and Drop-off Location</span>
              <div class="card">
                <form action="{{route('address')}}" method="POST">
                    @csrf
                    <div class="card-body">
                    <div class="row g-3 mt-4">
                        <div class="row mb-3">
                            <label class="col-md-3 col-sm-4 col-form-label">District : </label>
                            <div class="col-md-9 col-sm-8">
                                <input type="text" name="district" class="form-control form-control-lg" value="{{ $address['district'] }}">
                                @error('district')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-sm-4 col-form-label">Sector : </label>
                            <div class="col-md-9 col-sm-8">
                                <input type="text" name="sector" class="form-control form-control-lg" value="{{ $address['sector'] }}">
                                @error('sector')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-sm-4 col-form-label">Cell : </label>
                            <div class="col-md-9 col-sm-8">
                                <input type="text" name="cell" class="form-control form-control-lg" value="{{ $address['cell'] }}">
                                @error('cell')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-sm-4 col-form-label">Street : </label>
                            <div class="col-md-9 col-sm-8">
                                <input type="text" name="street" class="form-control form-control-lg" value="{{ $address['street'] }}">
                                @error('street')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-sm-4 col-form-label">Exact Address : </label>
                            <div class="col-md-9 col-sm-8">
                                <textarea name="address" rows="6" class="form-control form-control-lg">{{ $address['address'] }}</textarea>
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-footer text-end">
                    <button class="btn btn-lg btn-light me-2" type="reset">Discard</button>
                    <button class="btn btn-lg btn-primary" type="submit">Save Changes</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
