<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mensaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrincipalController extends Controller
{
    public function index(User $user){
        //$idMensajes = auth()->user()->recibidos->pluck('id')->toArray(); // todo correcto aqui
        //dd($idMensajes);

        //$mensajes = DB::table('mensajes')->where('user_id', $user->id)->get();
        //$mensajes = auth()->user()->recibidos;
        $mensajes = Mensaje::where('user_id', $user->id)->get();  //error aqui. ya que deberia mostrar 6 , y muestra 4

        //dd($mensajes);
        return view('dashboard', [
            'mensajes' => $mensajes,
            'user' => $user
        ]);
    }
}
