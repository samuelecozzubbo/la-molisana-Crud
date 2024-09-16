<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasta extends Model
{
    use HasFactory;
    /* Con questa propietà comunio al model quali sono i campi da riempire */
    protected $fillable = [
        'title',
        'src',
        'src_h',
        'src_p',
        'type',
        'cooking_time',
        'weight',
        'description',
        'slug',
    ];
}
