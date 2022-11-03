<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Advertencia;
use Illuminate\Http\Request;
use Auth;


class AdvertenciaController extends Controller{
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
        $advertencias = Advertencia::join('funcionarios', 'id_funcionario', '=', 'funcionarios.id')
                                    ->select('advertencias.*', 'funcionarios.name as funcionario')
                                    ->orderBy('id','asc')->get();
        return view('advertencia.index', compact('advertencias'));
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
            return view('advertencia.cadastrar', compact('funcionarios'));
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
            Advertencia::create($request->all());
            return redirect()->route('home')->with('success','Advertencia has been created successfully.');
        }else{
            echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
            location.href ='/';
        </script>";  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertencia  $advertencia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advertencia = Advertencia::find($id);
        $funcionarios = Funcionario::orderBy('name')->get();
        $funcionario = Funcionario::where('id', $advertencia->id_funcionario)->first();
        return view('advertencia.edit', compact('advertencia', 'funcionarios', 'funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Advertencia  $advertencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $advertencia = Advertencia::find($id);
        $params = $request->all();
        $advertencia->update($params);
        $advertencias = Advertencia::orderBy('id','asc')->get();
        return view('advertencia.index', compact('advertencias'))->with('message', 'Editado com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertencia  $advertencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertencia $advertencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertencia  $advertencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertencia = Advertencia::find($id);
        $advertencia->delete(); // Easy right?
        return redirect('/advertencias')->with('success', 'Advertencia removed.');  // -> resources/views/stocks/index.blade.php
    }

}