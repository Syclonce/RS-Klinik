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
                <p class="login-box-msg">This is a secure area of the application. Please confirm your password before continuing.</p>
                <form action="{{ route('password.confirm') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" name="password" equired
                            autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Confirm</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
