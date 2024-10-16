@extends('layout.app')

@section('content')
    <section class="container">
        <div class="row" data-company="{{ $companies->id }}">
            <aside class="col-lg-4 position-fixed aside__difference__content__left" style="width: 19%">
                <div class="bg-white border-radius">
                    <!-- Info-card -->
                    @if(Auth::user()->id != $companies->user->id)
                        <div class="capa">
                            <img src="{{ asset($companies->companyImage) }}" />
                        </div>
                        <!-- Info-card -->
                        <div class="pt-2 mt-4 text-center">
                            <p>{{$companies->companyName}}</p>
                            <p>{{ $companies->companySlogna }}</p>

                            <div class="mt-2">
                                <hr />
                            </div>
                        </div>
                    @else
                        <div class="capa">
                            <img src="{{ asset($companies->user->images) }}" alt="" />
                        </div>
                        <!-- Info-card -->
                        <div class="pt-2 mt-4 text-center">
                            <p>{{ $companies->user->firstname }} {{ $companies->user->lastname }}</p>
                            <p>Profissão ou atividade</p>

                            <div class="mt-2">
                                <hr />
                            </div>
                        </div>
                    @endif

                    <div class="p-1 content__ranking">
                        <div class="item">
                            <span>Saldo: </span>
                            <strong>{{ number_format(Auth::user()->money, 2,',','.') }}kz</strong>
                        </div>
                        <div class="item">
                            <span>Favoritos: </span>
                            <strong>55</strong>
                        </div>
                        <div class="item" id="followerCount">
                            <span>Seguidores: </span>
                            <strong >{{ $follow_count }}</strong>
                        </div>
                        <div class="item" id="postCount">
                            <span>Postagens: </span>
                            <strong>{{ $posts }}</strong>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="col-lg-8 col-sm-12 col-12 offset-3 main__content_principal" id="two__section">
                <!-- Apresentação do Perfil da Empresa e do Usuário -->
                <div class="perfil border-radius">
                    <div class="content__perfil bg-white">
                        <div class="capa_perfil_empresa">
                            <div class="content_capa_perfil_empresa">
                                <div class="foto">
                                    <img src="{{ asset($companies->companyImage) }}" />
                                </div>
                                <div class="seetings_empresa">

                                    <div class="row__seetings dropdown-settings">
                                        @if(Auth::user()->id == $companies->user_id)
                                            <button class="shadow-sm dropdown__nitadi mobile__dropdown__nitadi">Definições
                                                <div class="dropdown-content__nitadi">
                                                    <ul>
                                                        <li>
                                                            <a href="#" data-toggle="modal" data-target="#modal__produto" style="font-size:12px;">Add Produto</a>
                                                        </li>
                                                        {{--
                                                        <li>
                                                            <a href="#">Criar Lista</a>
                                                            {{--
                                                            <ul>
                                                                <li>
                                                                    <a href="#">Album</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Menus</a>
                                                                </li>
                                                            </ul>
                                                             --}
                                                        </li> --}}
                                                    </ul>

                                                </div>

                                            </button>
                                        @endif
                                        <button class="shadow-sm ">
                                            <i class="uil uil-map-marker-alt"></i>
                                        </button>
                                        <button class="shadow-md dropdown__nitadi " >
                                            <i class="uil uil-ellipsis-v"></i>

                                            @if ($companies->user_id != Auth::user()->id)
                                                <div class="dropdown-content__nitadi">
                                                    <ul>
                                                        <li>
                                                            <a href="#">Denunciar</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Bloqueiar Empresa</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Bloqueiar Notificação</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @else
                                                <div class="dropdown-content__nitadi">
                                                    <ul>
                                                        <li>
                                                            Estatística:


                                                                <li>
                                                                    <a href="#" style="font-size:75%">Nº de vendas:</a>

                                                                </li>

                                                                <li>
                                                                    <a href="#" style="font-size:75%">Nº de Likes:</a>

                                                                </li>
                                                                <li>
                                                                    <a href="#" style="font-size:65%">Total Facturado:</a>

                                                                </li>

                                                        </li>
                                                        <li>
                                                            <a href="#" style="color:red;font-size:70%;">Eliminar Empresa<i class="fa fa-trash" style="color:red;"></i></a>

                                                        </li>
                                                    </ul>
                                                </div>
                                            @endif

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="describe__empresa">
                            <!-- Descrição da Empresa -->
                            <div class="content__empresa content__describe__empresa">
                                <div class="name__data">
                                    <h3>{{ $companies->companyName }}</h3>
                                    <span>{{ $companies->comanySlogna }}</span>

                                    <div class="estrelas">
                                        <button><i class="uil uil-star"></i></button>
                                        <button><i class="uil uil-star"></i></button>
                                        <button><i class="uil uil-star"></i></button>
                                        <button><i class="uil uil-star"></i></button>
                                        <button><i class="uil uil-star"></i></button>
                                    </div>
                                </div>

                                <p><span>08h:00</span> - <strong>16h:30</strong></p>
                                <div class="fidelizar">


                                    {{-- <div class="buttons follower">
                                        <button id="follower" data-id="{{ $companies->id }}">Fidelizar</button>
                                         <!-- <button>Fidelizado</button> -->
                                    </div> --}}

                                    @if($follow_buttom)
                                        <div class="buttons unfollower">
                                            <button id="unfollower" data-id="{{ $companies->id }}" style="background-color: gray;">Fidelizado</button>
                                            <!-- <button>Fidelizado</button> -->
                                        </div>
                                    @elseif (!($companies->user_id == Auth::user()->id))

                                     <div class="buttons follower">
                                        <button id="follower" data-id="{{ $companies->id }}">Fidelizar</button>
                                         <!-- <button>Fidelizado</button> -->
                                     </div>
                                    @endif




                                    <div class="tipo__empresa">
                                        <strong>{{ $companies->kindCompany->kind }}</strong></small>
                                    </div>
                                </div>
                            </div>
                            <!-- Descrição da Empresa -->
                            <div class="mt-1">
                                <hr />
                            </div>

                            {{-- Products or albuns --}}

                            <div class="content__empresa">
                                <div class="title">
                                    <h4>Vitrine</h4>
                                </div>
                                <div class="content__list_empresa">

                                    @foreach ($products as $product)
                                     <a href="{{ route('product.detail',$product->id) }}" class="item__produto">
                                        <img src="{{ asset($product->images) }}" alt="" />

                                            <h4>{{ $product->name }}</h4>

                                    </a>




                                    @endforeach

                                    {{-- <a href="product-detalhe.html" class="item__produto">
                                        <img src="../assets/img/logo/logo-2.png" alt="" />
                                        <h4>Nome do Produto</h4>
                                    </a>
                                    <a href="product-detalhe.html" class="item__produto">
                                        <img src="../assets/img/logo/logo-2.png" alt="" />
                                        <h4>Nome do Produto</h4>
                                    </a>
                                    <a href="product-detalhe.html" class="item__produto">
                                        <img src="../assets/img/logo/logo-2.png" alt="" />
                                        <h4>Nome do Produto</h4>
                                    </a> --}}
                                </div>
                            </div>
                        </div>

                        <!-- Criar um Tab -->
                        <!-- Produtos da Empresa -->
                        <!-- Produtos da Empresa -->
                        <!-- End Tab -->
                    </div>
                </div>
                <!-- Apresentação do Perfil da Empresa e do Usuário -->
            </div>
        </div>
    </section>


     @include('modals.product')


@endsection

@section('script')

     <script>
        $(document).ready(function(){
            let visitor={{ Auth::user()->id }};
            let companies={{ $companies->id }};
            //console.log(visitor);
            $.ajax({
                url: "{{ route('companyprofile.viewcount') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    profile:visitor,
                    company:companies
                },
                success: function(response) {
                    console.log("Profile view counted or already counted");
                }
            });

            $(".follower").on("click", function(){
                var company_id=$("#follower").data("id");

                $(".follower").html(' <button id="unfollower" data-id="'+company_id+'" style="background-color: gray;">Fidelizado</button> ');
                $.ajax({
                    type:"get",
                    url:"{{ route('follow.store') }}",
                    data:{'company_id':company_id},
                    dataType:"json",
                    success:function(response){
                    $(".follower").html(' <button id="unfollower" data-id="'+company_id+'" style="background-color: gray;">Fidelizado</button> ');
                    }
                });
            });


            $(".unfollower").on("click", function(){
                var company_id=$("#unfollower").data("id");

                $(".unfollower").html(' <button id="follower" data-id="'+company_id+'" >Fidelizar</button> ');
                $.ajax({
                    type:"get",
                    url:"{{ route('follow.destroy') }}",
                    data:{'company_id':company_id},
                    dataType:"json",
                    success:function(response){
                    $(".unfollower").html(' <button id="follower" data-id="'+company_id+'" >Fidelizar</button> ');
                    }
                });
            });



        });
    </script>
@endsection
