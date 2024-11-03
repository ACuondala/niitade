<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Nitadi App</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <link
      rel="stylesheet"
      href="{{ asset('https://unicons.iconscout.com/release/v3.0.6/css/line.css') }}"
    />

    <!-- Google Fonts -->
    <link
      href="{{ asset('https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}"
      rel="stylesheet"
    />
    <link
      href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
      rel="stylesheet"
    />

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>


    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/niladi.css') }}" />

    <link href="{{ asset('../assets/css/partials/perfil.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/partials/favoritos.css') }}" rel="stylesheet" />
    <link href="{{ asset('../assets/css/partials/search.css') }}" rel="stylesheet" />
    <link href="{{ asset('../assets/css/partials/detalheProduto.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/partials/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/partials/inputBox.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/splide.min.css') }}" />
    <link href="../assets/css/partials/favoritos.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.css') }}">


    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>

  </head>

  <body>

    @include('layout.partials.header')




    <!-- MODAL MOBILE ADICIONAR ALGUNS FUNCIONALIDADES -->
    <div
      class="modal fade"
      id="modal__mobile__adicionar"
      data-backdrop="static"
      data-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
              O que pretendes fazer?
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="modal__plus">
              <ul>

                <li>
                  <a
                    href="#"
                    data-toggle="modal"
                    data-target="#tipo__postagem__feed"
                    >Publicitar no Feed</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    data-toggle="modal"
                    data-target="#modal__tipo__empresa"
                    >Criar Empresa</a
                  >
                </li>
                @auth
                <li>
                    <button class="dropdown__nitadi">
                      Minhas Empresas <i class="uil uil-angle-down"></i>
                      <div class="dropdown-content__nitadi">
                        <ul>

                           @foreach (Auth::user()->mobileCompanies() as $company)
                              <li>
                                  @if ($company->status == "active")
                                  <a href="{{ route('companies.profile', $company->companyName) }}" class="actives" data-active="{{ $company->id }}">{{ $company->companyName }} </a>
                                  @else
                                  <a href="#" style="font-size: 15px;color:grey;" class="inactives" data-inactive="{{ $company->id }}"> {{ $company->companyName }} </a>
                                  @endif
                              </li>
                          @endforeach


                        </ul>
                      </div>
                    </button>
                  </li>
                @endauth

                <!-- <li>
                 <a href="#">Geolocal: Add Residência no Mapa</a>
               </li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- MODAL MOBILE ADICIONAR ALGUNS FUNCIONALIDADES -->

    <!-- MODAL TIPO POSTAGEM -->
    <div
      class="modal fade"
      id="tipo__postagem__feed"
      data-backdrop="static"
      data-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
              Onde pretendes publicitar ?
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="botaoApresentadoTipoEmpresas">
              <button data-toggle="modal" data-target="#modal__postagem__feed">
                <img src="" alt="" />
                <span>Feed</span>
              </button>

              <button
                data-toggle="modal"
                data-target="#modal__postagem__perfil"
              >
                <img src="" alt="" />
                <span>Galeria de Novidades</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END TIPO POSTAGEM -->


    <!-- Trabalhando na parte principal do Projeto -->
    @auth
        <main class="main__section " data-interest="{{ (Auth::user()->interestUser() == null )? 0: Auth::user()->interestUser()}}">
    @endauth
    @guest
        <main class="main__section " >
    @endguest
        @yield('content')

    </main>
    <!-- Trabalhando na parte principal do Projeto -->

    <!-- Menu Mobile -->
    <div id="mobile-header-top">
      <div class="container">

        @guest
                <a href="{{ route('guest.indxe') }}" class="logo">
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="" class="img-fluid" />
                </a>
                @endguest

                @auth
                    @if(Auth::user()->company->count() !=0)
                        <a href="{{ route('companies.index') }}" class="logo">
                            <img src="{{ asset('assets/img/logo/logo.png') }}" alt="" class="img-fluid " />
                        </a>
                    @else
                        <a href="{{ route('guest.indxe') }}" class="logo">
                            <img src="{{ asset('assets/img/logo/logo.png') }}" alt="" class="img-fluid" />
                        </a>
                    @endif
                @endauth
        <button class="open__menu">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Menu Mobile -->
      <div class="menu-mobile">
        <div class="header-top-menu">
          <button class="btn__close">
            <i class="fa fa-times"></i>
          </button>
        </div>
        <ul>
            @Auth
                <li>
                    <a href="#">Meu Saldo <strong>{{ number_format(Auth::user()->money, 2,',','.') }}kz</strong></a>
                </li>
            @endauth
            @guest()
                <li>
                    <a href="#">Meu Saldo <strong>{{ number_format(0, 2,',','.') }}kz</strong></a>
                </li>
            @endguest
            @Auth
                <li>
                    <a href="pages/favoritos.html">Minha Compras</a>
                </li>

                <li>
                    <a href="{{ route('favorite.index') }}">Favoritos</a>
                </li>

                <li>
                    <a href="#" class="sair">Terminar Sessão</a>
                </li>
            @endauth
        </ul>

      </div>
      <!-- Menu Mobile -->
    </div>

    <div id="mobile-header">
      <div class="container">
        <nav>
          <ul>
            @if(Auth::check())
                <li>
                    <a href="{{ route('companies.index') }}">
                        <i class="uil uil-home"></i>
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('guest.indxe') }}">
                        <i class="uil uil-home"></i>
                    </a>
                </li>
            @endif
            @auth
            <li>
              <a href="#" data-toggle="modal" data-target="#pesquisa">
                <i class="uil uil-search"></i>
              </a>
            </li>
            @endauth
            @guest
            <li>
              <a href="#" class="very" data-toggle="modal" data-target="#">
                <i class="uil uil-search"></i>
              </a>
            </li>
            @endguest

            <li>
              <a
                href="#"
                data-toggle="modal"
                data-target="#modal__mobile__adicionar"
              >
                <i class="uil uil-plus"></i>
              </a>
            </li>
            <li>
              <a href="pages/notificacao.html">
                <i class="uil uil-bell"></i>
              </a>
            </li>
            @if (Auth::check())
                <li>
                    <a href="{{ route('profile.index') }}">
                        <span>
                            <img src="{{asset( Auth::user()->images )}}" class="avatar" />
                        </span>
                    </a>
                </li>
            @else
                <li>
                    <a href="#" class="very">
                    <i class="uil uil-user"></i>
                    </a>
                </li>
            @endif

          </ul>
        </nav>
      </div>
    </div>
    <!-- Menu Mobile -->

    <!-- MODAL PESQUISAR -->
    <div
      class="modal fade"
      id="pesquisa"
      data-backdrop="static"
      data-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-centered modal-pesquisa">
        <div class="modal-content">
          <div class="modal-header">
            <p class="modal-title" id="staticBackdropLabel">Pesquisar</p>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST">
              <input type="text" placeholder="Pesquisar..." />
              <button>
                <i class="uil uil-search"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- END MODAL PESQUISAR -->












    <!-- Vendor JS Files -->
    <!-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- Template Main JS File -->
    @include('modals.login')
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/verify__auth.js') }}"></script>
    <script src="{{ asset('assets/js/avatar__file__input.js') }}"></script>
    <script src="{{ asset('assets/js/feed__file__input.js') }}"></script>
    <script src="{{ asset('assets/js/splide.min.js') }}"></script>
    <script src="{{ asset('assets/js/nitadi.js') }}"></script>
    <script src="{{ asset('assets/js/post__monety.js') }}"></script>

    {{-- <script src="{{ asset('assets/js/main.js') }}"></script> --}}
    <script>
        $(".very").on("click",function(){
            @if(Auth::check())
                // If the user is authenticated, you can redirect them or perform another action
                window.location.href = "#";
            @else
                // If the user is not authenticated, show the login modal
                $('#loginModal').modal('show');
            @endif

        });
      //new Splide('.splide').mount();



    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');

    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });


    /*document.querySelector('.star-rating').addEventListener('change', function (e) {
        const rating = e.target.value;
        //console.log(`Classificação: ${rating} estrelas`);
        // Podes adicionar código para enviar a classificação para um servidor ou processar a informação
    });*/
    $(".close").on("click",function(){
        $(".close").modal('hide');
    });
      $(document).ready(function() {
        qtdInterest=$('.main__section ').data('interest');

        /*$('.carousel').slick({
            dots: true,
            slidesToScroll: 1,
            infinite: false,
            arrows: true,
            //cssEase: 'linear',
            adaptiveHeight: true
            centerMode: true,
            focusOnSelect: true
        });*/
        if( qtdInterest == 0){
            $('#interest').modal({
                backdrop: 'static',
                keyboard: false
            });
            let modalTimeout=setTimeout(function(){
                $('#interest').modal('show');
            },5000);

        }
        /*$('.close').on('click',function(){
            clearTimeout(modalTimeout);
        });*/


            $(".sair").on('click', function(e) {
                e.preventDefault();

                $.ajax({
                    url: '/logout',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function() {

                        window.location = "{{ route('login.index') }}";
                    }
                });
            });

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
    @yield('script')
  </body>
</html>
