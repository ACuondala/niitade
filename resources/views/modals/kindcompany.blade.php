    {{-- MODAL DE REGISTRO DE EMPRESA --}}
    <div class="modal fade" id="modal__tipo__empresa" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Selecione o tipo de empresa
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        @auth
                            @if(Auth::user()->company->count()!=2)
                                <div class="botaoApresentadoTipoEmpresas ModaltipoEmpresa">
                                    <button data-toggle="modal" data-target="#modal__registro__empresa">
                                        <img src="" alt="" />
                                        <span>Empresa</span>
                                    </button>

                                    <button data-toggle="modal" data-target="#modal__entregador">
                                        <img src="" alt="" />
                                        <span>Entregador(a)</span>
                                    </button>
                                </div>
                            @else
                                <div style="justify-content: center;" class="botaoApresentadoTipoEmpresas ModaltipoEmpresa">
                                    <button data-toggle="modal"  data-target="#modal__entregador">
                                        <img src="" alt="" />
                                        <span>Entregador(a)</span>
                                    </button>
                                </div>
                            @endif
                        @endauth
                        @guest
                        <div class="botaoApresentadoTipoEmpresas ModaltipoEmpresa">
                            <button>
                                <img src="" alt="" />
                                <span>Empresa</span>
                            </button>

                            <button>
                                <img src="" alt="" />
                                <span>Entregador(a)</span>
                            </button>
                        </div>
                        @endguest

                </div>
            </div>
        </div>
    </div>

