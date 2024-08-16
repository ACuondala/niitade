@extends('layout.app')

@section('content')
<section class="container">
    <div class="row">
        @include('company.partials.companyInfo')

        <div class="col-lg-6 col-sm-12 col-12 offset-3 main__content_principal main_posts" >
           @include('company.posts.posts')
        </div>
        @include('company.partials.companyGaleria')

    </div>
</section>
  @include('modals.kindFeed')
  @include('modals.feed')
  @include('modals.kindcompany')
  @include('modals.newCompany')
  @include('modals.delivery')

@endsection
@section('script')

<script src="{{ asset('assets/js/company_file_input.js') }}">
</script>


<script src="{{ asset('assets/js/delivery__foto__input.js') }}">
</script>

<script src="{{ asset('assets/js/change__company.js') }}"></script>
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
        /*
        $(".likedbutton").on("click",function(){
            //e.preventDefault();
            var postId = $(this).data('post');
            var button = $(this);
            var likeCount = $(this).siblings('.like-count');

            let buttons=document.querySelector(".likedbutton");


            //button.html(' <i class="fal fa-thumbs-up likes" style="font-size: 125%;"></i>');
            $.ajax({
                type:"POST",
                url:"{{ route('reverselike.store') }}",
                data:{'post_id':postId,"_token": "{{ csrf_token() }}"},
                dataType:"json",
                success:function(response){

                    if(response.liked == false){
                        button.html(' <i class="fal fa-thumbs-up likes" style="font-size: 125%;"></i> <small class="like-count"> '+response.count+'</small> ');
                    }else{
                        button.html(' <i class="fas fa-thumbs-up likes" style="font-size: 125%;color:#cca332;></i> <small class="like-count"> '+response.count+'</small> ');
                    }

                }
            });

        });*/

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




</script>

@endsection
