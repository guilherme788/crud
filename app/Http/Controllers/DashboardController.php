<?php
namespace App\Http\Controllers;

use App\Models\Visita;
use App\Models\Preso;
use App\Models\Cela;
use App\Models\Visitante;

class DashboardController extends Controller
{
    public function index()
    {
        $quantidadePresos = Preso::count();
        $quantidadeCelas = Cela::count();
        $quantidadeVisitas = Visita::count();
        $quantidadeVisitantes = Visitante::count();

        return view('dashboard.index', compact('quantidadePresos', 'quantidadeCelas', 'quantidadeVisitas', 'quantidadeVisitantes'));
    }
}
