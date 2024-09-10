@extends('layouts.master')

@section('content')
<x-layout title="Criar Tarefa">
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; text-align: center;">
        <div>
            <h1>Criar tarefa</h1>
            <form action={{ route('tarefas.store') }} method="POST">
                @csrf

                <div>
                    <label for="titulo">Insira o título</label>
                    <br>
                    <input type="text" name="titulo" id="titulo">
                </div>

                <div>
                    <label for="descricao">Insira a descrição</label>
                    <br>
                    <input type="text" name="descricao" id="descricao">
                </div>

                <input type="hidden" name="projeto_id" value="{{ $projeto_id }}">

                <button class="btn btn-dark mt-2" type="submit">Criar nova tarefa</button>
            </form>
        </div>
    </div>
</x-layout>
@endsection
