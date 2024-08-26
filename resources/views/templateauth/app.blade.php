<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
</head>
<body class="hold-transition login-page">
    @yield('content')
<!-- /.login-box -->

<?php
// Fetch error messages for username, email, and password
$usernameErrors = $errors->get('username') ?? [];
$emailErrors = $errors->get('email') ?? [];
$passwordErrors = $errors->get('password') ?? [];

// Helper function to create a single error string from an array of errors
function createErrorString($errors) {
    if (!empty($errors)) {
        // Combine all error messages into a single string and escape for HTML
        return htmlspecialchars(implode(' ', $errors), ENT_QUOTES, 'UTF-8');
    }
    return '';
}

// Create error strings for each field
$usernameErrorString = createErrorString($usernameErrors);
$emailErrorString = createErrorString($emailErrors);
$passwordErrorString = createErrorString($passwordErrors);
?>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Page specific script -->
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 10000,
        timerProgressBar: true
    });

    document.addEventListener('DOMContentLoaded', function() {
    if ("{{ session('success') }}") {
        Toast.fire({
            icon: 'success',
            title: "{{ session('success') }}"
        });
    }

    if ("{{ session('error') }}") {
        Toast.fire({
            icon: 'error',
            title: "{{ session('error') }}"
        });
    }

    if ("{{session('status') == 'verification-link-sent'}}"){
        Toast.fire({
        icon: 'success',
        title: 'A new verification link has been sent to the email address you provided during registration.'
        });
    }

    // Display Toast for username errors
    <?php if ($usernameErrorString): ?>
        Toast.fire({
            icon: 'error',
            title: <?= json_encode($usernameErrorString); ?>
        });
    <?php endif; ?>

    // Display Toast for email errors
    <?php if ($emailErrorString): ?>
        Toast.fire({
            icon: 'error',
            title: <?= json_encode($emailErrorString); ?>
        });
    <?php endif; ?>

    // Display Toast for password errors
    <?php if ($passwordErrorString): ?>
        Toast.fire({
            icon: 'error',
            title: <?= json_encode($passwordErrorString); ?>
        });
    <?php endif; ?>
    });

</script>

</body>
</html>
