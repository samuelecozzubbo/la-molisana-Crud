<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PastaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //DI DEFAULT E' FALSE E BISOGNA MODIFICARLO IN TRUE
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:50',
            'src' => 'required|max:255',
            'src_h' => 'required|max:255',
            'src_p' => 'required|max:255',
            'type' => 'required|max:20',
            'cooking_time' => 'required|max:20',
            'weight' => 'required|max:20',
        ];
    }

    //Funzione che si deve chiamare messages è opzionale e contiene i messaggi custom
    public function messages()
    {
        return [
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
        ];
    }
}
