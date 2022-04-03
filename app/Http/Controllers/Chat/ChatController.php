<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Chat\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    protected $repository;

    public function __construct(Message $repository) {
        $this->repository = $repository;
    }
    public function index()
    {
        return view('chat.index');
    }

    public function messages()
    {
        $messages = $this->repository
                         ->with('user')
                         ->orderBy('id', 'DESC')
                         ->limit(30)
                         ->latest()
                         ->get();

        return response()->json($messages);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $message = $user->messages()->create([
            'body'  =>  $request->body
        ]);

        $message['user'] = $user;

        return response()->json($message, 201);
    }
}
