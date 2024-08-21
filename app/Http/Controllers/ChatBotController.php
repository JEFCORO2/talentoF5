<?php

namespace App\Http\Controllers;

use OpenAI;
use App\Models\User;
use Illuminate\Http\Request;

class ChatBotController extends Controller
{
    public function index(User $user){
        return view('prueba.welcome',[
            'user' => $user
        ]);
    }

    public function sendChat(Request $request){
        $client = OpenAI::client(env("OPENAI_API_KEY"));
        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $request->mensaje],
            ],
        ]);
        dd($response);   
    }
}
