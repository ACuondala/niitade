@foreach ($posts as $post)
     {{-- Apresentação do feed --}}
    {{--  <div class="border-radius bg-white border-mobile-feed mt-1" style="border-radius: 10px;"> --}}


        <div class="p-0 mb-1 section__content__feeds feeds" style="border-radius:15px;" >

            {{-- Feeds --}}
            <div class="feed bg-white" data-posst="{{ $post->id }}">
                <div class="feed__user__post mt-2">
                    <div class="user__post">
                        <div class="avatar__user">
                            <img src="{{ $post->company->companyImage }}" alt="XXXXXXXXXXX" />
                        </div>
                        @if (Auth::check())
                            <a href="{{ route('companies.profile',$post->company->companyName) }}" class="name__user">
                                <h4>{{ $post->company->companyName }}</h4>
                                <small style="font-size: 56%;">{{ $post->company->kindCompany->kind }}</small>
                                <small class="mt-1" style="font-size: 56%; color:#817e7e;">{{ $post->created_at->diffForHumans() }}</small>
                            </a>
                        @else
                            <div class="name__user">
                                <h4 class="very">{{ $post->company->companyName }}</h4>
                                <small style="font-size: 56%;">{{ $post->company->kindCompany->kind  }}</small>
                                <small class="mt-1" style="font-size: 56%;color:darkgrey;">{{ $post->created_at->diffForHumans() }}</small>
                            </div>
                        @endif

                    </div>
                    <div class="user__estrelas">
                        <ul>
                            <li>
                                <i class="fal fa-star"></i>
                            </li>
                            <li>
                                <i class="fal fa-star"></i>
                            </li>
                            <li>
                                <i class="fal fa-star"></i>
                            </li>
                            <li>
                                <i class="fal fa-star"></i>
                            </li>
                            <li>
                                <i class="fal fa-star"></i>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Feed Content --}}
                <div class="feed__content" >
                    @if($post->contents->count() <= 1)
                        <div class="feed__background m-0" >

                                @foreach ($post->contents as  $content)
                                    <img src="{{ asset($content->files) }}" alt="Foto Postada" class="pictures d-block w-100" />
                                @endforeach

                        </div>
                    @else
                    <div id="carouselExample{{ $post->id }}" class="carousel slide" data-bs-interval="false">
                        <div class="carousel-inner">
                            @foreach ($post->contents as $key => $content)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <div class="carousel-caption ">
                                    <span>{{ $key + 1 }} / {{ $post->contents->count() }}</span>
                                </div>
                                <img src="{{ asset($content->files) }}" alt="Foto Postada" class="pictures d-block w-100" />

                            </div>

                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample{{ $post->id }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample{{ $post->id }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <ol class="carousel-indicators">
                            @foreach ($post->contents as $key => $content)
                                <li data-bs-target="#carouselExample{{ $post->id }}" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                    </div>
                    @endif



                    <div class="feed__context">
                        <div class="feed__actions">
                            <button class="vizualizacao">
                                <i class="fa fa-eye"></i>
                                <strong>{{ $post->postview->count() }}</strong>{{ $post->postview->count()>1?"Visualizações":"Visualização"  }}
                            </button>
                            @if (Auth::check())
                                @if($post->post_link_id == 1)
                                    <div class="visitar__comprar">
                                        <a href="{{ route('companies.profile',$post->company->companyName) }}">Visitar Loja</a>
                                    </div>
                                @else
                                    <div class="visitar__comprar">
                                        <a href="{{ route('product.detail',$post->product_id) }}">Página de compra</a>
                                    </div>
                                @endif
                            @else
                                @if($post->post_link_id == 1)
                                <div class="visitar__comprar">
                                    <a href="#" class="very">Visitar Loja</a>
                                </div>
                                @else
                                <div class="visitar__comprar">
                                    <a href="#" class="very">Página de compra</a>
                                </div>
                                @endif
                            @endif
                        </div>
                        <h3>{{ $post->titlePost }}</h3>
                        <p class="text-content" style="text-align:justify;">
                            {{ $post->description }}

                        </p>
                        <button class="read-more-link" style="margin-top:0px;">Ver mais</button>
                    </div>

                    <div class="feed__content_reaction">
                        <div class="rection__likes">
                            @if(Auth::check())
                                @if($post->likes()->count() == 0)
                                    <button class="likebutton" data-post="{{ $post->id }}">
                                        <i class="fal fa-thumbs-up likes" style="font-size: 125%;"></i>
                                        <small class="like-count"> {{ $post->likes()->count() }}</small>
                                    </button>
                                @else
                                    @foreach ($post->likes as $like)
                                        @if ($like->user_id == Auth::user()->id)
                                            <button class="likebutton" data-post="{{ $post->id }}">
                                                <i class="fas fa-thumbs-up liked" style="font-size: 125%;color:#cca332;"></i>
                                                <small class="like-count"> {{ $post->likes()->count() }}</small>
                                            </button>
                                        @else
                                        <button class="likebutton" data-post="{{ $post->id }}">
                                            <i class="fal fa-thumbs-up liked" style="font-size: 125%;"></i>
                                            <small class="like-count"> {{ $post->likes()->count() }}</small>
                                        </button>
                                        @endif
                                    @endforeach
                                @endif


                                <button class="dislaike">
                                    <i class="fal fa-thumbs-down " style="font-size: 125%"></i>

                                </button>

                                <button class="add comment" data-feed="{{ $post->id }}" data-toggle="modal" data-target="#modal__comments{{ $post->id }}">
                                    <i class="fal fa-comment"></i>
                                    <small>{{ $post->comment()->count() }}</small>
                                </button>
                            @else
                                <button>
                                    <i class="fal fa-thumbs-up very" style="font-size: 125%"></i>
                                    {{ $post->likes()->count() }}
                                </button>

                                <button>
                                    <i class="fal fa-thumbs-down very" style="font-size: 125%"></i>
                                    {{-- 100 --}}
                                </button>
                                <button class="add">
                                    <i class="fal fa-comment very"></i>
                                    {{ $post->comment()->count() }}
                                </button>


                            @endif
                          </div>


                          <div class="favority" data-favorito="{{ $post->id }}">
                            @if (Auth::check())
                                    @if($post->favorites()->count() == 0)
                                        <button class="favorite" data-favorito="{{ $post->id }}">
                                            <i class="fal fa-bookmark" ></i>
                                        </button>

                                    @else

                                        @foreach ($post->favorites as $favorite)
                                            @if ($favorite->user_id == Auth::user()->id)
                                                <button class="favorite" data-favorito="{{ $post->id }}">
                                                    <i class="fas fa-bookmark" style="color:#cca332;" ></i>
                                                </button>

                                            @endif
                                        @endforeach

                                    @endif
                            @else
                                    <button>
                                        <i class="fal fa-bookmark very" ></i>
                                    </button>
                            @endif
                            @if(Auth::check())
                            <button id="btnDropdown" class="dropdown__nitadi">
                              <i class="fa fa-ellipsis-v"></i>
                              <div class="dropdown-content__nitadi">
                                <ul>
                                    @if ($post->company->user_id == Auth::user()->id)
                                        <li>
                                            <a href="#">
                                                <i class="fal fa-trash"></i>
                                                Eliminar
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="fa fa-cog"></i>
                                                Outro
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="" style="font-size:86%">
                                                <i class="uil uil-trash"></i>
                                                Denunciar
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" style="font-size:86%">
                                                <i class="uil uil-trash"></i>
                                                Deixar de Ver
                                            </a>
                                        </li>
                                    @endif


                                </ul>
                              </div>
                            </button>
                            @endif
                          </div>
                          @if(Auth::check())
                            <div id="dropdwn-mobile">
                                    <ul>
                                        @if ($post->company->user_id == Auth::user()->id)
                                            <li>
                                                <a href="#">
                                                    <i class="fal fa-trash"></i>
                                                    Eliminar
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-cog"></i>
                                                    Outro
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="" style="font-size:86%">
                                                    <i class="uil uil-trash"></i>
                                                    Denunciar
                                                </a>
                                            </li>
                                            <li>
                                                <a href="" style="font-size:86%">
                                                    <i class="uil uil-trash"></i>
                                                    Deixar de Ver
                                                </a>
                                            </li>
                                        @endif


                                    </ul>
                            </div>
                          @endif
                    </div>
                 </div>
                {{-- Feed Content --}}
            </div>
            {{-- Feeds --}}
        </div>



    {{--</div>
     Apresentação do feed --}}


        {{-- Modal comments --}}
            <div
                class="modal fade"
                id="modal__comments{{ $post->id }}"
                data-backdrop="static"
                data-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
                >
                <div class=" modal-dialog modal-md  modal-dialog-centered modal-fullscreen-sm-down">
                    <div class="modal-content modal-comment">
                        <div class="modal-header">
                                <p class="modal-title post" id="staticBackdropLabel" data-id="{{ $post->id }}" >
                                Publicação de <span style="color:gray;">{{ $post->company->companyName }}</span>
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
                        <div class="modal-body" >
                            {{-- @foreach ($comments as $comment)
                            <div class="comments">
                                <img src="{{$comment->user->images}}" alt="User Avatar">
                                <div>
                                    <h6 style="font-size:10px;">{{$comment->user->firstname }} {{$comment->user->lastname}}</h6>
                                    <div class="comments-content" style="font-size:10px;">
                                        <p>{{$comment->content}}</p>
                                    </div>
                                    <div class="comments-meta">


                                    </div>
                                </div>
                            </div>
                            @endforeach --}}
                        </div>

                        <div class="modal-footer">

                                <form id="comment_form_{{ $post->id }}" class="row" >


                                        @auth
                                           <input type="hidden" class="postId" name="post_id" value="{{ $post->id }}">
                                            <input type="text" value="" id="content_{{ $post->id }}" name="content" class="form-control " placeholder="Comenta como {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}" required>
                                        @endauth



                                        <button type="button" class="form-control btnn" data-postid="{{ $post->id }}"><i class="bi bi-send-fill" style="color: #fff;"></i></button>

                                </form>

                        </div>
                    </div>
                </div>
            </div>

        {{-- End modal comments --}}






@endforeach



<script>

    let page = 1; // Página atual para a paginação
    const perPage = 3; // Quantidade de comentários por página

    //alert (post);
    function displayComments(post) {
              // Assuming comments is an array of comment objects
              $('#loading').show(); // Mostra o indicador de carregamento

          var commentsSection = $('.modal-body');
          var post__id=post;
          //console.log(post__id);
          commentsSection.empty();
          $.ajax({
              type:"GET",
              url:"/comment/"+post__id,
              data:{'post_id':post__id},
              success:function(response){

                  //console.log(response)
                  commentsSection.empty();
                    response.comments.forEach(comment => {
                        commentsSection.append(`<div class="comments">
                            <img src="${comment.user.images}" alt="User Avatar">
                            <div>
                                <h6 style="font-size:10px;">${comment.user.firstname} ${comment.user.lastname}</h6>
                                <div class="comments-content" style="font-size:10px;">
                                    <p>${comment.content}</p>
                                </div>
                                <div class="comments-meta">


                                </div>
                            </div>
                        </div>`);
                    });
              }

          });

  }
  $(".comment").click(function(){
        let post_id=$(this).data('feed');
      $("#modal__comments").modal("show");
      displayComments(post_id);
  });
  $(".close").click(function(){
      $("#modal__comments").modal("hide").find('form').trigger('reset');
  });
   // Função para detectar rolagem no modal
   $('#modal__comments').scroll(function() {
    const modal = $(this);

    // Se o scroll estiver no final, carregue mais comentários
    if (modal.scrollTop() + modal.innerHeight() >= modal[0].scrollHeight - 10) {
        page++; // Próxima página
        loadComments(); // Carrega mais comentários
    }
});


$(document).ready(function() {
    $('.btnn').on('click', function(e) {
        e.preventDefault();

        let postId = $(this).data('postid');
        let content =$('#content_' + postId).val();

        //console.log(content);
        /*if (content.trim() === '') {
            alert('Comentário não pode estar vazio.');
            return;
        }*/

        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('comment.store') }}",
            data: { 'post_id': postId, 'content': content },
            success: function(response) {
                $('#comment_form_' + postId)[0].reset(); // Reset form
                displayComments(postId); // Update comments section
            },
            error: function(xhr) {
                alert('Error submitting comment: ' + xhr.responseText);
            }
        });
    });
});
    //displayComments();


  //$(document).ready(function() {

    let timer;
    let timeSpent = 0;
    const requiredTime = 3 * 1000;

    $('.feed').on('mouseover', function() {
        let postId =$(".feed").data("posst");

        timer = setInterval(function() {
            timeSpent += 1000;
            if (timeSpent >= requiredTime) {


                $.ajax({

                    url:"{{ route('posts.viewCount') }}",
                    type:"POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        //_token: '{{ csrf_token() }}',
                        post_id:postId,
                    },
                    success: function(response) {
                        console.log(response.views);
                        //$('#viewCounter').text(response.views);
                    }
                });
                clearInterval(timer);
            }
        }, 1000);
    });

    $('.feed').on('mouseout', function() {
        clearInterval(timer);
        timeSpent = 0;
    });

    $('.feed').on("vmouseup", function() {
        let postId =$(".feed").data("posst");

        timer = setInterval(function() {
            timeSpent += 1000;
            if (timeSpent >= requiredTime) {


                $.ajax({

                    url:"{{ route('posts.viewCount') }}",
                    type:"POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        //_token: '{{ csrf_token() }}',
                        post_id:postId,
                    },
                    success: function(response) {
                        console.log(response.views);
                        //$('#viewCounter').text(response.views);
                    }
                });
                clearInterval(timer);
            }
        }, 1000);
    });

    $('.feed').on("vmousedown", function() {
        clearInterval(timer);
        timeSpent = 0;
    });



</script>
