<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Nitadi App</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v3.0.6/css/line.css"
    />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="{{ asset('../assets/vendor/bootstrap/css/bootstrap.min.css') }}"
      rel="stylesheet"
    />
    <link
      href="{{ asset('../assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
      rel="stylesheet"
    />

    <!-- Template Main CSS File -->
    <link href="{{ asset('../assets/css/style.css" rel="stylesheet') }}" />
    <link rel="stylesheet" href="{{ asset('../assets/css/partials/login.css') }}" />
    <link rel="stylesheet" href="{{ asset('../assets/css/partials/inputBox.css') }}" />
  </head>

  <body>
    <main class="content__login">
      <div class="banner__form_login">
        <div class="logo">
          <a href="{{ route('login.index') }}">
            <img src="{{ asset('../assets/img/logo/logo.png') }}" />
          </a>
          <p>Entrar para outra Dimensão</p>
        </div>

        <form action="{{ route('login.store') }}" method="POST">
            @csrf
          <div class="row p-5">
            <div class="form-group inputBox col-12 col-sm-12 col-lg-12">
              <input type="tel" name="phone" placeholder="Número de Telefone" class="form-control-lg" required />
              {{-- <span>Número de Telefone</span> --}}
            </div>
            <div class="form-group inputBox col-12 col-sm-12 col-lg-12 mt-3">
                <input type="password" name="password" placeholder="Password" class="form-control-lg" required id="id_password" />
                <i class="uil uil-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                {{-- <span>Password</span> --}}
            </div>
            <div class="form-group col-12 col-sm-12 col-lg-12 mt-4">
              <button class="form-control form-control-lg">
                Iniciar Sessão
              </button>
            </div>

            <div class="mt-4 remember__password">
              <label for="remember">
                <input type="checkbox" id="remember" name="remember" />
                Lembrar-me
              </label>
            </div>

            <div class="col-lg-12">
              <hr />
              <p class="mt-2 text-center">
                Não tenho uma conta? <a href="{{ route('register1') }}">Criar conta</a>
              </p>
            </div>
          </div>
        </form>
      </div>
      <div class="banner__login"></div>
    </main>
    <!-- Vendor JS Files -->
    <script src="{{ asset('../assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('../assets/js/main.js') }}"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
  </body>
</html>
