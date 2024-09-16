<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasta;
use App\Functions\Helper;


class PastaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$pastas = Pasta::all();
        $pastas = Pasta::orderBy('id', 'desc')->get();
        return view('pastas.index', compact('pastas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dump('Qui stampo il form di creazione');
        return view('pastas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        1.$request contiene tutti i dati inviati dal form
        2.$salvo i dati del form nel DB
        3.reinderizzo nella pagina show del nuovo prodotto
        */
        //dump($request->all());
        //creo una nuova istanza di pasta
        $data = $request->all();
        $new_pasta = new Pasta();
        // $new_pasta->title = $data['title'];
        // $new_pasta->src = $data['src'];
        // $new_pasta->src_h = $data['src-h'];
        // $new_pasta->src_p = $data['src-p'];
        // $new_pasta->type = $data['type'];
        // $new_pasta->cooking_time = $data['type'];
        // $new_pasta->weight = $data['weight'];
        // $new_pasta->description = $data['description'];
        // $new_pasta->slug = Helper::generateSlug($data['title'], Pasta::class);
        //dump($new_pasta);
        //METODO VELOCE AGGIUNGENDO UNA PROTECTED FILLABLE NEL MODEL
        //FILL LEGGE I CAMPI CORRISPONDENTI E LI ASSOCIA
        //Devo generare lo slug che non arriva dal form
        $data['slug'] = Helper::generateSlug($data['title'], Pasta::class);
        $new_pasta->fill($data);
        $new_pasta->save();
        return redirect()->route('pastas.show', $new_pasta->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pasta = Pasta::find($id);
        return view('pastas.show', compact('pasta'));
        //dump($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
