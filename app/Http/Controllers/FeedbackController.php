<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Auth;


class FeedbackController extends Controller{
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
        $feedbacks = Feedback::join('funcionarios', 'feedbacks.id_funcionario', '=', 'funcionarios.id')
                            ->select('feedbacks.*', 'funcionarios.name as name')
                            ->orderBy('feedbacks.id','asc')->get();
        return view('feedback.index', compact('feedbacks'));
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
            return view('feedback.cadastrar', compact('funcionarios'));
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
            Feedback::create($request->all());
            return redirect()->route('home')->with('success','Feedback has been created successfully.');
        }else{
            echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
            location.href ='/';
        </script>";  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback = Feedback::find($id);
        $funcionarios = Funcionario::orderBy('name')->get();
        $funcionario = Funcionario::where('id', $feedback->id_funcionario)->first();
        return view('feedback.edit', compact('feedback', 'funcionarios', 'funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $feedback = Feedback::find($id);
        $params = $request->all();
        $feedback->update($params);
        $feedbacks = Feedback::orderBy('id','asc')->get();
        return view('feedback.index', compact('feedbacks'))->with('message', 'Editado com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = Feedback::find($id);
        $feedback->delete(); // Easy right?
        return redirect('/feedbacks')->with('success', 'Feedback removed.');  // -> resources/views/stocks/index.blade.php
    }

}