@extends('layouts.main_layout')

@section('content')

<main>
    <x-home.banner/>

    <div class="container">
        {{-- Se user não estiver logado --}}
        @if (!session()->has('email'))
            <x-home.registration-cards/>

        {{-- Se user estiver logado e for do tipo estudante --}}
        @elseif (session()->has('email') && session()->get('tipo')===1)
            <x-home.welcome-message/>

        {{-- Se user estiver logado e for do tipo instituição --}}
        @elseif (session()->has('email') && session()->get('tipo')===2)
            <x-home.welcome-message2/>
        @endif
    </div>
</main>


@endsection