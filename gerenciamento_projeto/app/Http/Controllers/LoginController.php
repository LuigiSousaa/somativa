<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
           'email' => 'required',
           'password' => 'required'
        ]);

        $attempted = Auth::attempt($validated);

        if($attempted){
            return redirect()->route('projetos.index');
        }
        return back()->withInput();

    }

    public function logout()
    {
        Auth::logout();
        session()->regenerate();
        session()->regenerateToken();
        return redirect()->route('login');
    }

    public function viewRegister()
    {
        if(Gate::denies('manage-admin')){
            abort(403, 'Não autorizado');
        }
        return view('register');
    }

    public function register(Request $request)
    {
        if(Gate::denies('manage-admin')){
            abort(403, 'Não autorizado');
        }
        $validated = $request->validate([
           'name' => 'string|required',
           'email' => 'email|required',
           'password' => 'string|required',
            'isAdmin' => 'boolean'
        ]);
        $created = User::create($validated);
        if($created){
            return redirect()->route('projetos.index');
        }
        return back()->withInput();
    }
}
