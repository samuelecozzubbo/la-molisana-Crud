{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5 bg-white">
        <h1>
            {{ $pasta->title }}<a href="{{ route('pastas.edit', $pasta) }}" title="modifica" class="btn btn-warning my-2"><i
                    class="fa-solid fa-pencil"></i></a>
            @include('partials.formdelete')
        </h1>
        <p>Cottura: {{ $pasta->cooking_time }} | Peso: {{ $pasta->weight }} | Tipo: {{ $pasta->type }} </p>
        <p>Cottura: {{ $pasta->slug }}</p>
        <div class="row">
            <div class="col">
                <img class="img-fluid" src="{{ $pasta->src }}" alt="{{ $pasta->title }} src">
                <p>src</p>
            </div>
            <div class="col">
                <img class="img-fluid" src="{{ $pasta->src_h }}" alt="{{ $pasta->title }} src-h">
                <p>src-h</p>
            </div>
            <div class="col">
                <img class="img-fluid" src="{{ $pasta->src_p }}" alt="{{ $pasta->title }} src-p">
                <p>src-p</p>
            </div>
        </div>
        <p class="my-5">{!! $pasta->description !!}</p>
        <a href="{{ route('pastas.index') }}" class="btn btn-success my-2">Torna alle paste</a>
    </div>
@endsection


@section('titlePage')
    Dettaglio pasta
@endsection
