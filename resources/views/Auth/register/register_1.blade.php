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
            <form action="/register/step1" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="avatar__photo">
                    <label class="avatar__perfil picture" tabindex="0">
                      <input type="file" name="images" accept="image/*" id="picture__input" />
                      <span class="picture__image"></span>
                    </label>
                </div>
                <div class="row p-5" id="step__one">
                    <div class="form-group row">
                        <div class="inputBox col-lg-6 mt-2">
                            <input type="text" name="firstname" value="{{ old('firstname') }}" class="form-control-lg" required @error('firstname') is-invalid @enderror />
                            <span>Nome</span>
                            @error('firstname')
                            <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="inputBox col-lg-6 mt-2">
                            <input type="Text" name="lastname" value="{{ old('lastname') }}" class="form-control-lg" required @error('lastname') is-invalid @enderror />
                            <span>Sobrenome</span>
                            @error('lastname')
                            <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="inputBox col-lg-6 mt-2">
                            <input type="date" name="dob" placeholder="Selecione a data" value="{{ old('dob') }}" class="form-control-lg" required @error('dob') is-invalid @enderror/>
                           <span>Data de Nascimento</span>
                            @error('dob')
                            <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="inputBox col-lg-6 mt-2">
                            <select name="gender" value="{{ old('gender') }}" class="form-control" id="" @error('gender') is-invalid @enderror>
                              <option value="">Sexo/Género</option>
                              <option value="M">Masculino</option>
                              <option value="F">Feminino</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="inputBox col-lg-4 mt-2">
                            <input type="submit" value="Próximo 1/3" />

                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12 mt-4 text-center">
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

        //////////////////////////////////////////////////////////////////////////////////////
        const inputFilePublicitarFeed = document.querySelector("#picture__input");
        const pictureImage = document.querySelector(".picture__image");

        // Empresa
        //const inputFileLogoEmpresa = document.querySelector("#add__logo");
        //const LogoPreview = document.querySelector(".logo__preview");

        // AVATAR PARA ALTERAR FOTO DO PERFIL

        function previewFilePhoto(pictureImage, inputFile) {
        const pictureImageTxt = "Foto";
            pictureImage.innerHTML = pictureImageTxt;

            inputFile.addEventListener("change", e => {
                const inputTarget = e.target;
                const file = inputTarget.files[0];

                console.log(file);
                if (file) {
                const reader = new FileReader();

                reader.addEventListener("load", function (e) {
                    const readerTarget = e.target;
                    const img = document.createElement("img");

                    img.src = readerTarget.result;
                    img.classList.add("picture__img");

                    pictureImage.innerHTML = "";
                    pictureImage.appendChild(img);
                });

                reader.readAsDataURL(file);
                } else {
                pictureImage.innerHTML = pictureImageTxt;
                }
            });
        }

        previewFilePhoto(pictureImage, inputFilePublicitarFeed);

    </script>
  </body>
</html>
