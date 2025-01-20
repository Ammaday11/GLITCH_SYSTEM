<!DOCTYPE html>
<html>
<head>
    <title>Unresolved Glitches</title>
</head>
<body>
    <h1>Unresolved Glitches Reminder</h1>
    <p>The following glitches have not been resolved yet:</p>
    <ul>
        @foreach ($glitches as $glitch)
            <li>
                <strong>{{ $glitch->title }}</strong><br>
                Room No: {{ $glitch->room_no }}<br>
                Created At: {{ $glitch->created_at->format('Y-m-d H:i:s') }}<br>
                Status: {{ $glitch->status }}<br><br>
            </li>
        @endforeach
    </ul>
</body>
</html>
