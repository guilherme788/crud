<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCela;
use App\Models\Cela;
use Illuminate\Http\Request;

class CelaController extends Controller
{

    public function index()
    {

        $celas = Cela::all();
        $celas = Cela::withCount('presos')->get();


        return view('celas.index', compact('celas'));
    }


    public function create()
    {
        return view('celas.create');
    }


    public function store(StoreUpdateCela $request)
{
    Cela::create($request->validated());
    return redirect()->route('celas.index')->with('success', 'Cela criada com sucesso.');
}


    public function show(string $id)
    {
        // Exibir os detalhes de uma cela específica
    }


    public function edit(string $id)
    {
        $cela= Cela::find($id);
        return view('celas.edit', ['cela' => $cela]);

    }


    public function update(StoreUpdateCela $request, $id)
{
    $cela = Cela::findOrFail($id);
    $cela->update($request->validated());
    return redirect()->route('celas.index')->with('success', 'Cela atualizada com sucesso.');
}



    public function destroy(string $id)
    {
        $cela = Cela::find($id);
        $cela->delete();
        return redirect()->route('celas.index');    }
}
