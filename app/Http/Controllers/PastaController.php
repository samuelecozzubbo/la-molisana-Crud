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

        //PRIMA DI TUTTO VALIDIAMO I DATI
        //Regole di validazione
        //l'istanza request ha un metodo validate
        //il primo parametro del metodo validate accetta tutte le rules di validazione
        //il secondo parametro opzionakle è un array con i messaggi di errore
        $request->validate([
            'title' => 'required|min:3|max:50',
            'src' => 'required|max:255',
            'src_h' => 'required|max:255',
            'src_p' => 'required|max:255',
            'type' => 'required|max:20',
            'cooking_time' => 'required|max:20',
            'weight' => 'required|max:20',
        ], [
            'title.required' => "Il titolo è un campo obbligatorio",
            'title.min' => "Il titolo deve contenere almeno :min caratteri",
            'title.max' => "Il titolo deve contenere almeno :max caratteri",
            'src.required' => "Il campo src è obbligatorio",
            'src.max' => "Il campo src può contenere massimo :max caratteri",

            'src_h.required' => "Il campo src_h è obbligatorio",
            'src_h.max' => "Il campo src_h può contenere massimo :max caratteri",

            'src_p.required' => "Il campo src_p è obbligatorio",
            'src_p.max' => "Il campo src_p può contenere massimo :max caratteri",

            'type.required' => "Il campo type è obbligatorio",
            'type.max' => "Il campo type può contenere massimo :max caratteri",

            'cooking_time.required' => "Il tempo di cottura è obbligatorio",
            'cooking_time.max' => "Il tempo di cottura può contenere massimo :max caratteri",

            'weight.required' => "Il campo peso è obbligatorio",
            'weight.max' => "Il campo peso può contenere massimo :max caratteri",
        ]);
        //Nel momento in cui la validazione non viene superata si
        //viene reindirizzati alla pagina di origine con in sessione tutti gli errori
        //Voglio stampare gli errori

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
        //dump($id);
        $pasta = Pasta::find($id);
        //dump($pasta);
        return view('pastas.edit', compact('pasta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $pasta = Pasta::find($id);
        //SE il titolo è cambiato genero un nuovo slug
        //ALTRIMENTI mantengo quello presente
        if ($data['title'] == $pasta->title) {
            $data['slug'] = $pasta->slug;
        } else {
            $data['slug'] = Helper::generateSlug($data['title'], Pasta::class);
        }
        //update() esegue il fill dei dati aggiornandoli
        $pasta->update($data);
        return redirect()->route('pastas.show', $pasta);
        // dump($data);
        // dump($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //dump($id);
        $pasta = Pasta::find($id);
        $pasta->delete();
        //oltre a reindirizzare alla index passo in sessione la variabile 'deleted'
        //la variabile di sessione viene passata con width(nomevariabile, valore)
        return redirect()->route('pastas.index')->with('deleted', 'La pasta ' . $pasta->title . ' è stata eliminata correttamente');
    }
}
