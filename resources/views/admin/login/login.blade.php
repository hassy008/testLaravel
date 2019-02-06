<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Login</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="{{ asset('/public/admin/') }}/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="{{ asset('/public/admin/') }}/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="{{ asset('/public/admin/') }}/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="{{ asset('/public/admin/') }}/css/style.css" rel="stylesheet" />
   <link href="{{ asset('/public/admin/') }}/css/style-responsive.css" rel="stylesheet" />
   <link href="{{ asset('/public/admin/') }}/css/style-default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="lock">
    <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="{{ url('/admin') }}">
            <img class="center" alt="logo" src="{{ asset('/public/admin/') }}/img/logo.png">
        </a>
        <!-- END LOGO -->
    </div>

{!! Form::open(['url'=>'/admin_login', 'method'=>'post']) !!}    

<h3  class="text text-center text-danger"  style="color:red">
    <?php
      $exception = Session::get('exception');
      if(isset($exception)){
        echo $exception;
        Session::put('exception');
        }
    ?>   
    </h3>
    <h3 class="text text-center text-danger"  style="color:white">
      <?php 
        $msg = Session::get('message');
        if(isset($msg)){
          echo $msg;
          Session::put('message','');
          }
      ?>
      
    </h3>

    <div class="login-wrap" >
        <div class="metro single-size red">
            <div class="locked">
                <i class="icon-lock"></i>
                <span>Login</span>
            </div>
        </div>
        <div class="metro double-size green">
                <div class="input-append lock-input">
                    <input type="text" class="" name="email" placeholder="Email">
                </div>
            </form>
        </div>
        <div class="metro double-size yellow">
                <div class="input-append lock-input">
                    <input type="password" class="" name="password" placeholder="Password">
                </div>
        </div>
        <div class="metro single-size terques login">
                <button type="submit" class="btn login-btn">
                    Login
                    <i class=" icon-long-arrow-right"></i>
                </button>

{!! Form::close() !!}                
        </div>        

 

        <div class="login-footer">
            <div class="remember-hint pull-left">
                <input type="checkbox" id=""> Remember Me
            </div>
            <div class="forgot-hint pull-right">
                <a id="forget-password" class="" href="javascript:;">Forgot Password?</a>
            </div>
        </div>
    </div>
</body>
<!-- END BODY -->
</html>