<!-- MODAL POSTAGEM NO FEED -->
<div
class="modal fade"
id="modal__produto"
data-backdrop="static"
data-keyboard="false"
tabindex="-1"
aria-labelledby="staticBackdropLabel"
aria-hidden="true"
>
<div class="modal-dialog modal-lg modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <p class="modal-title" id="staticBackdropLabel">
        Publicar um Producto na vetrine
      </p>
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
      <div>
        <form action="{{ route('product.store',$companies->companyName) }}" method="POST" enctype="multipart/form-data">
         @csrf


           <div class="form-group row">

            <div class="form-group inputBox col-lg-4 mt-4">

              <select name="tipo_produto_id" class="form-select-lg" id="">
                <option value="">Selecione o tipo de Produto</option>
                   @foreach ($kindProducts as  $kind)
                   <option value="{{ $kind->id }}">{{ $kind->kind }}</option>
                   @endforeach
              </select>

            </div>

            <div class="form-group inputBox col-lg-4 mt-4">
               {{-- <span>Nome do Produto</span> --}}
              <input type="text" value="{{old('nome')}}" name="nome" placeholder="Nome do produto" class="form-control-lg" required />

            </div>

            <div class="form-group inputBox col-lg-4 mt-4">
               {{-- <span>Preço do Produto</span> --}}
              <input type="text" name="preco" value="{{old('preco')}}" id="" placeholder="Preço do Produto" class="form-control" >

            </div>



           </div>
           <div class="form-group row">
               <div class="form-group inputBox col-lg-4 mt-4">
                  <input type="text" name="subPreco" value="{{old('subPreco')}}" id="" class="form-control" placeholder="Subpreço do Produto">
                </div>

               <div class="form-group inputBox col-lg-4 mt-4">

                   <select name="tipo_entrega_id" value="{{old('tipo_entrega_id')}}" class="form-control-lg" id="">
                     <option value="">Selecione o modo de Entrega</option>
                           @foreach ($deliveryMode as $mode)

                               <option value="{{ $mode->id }}">{{ $mode->mode }}</option>
                           @endforeach
                   </select>
               </div>

               <div class="form-group inputBox col-lg-4 mt-4">

                   <select name="status" value="{{old('status')}}" class="form-control-lg" id="">
                     <option value="">Selecione o status do Produto</option>
                        {{--
                           @foreach (App\Enum\ProductStatusEnum::values() as $key=>$values)
                               <option value="{{ $key }}">{{ $values }}</option>
                           @endforeach
                         --}}
                         <option value="Novo">Novo</option>
                         <option value="Usado">Usado</option>
                   </select>

               </div>



           </div>
           <div class="form-group row mt-3">

               <div class="form-group inputBox col-lg-4 mt-4">

                  <input type="number" name="quantidade" value="{{old('quantidade')}}" id="" class="form-control" placeholder="Quantidade em stock">

               </div>

               <div class="form-group inputBox col-lg-4 mt-4">

                  <input type="text" name="referencia" value="{{old('referencia')}}" id="" class="form-control" placeholder="Referência do produto">

               </div>

               <div class="form-group inputBox col-lg-4 mt-4">

                   <input type="text" name="bonus" value="{{old('bonus')}}" id="" class="form-control" placeholder="Bonus do produto">

                </div>
           </div>
           <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-4">
                <label class="avatar__perfil produtos" tabindex="0">
                    <input
                        type="file"
                        class="file__input"
                        id="add__logo"
                        name="fotoCapa"
                    />
                    <span class="fotoCapa__image logo__preview"></span>
                </label>
            </div>

            <div class="form-group col-md-6 col-sm-12 mt-4">
                <label class="avatar__perfil produtos" tabindex="0">
                    <input
                        type="file"
                        class="file__input"
                        id="add__logo_multiple"
                        name="images[]"
                        multiple
                    />
                    <span class="outros__image logo__preview"></span>
                </label>
            </div>
        </div>

           <div class="form-group mt-3 inputBox col-lg-12 mt-4">
               <textarea class="form-control" name="descricao" id="" cols="10" rows="5" placeholder="descrição"></textarea>
           </div>

          <div class="row">
            <div class="form-group inputBox col-lg-4 mt-4">
              <input
                type="submit"
                value="Publicar"
                class="form-control-lg"
              />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<!-- END MODAL POSTAGEM NO FEED -->
