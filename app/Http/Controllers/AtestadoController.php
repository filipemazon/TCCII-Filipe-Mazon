<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Atestado;
use Illuminate\Http\Request;
use Auth;


class AtestadoController extends Controller{
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
        $atestados = Atestado::join('funcionarios', 'id_funcionario', '=', 'funcionarios.id')
                            ->select('atestados.*', 'funcionarios.name as funcionario')
                            ->orderBy('id','asc')->get();
        return view('atestado.index', compact('atestados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        if (Auth::check()){
            $funcionarios = Funcionario::orderBy('name')->get();
            return view('atestado.cadastrar', compact('funcionarios'));
        } else {
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
	    Atestado::create($request->all())->id;
            return redirect()->route('home')->with('success','Atestado has been created successfully.');
        }else{
            echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
            location.href ='/';
        </script>";  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atestado  $atestado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atestado = Atestado::find($id);
        $funcionarios = Funcionario::orderBy('name')->get();
        $funcionario = Funcionario::where('id', $atestado->id_funcionario)->first();
        return view('atestado.edit', compact('atestado', 'funcionarios', 'funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Atestado  $atestado
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $atestado = Atestado::find($id);
        $params = $request->all();
        $atestado->update($params);
        $atestados = Atestado::orderBy('id','asc')->get();
        return view('atestado.index', compact('atestados'))->with('message', 'Editado com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atestado  $atestado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atestado $atestado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atestado  $atestado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atestado = Atestado::find($id);
        $atestado->delete(); // Easy right?
        return redirect('/atestados')->with('success', 'Atestado removed.');  // -> resources/views/stocks/index.blade.php
    }

}