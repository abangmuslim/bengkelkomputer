<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Pengguna</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('background.css') }}">
</head>
<body class="hold-transition login-page" style="background-image: url('backgroundlogin2.jpg'); background-size: cover;">
<div class="login-box">
<div style="width: 300px; margin: 100px auto; padding: 20px; background: rgba(255, 255, 255, 0.4); border-radius: 10px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);">

  
  <!-- /.login-logo -->
  <div class="card card-outline card-primary" style="background:transparent; border: 2px solid rgba(270, 270, 270, .5); border-radius: 20px;">
    <div class="card-header text-center">
      <h1 class="h1">Bengkel <b>PC</b></h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>
      @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        {{ session('loginError') }}
      </div>
      @endif
      <!-- Buka halaman login: Tampilkan form untuk memasukkan email dan password. -->
      <form action="/login" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email" value="{{ old('email') }}" style="background: transparent;border: 2px solid rgba(255, 255, 255, .5);">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
          <div class="invalid-feedback">
                        {{ $message }}
                    </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password" style="background: transparent;border: 2px solid rgba(255, 255, 255, .5);">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
     
   

    </div>
    <div class="card-footer">
                <button type="reset" class="btn btn-warning">Cancel</button>
                <button type="submit" class="btn btn-primary float-right">Login</button>
            </div>
    <!-- /.card-body -->
  </div>
  </form>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>

Jika user tidak ditemukan atau password salah, tampilkan pesan error.
Login berhasil: Jika email dan password cocok, set session login dan redirect ke halaman dashboard.
Login gagal: Jika tidak cocok, tampilkan pesan error dan minta user mengulang login.