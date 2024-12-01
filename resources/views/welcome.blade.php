<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('chat.index') }}">Chat App</a>
        <div class="d-flex">
            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            @endguest

            @auth
                <span class="navbar-text me-3">
                        Welcome, {{ Auth::user()->name }}
                    </span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h1>Chat Messages</h1>
    <div class="messages">
        @if ($messages->isNotEmpty())
            @foreach ($messages as $message)
                <div class="alert alert-secondary">
                    <strong>{{ $message->user->name }}:</strong> {{ $message->message }}
                </div>
            @endforeach
        @else
            <p>No messages yet. Be the first to write something!</p>
        @endif
    </div>

    @auth
        <form action="{{ route('chat.send') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="message" class="form-label">Your Message</label>
                <textarea id="message" name="message" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    @else
        <p class="text-center mt-4">Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to send messages.</p>
    @endauth
</div>
</body>
</html>
