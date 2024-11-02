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


        </div>
        <!-- Apresentação do Perfil da Empresa e do Usuário -->
      </div>
    </div>
  </section>

@endsection
@section('script')
    <script>
        displayfavorites()
        function displayfavorites() {
            $('#loading').show(); // Mostra o indicador de carregamento

            var commentsSection = $('.favoritos');
            commentsSection.empty();

            $.ajax({
                type: "GET",
                url: "{{ route('favorite.showAll') }}",
                success: function (response) {

                    commentsSection.empty();

                    response.favorites.forEach(favorite => {
                        let imageHtml = ''; // Placeholder para a imagem
                        // Loop para pegar o primeiro conteúdo e sua imagem
                        if (favorite.contents && favorite.contents.length > 0) {
                            const firstContent = favorite.contents[0];
                             // Pegando o primeiro conteúdo
                            imageHtml = `<img src="${firstContent.files}" alt="Foto Postada" class="pictures d-block w-100" />`;
                        }

                        commentsSection.append(`
                            <div class="item__favorito bg-white">
                                <div class="bg__produto">
                                    ${imageHtml}
                                </div>

                                <div class="content__favorito">
                                    <a href="${favorite.product_id ? '/product_detail/' + favorite.product_id : '/company/' + favorite.company.companyName}">
                                        <h4>${favorite.titlePost}</h4>
                                        <p style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">${favorite.description}</p>
                                    </a>
                                    <div class="content__price__produto">
                                        <span>${favorite.company.companyName}</span>
                                    </div>
                                    <button class="unfavor" data-id="${favorite.id}">Deixar de Ser Favorito</button>
                                </div>
                            </div>
                        `);
                    });
                },
                error: function (xhr, status, error) {
                    $('#loading').hide(); // Esconde o indicador de carregamento em caso de erro
                    console.error('Erro na requisição:', error);
                    commentsSection.append('<p>Falha ao carregar os favoritos. Tente novamente mais tarde.</p>');
                }
            });
        }

        $(document).on('click', '.unfavor', function() {
            let post_id = $(this).data('id');
            //alert(post_id);  // Verifica se o post_id está correto

            // Descomente o bloco de AJAX para funcionalidade completa
            $.ajax({
                url: "{{ route('unfavor') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Inclui o token CSRF
                },
                data: {'post_id': post_id},
                success: function(response) {
                    displayfavorites(); // Atualiza a lista de favoritos após a remoção
                },
                error: function(xhr, status, error) {
                    console.error('Erro ao remover favorito:', error); // Tratamento de erro
                }
            });
        });
    </script>
@endsection
