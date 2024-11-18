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
    <link rel="stylesheet" href="{{ asset('../assets/css/partials/sign-now.css') }}" />
    <link rel="stylesheet" href="{{ asset('../assets/css/partials/inputBox.css') }}" />
  </head>

  <body>
    <main class="content__login">
        <div class="banner__register"></div>
        <div class="form__register">
            <div class="logo">
                <a href="{{ route('login.index') }}">
                <img src="{{ asset('../assets/img/logo/logo_new.png') }}" />
                </a>
                <p>Regista-te na Nitadi</p>
            </div>
            <form action="/register/step2" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row p-5" id="step__one">
                    <div class="form-group inputBox col-lg-6 mt-2">
                        <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control-lg" required @error('phone') is-invalid @enderror />
                        <span>Número de Telefone</span>
                        @error('phone')
                        <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group inputBox col-lg-6 mt-2">
                        <input type="tel" name="otherphone" value="{{ old('otherphone') }}" class="form-control-lg"  @error('otherPhone') is-invalid @enderror />
                        <span>Número de Telefone Alternativo</span>
                        @error('otherphone')
                        <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group inputBox col-lg-6 mt-2">
                        <input type="password" name="password" class="form-control-lg" required @error('password') is-invalid @enderror />
                        <span>Definir Senha</span>
                        @error('password')
                        <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group inputBox col-lg-6 mt-2">
                        <input type="password" name="confirm"  class="form-control-lg" required @error('confirm') is-invalid @enderror/>
                        <span>Confirmar Senha</span>
                        @error('confirm')
                        <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group inputBox col-lg-4 mt-2">
                        <input type="submit" value="Próximo 2/3" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-2 text-center">
                      <p>Já tens uma conta? <a href="{{ route('login.index') }}" style="
                        color: #cca332de;
                        text-decoration: underline;
                    ">Iniciar sessão</a></p>
                    </div>
                  </div>
            </form>
        </div>
    </main>
    <script src="{{ asset('../assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('../assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
  </body>
</html>
