@extends('layouts.main_layout')

@section('content')

<div class="container container-form">
    <div class="heading">
        <a href="{{ route('registo-estudante') }}" class="non-active">Estudante</a>
        <a href="{{ route('registo-instituicao') }}" class="active">Instituição</a>
    </div>
    <div class="formulario">
        <div class="row">
            <div class="col-lg-7 form">
                <form action="{{ route('registo-instituicao_submit') }}" method="POST">
                    @csrf
                    <h2>Registo Instituição</h2>
                    <div class="row form-group">
                        <div class="col-xl-8">
                            <div class="form-group form-input">
                                <label for="nome">Nome *</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da instituição" value="{{ old('nome') }}">
                            </div>
                            @error('nome')
                            {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                            <div class="text-danger">{{ $errors->get('nome')[0] }}</div>
                            @enderror
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group form-input">
                                <label for="nif">NIF *</label>
                                <input type="text" class="form-control" id="nif" name="nif" placeholder="NIF" value="{{ old('nif') }}">
                            </div>
                            @error('nif')
                            {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                            <div class="text-danger">{{ $errors->get('nif')[0] }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group form-margin">
                        <label>Tipo *</label>
                        <div class="form-radio">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="escola" name="tipo_instituicao" value="Escola" @if(old('tipo_instituicao') === 'Escola') checked @endif>
                                <label class="form-check-label" for="escola" style="
                                font-weight: 500;">Escola</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="agrupamento" name="tipo_instituicao" value="Agrupamento" @if(old('tipo_instituicao') === 'Agrupamento') checked @endif>
                                <label class="form-check-label" for="agrupamento" style="
                                font-weight: 500;">Agrupamento</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="empresa" name="tipo_instituicao" value="Empresa" @if(old('tipo_instituicao') === 'Empresa') checked @endif>
                                <label class="form-check-label" for="empresa" style="
                                font-weight: 500;">Empresa</label>
                            </div>
                            @error('tipo_instituicao')
                            {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                            <div class="text-danger">{{ $errors->get('tipo_instituicao')[0] }}</div>
                            @enderror
                        </div>
                    </div>

                <div class="row form-group">
                        
                    <div class="form-group form-input mt-5">
                        <label for="email">Email *</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                        {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                        <div class="text-danger">{{ $errors->get('email')[0] }}</div>
                        @enderror
                    </div>

                    <div class="form-group form-input">
                        <label for="password">Password *</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('email') }}">
                        @error('password')
                        {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                        <div class="text-danger">{{ $errors->get('password')[0] }}</div>
                        @enderror
                    </div>

                    <div class="form-group form-input">
                        <label for="confirmarPassword">Confirmar Password *</label>
                        <input type="password" class="form-control" id="confirmarPassword" name="confirmar_password" placeholder="Confirmar password" value="{{ old('email') }}">
                        @error('confirmar_password')
                        {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                        <div class="text-danger">{{ $errors->get('confirmar_password')[0] }}</div>
                        @enderror
                    </div>
                </div>

                    <br>
                    <div class="form-check form-group form-margin termos">
                        <input type="checkbox" class="form-check-input" id="aceitarTermos" name="aceitar_termos" @if(old('aceitar_termos')) checked @endif>
                        <label class="form-check-label" for="aceitarTermos">Aceito os termos e condições</label>
                        @error('aceitar_termos')
                        {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                        <div class="text-danger">{{ $errors->get('aceitar_termos')[0] }}</div>
                        @enderror
                    </div>

                    <button class="button-link">Submeter</button>
                     @if(session('error'))
                        <div class="text-danger p-3">{{ session('error') }}</div>
                    @endif
                </form>
            </div>
            <div class="col-lg-5 section">
                <h3>Já se encontra registado?</h3>
                <a class="button-link" href="{{ route('login') }}">Faça o login</a>
            </div>
        </div>
    </div>
</div>


        
@endsection