<?php

namespace App\Http\Controllers;

use App\Models\Dependente;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Auth;


class DependenteController extends Controller{
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
        $dependentes = Dependente::join('funcionarios', 'id_funcionario', '=', 'funcionarios.id')
                                ->select('dependentes.*', 'funcionarios.name as funcionario')
                                ->orderBy('id','asc')->get();
        return view('dependente.index', compact('dependentes'));
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
            return view('dependente.cadastrar', compact('funcionarios'));
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
            $dependente_id = Dependente::create($request->all())->id;
            $request->request->add(['dependente_id' => $dependente_id]);
            return redirect()->route('home')->with('success','Employee has been created successfully.');
        }else{
            echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
            location.href ='/';
        </script>";  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dependente = Dependente::find($id);
        $funcionario = Funcionario::where('id', $dependente->id_funcionario)->first();
        $funcionarios = Funcionario::orderBy('name')->get();
        return view('dependente.edit', compact('dependente', 'funcionario', 'funcionarios'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $dependente = Dependente::find($id);
        $params = $request->all();
        $dependente->update($params);
        $dependentes = Dependente::orderBy('id','asc')->get();
        return view('dependente.index', compact('dependentes'))->with('message', 'Editado com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dependente $dependente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dependente = Dependente::find($id);
        $dependente->delete(); // Easy right?
        return redirect('/dependentes')->with('success', 'Dependente removed.');  // -> resources/views/stocks/index.blade.php
    }

}