<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Ferias;
use Illuminate\Http\Request;
use Auth;


class FeriasController extends Controller{
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
        $ferias = Ferias::join('funcionarios', 'id_funcionario', '=', 'funcionarios.id')
                                ->select('ferias.*', 'funcionarios.name as funcionario')
                                ->orderBy('id','asc')->get();
        return view('ferias.index', compact('ferias'));
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
            return view('ferias.cadastrar', compact('funcionarios'));
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
	    Ferias::create($request->all())->id;
            return redirect()->route('home')->with('success','Ferias has been created successfully.');
        }else{
            echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
            location.href ='/';
        </script>";  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ferias  $ferias
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feria = Ferias::find($id);
        $funcionarios = Funcionario::orderBy('name')->get();
        $funcionario = Funcionario::where('id', $feria->id_funcionario)->first();
        return view('ferias.edit', compact('feria', 'funcionarios', 'funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Ferias  $ferias
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $ferias = Ferias::find($id);
        $params = $request->all();
        $ferias->update($params);
        $ferias = Ferias::orderBy('id','asc')->get();
        return view('ferias.index', compact('ferias'))->with('message', 'Editado com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ferias  $ferias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ferias $ferias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ferias  $ferias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feria = Ferias::find($id);
        $feria->delete(); // Easy right?
        return redirect('/ferias')->with('success', 'Ferias removed.');  // -> resources/views/stocks/index.blade.php
    }
    

}