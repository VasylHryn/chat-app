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
            'message' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Message::create([
            'user_id' => auth()->id(),
            'message' => $request->message,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('chat.index');
    }

}

