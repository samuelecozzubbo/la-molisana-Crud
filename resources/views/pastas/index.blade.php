{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5">

        {{-- Se la variabile di sessione esiste stampo il valore dentro l'alert --}}
        @if (session('deleted'))
            <div class="alert alert-success" role="alert">
                {{ session('deleted') }}
            </div>
        @endif



        <h1>Elenco paste</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Immagine</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pastas as $pasta)
                    <tr>
                        <th>{{ $pasta->id }}</th>
                        <td><img src="{{ $pasta->src }}" alt="{{ $pasta->title }}"></td>
                        <td>{{ $pasta->title }}</td>
                        <td>{{ $pasta->type }}</td>
                        <td>
                            <a class="btn btn-success" title="mostra" href="{{ route('pastas.show', $pasta) }}"><i
                                    class="fa-solid fa-eye"></i></a>
                            {{-- Non serve che passo pasta->id perchè lui passa automaticamente id
                            ['id => $pasta->id'] lui fa questo crea un array associativo con id --}}
                            <a class="btn btn-warning" title="modifica" href="{{ route('pastas.edit', $pasta) }}"><i
                                    class="fa-solid fa-pencil"></i></a>
                            @include('partials.formdelete')

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


@section('titlePage')
    Lista Paste
@endsection
