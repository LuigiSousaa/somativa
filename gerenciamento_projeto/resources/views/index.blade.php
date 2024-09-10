@extends('layouts.master')

@section('content')
<x-layout title="Visualizar projetos">
    <div
        style="display: flex; justify-content: center; align-items: center; flex-direction: column; text-align: center; min-height: 100vh;">
        @if ($projetos->isEmpty())
            <h1>Nenhum projeto criado</h1>
        @else
            <h1>Painel de projetos</h1>

            @foreach ($projetos as $projeto)
                <div style="margin-bottom: 20px; border: 1px solid #ccc; padding: 20px; width: 100%; max-width: 600px;">
                    <h3>
                        <p>{{ $projeto->titulo }}</p>
                    </h3>

                    <p>{{ $projeto->descricao }}</p>
                    @if ($projeto->tarefas->isEmpty())
                        <p>Este projeto não possui tarefas.</p>
                    @else
                        <ul style="list-style-type: none; padding: 0;">
                            @foreach ($projeto->tarefas as $tarefa)
                                <div
                                    style="border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; display: flex; align-items: center; justify-content: space-between;">
                                    <div style="display: flex; align-items: center; flex-grow: 1; text-align: left;">
                                        {{ $tarefa->titulo }}
                                    </div>

                                        <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-warning btn-sm"
                                           style="margin-left: 10px;">Editar</a>
                                        <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST"
                                              style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                    style="margin-left: 10px;">Deletar</button>
                                        </form>



                                    <span style="margin-left: 10px;">
                                        @if ($tarefa->isDone)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                                viewBox="0 0 28 28" fill="none" stroke="green" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M9 11l3 3L22 4" />
                                                <path d="M21 21H3V5h18z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                                viewBox="0 0 28 28" fill="none" stroke="red" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10" />
                                                <path d="M12 16v-4" />
                                                <path d="M12 8h0" />
                                            </svg>
                                        @endif
                                    </span>
                                </div>
                            @endforeach
                        </ul>
                    @endif
                    <p>
                        @if ($projeto->isDone)
                            <span style="color: green">Concluído</span>
                        @else
                            <span style="color: red">Em andamento</span>
                        @endif
                    </p>
                    @if(!\Illuminate\Support\Facades\Auth::user()->isAdmin)
                        @if(\Illuminate\Support\Facades\Auth::user()->projeto_id == $projeto->id)
                            Cadastrado no projeto!
                        @else
                        <a href="{{route('cadastrarProjeto', ['idUser' => \Illuminate\Support\Facades\Auth::id(), 'idProjeto' => $projeto->id])}}">Cadastrar-se No projeto</a>
                        @endif
                    @endif

                    <a href="{{ route('tarefas.create', ['projeto_id' => $projeto->id]) }}"
                        class="btn btn-success btn-uniform">Criar
                        tarefa</a>

                    @if(\Illuminate\Support\Facades\Auth::user()->isAdmin)
                    <a href="{{ route('projetos.edit', $projeto->id) }}" class="btn btn-primary btn-uniform">Editar
                        projeto</a>

                    <form action="{{ route('projetos.destroy', $projeto->id) }}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-uniform">
                            Deletar projeto
                        </button>
                    </form>
                    @endif
                </div>
            @endforeach
        @endif

        @if(\Illuminate\Support\Facades\Auth::user()->isAdmin)
        <a href={{ route('projetos.create') }} class="btn btn-dark btn-uniform mt-4">Criar projetos</a>
            @endif
    </div>
</x-layout>
@endsection
