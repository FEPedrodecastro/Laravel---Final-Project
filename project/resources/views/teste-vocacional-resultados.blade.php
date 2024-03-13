@extends('layouts.main_layout')

@section('content')

<section class="teste-vocacional-resultados">
    <x-teste-resultados.results-message/>
    <x-teste-resultados.graficos-estudante/>
    <x-teste-resultados.areas-descricao/>
    <div class="container container-bg">
        <h5 style="line-height: 1.5">Agora que sabes os teus resultados do teste vocacional e tens informação sobre as áreas de estudo, acede ao nosso <a href="{{ route('guia') }}">Guia de Portal de Oferta Formativa</a> para saberes como pesquisar no Portal de Oferta Formativa, de modo a encontrares o curso perfeito para ti!</h5>
    </div>
</section>

<section class="guia">

</section>


@endsection