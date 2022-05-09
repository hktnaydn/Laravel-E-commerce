<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AlSat | Giriş Yap</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets')}}/admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>GİRİŞ YAP</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      @if (session('alert'))
      <div class="alert alert-success">
         <strong>    {{ session('alert') }} </strong>
      </div>
      <div class="alert alert-error">
        <strong>    {{ session('alert') }} </strong>
     </div>
  @endif
      <p class="login-box-msg">Alanları doldurunuz</p>
      
      <form action="{{route('admin_logincheck')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input id="email" name="email" type="email" class="form-control" placeholder="Eposta">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" name="password" type="password" class="form-control" placeholder="Şifre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Beni Hatırla
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- YA DA -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Facebook ile giriş yap
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Google ile giriş yap
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">Şifremi Unuttum</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Kayıt Olun</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets')}}/admin/{{asset('assets')}}/admin/{{asset('assets')}}/admin/{{asset('assets')}}/admin/{{asset('assets')}}/admin/../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets')}}/admin/{{asset('assets')}}/admin/{{asset('assets')}}/admin/{{asset('assets')}}/admin/{{asset('assets')}}/admin/../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets')}}/admin/{{asset('assets')}}/admin/{{asset('assets')}}/admin/{{asset('assets')}}/admin/{{asset('assets')}}/admin/../../dist/js/adminlte.min.js"></script>
</body>
</html>
