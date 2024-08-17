<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PerfilController extends Controller
{
    //dos rutas que hacen lo mismo
    public function index(User $user, $vista){
        return view('perfil.' . $vista, [
            'user' => $user
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'tel' => ['required', 'unique:users,tel,'.auth()->user()->id, 'min:9', 'max:9'],
            'email' => ['required', 'unique:users,email,'.auth()->user()->id, 'min:3', 'max:20'],
        ]);

        $usuario = User::find(auth()->user()->id);

        if($request->imagen){

            $manager = new ImageManager(new Driver());
 
            $imagen = $request->file('imagen');
     
            //generar un id unico para las imagenes
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
     
            //guardar la imagen al servidor
            $imagenServidor = $manager->read($imagen);
            //agregamos efecto a la imagen con intervention
            $imagenServidor->resize(1000, 1000);
            // la unidad de mide en PX 1= 1pixiel
     
            //agregamos la imagen a la  carpeta en public donde se guardaran las imagenes
            $imagenesRuta = public_path('img/perfiles') . '/' . $nombreImagen;
    
            //$imagenesPath = public_path('imagenes') . '/' . $nombreImagen;
            //Una vez procesada la imagen entonces guardamos la imagen en la carpeta que creamos
            $imagenServidor->save($imagenesRuta);
        }

        //Guardar cambios
        $usuario->email = $request->email;
        $usuario->tel = $request->tel;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';
        //$usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';
        $usuario->save();

        //Redireccion al post.index
        return redirect()->route('perfil.index', $usuario->name);
    }

    public function subir(Request $request, User $user){
        $request->validate([
            'file' => 'required'
        ]);

        if($request->file){
            $file = $request->file('file');
            $fileName = $user->id.".".$file->extension();
            $file->storeAs('',$user->id.".".$file->extension(),'public');
        }

        $user->cv = $fileName ?? auth()->user->cv ?? '';
        $user->save();

        return redirect()->route('perfil.index', $user->name);
    }

    public function eliminar(User $user){
        Storage::disk('public')->delete($user->cv);
        $user->cv = NULL;
        $user->save();
        return redirect()->route('perfil.index', $user->name);
    }
}
