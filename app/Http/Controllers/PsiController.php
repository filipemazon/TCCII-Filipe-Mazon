<?php

namespace App\Http\Controllers;

use App\Models\Psi;
use App\Models\Setor;
use App\Models\Cargo;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Auth;


class PsiController extends Controller{
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $psis = Psi::join('funcionarios', 'funcionario_responsavel', '=', 'funcionarios.id')
                        ->join('setors', 'psis.id_setor', '=', 'setors.id')
                        ->join('cargos', 'psis.id_cargo', '=', 'cargos.id')
                        ->select('psis.*', 'funcionarios.name as funcionario', 
                        'setors.name as setor', 'cargos.name as cargo')
                        ->orderBy('id', 'asc')->get();
        return view('psi.index', compact('psis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()){
	    $setors = Setor::orderBy('name')->get();
	    $cargos = Cargo::orderBy('name')->get();
	    $funcionarios = Funcionario::orderBy('name')->get();
            return view('psi.cadastrar', compact('setors', 'cargos', 'funcionarios'));
        }else{
            echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
            location.href ='/';
        </script>";  
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if (Auth::check()){
            Psi::create($request->all())->id;
            return redirect()->route('home')->with('success','PSI has been created successfully.');
        }else{
            echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
            location.href ='/';
        </script>";  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Psi  $psi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $psi = Psi::find($id);
        $setors = Setor::orderBy('name')->get();
        $setor = Setor::where('id', $psi->id_setor)->first();
        $cargos = Cargo::orderBy('name')->get();
        $cargo = Cargo::where('id', $psi->id_cargo)->first();
        $funcionarios = Funcionario::orderBy('name')->get();
        $funcionario = Funcionario::where('id', $psi->funcionario_responsavel)->first();
        return view('psi.edit', compact('psi','setors', 'setor','cargos', 'cargo','funcionarios', 'funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Psi  $psi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $psi = Psi::find($id);
        $params = $request->all();
        $psi->update($params);
        $psis = Psi::orderBy('id','asc')->get();
        return view('psi.index', compact('psis'))->with('message', 'Editado com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Psi  $psi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Psi $psi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Psi  $psi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $psi = Psi::find($id);
        $psi->delete(); // Easy right?
        return redirect('/psis')->with('success', 'PSI removed.');  // -> resources/views/stocks/index.blade.php
    }

}