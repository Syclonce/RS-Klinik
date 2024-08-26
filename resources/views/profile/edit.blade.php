@extends('template.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <br>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                      <!-- Profile Image -->
                      <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                          <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="{{ asset('storage/' . Auth::user()->profile) }}"
                                 alt="User profile picture">
                          </div>

                          <h3 class="profile-username text-center">
                            @if (Auth::check())
                            {{ Auth::user()->name }}
                        @endif
                          </h3>

                          <ul class="list-group list-group-unbordered mb-3 text-center">
                            <li class="list-group-item">
                              <b>
                                @if (Auth::check())
                                    {{ Auth::user()->email }}
                                @endif
                            </b>
                            </li>
                            <li class="list-group-item">
                              <b>
                                @if (Auth::check())
                                    {{ Auth::user()->created_at->format('d F Y') }}
                                @endif
                              </b>
                            </li>
                          </ul>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->

                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline card-tabs">
                            <div class="card-header p-0 pt-1 border-bottom-0">
                              <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Profile Information</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Update Password</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Delet Account</a>
                                </li>
                              </ul>
                            </div>
                            <div class="card-body">
                              <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                   <p>Update your account's profile information and email address.</p>
                                    <form action="{{ route('profile.update') }}" method="post">
                                            @csrf
                                            @method('patch')
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" placeholder="name">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="email" id="email"
                                            value="{{ old('name', $user->email) }}"  required autofocus autocomplete="email" placeholder="Email">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="username" id="username"
                                            value="{{ old('name', $user->username) }}"  required autofocus autocomplete="username" placeholder="username">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-4">
                                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                    <p>Ensure your account is using a long, random password to stay secure.</p>
                                    <form action="{{ route('password.update') }}" method="post">
                                        @csrf
                                        @method('put')
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" name="current_password" id="update_password_current_password"
                                         required autofocus autocomplete="current-password" placeholder="current password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" name="password" id="update_password_password"
                                         required autofocus autocomplete="new-password" placeholder="New password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" name="password_confirmation" id="update_password_password_confirmation"
                                         required autofocus autocomplete="new-password" placeholder="Confirm Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                                    <div>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-user-deletion">{{ __('Delete Account') }}</button>

                                        <div class="modal fade" id="confirm-user-deletion" tabindex="-1" role="dialog" aria-labelledby="confirm-user-deletion-label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="{{ route('profile.destroy') }}">
                                                        @csrf
                                                        @method('delete')

                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirm-user-deletion-label">{{ __('Confirm Account Deletion') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>{{ __('Are you sure you want to delete your account?') }}</p>
                                                            <p>{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}</p>
                                                            <div class="form-group mt-3">
                                                                <label for="password">{{ __('Password') }}</label>
                                                                <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}">
                                                                @if($errors->userDeletion->has('password'))
                                                                    <div class="text-danger">{{ $errors->userDeletion->first('password') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                                                            <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                              </div>
                            </div>
                            <!-- /.card -->
                          </div>
                    </div>
                    <!-- /.col -->
                  </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
