<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Endereco;
use App\Models\Setor;
use App\Models\Cargo;
use Illuminate\Http\Request;
use Auth;


class FuncionarioController extends Controller{
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
        $funcionarios = Funcionario::join('setors', 'id_setor', '=', 'setors.id')
                        ->join('cargos', 'id_cargo', '=', 'cargos.id')
                        ->select('funcionarios.*', 'setors.name as setor', 'cargos.name as cargo')
                        ->orderBy('id', 'asc')->get();
        return view('funcionario.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()){
            $setores = Setor::orderBy('name')->get();
            $cargos = Cargo::orderBy('name')->get();
            return view('funcionario.cadastrar', compact('setores', 'cargos'));
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
            Funcionario::create($request->all());
            return redirect('/funcionarios')->with('success','Employee has been created successfully.');
        }else{
            echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
            location.href ='/';
        </script>";  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = Funcionario::find($id);
        $setores = Setor::orderBy('name')->get();
        $cargos = Cargo::orderBy('name')->get();
        $setor = Setor::where('id', $funcionario->id_setor)->first();
        $cargo = Cargo::where('id', $funcionario->id_cargo)->first();
        return view('funcionario.edit', compact('funcionario', 'setores', 'cargos', 'setor', 'cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $funcionario = Funcionario::find($id);
        $params = $request->all();
        $funcionario->update($params);
        $funcionarios = Funcionario::orderBy('id','asc')->get();
        return view('funcionario.index', compact('funcionarios'))->with('message', 'Editado com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);
        $funcionario->delete(); // Easy right?
 
        return redirect('/funcionarios')->with('success', 'Funcionario removed.');  // -> resources/views/stocks/index.blade.php
    }

}