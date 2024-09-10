@extends('layouts.master')

@section('content')
<x-layout title="Editar projeto">
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; text-align: center;">
        <h1>Editar projeto</h1>

        <form action="{{ route('projetos.update', $projeto) }}" method="POST" style="max-width: 500px; width: 100%;">
            @csrf
            @method('PATCH')

            <div style="margin-bottom: 15px;">
                <label for="titulo">Insira um novo título</label>
                <input type="text" name="titulo" id="titulo" value="{{ $projeto->titulo }}" style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="descricao">Insira uma nova descrição</label>
                <input type="text" name="descricao" id="descricao" value="{{ $projeto->descricao }}" style="width: 100%; padding: 8px;">
            </div>

            <button class="btn btn-success mt-2" type="submit">Atualizar projeto</button>
        </form>
    </div>
</x-layout>
@endsection
