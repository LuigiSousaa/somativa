@extends('layouts.master')

@section('content')
<x-layout title="Visualizar projetos">
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; text-align: center;">
        <h1>Criar projeto</h1>

        <form action="{{ route('projetos.store') }}" method="POST" style="max-width: 500px; width: 100%;">
            @csrf

            <div style="margin-bottom: 15px;">
                <label for="titulo">Insira o título</label>
                <input type="text" name="titulo" id="titulo" style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="descricao">Insira a descrição</label>
                <input type="text" name="descricao" id="descricao" style="width: 100%; padding: 8px;">
            </div>

            <button class="btn btn-success btn_uniform" type="submit">Criar novo projeto</button>
        </form>
    </div>
</x-layout>
@endsection
