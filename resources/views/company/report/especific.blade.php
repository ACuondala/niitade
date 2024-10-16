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
                <th width="250">Top 5</th>
                <th></th>
                <th width="10"></th>
              </tr>
            </thead>

           <tbody>
                  <tr>
                    <td>Perfis alcançados:</td>
                    <td>300</td>
                    <td>
                      <button>
                       <i class="fa fa-analytics"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>Média Tempo de Exibição:</td>
                    <td>0</td>
                    <td>
                      <button>
                        <i class="fa fa-analytics"></i>
                      </button>
                    </td>
                  </tr>

                </tbody>
          </table>

           <table>
            <thead>
              <tr>
                <th width="250">Resumo Público Específico</th>
                <th></th>
                <th width="10"></th>
              </tr>
            </thead>

           <tbody>
                  <tr>
                    <td>% Por Região:</td>
                    <td>300</td>
                    <td>
                      <button>
                        <i class="fa fa-analytics"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>% Por Idade:</td>
                    <td>0</td>
                    <td>
                      <button>
                        <i class="fa fa-analytics"></i>
                      </button>
                    </td>
                  </tr>

                   <tr>
                    <td>% Por Genero:</td>
                    <td>0</td>
                    <td>
                      <button>
                        <i class="fa fa-analytics"></i>
                      </button>
                    </td>
                  </tr>

                   <tr>
                    <td>% Por Interesse:</td>
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
