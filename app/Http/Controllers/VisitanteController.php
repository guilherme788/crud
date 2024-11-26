<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitante;

class VisitanteController extends Controller
{

    public function index()
    {
        $visitantes = Visitante::all();
        return view('visitantes.index', compact('visitantes'));
    }


    public function create()
    {
        return view('visitantes.create');
    }


    public function store(Request $request)
    {
        Visitante::create($request->all());

        return redirect()->route('visitantes.index');
    }



    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $visitante = Visitante::find($id);
        return view('visitantes.edit', ['visitante' => $visitante]);
        return redirect()->route('visitantes.index');
    }


    public function update(Request $request, string $id)
    {
        $visitante = Visitante::find($id);
        $visitante->update([
            'nome' => $request->nome,
            'documento_identidade' => $request->documento_identidade,
        ]);

        return redirect()->route('visitantes.index');
    }


    public function destroy(string $id)
    {
        $visitante = Visitante::find($id);
        $visitante->delete();
        return redirect()->route('visitantes.index');
    }
}
