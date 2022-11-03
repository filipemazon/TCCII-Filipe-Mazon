<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Auth;


class SkillController extends Controller{
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
        $skills = Skill::orderBy('id','asc')->get();
        return view('skil.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()){
            return view('skil.cadastrar');
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
            $skil_id = Skill::create($request->all())->id;
            $request->request->add(['skil_id' => $skil_id]);
            return redirect()->route('home')->with('success','Skil has been created successfully.');
        }else{
            echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
            location.href ='/';
        </script>";  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill $skills
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skill = Skill::find($id);
        return view('skil.edit', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Skill $skills
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $skill = Skill::find($id);
        $params = $request->all();
        $skill->update($params);
        $skills = Skill::orderBy('id','asc')->get();
        return view('skil.index', compact('skills'))->with('message', 'Editado com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill $skills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill$skills)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skil $skills
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->delete(); // Easy right?
        return redirect('/skills')->with('success', 'Skill removed.');  // -> resources/views/stocks/index.blade.php
    }

}