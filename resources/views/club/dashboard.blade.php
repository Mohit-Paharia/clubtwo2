<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>
</head>
<body>
<div>
    <div>
        <table>
            <tr>
                <td><h1>Name: </h1></td>
                <td><h1>{{ auth()->user()->first_name }}</h1></td>
            </tr>
        </table>
    </div>

    @foreach ($club->events as $event)
        <div id="{{ $event->id }}">
            <h3>{{ $event->name }} # {{ $club->id }}</h3>
            <h2>{{ $event->description }}</h2>
        </div>
    @endforeach
</div>
</body>