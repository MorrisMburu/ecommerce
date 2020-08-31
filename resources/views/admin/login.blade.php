<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Login | </title>

    <!-- Bootstrap -->
    <link href="/backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/backend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/backend/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/backend/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
     

      <div class="login_wrapper">
         
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{url('/admin')}}" method="post">
              @csrf
              <h1>Login Form</h1>
              @if(Session::has('error_message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{Session::get('error_message')}}
                </div>
              @endif

              @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                      @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                      @endforeach
                    </ul>
                </div>
              @endif
              <div>
                <input type="email" name="email" id="email" class="form-control" placeholder="email" required="" />
              </div>
              <div>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" >Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>  
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
