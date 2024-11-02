
@extends('layout.app')

@section('content')


    <section class="container">
        <div class="row">
        <div class="col-lg-12 main__content_principal">
            <!-- Apresentação do Perfil da Empresa e do Usuário -->
            <div class="notificacao">
            <div class="content__notificacao mt-2">
                <div class="bg-white border-radius p-2 notificacao__item">
                <div
                    class="avatar__user__notification"
                    data-toggle="modal"
                    data-target="#AbrirNoficacaoNoSeuTodo"
                >
                    <div class="avatar__user">
                    <div class="avatar">
                        <img src="../assets/img/avatar/avatar.jpg" alt="" />
                        <span>Pedro Makengo</span>
                    </div>
                    <span><strong>Gostou do teu produto...</strong></span>
                    </div>
                </div>
                <div class="action__notification">
                    <a href="#eliminar">
                    <i class="uil uil-trash"></i>
                    </a>
                </div>
                </div>

                <!-- MODAL DE VISUALIZAÇÃO DE CONTÉUDOS NO SEU TODO -->
                <div
                class="modal fade"
                id="AbrirNoficacaoNoSeuTodo"
                data-backdrop="static"
                data-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
                >
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                        Mais detalhes da notifação
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
                        <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Odio quos dolores accusamus quo fuga cupiditate
                        totam porro fugit, autem distinctio nostrum modi nam
                        asperiores, illo, eligendi error. Repellendus, illum
                        rerum!
                        </p>

                        <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Odio quos dolores accusamus quo fuga cupiditate
                        totam porro fugit, autem distinctio nostrum modi nam
                        asperiores, illo, eligendi error. Repellendus, illum
                        rerum!
                        </p>
                    </div>
                    </div>
                </div>
                </div>
                <!-- END MODAL DE VISUALIZAÇÃO DE CONTÉUDOS NO SEU TODO -->
                <div class="bg-white border-radius p-2 notificacao__item">
                <div
                    class="avatar__user__notification"
                    data-toggle="modal"
                    data-target="#AbrirNoficacaoNoSeuTodo"
                >
                    <div class="avatar__user">
                    <div class="avatar">
                        <img src="../assets/img/avatar/avatar.jpg" alt="" />
                        <span>Pedro Makengo</span>
                    </div>
                    <span><strong>Gostou do teu produto...</strong></span>
                    </div>
                </div>
                <div class="action__notification">
                    <a href="#eliminar">
                    <i class="uil uil-trash"></i>
                    </a>
                </div>
                </div>
            </div>
            </div>
            <!-- Apresentação do Perfil da Empresa e do Usuário -->
        </div>
        </div>
    </section>

@endsection

@section('script')
<script src="../assets/js/main.js"></script>
@endsection
