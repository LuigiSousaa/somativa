@extends('layouts.master')

@section('content')
<x-layout title="Cadastro de Usuário">
    <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; text-align: center; min-height: 100vh;">
        <div style="width: 100%; max-width: 500px; padding: 20px;">
            <h1 class="mb-4">Página de Cadastro de Usuário</h1>
            <form action="{{ route('registerStore') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" placeholder="Nome" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                <div class="mb-3">
                    <input type="text" name="email" placeholder="E-mail" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Senha" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                <div class="mb-3">
                    <select name="isAdmin" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                        <option value="1">Administrador</option>
                        <option value="0">Membro</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 10px; border: none; border-radius: 4px; background-color: #007bff; color: #fff; font-size: 16px;">Registrar</button>
            </form>
        </div>
    </div>
</x-layout>
@endsection
