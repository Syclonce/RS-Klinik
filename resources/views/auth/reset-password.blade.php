@extends('templateauth.app')

@section('content')
    <div class="login-box">
        @php
            // Mengambil data menggunakan model Webset
            $setweb = App\Models\setweb::first(); // Anda bisa sesuaikan query ini dengan kebutuhan Anda
        @endphp
        <div class="login-logo">
            <a href="../../index2.html">
                <img src="{{ asset('webset/' . $setweb->logo_app) }}" style="width: 200px; height: auto;">
            </a>

        </div>

        <!-- /.login-logo -->
        <div class="card  card-outline card-primary card-outline card-primary">
            <div class="card-body login-card-body">
                <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
                <form action="{{ route('password.store') }}" method="post">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" id="email" required autofocus
                            autocomplete="username" value="{{ old('email', $request->email) }}" placeholder="email" disabled>
                        <input type="hidden" name="email" value="{{ old('email', $request->email) }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" name="password" equired
                            autocomplete="new-password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                            equired autocomplete="new-password" placeholder="Confirm Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <hr>

                <p class="mb-1">
                    <a href="{{ __('login') }}">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
