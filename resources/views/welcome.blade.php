<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>
    <body>
    <div>
        @auth
        <table>
            <tr>
                <td><h1>Name: </h1></td>
                <td><h1>{{ auth()->user()->first_name }}</h1></td>
            </tr>
        </table>
        @endauth
    </div>
    @foreach ($location->events as $event)
    <div>
        <table border="1px">
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
        <br />
        @endforeach
    </body>
</html>
