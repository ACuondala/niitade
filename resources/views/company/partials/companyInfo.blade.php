<aside class="col-lg-2 position-fixed aside__difference__content__left" style="width: 19%">
    <div class="postar__no__feed mb-2">
    <button
        class="btn__pub col-lg-12 col-sm-12"
        data-toggle="modal"
        data-target="#tipo__postagem__feed"
    >
        Publicitar
    </button>
    </div>
    <div class="bg-white card__avatar__feed border-radius">
    <div class="capa__avatar__user">
        <div class="dropdown-settings">
        <button class="dropdown__nitadi">
            <i class="uil uil-ellipsis-v"></i>
            <div class="dropdown-content__nitadi">
                <ul>
                    @foreach ($companies as $company)
                    <li>
                        @if ($company->status == "active")
                        <a href="{{ route('companies.profile', $company->companyName) }}" class="actives" data-active="{{ $company->id }}">{{ $company->companyName }} </a>
                        @else
                        <a href="#" style="font-size: 15px;color:grey;" class="inactives" data-inactive="{{ $company->id }}"> {{ $company->companyName }} </a>
                        @endif

                    </li>
                    @endforeach

                    <li>
                        <a
                            href="#"
                            data-toggle="modal"
                            data-target="#modal__tipo__empresa"
                            >Criar empresa
                        </a>
                    </li>
                </ul>
            </div>
        </button>
        </div>

        <div class="content__avatar__info">
        <span>{{ $activeCompany->category->category }}</span>
        <!-- Logo da Empresa -->
        <img src="{{ asset($activeCompany->companyImage) }}" alt="company image" />
        <!-- Logo da Empresa -->
        <span>{{ $activeCompany->kindCompany->kind }}</span>
        </div>
    </div>

    <div class="content__user__context">
        <h3>{{ $activeCompany->companyName }}</h3>
        <p>{{ $activeCompany->companySlogna }}</p>
        <ul>
        <li>
            <i class="uil uil-star"></i>
        </li>
        <li>
            <i class="uil uil-star"></i>
        </li>
        <li>
            <i class="uil uil-star"></i>
        </li>
        <li>
            <i class="uil uil-star"></i>
        </li>
        <li>
            <i class="uil uil-star"></i>
        </li>
        <li>
            <i class="uil uil-star"></i>
        </li>
        </ul>

        <div class="money-and-geo">
        <button>Saldo: 5.000 AOA</button>
        <a href="#">
            <i class="uil uil-location-point"></i>
        </a>
        </div>
    </div>
    <hr />
    <div class="visita__perfil pl-4">
        <h3>Estatísticas da Empresa</h3>
        <ul class="mt-2">
        <li>
            <span>Nº de Vendas:</span>
            <strong>25</strong>
        </li>
        <li>
            <span>Nº de Likes Total Prod:</span>
            <strong>{{ $like_total }}</strong>
        </li>
        <li>
            <span>Nº de Fidelizados:</span>
            <strong>{{ $follow_count }}</strong>
        </li>
        <li>
            <span>Nº Produtos na Vitrine:</span>
            <strong class="vetrine_product">{{ $countProductVetrine }}</strong>
        </li>
        <li>
            <span>Nº de Views no Perfil Empresa:</span>
            <strong>45</strong>
        </li>
        </ul>
    </div>
    </div>
</aside>

