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

                <a>
                <img src="{{ asset('../assets/img/logo/logo.png') }}" />
                </a>
                <p style="font-weight: 700;">Que tipo de conteúdo gostas de consumir?  </p>
                <h6 style="font-weight: 500;">(Selecione pelo menos 3)</h6>
            </div>

            <form action="{{ route('store.interest') }}" method="POST">
                @csrf
                <div class="row"  id="step__one" >
                    <div class=" inputBox col-lg-12 mt-4">
                        @foreach ($interests as $interesse)
                        <div class="col-md-3 ">
                            <input class="btn-check row interest" name="interesse[]" type="checkbox" value="{{ $interesse->id }}" id="defaultCheck1{{ $interesse->id }}">
                            <label  class="btn btn-outline"  for="defaultCheck1{{ $interesse->id }}">
                            {{ $interesse->interest }}
                            </label>
                        </div>
                        @endforeach
                    </div>

                </div>
                <div class="form-group inputBox col-lg-12 mt-4">
                    <input type="submit" id="interest_buttom"   value="Concluir Cadastro"  />
                </div>

            </form>

        </div>
    </main>
    <script src="{{ asset('../assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('../assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>

    <script>

        let interests= document.querySelectorAll('input[type="checkbox"]');
        let buttom=document.getElementById("interest_buttom");
        buttom.disabled=true;


        interests.forEach(interest=>{
            interest.addEventListener("change",()=>{
                let selectedInterests= document.querySelectorAll('input[type="checkbox"]:checked').length;
                console.log(selectedInterests);
                if(selectedInterests >=3){
                    buttom.disabled= false;
                    buttom.style.color="#cca332de";

                }else{
                    buttom.disabled= true;
                }
            });
        });


    </script>
  </body>
</html>
