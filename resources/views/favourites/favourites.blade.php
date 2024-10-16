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
                        @foreach ($favorite->contents->take(1) as  $content)
                            <img src="{{ asset($content->files) }}" alt="Foto Postada" class="pictures d-block w-100" />
                        @endforeach
                    </div>
                    <div class="content__favorito">
                    @if($favorite->product_id != null)
                        <a href="{{ route('product.detail',$favorite->product_id) }}">
                    @else
                        <a href="{{ route('companies.profile',$favorite->company->companyName) }}">
                    @endif
                        <h4>{{ $favorite->titlePost }}</h4>
                        <p style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">{{ $favorite->description }}</p>
                    </a>
                    <div class="content__price__produto">
                        <span>{{ $favorite->company->companyName }}</span>

                    </div>
                    <button class="unfavor" data-id="{{ $favorite->id }}">Deixar de Ser Favorito</button>
                    </div>
                </div>

            @endforeach

        </div>
        <!-- Apresentação do Perfil da Empresa e do Usuário -->
      </div>
    </div>
  </section>

@endsection
@section('script')
    <script>
    $(".unfavor").click(function(){
        let post_id=$(this).data('id');
        alert(post_id);
        $.ajax({
            url:"{{ route('unfavor') }}",
            type:'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{'post_id':post_id},
            success:function(response){

            }
        });
    });
    </script>
@endsection
