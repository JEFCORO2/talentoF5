<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'tel',
        'apellidos',
        'password',
        'estado',
        'imagen',
        'cv',
        'video',
        'rols_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function descripcionRol(User $user){
        if($user->rols_id == 1){
            $rol = 'Admin';
        }else if($user->rols_id == 2){
            $rol = 'Postulante';
        }else{
            $rol = 'Psicólogo';
        }
        return $rol;
    }
    //enviados , yo envio mensajes a otros usuarios , saldra aldo asi : id = 2 , yo
    public function recibidos(){
        return $this->belongsToMany(User::class, 'mensajes', 'user_id', 'mensaje_id');
    }
    
    //mensajes recibidos
    public function mensajes(){
        return $this->belongsToMany(User::class, 'mensajes', 'mensaje_id', 'user_id');
    }

}
