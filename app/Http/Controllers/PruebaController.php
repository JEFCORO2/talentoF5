<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function index(User $user, $vista){
        return view('prueba.' . $vista, [
            'user' => $user
        ]);
    }

    public function subirVideo(Request $request, User $user){
        $request->validate([
            'video' => 'required|mimes:mp4,mov,avi,wmv|max:10240'
        ]);
        
        $video = $request->file('video');
        $nombreVideo = $user->name.".".$video->extension();
        $video->storeAs('videos',$user->name.".".$video->extension(),'public');

        $user->video = $nombreVideo ?? auth()->user()->video ?? '';
        $user->save();
        return redirect()->route('prueba.video', auth()->user()->name);
    }

    public function guardarNota(Request $request){
        $user = auth()->user();
        $user->nota = $request->input('score');
        $user->tiempo = $request->input('time_spent');
        //dd($user->tiempo);
        $user->save();

        return redirect()->route('principal.index', auth()->user()->name);
    }

    public function colores(){
        
    }
}
