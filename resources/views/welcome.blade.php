<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Chat</h1>
    <div class="messages">
        @foreach ($messages as $message)
            <div class="message">
                <strong>{{ $message->user->name }}:</strong> {{ $message->message }}
            </div>
        @endforeach
    </div>

    <form action="{{ route('chat.send') }}" method="POST">
        @csrf
        <textarea name="message" required></textarea>
        <button type="submit">Send</button>
    </form>
</div>


</body>
</html>
