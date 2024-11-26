<?php

namespace App\Http\Controllers;

use App\Models\Visita;
use App\Models\Preso;
use App\Models\Visitante;
use Illuminate\Http\Request;

class VisitaController extends Controller
{

    public function index()
    {
        $visitas = Visita::with(['preso', 'visitante'])->get();
        return view('visitas.index', compact('visitas'));
    }


    public function create()
    {
        $presos = Preso::all();
        $visitantes = Visitante::all();
        return view('visitas.create', compact('presos', 'visitantes'));
    }


    public function store(Request $request)
    {
        Visita::create($request->all());
        return redirect()->route('visitas.index')->with('success', 'Visita registrada com sucesso!');
    }



    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {

        $visita = Visita::findOrFail($id);

        $presos = Preso::all();
        $visitantes = Visitante::all();

        return view('visitas.edit', compact('visita', 'presos', 'visitantes'));
    }




    public function update(Request $request, string $id)
    {
        $visita = Visita::find($id);

        $visita->update($request->all());

        return redirect()->route('visitas.index')->with('success', 'Visita atualizada com sucesso!');
    }


    public function destroy(string $id)
    {

        $visita = Visita::find($id);

        $visita->delete();

        return redirect()->route('visitas.index');
    }
}
