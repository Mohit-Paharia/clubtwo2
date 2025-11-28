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
    <div>
        <table>
            <tr>
                <td>Name</td>
                <td>{{ $event->name }}</td>
            </tr>

            <tr>
                <td>Description</td>
                <td>{{ $event->description }}</td>
            </tr>

            <tr>
                <td>Address</td>
                <td>{{ $event->address }}</td>
            </tr>

            <tr>
                <td>Club</td>
                <td>{{ $event->club->name }}</td>
            </tr>

            <tr>
                <td>Host</td>
                <td>{{ $event->host->first_name . ' ' . $event->host->last_name }}</td>
            </tr>

            <tr>
                <td>Coordinator</td>
                <td>{{ $event->coordinator->first_name . ' ' . $event->host->last_name }}</td>
            </tr>

            <tr>
                <td>Location</td>
                <td>{{ $event->location->city . ',' .
                       $event->location->state . ',' . 
                       $event->location->country . ',' }}
                </td>
            </tr>
        </table>
    </div>
</div>
</body>