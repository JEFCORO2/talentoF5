<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{   
    public function index(){
        //$users = User::all();
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('admin.users' , [
            'users' => $users
        ]);
    }
    
    public function actualizar(Request $request,$name ,$id){ //porque pasa esto si solo deberia ir un parametro el id, y cuando pongo el id solo, no carga y toma e lid como si fuera un nombre

        $user = User::where('id', $id)->firstOrFail();
        //dd($user->tel);
        $request->validate([
            'tel' => 'required|min:9',
            'rols_id' => 'required'
        ]);

        $user->tel = $request->tel;
        $user->rols_id = $request->rols_id;

        $user->save();

        return redirect()->route('admin.usuarios', auth()->user()->name);
    }

    public function destroy($name , $id){
        $user = User::find($id);
        if($user->imagen){
            $rutaImagen = public_path('img/perfiles') . '/' . $user->imagen;
            if(File::exists($rutaImagen)){
                unlink($rutaImagen);
            }
        }

        $user->delete();
        //eliminar la imagen
        return redirect()->route('admin.usuarios', auth()->user()->name);
    }
}
