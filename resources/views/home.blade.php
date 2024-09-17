{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5 bg-white">
        <h1>{{ $title }}</h1>
        <h3>
            Nel database sono presenti {{ $num_prodotti }} prodotti
        </h3>
        <h4>
            Ultimo prodotto inserito è {{ $last_prod->title }}
        </h4>
    </div>
@endsection


@section('titlePage')
    home
@endsection
