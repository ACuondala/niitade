@extends('layout.app')
@section('content')

<section class="container">
    <div class="row">
      <div class="col-lg-12 main__content_principal">
        <!--  -->
        <div class="mb-4">
          <div class="title__section__favoritos">
            <h4>Listagem dos meus Posts favoritos</h4>
          </div>
        </div>
        <!--  -->
        <!-- Apresentação do Perfil da Empresa e do Usuário -->
        <div class="favoritos mt-4">
            @foreach ($favorites as $favorite)
                <div class="item__favorito bg-white">
                    <div class="bg__produto">
                    <img src="" alt="" />
                    </div>
                    <div class="content__favorito">
                    <a href="product-detalhe.html">
                        <h4>Tecno Spark</h4>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Optio voluptatum sunt cum dolorum autem aspernatur
                    </a>
                    <div class="content__price__produto">
                        <span>Nome Empresa</span>
                        <span>300 AO</span>
                    </div>
                    <button>Deixar de Ser Favorito</button>
                    </div>
                </div>

            @endforeach
            {{--
                <div class="item__favorito bg-white">
                    <div class="bg__produto">
                    <img src="../assets/img/product/product-4.jpg" alt="" />
                    </div>
                    <div class="content__favorito">
                    <a href="product-detalhe.html">
                        <h4>Tecno Spark</h4>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Optio voluptatum sunt cum dolorum autem aspernatur
                    </a>
                    <div class="content__price__produto">
                        <span>Nome Empresa</span>
                        <span>300 AO</span>
                    </div>
                    <button>Deixar de Ser Favorito</button>
                    </div>
                </div>
           --}}
        </div>
        <!-- Apresentação do Perfil da Empresa e do Usuário -->
      </div>
    </div>
  </section>

@endsection
@section('script')

@endsection
