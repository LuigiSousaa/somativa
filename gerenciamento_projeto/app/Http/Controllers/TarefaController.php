<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarefas = Tarefa::all();
        return view("index", compact("tarefas"));
    }

    public function toggle($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->isDone = !$tarefa->isDone;
        $tarefa->save();
        $tarefa->projeto->updateStatus();

        return redirect()->route('projetos.index', $tarefa->id);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($projeto_id)
    {
        return view("store_tarefa", compact('projeto_id'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tarefa = Tarefa::create($request->all());
        $tarefa->projeto->updateStatus();
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
    public function edit(Tarefa $tarefa)
    {
        return view("edit_tarefa", compact("tarefa"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $tarefa->fill($request->all());
        $tarefa->projeto->updateStatus();
        $tarefa->save();
        return to_route("projetos.index");
    }

    /**
     * Remove the specified resource from storage.
     */
/**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    // Encontre a tarefa e o projeto associado
    $tarefa = Tarefa::findOrFail($id);
    $projeto = $tarefa->projeto;

    // Exclua a tarefa
    $tarefa->delete();

    // Atualize o status do projeto associado
    $projeto->updateStatus();

    return to_route("projetos.index");
}

}
