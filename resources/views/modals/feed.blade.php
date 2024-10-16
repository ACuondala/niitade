    {{-- MODAL POSTAGEM NO FEED --}}
    <div
      class="modal fade"
      id="modal__postagem__feed"
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
              Publicitar no feed
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
                <div class="corpo">
                    <form action="{{route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Image of post --}}
                        <div class="row justify-content-center">
                            <div class="col-lg-4"></div>

                            <div class="form-group col-lg-4 align-self-center">
                                <div class="avatar__photo">
                                    <label class="avatar__perfil feedss" tabindex="0">
                                        <input type="file" multiple name="images[]" accept="jpeg,png,mp4,mkv,jpg" id="feedss__input" />
                                        <span class="feedss__image"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4"></div>
                        </div>
                         {{-- End image of post --}}
                        <div class="row">
                            <div class="form-group inputBox col-lg-4 mt-4">
                                <select name="postLink" class="form-control-lg link" id="">
                                    <option value="">Selecione Link</option>
                                    @foreach ($postLink as $link)
                                    <option value="{{ $link->id }}">{{ $link->link }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group inputBox col-lg-4 mt-4">
                                <input type="text" name="name" class="form-control-lg" required />
                                <span>Nome da Campanha</span>
                            </div>

                            <div class="form-group inputBox col-lg-4 mt-4">
                                <input type="text" name="title" class="form-control-lg" required />
                                <span>Título da Publicidade</span>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group inputBox col-lg-4 mt-4">
                                <select name="category_id" class="form-control-lg" id="">
                                <option value="">Selecione Categoria</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group inputBox col-lg-4 mt-4">
                                <select name="plan_id" class="form-control-lg plan" id="">
                                <option value="">Selecione Plano</option>
                                @foreach ($plans as $plan)
                                    <option value="{{ $plan->id }}" data-plan="{{ $plan->price }}">{{ $plan->plan }}</option>
                                @endforeach


                                </select>
                            </div>



                            <div class="form-group inputBox col-lg-4 mt-4">
                                <select name="sponsor_id" class="form-control-lg sponsor" id="">
                                <option value="">Patrocinar Top 5</option>
                                    @foreach ($sponsors as $sponsor)
                                    <option value="{{ $sponsor->id }}" data-sponsor="{{ $sponsor->price }}"> {{ $sponsor->sponsor }} </option>
                                    @endforeach


                                </select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group inputBox col-lg-4 mt-4">
                                <select name="expecific" class="form-control-lg public" id="">
                                    <option value="">Público Especifico</option>
                                    @foreach ($expecifics_public as $public)
                                        <option value="{{ $public->id }}" data-public="{{ $public->price }}">1 Semana</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group inputBox col-lg-4 mt-4">
                                <select name="product_id" class="form-control-lg products" id="">
                                    <option value="">Selecione O Produto</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group inputBox col-lg-4 mt-4">
                                <select class="form-control-lg inputBox choose" name="interest[]">
                                    <option value="">Selecione O Interesse</option>
                                    @foreach ($interest as $data)
                                    <option class="itemInteres" value="{{ $data->id }}">{{ $data->interest }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>

                        <div class="row">
                            <div class="form-group inputBox col-lg-4 mt-4">
                                <select class="form-control-lg inputBox choose" name="interest[]">
                                    <option value="">Selecione O Município</option>
                                    @foreach ($municipes as $municipe)
                                    <option class="" value="{{ $data->id }}">{{ $municipe->municipe }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group inputBox col-lg-12 mt-4">
                                <textarea class="form-control" name="description" placeholder="O que estás a pensar?" id="" cols="10" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-12">
                              <div class="bg__feed">
                                <p class="mt-2">
                                  Chegando o valor final de acordo a publicação :
                                  <input type="number" class="soma" id="cost" name="cost" value="" readonly>
                                </p>
                              </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group inputBox col-lg-4 mt-4">
                              <input
                                type="submit"
                                value="Publicar"
                                class="form-control-lg pub"
                              />
                            </div>
                        </div>


                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>
    {{-- END MODAL POSTAGEM NO FEED --}}

