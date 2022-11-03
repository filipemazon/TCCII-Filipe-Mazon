<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Setor;
use App\Models\Cargo;
use App\Models\Bolsa;
use App\Models\Psi;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function geraBolsas()
    {
        $bolsas = Bolsa::join('funcionarios', 'bolsas.id_funcionario', '=', 'funcionarios.id')
            ->select('bolsas.*', 'funcionarios.name')
            ->get();
        return $bolsas;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function geraSetores()
    {
        $cargos = Funcionario::join('setors', 'id_setor', '=', 'setors.id')
            ->join('cargos', 'id_cargo', '=', 'cargos.id')
            ->selectRaw('count(cargos.name) as cargos, setors.name as setores')
            ->groupBy('setors.id')
            ->get();
        return $cargos;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function geraContratacoes()
    {
        $contratacoes = Funcionario::select(
            DB::raw("(count(id)) as funcionarios"),
            DB::raw("(DATE_FORMAT(contratacao, '%m-%Y')) as month_year"))
            ->groupBy(DB::raw("DATE_FORMAT(contratacao, '%m-%Y')"))
            ->orderBy(DB::raw("DATE_FORMAT(contratacao, '%m-%Y')"))
            ->get();
        return $contratacoes;
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $funcionarios = Funcionario::orderBy('name')->count();
        $today = new DateTime('now');
        $result = $today->format('Y-m-d H:i:s');
        $month_start = new DateTime('first day of this month');
        $month_end = new DateTime('last day of this month');
        $contratadosmes = Funcionario::whereBetween('contratacao', [$month_start, $month_end])->count();
        $psiativo = Psi::where('data_inicial', '<=', $today)
            ->where('data_final', '>=', $today)->count();
        $bolsas = $this->geraBolsas();
        $cargos =  $this->geraSetores();
        $contratacoes = $this->geraContratacoes();
        return view('home', compact(
            'funcionarios',
            'contratadosmes',
            'psiativo',
            'result',
            'bolsas',
            'cargos',
            'contratacoes'
        ));
    }
}
