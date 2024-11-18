{{-- ======= Header ======= --}}
<header id="header">
    <div class="header__top">
        <div class="container">
            <div class="item__header__search">
                @guest
                <a href="{{ route('guest.indxe') }}" class="logo">
                    <img src="{{ asset('assets/img/logo/logo_new.png') }}" alt="" class="img-fluid" />
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
            </div>
            <div class="item__header__info">
                @auth
                    <a>
                        <i class="uil uil-eye"></i>
                        Saldo: {{ number_format(Auth::user()->money, 2,',','.') }}kz</a>
                    <button>Depositar</button>
                @endauth

            </div>
        </div>
    </div>
    <div class="container d-flex align-items-center justify-content-between pt-3 pb-3">
        <nav id="navbar" class="navbar">

            <ul>
                <li>
                    @guest
                        <a class="nav-link scrollto active content__icone" href="{{ route('guest.indxe') }}">
                            <i class="uil uil-estate"></i>
                            <span>Home</span>
                        </a>
                    @endguest
                    @auth
                            @if (Auth::user()->company->count() > 0)
                                <a class="nav-link scrollto active content__icone" href="{{ route('companies.index') }}">
                                    <i class="uil uil-estate"></i>
                                    <span>Home</span>
                                </a>
                            @else
                                <a class="nav-link scrollto active content__icone" href="{{ route('guest.indxe') }}">
                                    <i class="uil uil-estate"></i>
                                    <span>Home</span>
                                </a>
                            @endif
                    @endauth

                </li>
                @if (Auth::check())
                    <li>
                        <a class="nav-link scrollto content__icone very" href="{{route('notifications.index') }}">
                            <i class="uil uil-bell"></i>
                            <span>Notificações</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a class="nav-link scrollto content__icone very" href="#{{-- route('notification.index') --}}">
                            <i class="uil uil-bell"></i>
                            <span>Notificações</span>
                        </a>
                    </li>
                @endif


                <li class="item-form">
                    <form action="" method="POST" id="filter">
                        @csrf
                        <input type="text" name="search" value="{{old('search')}}" id="searchs"  placeholder="Pesquisar..." />
                        <a href="#" id="sub_search">
                            <i class="uil uil-search"></i>
                        </a>

                    </form>
                    <div id="product_list">

                    </div>
                </li>


                <!-- Vai ter uma condição -->
                <li class="dropdown">

                    @auth
                        <a href="#">
                            <span>
                                <img src="{{asset(Auth::user()->images)}}" class="avatar" />
                                {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                            </span>
                            <i class="bi bi-chevron-down"></i>
                        </a>


                        <ul>



                                <li>
                                    @unless (!Auth::check())
                                    <a href="{{ route('profile.index') }}">
                                        <span> Perfil </span>
                                    </a>
                                    @endunless
                                </li>

                                <li><a href="pages/compras.html">Minhas Compras</a></li>
                                <li><a href="{{ route('favorite.index') }}">Favoritos</a></li>
                                <li> <a href="#" class="sair">Terminar Sessão</a></li>


                        </ul>
                    @endauth
                    @guest
                        <button class="very btn" style="color:#fff; background-color:#cca332de" >Entrar</button>
                    @endguest
                </li>
                <!-- Vai ter uma condição -->
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
    </div>
</header>
{{-- End Header --}}
