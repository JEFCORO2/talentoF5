<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mensaje_id',
        'mensaje'
    ];


    public function emisor(){
        return $this->belongsTo(User::class, 'mensaje_id');
    }

    public function receptor(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
