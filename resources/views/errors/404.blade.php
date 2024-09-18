{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5 bg-white">
        <h1>Errore 404</h1>
        <p>
            pagina non trovata
        </p>
    </div>
@endsection


@section('titlePage')
    404
@endsection
