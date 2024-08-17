<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.registro');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:30',
            'apellidos' => 'required|max:30',
            'tel' => 'required|min:9|max:9|unique:users',
            'email' => 'required|unique:users|max:60',
            'password' => 'required|max:15|min:5'
        ]);

        User::create([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'tel' => $request->tel,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rols_id' => 2,
            'estado' => null,
        ]);

        return redirect()->route('login');
    }
}
