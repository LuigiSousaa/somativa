@extends('layouts.master')

@section('content')
    <x-layout title="Login">

        <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; text-align: center; min-height: 100vh;">
            <div class="text-black text-center mb-4 font-weight-bold" style="font-size: 24px;">Login</div>
            <form action="{{ route('loginStore') }}" method="POST" style="width: 100%; max-width: 400px;">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" id="email" name="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <input type="password" id="password" name="password" placeholder="Senha" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </x-layout>
@endsection
