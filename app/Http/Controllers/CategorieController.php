<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;


class CategorieController extends Controller
{
    public function create()
    {
        return view('categorie.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Categorie::create([
            'name' => $request->name,
        ]);

        return redirect()->route('esdeveniments.index');
    }
    
    //
}
