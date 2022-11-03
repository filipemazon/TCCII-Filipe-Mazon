<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;
use Auth;


class SetorController extends Controller{
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
        $setors = Setor::orderBy('id','asc')->get();
        return view('setor.index', compact('setors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()){
            return view('setor.cadastrar');
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
            Setor::create($request->all())->id;
            return redirect('/setores')->with('success','Setor has been created successfully.');
            //return redirect()->route('home')->with('success','Setor has been created successfully.');
        }else{
            echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
            location.href ='/';
        </script>";  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setor = Setor::find($id);
        return view('setor.edit', compact('setor'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $setor = Setor::find($id);
        $params = $request->all();
        $setor->update($params);
        $setors = Setor::orderBy('id','asc')->get();
        return view('setor.index', compact('setors'))->with('message', 'Editado com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setor $setor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setor = Setor::find($id);
        $setor->delete(); // Easy right?
 
        return redirect('/setores')->with('success', 'Setor removed.');  // -> resources/views/stocks/index.blade.php
    }

}