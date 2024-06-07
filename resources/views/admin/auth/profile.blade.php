@extends('admin.layouts.index')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-body">
        @include('admin.layouts.flash-messages')

        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-4">
            <div class="card author-box">
              <div class="card-body">
                <div class="author-box-center">
                  <img width="50" height="50" alt="image" src="{{ Auth::guard('admin')->user()->image ? asset(Auth::guard('admin')->user()->image) : asset('assets/img/defaultuser.png') }}" class="rounded-circle">
                  <div class="clearfix"></div>
                  <div class="author-box-name">
                    <a href="#">{{ Auth::guard('admin')->user()->name }}</a>
                  </div>
                  <div class="author-box-job">Admin</div>
                </div>
                <div class="text-center">
                  <div class="author-box-description">
                    <p>
                      
                    </p>
                  </div>

                </div>
              </div>
            </div>

          </div>
          <div class="col-12 col-md-12 col-lg-8">
            <div class="card">
              <div class="padding-20">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="profile-tab1" data-toggle="tab" href="#info" role="tab"
                      aria-selected="false">Info</a>
                  </li>
                  @can('full access')
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                      aria-selected="false">Settings</a>
                  </li>
                  @endcan
                </ul>
                <div class="tab-content tab-bordered" id="myTab3Content">

                  <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="profile-tab1">
                    <form method="post" class="needs-validation" action="{{ route('update_profile') }}" enctype="multipart/form-data">
                        @csrf
                      <div class="card-header">
                        <h4>Edit Profile</h4>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $admin->name }}" required>
                            <div class="invalid-feedback">
                              Please fill in the name
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $admin->email }}" required>
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Profile Image</label>
                            <input type="file" name="image" class="form-control" value="">
                            <div class="invalid-feedback">
                              Please fill in the name
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer text-right">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">Save Changes</button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                    @can('full access')
                    <form method="post" class="needs-validation" action="{{ route('update_password') }}" enctype="multipart/form-data">
                        @csrf
                      <div class="card-header">
                        <h4>Change Password</h4>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-4 col-12">
                            <label>Old Password</label>
                            <input name="old_password" type="password" class="form-control" value="" required>
                            <div class="invalid-feedback">
                              Please fill in the old password
                            </div>
                          </div>
                          <div class="form-group col-md-4    col-12">
                            <label>New Password</label>
                            <input name="password" type="password" class="form-control" value="" required>
                            <div class="invalid-feedback">
                              Please fill in the new password
                            </div>
                          </div>
                          <div class="form-group col-md-4    col-12">
                            <label>Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control" value="" required>
                            <div class="invalid-feedback">
                              Please fill in the Confirm New Password
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="card-footer text-right">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">Change Password</button>
                      </div>
                    </form>
                    @endcan
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
@endsection
