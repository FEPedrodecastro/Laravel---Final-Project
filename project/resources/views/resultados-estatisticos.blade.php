@extends('layouts.main_layout')

@section('content')

<main class="resultados-estatisticos">
    <div class="container">
        <section class="mb-5">
            <h1>Resultados Estatísticos</h1>
            <p>A seguir tem os resultados estatísticos dos estudantes do 9º ano que realizaram o teste vocacional. Pode consultar os resultados estatísticos por área de estudo, género e localização (distrito, concelho ou freguesia)</p>
        </section>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Resultados Gerais
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row chart">
                        <canvas id="barChart"></canvas>
                    </div>  
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Resultados por Género
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row chart">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-6  mb-5">
                                <canvas id="chartAgricultura"></canvas>
                                <p class="text-center mt-3">Agricultura</p>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6  mb-5">
                                <canvas id="chartArtesHumanidades"></canvas>
                                <p class="text-center mt-3">Artes e Humanidades</p>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6  mb-5">
                                <canvas id="chartCiencias"></canvas>
                                <p class="text-center mt-3">Ciências</p>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6  mb-5">
                                <canvas id="chartCienciasSociais"></canvas>
                                <p class="text-center mt-3">Ciências Sociais, Comércio e Direito</p>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6  mb-5">
                                <canvas id="chartEducacao"></canvas>
                                <p class="text-center mt-3">Educação</p>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6  mb-5">
                                <canvas id="chartEngenharias"></canvas>
                                <p class="text-center mt-3">Engenharias, Indústrias e Construção</p>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6  mb-5">
                                <canvas id="chartSaude"></canvas>
                                <p class="text-center mt-3">Saúde e Protecção Social</p>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6  mb-5">
                                <canvas id="chartServicos"></canvas>
                                <p class="text-center mt-3">Serviços</p>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Resultados Por Distrito
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body distritoFilter">
                    <div class="form-group search">
                        <input type="text" id="distritoSearch" class="form-control" placeholder="Pesquisar por distrito" required>
                        <button class="btn" id="pesquisarButton">Pesquisar</button>
                    </div>
                    <div class="col-lg-7 col-md-10 distrito-container">
                        <div class="distrito-content">
                            <h3 class="text-center mb-3 distrito">Porto</h3>
                            <canvas id="radarChartPorto"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-10 distrito-container">
                        <div class="distrito-content">
                            <h3 class="text-center mb-3 distrito">Lisboa</h3>
                            <canvas id="radarChartLisboa"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-10 distrito-container">
                        <div class="distrito-content">
                            <h3 class="text-center mb-3 distrito">Braga</h3>
                            <canvas id="radarChartBraga"></canvas>
                        </div>
                    </div>                               
                    <p class="message-search-distrito"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</main>
@endsection