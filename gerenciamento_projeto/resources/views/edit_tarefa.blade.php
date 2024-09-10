@extends('layouts.master')
@section('content')
<x-layout title="Editar tarefa">
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; text-align: center;">
        <h1>Editar tarefa</h1>

        <form action="{{ route('tarefas.update', $tarefa) }}" method="POST" style="max-width: 500px; width: 100%;">
            @csrf
            @method('PATCH')

            <div style="margin-bottom: 15px;">
                <label for="titulo">Insira um novo título</label>
                <input type="text" name="titulo" id="titulo" value="{{ $tarefa->titulo }}" style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="descricao">Insira uma nova descrição</label>
                <input type="text" name="descricao" id="descricao" value="{{ $tarefa->descricao }}" style="width: 100%; padding: 8px;">
            </div>

            <button class="btn btn-dark mt-2" type="submit">Atualizar tarefa</button>
        </form>

        <form action="{{ route('tarefas.toggle', $tarefa->id) }}" method="POST" class="mt-3" style="max-width: 500px; width: 100%;">
            @csrf
            @method('PATCH')

            @if($tarefa->isDone)
                <button class="btn btn-warning btn-uniform" type="submit">Continuar trabalhando</button>
            @else
                <button class="btn btn-success btn-uniform" type="submit">Marcar como concluída</button>
            @endif
        </form>
    </div>
</x-layout>
@endsection
