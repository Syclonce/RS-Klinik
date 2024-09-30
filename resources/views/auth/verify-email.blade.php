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
        <div class="card card-outline card-primary">
            <div class="card-body login-card-body">
                <p class="login-box-msg">
                    Before getting started, could you verify your email address by clicking on the link we just emailed to you?
                    If you didn't receive the email, we will gladly send you another.
                </p>

                <div class="row text-center">
                    <!-- Resend Verification Email -->
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div class="col-12 mb-2">
                            <button type="submit" class="btn btn-primary btn-block">Resend Verification Email</button>
                        </div>
                    </form>

                    <!-- Resend WhatsApp Verification -->
                    <form method="POST" action="{{ route('verification.send.whatsapp') }}">
                        @csrf
                        <div class="col-12 mb-2">
                            <button type="submit" class="btn btn-success btn-block">Verify via WhatsApp</button>
                        </div>
                    </form>

                    <!-- Log Out -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="col-12">
                            <button type="submit" class="btn btn-link">Log Out</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
