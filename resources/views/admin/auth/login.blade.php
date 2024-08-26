
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ !empty($title) ? $title : " " }} | E-Commerce</title>

  <link rel="icon" href="{{ asset('assets/dist/img/AdminLTELogo.png')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>

<Style>
  body{
    background: url('{{ asset('assets/dist/img/larashop.jpg') }}');
    background-attachment: fixed;
    backface-visibility: visible;
    background-size: cover;
    background-repeat: no-repeat;

  }
</Style>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="javascript:void(0)" class="h2"><b>Login</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login to Your Account</p>

      @include('admin.layouts._message')

      <form action="" method="post">

            @csrf

        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="E-Mail" name="email" id="email" value="{{ old('email') }}" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password"  value="{{ old('password') }}" id="password" required>
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
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

<script>


$(document).ready(function() {
    $('#loginForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '{{ route("login") }}',
            data: formData,
            dataType:'json'
            success: function(response) {

                if (response.status == 'success') {
                    $('#showMessage').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                        '<strong>'+response.message+'</strong>'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>').show();
                    // window.location.href = '/dashboard';

                }else{
                    $('#showMessage').html('<div id="message" class="alert alert-danger alert-dismissible fade show" role="alert">'+
                        '<strong>'+response.message+'</strong>'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>').show();
                }
            },
            error: function(xhr, status, error) {
                $('#showMessage').html('<div id="message" class="alert alert-danger alert-dismissible fade show" role="alert">'+
                    '<strong>'+xhr.responseJSON.message+'</strong>'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>').show();

            }
        });
    });
});
</script>


</body>
</html>
