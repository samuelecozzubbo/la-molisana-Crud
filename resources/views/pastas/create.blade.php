{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5 bg-white">
        <h1>Nuova pasta</h1>
        {{-- Se sono presenti errori stampo l'alert con la lista degli errori --}}
        {{-- $errors->all() mi restituisce un array con la lista degli errori --}}
        @if ($errors->any())
            {{-- è true se ci sono errori in sessione --}}
            <div class="alert alert-danger" role="alert">
                {{-- @dump($errors->all()) --}}
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="py-5" action="{{ route('pastas.store') }}" method="POST">
            {{-- Questo è un token di sicurezza che deve essere presente in tutti i form --}}
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo (*)</label>
                {{-- @error(..)@enderror è come se fosse un if quindi la uso come condizione per aggiungere la classe is invalid --}}
                <input type="text" name="title" class="@error('title') is-invalid @enderror form-control" id="title"
                    placeholder="titolo" value="{{ old('title') }}">
                {{-- Se è presente l'errore su title stampo il tag con dentro l'errore --}}
                @error('title')
                    {{-- l'errore se presente lo trovo dentro la variabile message --}}
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="src" class="form-label">Immagine principale (*)</label>
                <input type="text" name="src" class="@error('title') is-invalid @enderror form-control" id="src"
                    placeholder="Percorso immagine principale" value="{{ old('src') }}">
                @error('src')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="src_h" class="form-label">Seconda immagine (*)</label>
                <input type="text" name="src_h" class="@error('title') is-invalid @enderror form-control" id="src_h"
                    placeholder="Percorso seconda immagine" value="{{ old('src_h') }}">
                @error('src_h')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="src_p" class="form-label">Terza immagine (*)</label>
                <input type="text" name="src_p" class="@error('title') is-invalid @enderror form-control" id="src_p"
                    placeholder="Percorso terza immagine" value="{{ old('src_p') }}">
                @error('src_p')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo (*)</label>
                <input type="text" name="type" class="@error('title') is-invalid @enderror form-control" id="type" placeholder="Tipo"
                    value="{{ old('type') }}">
                @error('type')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cooking_time" class="form-label">Tempo di cottura (*)</label>
                <input type="text" name="cooking_time" class="@error('title') is-invalid @enderror form-control" id="cooking_time"
                    placeholder="tempo di cottura" value="{{ old('cooking_time') }}">
                @error('cooking_time')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Peso (*)</label>
                <input type="text" name="weight" class="@error('title') is-invalid @enderror form-control" id="weight" placeholder="Peso"
                    value="{{ old('weight') }}">
                @error('weight')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" class="form-control" type="text" class="@error('title') is-invalid @enderror form-control" id="description"
                    placeholder="descrizione">{{ old('description') }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" href="#" class="btn btn-success">Invia</button>
                <button type="reset" href="#" class="btn btn-warning">Annulla</button>
            </div>
            <small>(*) campi obbligatori</small>
        </form>
    </div>
@endsection


@section('titlePage')
    Create pasta
@endsection
