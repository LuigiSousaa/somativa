<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projetos = Projeto::with('tarefas')->get();
        return view('index', compact('projetos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if(Gate::denies('manage-admin')){
            abort(403, 'Não autorizado');
        }
        return view("store");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Gate::denies('manage-admin')){
            abort(403, 'Não autorizado');
        }
        Projeto::create($request->all());
        return to_route("projetos.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projeto $projeto)
    {
        if(Gate::denies('manage-admin')){
            abort(403, 'Não autorizado');
        }
        return view("edit", compact("projeto"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projeto $projeto)
    {
        if(Gate::denies('manage-admin')){
            abort(403, 'Não autorizado');
        }
        $projeto->fill($request->all());
        $projeto->updateStatus();
        $projeto->save();
        return to_route("projetos.index");
    }

    public function cadastrarProjeto(Request $request)
    {
        try{
            $idProjeto = $request->idProjeto;
            $Iduser = $request->idUser;
            $user = \App\Models\User::find($Iduser);
            $user['projeto_id'] = $idProjeto;
            $user->save();
            return back();
        }catch (\Exception $error){
            return $error->getMessage();
        }

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Gate::denies('manage-admin')){
            abort(403, 'Não autorizado');
        }
        Projeto::destroy($id);
        return to_route("projetos.index");
    }
}
