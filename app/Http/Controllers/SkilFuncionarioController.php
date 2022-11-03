<?php

namespace App\Http\Controllers;

use App\Models\SkilFuncionario;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Auth;


class SkilFuncionarioController extends Controller{
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
        $skfs = SkilFuncionario::orderBy('id','asc')->get();
        return view('skf.index', compact('skfs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()){
            return view('skf.cadastrar');
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
            $skf_id = SkilFuncionario::create($request->all())->id;
            $request->request->add(['skf_id' => $skf_id]);
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
     * @param  \App\Models\SkilFuncionario  $skf
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skf = SkilFuncionario::find($id);
        return view('skf.edit', compact('skf'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\SkilFuncionario  $skf
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $skf = SkilFuncionario::find($id);
        $params = $request->all();
        $skf->update($params);
        $skfs = SkilFuncionario::orderBy('id','asc')->get();
        return view('skf.index', compact('skfs'))->with('message', 'Editado com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SkilFuncionario  $skf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkilFuncionario $skf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SkilFuncionario  $skf
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skf = Dependente::find($id);
        $skf->delete(); // Easy right?
        return redirect('/skfs')->with('success', 'Skil do Funcionário removed.');  // -> resources/views/stocks/index.blade.php
    }

}