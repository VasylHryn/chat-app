<?php

use App\Models\Message;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->latest()->get();
        return view('chat.index', compact('messages'));
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
