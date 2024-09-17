<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasta;

class PageController extends Controller
{
    public function index()
    {
        $title = 'Layout base - HOME';
        $num_prodotti = Pasta::count();
        //$last_prod = Pasta::orderBy('id', 'desc')->first();
        $last_prod = Pasta::latest()->first();
        return view('home', compact('title', 'num_prodotti', 'last_prod'));
    }
}
