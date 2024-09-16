{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5 bg-white">
        <h1>Nuova pasta</h1>
        <form class="py-5" action="{{ route('pastas.store') }}" method="POST">
            {{-- Questo è un token di sicurezza che deve essere presente in tutti i form --}}
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="titolo">
            </div>
            <div class="mb-3">
                <label for="src" class="form-label">Immagine principale</label>
                <input type="text" name="src" class="form-control" id="src"
                    placeholder="Percorso immagine principale">
            </div>
            <div class="mb-3">
                <label for="src_h" class="form-label">Seconda immagine</label>
                <input type="text" name="src_h" class="form-control" id="src_h"
                    placeholder="Percorso seconda immagine">
            </div>
            <div class="mb-3">
                <label for="src_p" class="form-label">Terza immagine</label>
                <input type="text" name="src_p" class="form-control" id="src_p"
                    placeholder="Percorso terza immagine">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <input type="text" name="type" class="form-control" id="type" placeholder="Tipo">
            </div>
            <div class="mb-3">
                <label for="cooking_time" class="form-label">Tempo di cottura</label>
                <input type="text" name="cooking_time" class="form-control" id="cooking_time"
                    placeholder="tempo di cottura">
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Peso</label>
                <input type="text" name="weight" class="form-control" id="weight" placeholder="Peso">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" class="form-control" type="text" class="form-control" id="description"
                    placeholder="descrizione"></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" href="#" class="btn btn-success">Invia</button>
                <button type="reset" href="#" class="btn btn-warning">Annulla</button>
            </div>
        </form>
    </div>
@endsection


@section('titlePage')
    Create pasta
@endsection
