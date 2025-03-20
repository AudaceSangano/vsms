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
            <div id="list-item-1" class="card fieldset border border-muted mt-0">
                @error('change_profile_message')
                    @if ($message)
                    <script>
                        Swal.fire('Confirmed!', "successful Profile Changed!", 'success').then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            };
                        })
                    </script>
                    @else
                    <script>
                        Swal.fire('Cancelled', 'Fail to updated Profile!', 'info');
                    </script>
                    @endif
                @enderror
              <!-- form: profile details -->
              <span class="fieldset-tile text-muted bg-body">Profile Details:</span>
              <div class="card">
                <form action="{{route('setting.profile.change')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                        <label class="col-md-3 col-sm-4 col-form-label">Avatar</label>
                        <div class="col-md-9 col-sm-8">
                            <div class="image-input avatar xxl rounded-4" style="background-image: url(../assets/img/avatar.png)">
                            {{-- <div class="avatar-wrapper rounded-4" style="background-image: url(../assets/img/profile_av.png)"></div> --}}
                            <div class="avatar-wrapper rounded-4" style="background-image: url({{ Auth::user()->profile ? asset('storage/' . Auth::user()->profile) : asset('assets/img/profile_av.png') }})"></div>
                            <div class="file-input">
                                <input type="file" class="form-control" name="profile" id="file-input">
                                <label for="file-input" class="fa fa-pencil shadow text-muted"></label>
                            </div>
                                @error('profile')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label class="col-md-3 col-sm-4 col-form-label">Full Name *</label>
                        <div class="col-md-9 col-sm-8">
                            <input type="text" name="name" class="form-control form-control-lg" value="{{Auth::user()->name}}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label class="col-md-3 col-sm-4 col-form-label">Email *</label>
                        <div class="col-md-9 col-sm-8">
                            <input type="text" name="email" class="form-control form-control-lg" value="{{Auth::user()->email}}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label class="col-md-3 col-sm-4 col-form-label">Contact Phone *</label>
                        <div class="col-md-9 col-sm-8">
                            <input type="text" name="phone" class="form-control form-control-lg" value="{{Auth::user()->phone}}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label class="col-md-3 col-sm-4 col-form-label">Gender</label>
                        <div class="col-md-9 col-sm-8">
                            <select name="gender" id="" class="form-control form-control-lg">
                                <option value="male" {{Auth::user()->gender=='male'?'selected':''}}>Male</option>
                                <option value="female" {{Auth::user()->gender=='female'?'selected':''}}>Female</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
              <span class="fieldset-tile text-muted bg-body">Change Password</span>
              <div class="card">
                <form action="{{route('setting.password.change')}}" method="POST">
                    @csrf
                    <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                        <div class="mb-3">
                            <input type="password" name="old_password" class="form-control form-control-lg" placeholder="Current Password">
                            @error('old_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="New Password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Confirm New Password">
                            @error('password_confirmation')
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
