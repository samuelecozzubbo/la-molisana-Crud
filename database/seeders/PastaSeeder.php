<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pasta;
use Illuminate\Support\Str;
use App\Functions\Helper;

class PastaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr_pastas = config('products');
        foreach ($arr_pastas as $pasta) {
            $new_pasta = new Pasta();
            $new_pasta->title = $pasta['titolo'];
            $new_pasta->slug = Helper::generateSlug($new_pasta->title, Pasta::class);
            $new_pasta->src = $pasta['src'];
            $new_pasta->src_h = $pasta['src-h'];
            $new_pasta->src_p = $pasta['src-p'];
            $new_pasta->type = $pasta['tipo'];
            $new_pasta->cooking_time = $pasta['cottura'];
            $new_pasta->weight = $pasta['peso'];
            $new_pasta->description = $pasta['descrizione'];
            //dump($new_pasta);
            $new_pasta->save();
        }
        //dump($arr_pastas);
    }
}
