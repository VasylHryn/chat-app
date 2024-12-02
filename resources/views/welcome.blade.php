<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
<div class="w-full max-w-5xl bg-white shadow-lg rounded-lg p-6 border border-gray-200">
    <!-- Header -->
    <header class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-blue-700">Chat Application</h1>
        @auth
            <div class="flex items-center space-x-4">
                <span class="text-lg font-medium text-gray-800"><strong>Welcome back, {{ Auth::user()->name }}</strong></span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Logout</button>
                </form>
            </div>
        @else
            <div>
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Login</a>
                <a href="{{ route('register') }}" class="ml-2 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Register</a>
            </div>
        @endauth
    </header>

    <!-- Chat Messages -->
    <div class="mb-6 max-h-96 overflow-y-auto border border-gray-300 rounded-md p-4 bg-gray-100">
        @if ($messages->isNotEmpty())
            @foreach ($messages as $message)
                <div class="mb-4">
                    <p class="text-lg font-semibold text-gray-800">
                        {{ $message->user->name }}:
                    </p>
                    <p class="text-sm text-gray-600">{{ $message->message }}</p>
                    @if ($message->image_path)
                        <img src="{{ asset('storage/' . $message->image_path) }}" alt="Image" class="mt-2 w-full max-w-md rounded-md shadow-md">
                    @endif
                </div>
            @endforeach
        @else
            <p class="text-gray-500 text-center">No messages yet. Be the first to write something!</p>
        @endif
    </div>

    <!-- Message Form -->
    @auth
        <form action="{{ route('chat.send') }}" method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            <textarea name="message" class="mb-4 border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-400" rows="3" placeholder="Type your message..."></textarea>
            <input type="file" name="image" class="mb-4 border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-400">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Send</button>
        </form>
    @else
        <p class="text-gray-500 text-center">Please <a href="{{ route('login') }}" class="text-blue-600 underline">login</a> to participate in the chat.</p>
    @endauth

    <!-- Footer -->
    <footer class="mt-8 text-center text-gray-500">
        <p>Developed by <strong>Vasyl Hryn</strong></p>
        <div class="flex justify-center space-x-4 mt-2">
            <a href="https://github.com/vasylhryn" class="text-blue-600 hover:underline">GitHub</a>
            <a href="https://t.me/ajhvxg" class="text-blue-600 hover:underline">Contact Me</a>
        </div>
    </footer>
</div>
</body>
</html>
