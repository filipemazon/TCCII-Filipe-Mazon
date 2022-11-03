<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Endereco;
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
        $funcionarios = Funcionario::orderBy('id','asc')->get();
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
            return view('funcionario.cadastrar');
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
            $endereco = new Endereco();
            $funcionario_id = Funcionario::create($request->all())->id;
            $request->request->add(['funcionario_id' => $funcionario_id]);
            Endereco::create($request->all());
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
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = Funcionario::find($id);
        return view('funcionario.edit', compact('funcionario'));
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
    public function destroy(Funcionario $funcionario)
    {
        //
    }

}