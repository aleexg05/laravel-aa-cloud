<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Esdeveniment;
use App\Models\Categorie; 



class EsdevenimentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
 public function index()
    {
        $categories = Categorie::all();
        $esdeveniments = Esdeveniment::with('category')->get();

    
    return view('esdeveniments.index', compact('esdeveniments'));

    }   

public function getindex()
    {
        $esdeveniments = \App\Models\Esdeveniment::all();
        return view('esdeveniments.index', ['esdeveniments' => $esdeveniments]);
    }

    public function countUsuari()
{
    $esdeveniments = Esdeveniment::withCount('usuaris')->get();

   
    $esdevenimentsDisponibles = $esdeveniments->filter(function ($esdeveniment) {
        return $esdeveniment->usuaris_count < $esdeveniment->num_max_assistents;
    });

    return view('esdeveniments.index', ['esdeveniments' => $esdevenimentsDisponibles]);
}

    /**
     * Show the form for creating a new resource.
     */
      public function create()
    {
        $categories = Categorie::all(); 
    return view('esdeveniments.create', compact('categories'));
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        $request->validate([
        'nom' => 'required|string|max:255',
        'categorie_id' => 'required|exists:categories,id',
        'descripcio' => 'required|string|max:255',
        'data' => 'required|date',
        'hora' => 'required|date_format:H:i',
        'num_max_assistents' => 'required|string|max:10',
        'edat_minima' => 'required|string|max:3',
        'imatge' => 'required'
        ]);
        Esdeveniment::create($request->all());

        return view('esdeveniments.index');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    
    $esdeveniment = Esdeveniment::findOrFail($id);

    
    return view('esdeveniments.show', compact('esdeveniment'));
}

public function reserva($id)
{
    $esdeveniment = Esdeveniment::findOrFail($id);
      return view('esdeveniments.reserva', compact('esdeveniment'));


}
public function guardarReserva($id)
{
    $esdeveniment = Esdeveniment::findOrFail($id);


    if (!$esdeveniment->usuaris()->where('user_id', auth()->id())->exists()) {
        $esdeveniment->usuaris()->attach(auth()->id());
       return view('esdeveniments.index');
    }

  return view('esdeveniments.index');
}


    /**
     * Show the form for editing the specified resource.
     */
  public function edit(string $id)
    {
        $esdeveniment = Esdeveniment::findOrFail($id);
        $categories = Categorie::all();
          return view('esdeveniments.edit', compact('esdeveniment', 'categories'));
    }

    public function new(Request $request)
{
    $request->validate([
            'nom' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'descripcio' => 'required|string|max:255',
            'data' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'num_max_assistents' => 'required|string|max:5',
            'edat_minima' => 'required|string|max:3',
            'imatge' => 'required'
        ]);

    Esdeveniment::create([
        'nom' => $request->nom,
        'categorie_id' => $request->categorie_id,
        'data' => $request->data,
        'hora' => $request->hora,
        'num_max_assistents' => $request->num_max_assistents,
        'edat_minima' => $request->edat_minima,
        'imatge' => $request->imatge
    ]);

    return redirect()->route('esdeveniments.index');
}

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, $id)
{
    $esdeveniment = Esdeveniment::findOrFail($id);
    $esdeveniment->nom = $request->input('nom');
    $esdeveniment->categorie_id = $request->input('categorie_id');
    $esdeveniment->descripcio = $request->input('descripcio');
    $esdeveniment->data = $request->input('data');
    $esdeveniment->hora = $request->input('hora');
    $esdeveniment->num_max_assistents = $request->input('num_max_assistents');
    $esdeveniment->edat_minima = $request->input('edat_minima');
    $esdeveniment->imatge = $request->input('imatge');
    $esdeveniment->save();

    return redirect()->route('esdeveniments.show', $id);
}
    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $esdeveniment = Esdeveniment::findOrFail($id);
    $esdeveniment->delete();

    return redirect()->route('esdeveniments.index')->with('success', 'Esdeveniment eliminat correctament.');
}

}
