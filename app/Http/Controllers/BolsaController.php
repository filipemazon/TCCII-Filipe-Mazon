<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Bolsa;
use Illuminate\Http\Request;
use Auth;


class BolsaController extends Controller{
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
        $bolsas = Bolsa::join('funcionarios', 'id_funcionario', '=', 'funcionarios.id')
                        ->select('bolsas.*', 'funcionarios.name as funcionario')
                        ->orderBy('id','asc')->get();
        return view('bolsa.index', compact('bolsas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()){
            $funcionarios = Funcionario::orderBy('name')->get();
            return view('bolsa.cadastrar', compact('funcionarios'));
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
            Bolsa::create($request->all())->id;
            return redirect()->route('home')->with('success','Bolsa has been created successfully.');
        }else{
            echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
            location.href ='/';
        </script>";  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bolsa  $bolsa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bolsa = Bolsa::find($id);
        $funcionarios = Funcionario::orderBy('name')->get();
        $funcionario = Funcionario::where('id', $bolsa->id_funcionario)->first();
        return view('bolsa.edit', compact('bolsa', 'funcionarios', 'funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Bolsa  $bolsa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $bolsa = Bolsa::find($id);
        $params = $request->all();
        $bolsa->update($params);
        $bolsas = Bolsa::orderBy('id','asc')->gt();
        return view('bolsa.index', compact('bolsas'))->with('message', 'Editado com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bolsa  $bolsa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bolsa $bolsa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bolsa  $bolsa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bolsa = Bolsa::find($id);
        $bolsa->delete(); // Easy right?
        return redirect('/bolsas')->with('success', 'Bolsa removed.');  // -> resources/views/stocks/index.blade.php
    }

}