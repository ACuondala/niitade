@extends('layout.app')

@section('content')
<section class="container">
    <div class="row">
      <div class="col-lg-12" id="two__section">
        <div class="product">
          <!-- Colocar o laço -->
          <div class="content__product bg-white">
            <div class="image__product">
              <img src="{{ asset($productDetail->images) }}" alt="" />
            </div>
            <div class="context__product">
              <h5>{{ $productDetail->name }}</h5>
              <a href='/company/{{ $productDetail->company->companyName }}'>{{  $productDetail->company->companyName }}</a>
              <p style="text-align: justify;">
                {{ $productDetail->description }}
              </p>
              <div class="stars">
                <img src="../assets/img/icons/star.svg" alt="" />
                <img src="../assets/img/icons/star.svg" alt="" />
                <img src="../assets/img/icons/star.svg" alt="" />
                <img src="../assets/img/icons/star.svg" alt="" />
                <img src="../assets/img/icons/star.svg" alt="" />
              </div>
              <span class="price">{{ number_format($productDetail->price, 2,',','.') }}kz</span>
            </div>
            <div class="type__product">
              <span>{{ $productDetail->company->kindCompany->kind }}</span>
              <div>
                <button data-toggle="modal" data-target="#tipo_de_compra">Comprar</button>
                <button class="chat">Chat</button>
              </div>
            </div>
          </div>
          <div class="other">
            <span>Status: <strong>{{ $productDetail->status }}</strong></span>
            <span>Novo Referencia: <strong>{{ $productDetail->reference }}</strong></span>
            <span>Stock: <strong>{{ $productDetail->quatity }}</strong> </span>
            <span>Garantia Bônus: <strong>{{ $productDetail->bonus }}</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>
  @include('modals.typebuy')
@endsection
