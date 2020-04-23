<!DOCTYPE html>
<html>
<head>}
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>تسجيل الدخول</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href={{asset('BackOffice-Assets/bootstrap/css/bootstrap-rtl.min.css')}}>
  <link rel="icon" type="image/png" href={{asset('BackOffice-Assets/dist/img/logo.png')}} >
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href={{asset('BackOffice-Assets/dist/fonts/font-awesome/css/font-awesome.min.css')}}>
  <link rel="stylesheet" href={{asset('BackOffice-Assets/dist/fonts/font-awesome/css/font-awesome.css')}}>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href={{asset('BackOffice-Assets/dist/css/AdminLTE-rtl.min.css')}}>
  <!-- iCheck -->
  <link rel="stylesheet" href={{asset('BackOffice-Assets/plugins/iCheck/square/blue.css')}}>

  <!-- ***************My Own Style***************** -->
  <link rel="stylesheet" href={{asset('BackOffice-Assets/dist/css/My_own_style/my_style.css')}}>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"> <span class="logo-lg"><b style="color:rgb(255, 255, 255)">
        Performance </b><span style="color:rgb(252, 96, 6)"><b>Booster </b></span></span></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">قم بتسجيل الدخول لبدء الجلسة</p>

    <!--___________Content of login____________-->
            @yield('content')

   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src={{asset('BackOffice-Assets/plugins/jQuery/jquery-2.2.3.min.js')}}></script>
<!-- Bootstrap 3.3.6 -->
<script src={{asset('BackOffice-Assets/bootstrap/js/bootstrap-rtl.min.js')}}></script>
<!-- iCheck -->
<script src={{asset('BackOffice-Assets/plugins/iCheck/icheck.min.js')}}></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
