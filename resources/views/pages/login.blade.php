<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  {{--
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css"> --}}

  <!-- Bootstrap CSS -->
  <link href="{{asset('/css/new/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Style -->
  <link href="{{asset('/css/new/login.css')}}" rel="stylesheet">

  <title>Login</title>
</head>

<body class="">
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="{{asset('/img/translator.svg')}}" alt="Image" class="img-fluid" width="75%">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <h3>Login to <strong>WW World</strong></h3>
                <p class="mb-4">
                  WW World Translation Management Platform</p>
              </div>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group first mt-5">
                  <label for="username">Username</label>
                  <input type="text" class="form-control " id="username" name="username" autocomplete="off" required>
                </div>

                <div class="form-group last mt-5">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>

                {{-- <div class="d-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked" />
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                </div> --}}

                @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Username or password is wrong
                  <strong>Please try again !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif

                <input type="submit" value="Login" class="btn text-white btn-block btn-primary mt-5">

                {{-- <span class="d-block text-left my-4 text-muted"> or sign in with</span> --}}

                {{-- <div class="social-login">
                  <a href="#" class="facebook">
                    <span class="icon-facebook mr-3"></span>
                  </a>
                  <a href="#" class="twitter">
                    <span class="icon-twitter mr-3"></span>
                  </a>
                  <a href="#" class="google">
                    <span class="icon-google mr-3"></span>
                  </a>
                </div> --}}
              </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


  <script src="{{asset('/js/new/jquery-3.6.0.min.js')}}">
  </script>

  <script src="{{asset('/js/new/core/popper.min.js')}}">
  </script>

  <script src="{{asset('/js/new/core/bootstrap.min.js')}}">
  </script>

  <script src="{{asset('/js/new/login.js')}}">
  </script>
</body>

</html>