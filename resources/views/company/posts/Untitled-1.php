  {{--
                        <div class="row ">
                            <div class="col-2" data-favorito="{{ $post->id }}">
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
                            </div>
                            <div class="col-2">
                            {{-- Post setting --}}
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
                                {{--End post setting --}}
                        </div>
                        --}}






                        @if($post->contents->count() <= 1)
                            @foreach ($post->contents as  $content)
                                <img src="{{ asset($content->files) }}" alt="Foto Postada" class="pictures d-block w-100" />
                            @endforeach
                        @else

                        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                            <div class="carousel-inner">
                            @foreach ($post->contents as  $content)




                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ asset($content->files) }}" alt="Foto Postada" class="pictures d-block w-100" />

                                    </div>

                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                    </button>
                                </div>


                            @endforeach

                        @endif

                        {{-- <img src="nitade/post/content/carotphone.jpg1704529646.jpg" alt="Foto Postada"
                            data-toggle="modal" data-target="#fotoCarrosel" /> --}}
                            </div>
                        </div>






                        <div class="rection__likes row" >
                            <div class="col-md-6">
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
                                        {{-- 100 --}}
                                    </button>

                                    <button class="add" data-toggle="modal" data-target="#modal__comments{{ $post->id }}">
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
                            <div class="col-md-6">
                                <div class="favority">

                                    <div class="dropdown-content__nitadi">
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
                                    </div>

                                </div>

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
                            </div>


                        </div>
