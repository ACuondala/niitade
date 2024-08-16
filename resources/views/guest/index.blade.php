@extends('layout.app')

@section('content')
<section class="container">
    <div class="row">
      <aside
        class="col-lg-2 position-fixed aside__difference__content__left"
        style="width: 19%"
      >
        <div class="bg-white card__avatar__feed border-radius">
          <ul class="categories">
            <div class="mt-2 mb-2">
                @unless (!Auth::check())


                    <button
                        class="form-control"
                        data-toggle="modal"
                        data-target="#modal__tipo__empresa"
                        id="buttonModal"
                    >
                        Criar empresa
                    </button>
                @endunless
            </div>
            <h3>Categorias</h3>
            <hr />
            <li>
              <a href="#" class="very">Restauração</a>
            </li>
            <li>
              <a href="#" class="very">Hotelaria e Turismo</a>
            </li>
            <li>
              <a href="#" class="very">Automobilismo</a>
            </li>
            <li>
              <a href="#" class="very">Electrodomésticos</a>
            </li>
            <li>
              <a href="#" class="very">Bijuterias</a>
            </li>
            <li>
              <a href="#" class="very">Cosméticos</a>
            </li>
            <li>
              <a href="#" class="very">Mobiliários/Móveis</a>
            </li>
            <li>
              <a href="#" class="very">Construção Civil</a>
            </li>
          </ul>
        </div>
      </aside>

      <div class="col-lg-6 col-sm-12 col-12 offset-3 main__content_principal">
            <!-- Apresentação do feed -->
            @include('company.posts.posts')
            <!-- Apresentação do feed -->
      </div>

      <aside
                class="col-lg-2 position-fixed offset-7 aside__difference__content__right"
                style="width: 19%; margin-left: 56% !important"
            >
            <div class="bg-white p-3 border-radius">
            <div class="galerias__destaques">
                <h4>Galeria de Novidades</h4>
                <div class="galerias">
                <a href="#" class="item__empresa">
                    <img src="assets/img/product/product-7.jpg" alt="" />
                </a>
                <a href="#" class="item__empresa">
                    <img src="assets/img/product/product-8.jpg" alt="" />
                </a>
                <a href="#" class="item__empresa">
                    <img src="assets/img/product/product-9.webp" alt="" />
                </a>
                </div>
            </div>
            </div>
      </aside>
    </div>
</section>
  @include('modals.kindcompany')
  @include('modals.newCompany')
  @include('modals.delivery')
  @include('modals.interest')

@endsection

@section('script')
<script src="{{ asset('assets/js/company_file_input.js') }}">
</script>


<script src="{{ asset('assets/js/delivery__foto__input.js') }}">
</script>

<script>




    $(document).ready(function(){

        $(".likebutton").on("click",function(){

            //e.preventDefault();
            var postId = $(this).data('post');
            var button = $(this);
            var likeCount = $(this).siblings('.like-count');

            let buttons=document.querySelector(".likebutton");



            //button.html(' <i class="fas fa-thumbs-up likeds" data-post='+postId+' style="font-size: 125%;color:#cca332;"></i>');
           $.ajax({
                type:"POST",
                url:"{{ route('like.store') }}",
                data:{'post_id':postId,"_token": "{{ csrf_token() }}"},
                dataType:"json",
                success:function(response){

                    if(response.liked == false){
                        button.html(' <i class="fal fa-thumbs-up likes" style="font-size: 125%;"></i> <small class="like-count"> '+response.count+'</small> ');
                    }else{
                        button.html('<i class="fas fa-thumbs-up likes" style="font-size: 125%;color:#cca332;></i> <small class="like-count"> '+response.count+'</small> ');
                    }
                }
            });

        });


        $(".favorite").on("click",function(){

            var postId = $(this).data('favorito');
            var button = $(this);
            //var favoritoCount = $(this).siblings('.like-count');


           $.ajax({
                type:"POST",
                url:"{{ route('favorite.store') }}",
                data:{'post_id':postId,"_token": "{{ csrf_token() }}"},
                dataType:"json",
                success:function(response){

                    if(response.favorited == false){
                        button.html('<i class="fal fa-bookmark" ></i>');
                    }else{
                        button.html('<i class="fas fa-bookmark" style="color:#cca332;" ></i>');
                    }
                }
            });


        });






    });

    let interests= document.querySelectorAll('input[type="checkbox"]');
        let buttom=document.getElementById("interest_butto");
        buttom.disabled=true;


        interests.forEach(interest=>{
            interest.addEventListener("change",()=>{
                let selectedInterests= document.querySelectorAll('input[type="checkbox"]:checked').length;
                //console.log(selectedInterests);
                if(selectedInterests >=3){
                    buttom.disabled= false;
                    buttom.style.backgroundcolor="#cca332de";

                }else{
                    buttom.disabled= true;
                }
            });
        });



</script>
@endsection
