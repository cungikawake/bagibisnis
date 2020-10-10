
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Register Akun - Joinjob.id">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Register Akun - Joinjob.id</title>
    <!-- Favicon-->
    <link rel="icon" href="img/icons/icon-72x72.png">
    <!-- Apple Touch Icon-->
    <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
    <!-- Stylesheet-->
    <link rel="stylesheet" href="https://designing-world.com/suha-v2.1.0/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Web App Manifest-->
    <link rel="manifest" href="https://designing-world.com/suha-v2.1.0/manifest.json">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <style>
        .login-wrapper {
            background: linear-gradient(to left, #17a2b8, #0d3bd1);
        }
    </style>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
            <img src="{{ asset('asset/logo.jpg') }}" alt="joinjob" style="max-height:100px;border-radius:50%;" class="big-logo">
            <h4 class="faq-heading text-center text-white">Join Informasi Antar Provinsi</h4>
            <h6 class="faq-heading text-center text-white">Free Sign-Up</h6>
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="form-group text-left mb-4"><span>Nama Pengguna</span>
                    <label for="username"><i class="fas fa-user"></i></label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Nama Pengguna') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group text-left mb-4"><span>Email</span>
                    <label for="email"><i class="fas fa-envelope"></i></label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail') }}">
                    <small>Email akan digunakan untuk masuk ke bisnis anda</small>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group text-left mb-4"><span>Kata Sandi</span>
                    <label for="password"><i class="fas fa-key"></i></label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"   placeholder="********************">
                    <small>Minimal 8 digit</small>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group text-left mb-4"><span>Ulangi Kata Sandi</span>
                    <label for="password"><i class="fas fa-key"></i></label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Konfirmasi Sandi') }}"   placeholder="********************">
                     
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $password_confirmation }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group text-left mb-4"> 
                    <div class="alert alert-warning">
                        <p> Anda Menggunakan Paket Free Joinjob Member. Gratis 5 X Posting Selama 10.Hari</p>
                    </div>
                </div>
                <div class="form-group text-left mb-4"> 
                    <input type="checkbox" name="aggree" required>
                    <span>Dengan Membuat Akun JOINJOB, Saya Setuju</span>
                    <p><span>Dengan <a href="#">Syarat & Ketentuan</a> Dan <a href="#">Kebijakan Privacy</a>.</span></p>
                </div>

                <button class="btn btn-success btn-lg w-100" type="submit">Sign Up</button>
              </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data">
              <p class="mt-3 mb-0">Kamu sudah punya Akun ?<a class="ml-1" href="/login">Sign In</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="https://designing-world.com/suha-v2.1.0/js/jquery.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/waypoints.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/jquery.easing.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/owl.carousel.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/jquery.counterup.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/jquery.countdown.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/default/jquery.passwordstrength.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/wow.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/jarallax.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/default/dark-mode-switch.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/default/active.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/pwa.js"></script>
  </body>
</html>