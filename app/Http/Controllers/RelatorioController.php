<?php

namespace App\Http\Controllers;

use DateTime;

use App\Models\Advertencia;
use App\Models\Atestado;
use App\Models\Bolsa;
use App\Models\Cargo;
use App\Models\Dependente;
use App\Models\Endereco;
use App\Models\Feedback;
use App\Models\Ferias;
use App\Models\Funcionario;
use App\Models\FuncionarioPsi;
use App\Models\Psi;
use App\Models\Setor;
use App\Models\SkilFuncionario;
use App\Models\Skill;
use Illuminate\Http\Request;
use Auth;


class RelatorioController extends Controller{
 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }





    public function geraBolsas(){
        $bolsas = Bolsa::join('funcionarios', 'bolsas.id_funcionario', '=', 'funcionarios.id')
                    ->select('bolsas.*', 'funcionarios.name')
                    ->get();
        return $bolsas;
    }
    public function reportBolsas()
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
        return view('relatorio.bolsas', compact('funcionarios', 'contratadosmes', 
                     'psiativo', 'result', 'bolsas'));
    }




    public function geraAdv(){
        $advertencias = Advertencia::join('funcionarios', 'advertencias.id_funcionario', '=', 'funcionarios.id')
                    ->select('advertencias.*', 'funcionarios.name')
                    ->get();
        return $advertencias;
    }
    public function reportAdv()
    {
        $funcionarios = Funcionario::orderBy('name')->count();
        $advertencias = $this->geraAdv();
        return view('relatorio.advertencias', compact('funcionarios', 'advertencias'));
    }




    public function geraFuncionario(){
        $funcionarios = Funcionario::join('setors', 'id_setor', '=', 'setors.id')
                        ->join('cargos', 'id_cargo', '=', 'cargos.id')
                        ->select('funcionarios.*', 'setors.name as setor', 'cargos.name as cargo')
                        ->orderBy('id', 'asc')->get();
        return $funcionarios;
    }
    public function reportPay()
    {
        $funcionarios = $this->geraFuncionario();
        return view('relatorio.salarios', compact('funcionarios'));
    }




    public function geraFuncionarioS(){
        $funcionarios = Funcionario::join('setors', 'id_setor', '=', 'setors.id')
                        ->join('cargos', 'id_cargo', '=', 'cargos.id')
                        ->select('funcionarios.*', 'setors.name as setor', 'cargos.name as cargo')
                        ->orderBy('id_setor', 'asc')->get();
        return $funcionarios;
    }
    public function reportFSetor()
    {
        $funcionarios = $this->geraFuncionarioS();
        return view('relatorio.funcsetor', compact('funcionarios'));
    }




    public function geraDependentes(){
        $dependentes = Dependente::join('funcionarios', 'id_funcionario', '=', 'funcionarios.id')
                        ->select('dependentes.*', 'funcionarios.name as funcionario')
                        ->orderBy('id_funcionario', 'asc')->get();
        return $dependentes;
    }
    public function reportDepend()
    {
        $dependentes = $this->geraDependentes();
        return view('relatorio.dependentes', compact('dependentes'));
    }




    public function geraFerias(){
        $ferias = Ferias::join('funcionarios', 'id_funcionario', '=', 'funcionarios.id')
                        ->select('ferias.*', 'funcionarios.name as funcionario')
                        ->orderBy('id_funcionario', 'asc')->get();
        return $ferias;
    }
    public function reportFerias()
    {
        $ferias = $this->geraFerias();
        return view('relatorio.ferias', compact('ferias'));
    }




// RELATORIOS DE DATA


    public function geraAniv(){ 
        $month = new DateTime('n');

        $aniversariantes = Funcionario::join('setors', 'id_setor', '=', 'setors.id')
                                      ->join('cargos', 'id_cargo', '=', 'cargos.id')
                                      ->select('funcionarios.*', 'setors.name as setor', 'cargos.name as cargo')
                                      //->where('MONTH(nascimento)','=',  $month)
                                      ->orderBy('nascimento', 'asc')->get();
        return $aniversariantes;
    }
    public function reportAniv()
    {
        $aniversariantes = $this->geraAniv();
        return view('relatorio.aniversariantes', compact('aniversariantes'));
    }



    public function geraCasa(){ 
        $month = new DateTime('n');

        $anoscasas = Funcionario::join('setors', 'id_setor', '=', 'setors.id')
                                      ->join('cargos', 'id_cargo', '=', 'cargos.id')
                                      ->select('funcionarios.*', 'setors.name as setor', 'cargos.name as cargo')
                                      //->where('MONTH(nascimento)','=',  $month)
                                      ->orderBy('nascimento', 'asc')->get();
        return $anoscasas;
    }
    public function reportCasa()
    {
        $anoscasas = $this->geraCasa();
        return view('relatorio.acasa', compact('anoscasas'));
    }

// FIM DOS RELATORIOS DE DATA

    public function geraFeed(){ 
        $feedbacks = Feedback::join('funcionarios', 'id_funcionario', '=', 'funcionarios.id')
                                ->select('feedbacks.*', 'funcionarios.name as funcionario')
                                ->orderBy('id_funcionario', 'asc')
                                ->orderBy('data_inicial', 'asc')->get();
        return $feedbacks;
    }
    public function reportFeed()
    {
        $feedbacks = $this->geraFeed();
        return view('relatorio.feedback', compact('feedbacks'));
    }




    public function geraHPsi(){ 
        $hpsis = Psi::join('funcionarios', 'funcionario_responsavel', '=', 'funcionarios.id')
                                ->join('setors', 'psis.id_setor', '=', 'setors.id')
                                ->join('cargos', 'psis.id_cargo', '=', 'cargos.id')
                                ->select('psis.*', 'funcionarios.name as funcionario', 
                                'setors.name as setor', 'cargos.name as cargo')
                                ->orderBy('funcionario_responsavel', 'asc')
                                ->orderBy('data_inicial', 'asc')->get();
        return $hpsis;
    }
    public function reportHPsi()
    {
        $hpsis = $this->geraHPsi();
        return view('relatorio.hpsi', compact('hpsis'));
    }




    public function geraPsiAberto(){ 

        $today = new DateTime('now');
        $result = $today->format('Y-m-d H:i:s');

        $psiabertos = Psi::join('funcionarios', 'funcionario_responsavel', '=', 'funcionarios.id')
                                ->join('setors', 'psis.id_setor', '=', 'setors.id')
                                ->join('cargos', 'psis.id_cargo', '=', 'cargos.id')
                                ->select('psis.*', 'funcionarios.name as funcionario', 
                                'setors.name as setor', 'cargos.name as cargo')
                                ->orderBy('funcionario_responsavel', 'asc')
                                ->where('data_inicial', '<=', $today)
                                ->where('data_final', '>=', $today)
                                ->orderBy('data_inicial', 'asc')->get();


        return $psiabertos;
    }
    public function reportPsiAberto()
    {
        $psiabertos = $this->geraPsiAberto();
        return view('relatorio.psiaberto', compact('psiabertos'));
    }




    public function geraFSkil(){ 
        $fskils = SkilFuncionario::join('funcionarios', 'id_funcionario', '=', 'funcionarios.id')
                                ->join('skills', 'id_skil', '=', 'skills.id')
                                ->select('skil_funcionario.*', 'funcionarios.name as funcionario', 'skills.descricao as skil')
                                ->orderBy('id_funcionario', 'asc')
                                ->orderBy('id_skil', 'asc')->get();
        return $fskils;
    }
    public function reportFSkil()
    {
        $fskils = $this->geraFSkil();
        return view('relatorio.fskils', compact('fskils'));
    }















}