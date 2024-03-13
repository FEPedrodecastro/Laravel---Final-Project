@extends('layouts.main_layout')

@section('content')

    <div class="animation-questions">
        <div class="animation-questions-content">
            <div class="animation-questions-card">
                <p id="animationP"></p>
                <img id="imagegif" src="{{ asset('images/giphy1.gif') }}" alt="Giphy Image">
            </div>
        </div>
    </div>

    <section class="teste-vocacional">

        <div class="progress-bar">
            <div class="progress"></div>
        </div>        
        
        <form id="form-teste">
            {{-- Chamar as perguntas do teste vocacional --}}
            @foreach ($perguntas as $index => $pergunta)
                <div class="form-section">
                    <div class="pergunta" data-pergunta-id="{{ $pergunta->id }}" data-step="{{ $index }}">
                        <div class="questao">
                            <p>{{ $pergunta->questao }}</p>
                        </div>
                        <div class="pergunta-base">
                            <p>Concordas com esta afirmação?</p>
                        </div>
                        <div class="resposta">
                            <label class="resposta-label">
                                <input type="radio" name="resposta_{{ $pergunta->id }}" value="sim">
                                <span class="resposta-text">Sim</span>
                            </label>
                            <label class="resposta-label">
                                <input type="radio" name="resposta_{{ $pergunta->id }}" value="nao">
                                <span class="resposta-text">Não</span>
                            </label>
                        </div>
                        <div class="btns-form">
                            {{-- Se for a primeira pergunta botão anterior não vai existir --}}
                            @if ($index === 0)
                            <button class="previous"></button>
                            {{-- Se não for a primeira pergunta botão anterior vai existir --}}
                            @else
                            <button class="pushable previous">
                                <span class="shadow"></span>
                                <span class="edge"></span>
                                <span class="front2">
                                  Retroceder
                                </span>
                              </button>
                            @endif

                            {{-- Se for última pergunta tem um botão de submeter --}}
                            @if ($index === count($perguntas)-1)
                            <a href="{{ route('teste-vocacional-resultados') }}">
                                <div class="pushable submit">
                                    <span class="shadow"></span>
                                    <span class="edge"></span>
                                    <span class="front2">
                                    Submeter
                                    </span>
                                </div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
        </form>       
    </section>
    
@endsection