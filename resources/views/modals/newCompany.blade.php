 {{-- MODAL DE REGISTRO DE EMPRESA --}}
 <div class="modal fade" id="modal__registro__empresa" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <p class="modal-title" id="staticBackdropLabel">
                     Criação de uma empresa
                 </p>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div>

                     <form action="{{route('store.company')}}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="container">
                             <div class="row justify-content-center">
                                 <div class="col-lg-4"></div>

                                 <div class="form-group col-lg-4 align-self-center">
                                     <div class="avatar__photo">
                                         <label class="avatar__perfil company" tabindex="0">
                                             <input type="file" name="images" accept="image/*"
                                                 id="company__input" />
                                             <span class="company__image"></span>
                                         </label>
                                     </div>
                                 </div>

                                 <div class="col-lg-4"></div>
                             </div>
                         </div>
                         <div class="row justify-content-center">
                             <div class="form-group inputBox col-lg-4 mt-4">
                                 <select name="tipo_empresa_id" class="form-control-lg" id="naturezaNegocio" required>
                                     <option value="">Natureza do Negócio</option>
                                     @foreach ($kind_companies as $kind)
                                         <option value="{{ $kind->id }}">{{ $kind->kind }}</option>
                                     @endforeach
                                 </select>

                             </div>
                         </div>

                         <div class="row">
                             <div class="form-group inputBox col-lg-4 mt-4">
                                 <input type="text" name="nome" class="form-control-lg" required />
                                 <span>Nome da Empresa</span>
                             </div>
                             <div class="form-group inputBox col-lg-4 mt-4">
                                 <input type="text" name="slogan" class="form-control-lg" required />
                                 <span>Slogan da Empresa</span>
                             </div>
                             {{--
                            <div class="form-group inputBox col-lg-3 mt-4">
                            <select name="tipo_empresa_id" class="form-control-lg" id="">
                                <option value="">Natureza do Negócio</option>
                                    @foreach ($tipoEmpresas as $tipoEmpresa)
                                        <option value="{{ $tipoEmpresa->id }}">{{ $tipoEmpresa->tipoEmpresa }}</option>
                                    @endforeach
                            </select>

                            </div> --}}

                             <div class="form-group inputBox col-lg-4 mt-4">
                                 <select name="categoria_id" class="form-control-lg" id="" required>
                                     <option value="">Selecione Categoria</option>
                                     @foreach ($categories as $category)
                                         <option value="{{ $category->id }}">{{ $category->category }}</option>
                                     @endforeach
                                 </select>
                             </div>

                         </div>

                         <div class="row">

                             <div class="form-group inputBox col-lg-4 mt-4">
                                 <select name="" class="form-control-lg province" id="provincia" required>
                                     <option value="">Selecione Província</option>
                                     @foreach ($provinces as $province)
                                         <option value="{{ $province->id }}">{{ $province->province }}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group inputBox col-lg-4 mt-4">
                                 <select name="" class="form-control-lg municipe" id="municipio">
                                     <option value="">Selecione Município</option>

                                 </select>
                             </div>


                             <div class="form-group inputBox col-lg-4 mt-4" required>
                                 <select name="bairro_id" class="form-control-lg neighbor" id="bairro">
                                     <option value="">Selecione Bairro</option>

                                 </select>
                             </div>


                         </div>

                         <div class="row">



                             <!-- Aparecem as empresas aqui -->
                             <div class="add__doc__aparecer" style="display: none">
                                 <div class="form-group col-lg-3 mt-4"></div>
                             </div>
                             <!-- Aparecem as empresas aqui -->

                             <div class="form-group inputBox col-lg-8 mt-4">
                                 <input type="text" name="endereco" class="form-control" placeholder="Sede da Empresa">
                             </div>

                             <div class="form-group inputBox col-lg-4 mt-4">
                                 <input type="text" class="form-control-lg" placeholder=" Geolocalização">
                             </div>



                         </div>



                         <div class="row">
                             <div class="form-group col-lg-3 mt-4">
                                 <label class="avatar__perfil file" tabindex="0">
                                     <input type="file" accept="application/pdf" class="file__input alvara" id="alvara_input" name="alvara" />
                                     <span class="alvara__image logo__preview " id="alvara_name"></span>
                                 </label>
                             </div>

                             <div class="form-group col-lg-3 mt-4">
                                 <label class="avatar__perfil file" tabindex="0">
                                     <input type="file" accept="application/pdf" class="file__input" id="diario_input" name="diario" />
                                     <span class="diario__image logo__preview " id="diario_name"></span>
                                 </label>
                             </div>




                             <!-- Adicionar documentação Tab -->
                             <div class="form-group col-lg-3 mt-4">
                                 <label class="avatar__perfil file" tabindex="0">
                                     <input type="file" accept="application/pdf" class="file__input" id="nif_input" name="nif" />
                                     <span class="nif__image logo__preview " id="nif_name"></span>
                                 </label>
                             </div>
                             <!-- Adicionar documentação -->

                             <!-- Adicionar documentação Tab -->
                             <div class="form-group col-lg-3 mt-4">
                                 <label class="avatar__perfil file" tabindex="0">
                                     <input type="file" accept="application/pdf" class="file__input" id="certidao_input" name="certidao" />
                                     <span class="certidao__image logo__preview "id="certidao_name" ></span>
                                 </label>
                             </div>
                             <!-- Adicionar documentação -->
                         </div>
                         {{--
                         <div class="form-group col-lg-12 mt-4">
                             <label class="avatar__perfil otherFile" tabindex="0">
                                 <input type="file" accept="application/pdf" class="file__input" id="outro_input" name="other" multiple />
                                 <span class="outro__image logo__preview " id="outro_name"></span>
                             </label>
                         </div>
                         --}}
                         <!-- Tab da Documentação -->
                         <!-- End Tab da Documentação -->

                         <div class="row">
                             <div class="form-group inputBox col-lg-4 mt-4">
                                 <input type="submit" value="Criar empresa" class="form-control-lg" />
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 {{-- END MODAL DE REGISTRO DE EMPRESA --}}


