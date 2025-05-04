<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('backend/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('backend/modules/bootstrap-social/bootstrap-social.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/components.css') }}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ asset('backend/img/logo.png') }}" alt="logo" width="100">
            </div>
            @if(session('success'))
            <div class="alert alert-primary alert-dismissible show fade">
                <div class="alert-body">
                    <i class="far fa-lightbulb"></i>
                    <button class="close" data-dismiss="alert">
                    <span>×</span>
                    </button>
                    {{ session('success') }}
                </div>
            </div>
            @endif

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                    @csrf
                  <div class="form-group">
                    <label for="email">Username</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>
                    
                    <!-- Tampilkan pesan error untuk email -->
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    
                    <!-- Tampilkan pesan error untuk password -->
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        {{ __('Login') }}
                    </button>
                  </div>
                </form>
                <p> Belum punya akun? <a href="{{ route('Daftar') }}">Daftar</a></p>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; D0220014 2024
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('backend/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/modules/popper.js') }}"></script>
  <script src="{{ asset('backend/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('backend/js/stisla.js') }}"></script>
</body>
</html>
