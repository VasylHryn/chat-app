<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->latest()->get();
        return view('welcome', compact('messages'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        Message::create([
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        return redirect()->route('chat.index');
    }
}

