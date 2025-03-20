@extends('includes.main')
@section('body_content')
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
      <div class="container-fluid">
        <div class="row g-3 mb-3 align-items-center">
          <div class="col">
            <ol class="breadcrumb bg-transparent mb-0">
              <li class="breadcrumb-item"><a class="text-secondary" href="/">Home</a></li>
              <li class="breadcrumb-item"><a class="text-secondary" href="#">Account</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
              <!-- form: profile details -->
              <span class="fieldset-tile text-muted bg-body">Profile Details:</span>
              <div class="card">
                <div class="card-body">
                  <form>
                    <div class="row mb-3">
                      <label class="col-md-3 col-sm-4 col-form-label">Avatar</label>
                      <div class="col-md-9 col-sm-8">
                        <div class="image-input avatar xxl rounded-4" style="background-image: url(../assets/img/avatar.png)">
                            <div class="avatar-wrapper rounded-4" style="background-image: url({{ Auth::user()->profile ? asset('storage/' . Auth::user()->profile) : asset('assets/img/profile_av.png') }})"></div>
                          <div class="file-input">
                            <input type="file" class="form-control" name="file-input" id="file-input">
                            <label for="file-input" class="fa fa-pencil shadow text-muted"></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-md-3 col-sm-4 col-form-label">Full Name *</label>
                      <div class="col-md-9 col-sm-8">
                        <input type="text" class="form-control form-control-lg" value="{{ Auth::user()->name }}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-md-3 col-sm-4 col-form-label">Email *</label>
                      <div class="col-md-9 col-sm-8">
                        <input type="text" class="form-control form-control-lg" value="{{ Auth::user()->email }}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-md-3 col-sm-4 col-form-label">Contact Phone *</label>
                      <div class="col-md-9 col-sm-8">
                        <input type="text" class="form-control form-control-lg" value="{{ Auth::user()->phone }}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-md-3 col-sm-4 col-form-label">Gender</label>
                      <div class="col-md-9 col-sm-8">
                        <input type="url" class="form-control form-control-lg" value="{{ Auth::user()->gender }}">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
        </div>
      </div>
    </div>
@endsection
