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
                <img src="{{ asset('../assets/img/logo/logo.png') }}" />
                </a>
                <p>Regista-te na Nitadi</p>
            </div>
            <form action="/register/step3" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row p-5" id="step__one">

                    <div class="form-group inputBox col-lg-6 mt-2">
                        <select name="" class="form-control-lg country" id="">
                            <option value="">Selecione País</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->country }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group inputBox col-lg-6 mt-2">
                        <select name="" class="form-control-lg province" id="">
                            <option value="">Selecione Província</option>

                        </select>
                    </div>
                    <div class="form-group inputBox col-lg-6 mt-2">
                        <select name="" class="form-control-lg municipe" id="">
                            <option value="">Selecione Município</option>

                        </select>
                    </div>
                    <div class="form-group inputBox col-lg-6 mt-2">
                        <select name="neighbor_id" class="form-control-lg neighbor" id="">
                            <option value="">Selecione Bairro</option>

                        </select>
                    </div>

                    <div class="form-group col-lg-12 mt-2">
                        <input type="checkbox" name="terms" value="1" id="termo" @error('terms') is-invalid @enderror />
                        <label for="termo"> Aceitar Termos & Politicas </label>
                        @error('terms')
                    <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                        <div class="form-group inputBox col-lg-4 mt-2">
                            <input type="submit" value="Concluir Cadastro" />
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
    <script>
        $(document).ready(function() {

            //====================================
            $(".country").on('change', function() {
                var country = $(this).val();

                $(".province").html('<option value="">Selecione a Provincia</option>')
                $.ajax({
                    type: "get",
                    url: "{{ route('register.getProvinces') }}",
                    data: {
                        'country': country
                    },
                    dataType: "json",
                    success: function(response) {

                        $.each(response.provinces, function(key, value) {
                            $(".province").append('<option value=" ' + value.id +
                                ' ">' + value.province + '</option>');
                        });
                    }
                });
            });
            //======================================

            //======================================
            $(".province").on('change', function() {
                var provinces = $(this).val();

                $(".municipe").html('<option value="">Selecione Município</option>')
                $.ajax({
                    type: "get",
                    url: "{{ route('register.getMunicipes') }}",
                    data: {
                        'provinces': provinces
                    },
                    dataType: "json",
                    success: function(response) {

                        $.each(response.municipes, function(key, value) {
                            $(".municipe").append('<option value=" ' + value.id +
                                ' ">' + value.municipe + '</option>')
                        });
                    }
                });
            });
            //========================================

            //========================================
            $('.municipe').on('change', function() {
                var municipes = $(this).val();
                $(".neighbor").html('<option value="">Selecione Bairro</option>')
                $.ajax({
                    type: "get",
                    url: "{{ route('Register.getNeighbors') }}",
                    data: {
                        'municipe': municipes
                    },
                    dataType: "json",
                    success: function(response) {

                        $.each(response.neighbors, function(key, value) {
                            $(".neighbor").append('<option value="' + value.id +
                                '">' + value.neighbor + '</option>')
                        });
                    }
                });
            });
            //========================================
        });
    </script>
  </body>
</html>
