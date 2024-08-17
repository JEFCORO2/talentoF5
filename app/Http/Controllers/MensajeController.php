<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    public function store(User $user, Request $request){
        //dd($user->name);
        $request->validate([
            'mensaje' => 'required|max:150'
        ]);

        $user->enviados()->attach(auth()->user()->id, ['mensaje' => $request->input('mensaje')]);

        return back();
    }
}
