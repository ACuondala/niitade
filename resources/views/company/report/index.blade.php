@extends('layout.app')
@section('content')


<section class="container">
    <div class="row">
      <div class="col-lg-12 main__content_principal">
        <!-- RELATÓRIO DE ANUNCIOS -->
        <div class="mb-4">
          <div class="header-painel-anuncios">
            <div class="title">
              <h3>Painel de Anúncios</h3>
            </div>
            <div class="buttons">
              <button>Publicitar</button>
              <button>Guardadas</button>
            </div>
          </div>

          <div class="painels">
            <div class="painel activo">
              <div class="painel-content">
                <button>Pois Atomico</button>
                <button>
                  <label class="activo"></label>
                  Activo
                </button>
              </div>
              <button>
                <i class="uil uil-ellipsis-v"></i>
              </button>
            </div>

            <div class="painel vencido">
              <div class="painel-content">
                <button>Vimal J'AMA Luanda</button>
                <button>
                  <label class="vencido"></label>
                  Vencido
                </button>
              </div>
              <button>
                <i class="uil uil-ellipsis-v"></i>
              </button>
            </div>
          </div>

          <div></div>
        </div>
        <!-- RELATÓRIO DE ANUNCIOS -->

        <!-- TABELA PARA RELATÓRIO DE ANUNCIOS -->
        <div class="resultados-companha">
          <div class="title-content">
            <h3>Resultados de Campanha</h3>
          </div>

          <table>
            <thead>
              <tr>
                <th width="250">Plano Semanal</th>
                <th></th>
                <th width="10"></th>
              </tr>
            </thead>

           <tbody>
                  <tr>


                    <td><i class="fa fa-user"></i> Perfis alcançados</td>
                    <td>300</td>
                    <td>
                      <button>
                        <i class="fa fa-analytics"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-eye"></i> Visualizações</td>
                    <td>0</td>
                    <td>
                      <button>
                        <i class="fa fa-analytics"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td><i class="fas fa-mouse-pointer"></i> Clicks no link</td>
                    <td>0</td>
                    <td>
                      <button>
                        <i class="fa fa-analytics"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-thumbs-up"></i> Gostos</td>
                    <td>0</td>
                    <td>
                      <button>
                        <i class="fa fa-analytics"></i>
                      </button>
                    </td>
                  </tr>

                   <tr>
                    <td><i class="fa fa-thumbs-down"></i> Não Gostos</td>
                    <td>0</td>
                    <td>
                      <button>
                        <i class="fa fa-analytics"></i>
                      </button>
                    </td>
                  </tr>

                   <tr>
                    <td><i class="fa fa-comment"></i> Comentários</td>
                    <td>0</td>
                    <td>
                      <button>
                        <i class="fa fa-analytics"></i>
                      </button>
                    </td>
                  </tr>
                   <tr>
                    <td><i class="fas fa-bug"></i> Denuncias</td>
                    <td>0</td>
                    <td>
                      <button>
                        <i class="fa fa-analytics"></i>
                      </button>
                    </td>
                  </tr>
                   <tr>
                    <td><i class="fa fa-eye-slash"></i> Deixar de Ver</td>
                    <td>0</td>
                    <td>
                      <button>
                        <i class="fa fa-analytics"></i>
                      </button>
                    </td>
                  </tr>

                   <tr>
                    <td><i class="fa fa-bookmark"></i> Guardados</td>
                    <td>0</td>
                    <td>
                      <button>
                        <i class="fa fa-analytics"></i>
                      </button>
                    </td>
                  </tr>


                   <tr>
                    <td><i class="fa fa-shopping-cart"></i> Compras</td>
                    <td>0</td>
                    <td>
                      <button>
                        <i class="fa fa-analytics"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
          </table>
        </div>
        <!-- TABELA PARA RELATÓRIO DE ANUNCIOS -->
      </div>
    </div>
  </section>




  @endsection
