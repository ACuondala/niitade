{{-- ENTREGADOR --}}
<div class="modal fade" id="modal__entregador" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="staticBackdropLabel">Entregador</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="scroll__form">
                    <form action="{{ route('delivery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-lg-4"></div>

                            <div class="form-group col-lg-4 align-self-center">
                                <div class="avatar__photo">
                                    <label class="avatar__perfil picture" tabindex="0">
                                        <input type="file" name="images" accept="image/*" id="delivery__input" />
                                        <span class="delivery__image"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4"></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 mt-4">
                                <p>Dados do Motorista</p>
                                <hr />
                            </div>

                            <div class="form-group inputBox col-lg-4 mt-4">
                                <input type="text" name="firstname" class="form-control-lg" required />
                                <span>Nome do Motorista</span>
                            </div>
                            <div class="form-group inputBox col-lg-4 mt-4">
                                <input type="text" name="lastname" class="form-control-lg" required />
                                <span>Sobrenome</span>
                            </div>
                            <div class="form-group inputBox col-lg-4 mt-4">
                                <select name="" class="form-control-lg province" >
                                    <option value="">Selecione Província</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->province }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group inputBox col-lg-4 mt-4">
                                <select name="" class="form-control-lg municipe" >
                                    <option value="">Selecione Município</option>

                                </select>
                            </div>


                            <div class="form-group inputBox col-lg-4 mt-4">
                                <select name="bairro_id" class="form-control-lg neighbor" >
                                    <option value="">Selecione Bairro</option>

                                </select>
                            </div>

                            <div class="form-group inputBox col-lg-4 mt-4">
                                <input type="tel" name="phone" class="form-control-lg" required />
                                <span> Telefone</span>
                            </div>
                            <div class="form-group inputBox col-lg-12 mt-4">
                                <input type="text" name="address" class="form-control-lg" required />
                                <span>Enderço</span>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col-lg-12 mt-4">
                                <p>Dados do Veículo</p>
                                <hr />
                            </div>
                            <div class="form-group inputBox col-lg-4 mt-4">
                                <select name="kindVehicle_id" class="form-control-lg kindVehicle" >
                                    <option value="">Tipologia Veículo</option>

                                    @foreach ($kindVehicle as $kind)
                                        <option value="{{ $kind->id }}">{{ $kind->kind }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group inputBox col-lg-4 mt-4">
                                <select name="marca_id" class="form-control-lg marca" >
                                    <option value="">Marca</option>

                                </select>
                            </div>

                            <div class="form-group inputBox col-lg-4 mt-4">
                                <select name="model_id" class="form-control-lg modelo" >
                                    <option value="">Modelo Veículo</option>

                                </select>
                            </div>

                            <div class="form-group inputBox col-lg-4 mt-4">
                                <input type="text" name="matricula" class="form-control-lg" required />
                                <span>Matricula</span>
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="logo">Foto de capa</label>
                                <input type="file" name="carImage1" id="logo" class="form-control-lg logo" />
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="logo">Outras fotos</label>
                                <input type="file" multiple name="carImage2" id="logos"
                                    class="form-control-lg logo" />
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-lg-12 mt-4">
                                <p>Documentação Exigida</p>
                                <hr />
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="bi">BI</label>
                                <input type="file" name="bi" id="bi" class="form-control-lg" />
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="bi">Carta de Condução</label>
                                <input type="file" name="cartaConducao" id="cartaConducao"
                                    class="form-control-lg" />
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="bi">Registro Criminal</label>
                                <input type="file" name="registroCriminal" id="registroCriminal"
                                    class="form-control-lg" />
                            </div>
                            <div class="form-group col-lg-12 mt-3">
                                <label for="bi">

                                    <input type="checkbox" value="1" name="activeLocationApp" />
                                    Activar Localização enquanto usa o App
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group inputBox col-lg-4 mt-4">
                                <input type="submit" value="Solicitar Aprovação" class="form-control-lg" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END ENTREGADOR --}}
