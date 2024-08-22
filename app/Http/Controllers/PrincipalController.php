<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mensaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrincipalController extends Controller
{
    public function index(User $user){

        $mensajes = Mensaje::where('user_id', $user->id)->get();  //error aqui. ya que deberia mostrar 6 , y muestra 4
        $users = User::all()->count();

        return view('dashboard', [
            'mensajes' => $mensajes,
            'users' => $users,
            'user' => $user
        ]);
    }
}
