<!DOCTYPE html>
<html>
<head>
    <title>URL Minimizer</title>
</head>
<body>

<div>
    <form method="post" action="{{ url('/') }}">
        @csrf
        <label for="url">Enter URL:</label>
        <input type="text" name="url" id="url" required>
        <button type="submit">Minimize</button>
    </form>

    @if(session('code'))
        <p>Your minimized URL is: <a href="{{ url('/') . '/' . session('code') }}" target="_blank">{{ url('/') . '/' . session('code') }}</a></p>
    @endif

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

</body>
</html>
