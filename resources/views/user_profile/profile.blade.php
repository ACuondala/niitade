@extends('layout.app')

@section('content')
<section class="container">
    <div class="row">
      <div class="col-lg-12 main__content_principal">
        <form action="{{ route('profile.update') }}" method="POST" class="card p-4">
            @method("PUT")
            @csrf
          <div class="row">
            <div class="col-lg-4">
              <img
                src="{{ asset($user->images) }}"
                style="width: 130px; height: 130px"
                alt=""
              />
            </div>
            <div class="col-lg-12">
              <p
                class="mt-1"
                data-toggle="modal"
                data-target="#changeUserPhoto"
              >
                Alterar foto de Perfil
              </p>
            </div>
          </div>

          <div class="row mt-2">
            <div class="form-group inputBox col-12 col-sm-12 col-lg-4 mt-3">
              <input
                type="text"
                name="firstname"
                class="form-control-lg"
                value="{{ $user->firstname }}"
                required
              />
              <span>Nome</span>
            </div>

            <div class="form-group inputBox col-12 col-sm-12 col-lg-4 mt-3">
                <input
                  type="text"
                  name="lastname"
                  class="form-control-lg"
                  value=" {{ $user->lastname }}"
                  required
                />
                <span>Sobrenome</span>
              </div>


            <div class="form-group inputBox col-12 col-sm-12 col-lg-4 mt-3">
              <input
                type="date"
                name="birthday"
                class="form-control-lg"
                value="{{$user->dob}}"
                required
              />
              <span>Data de Nascimento:</span>
            </div>


          </div>
          <div class="row mt-4">
            <div class="form-group inputBox col-12 col-sm-12 col-lg-4 mt-3">
                {{--
                <input
                type="tel"
                class="form-control-lg"
                value="{{ $user->neighborhood->municipe->province->province}}"
                required
                />
                 --}}

                 <select name="" id=""   class="form-control-lg">
                    <option value="">Provincia</option>
                    @foreach ($provinces as $province)
                    <option value="{{ $province->id }}" {{ $province->id ==$user->neighbor->municipe->province->id? "selected":""  }}>{{ $province->province }}</option>
                    @endforeach
                 </select>

            </div>

            <div class="form-group inputBox col-12 col-sm-12 col-lg-4 mt-3">
                {{--
                <input
                    type="tel"
                    class="form-control-lg"
                    value="{{$user->neighborhood->municipe->municipe}}"
                    required
                />
                <span>Município:</span>
                     --}}
                <select name="" id=""   class="form-control-lg">
                    <option value="">Municipio</option>
                    @foreach ($municipes as $municipe)
                    <option value="{{ $municipe->id }}" {{ $municipe->id ==$user->neighbor->municipe->id? "selected":""  }}>{{ $municipe->municipe }}</option>
                    @endforeach
                 </select>
            </div>

            <div class="form-group inputBox col-12 col-sm-12 col-lg-4 mt-3">
                {{--
                <input
                  type="tel"
                  class="form-control-lg"
                  value="{{ $user->neighborhood->neighborhood}}"
                  required
                />
                <span>Bairro:</span>
                  --}}

                <select name="neighborhood_id" id=""   class="form-control-lg">
                    <option value="">Bairro</option>
                    @foreach ($neighbors as $neighbor)
                    <option value="{{ $neighbor->id }}" {{ $neighbor->id ==$user->neighbor_id? "selected":""  }}>{{ $neighbor->neighbor }}</option>
                    @endforeach
                </select>

              </div>

          </div>

          <div class="row mt-4">


            <div class="form-group inputBox col-12 col-sm-12 col-lg-4 mt-3">
            {{--   <input
                type="tel"
                class="form-control-lg"
                value="{{($user->gender)}}"
                required
                {{ old('ramo_id', $militar->ramo_id ?? '') == $ramo->id ? 'selected' : '' }}
              /> --}}
              <select name="gender" value="{{ old('gender') }}" class="form-control-lg" id="">
                <option value="">Sexo/Género</option>
                {{--
                @foreach (App\Enum\GenderEnum::values() as $key => $values)
                    <option value="{{$key}} {{ old('gender' ) }}">{{ $values }}</option>
                @endforeach --}}
                <option value="M"{{ $user->gender == Auth::user()->gender ? "selected":"" }}>Masculino</option>
                <option value="F"{{ $user->gender == Auth::user()->gender ? "":"selected" }}>Feminino</option>
            </select>
              {{-- <span>Sexo:</span> --}}
            </div>

            <div class="form-group inputBox col-12 col-sm-12 col-lg-4 mt-3">
              <input
                type="tel"
                class="form-control-lg"
                {{--  @foreach ( $user->interest as $interests)
                value="{{$interests->interest;}}"
                @endforeach --}}
                value="{{-- $user->interest->implode('interest') --}}"

              />
              <span>Gostos/Interesses:</span>
            </div>
          </div>

          <div class="row mt-4">
            <div class="form-group col-lg-3">
              <button type="submit" class="form-control btn-submit">
                Atualizar o Perfil
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
</section>

{{-- MODAL TIPO COMPRA --}}
<div class="modal fade" id="changeUserPhoto" data-backdrop="static" data-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
                Alterar a imagem do user ?
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('profile.updateFoto') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group  ">
                        <div class="avatar__photo">
                            <label class="avatar__perfil company" tabindex="0">
                                <input type="file" name="images" accept="image/*"
                                    id="company__input" />
                                <span class="company__image"></span>
                            </label>
                        </div>
                    </div>

                <button type="submit" class="form-control btn-submit mt-2">Actualizar a foto</button>
            </form>
        </div>
    </div>
</div>
</div>
{{-- END TIPO de COMPRA --}}

@endsection


@section('script')
    <script>
        const companyInput = document.querySelector("#company__input");
        const companyImage = document.querySelector(".company__image");


        function previewFile(companyImage, inputFile) {


            //Company Logo
        const companyImageTxt="Foto";
        companyImage.innerHTML=companyImageTxt;

        inputFile.addEventListener("change", e => {
            const inputTarget = e.target;
            const file = inputTarget.files[0];

            console.log(file);
            if (file) {
            const reader = new FileReader();

            reader.addEventListener("load", function (e) {
                const readerTarget = e.target;
                const img = document.createElement("img");

                img.src = readerTarget.result;
                img.classList.add("company__img");

                companyImage.innerHTML = "";
                companyImage.appendChild(img);
            });

            reader.readAsDataURL(file);
            } else {
                companyImage.innerHTML=companyImageTxt;
            }
        });

        //End company Logo
        }


       previewFile(companyImage, companyInput);


    </script>
@endsection
