
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>
    <body>
    <div>
        <table border="1px">
            <tr>
                <td>First Name</td>
                <td>{{ $user->first_name }}</td>
            </tr>

            <tr>
                <td>Last Name</td>
                <td>{{ $user->last_name }}</td>
            </tr>

            <tr>
                <td>Email</td>
                <td>{{ $user->email }}</td>
            </tr>

            <tr>
                <td>Phone Number</td>
                <td>{{ $user->phone }}</td>
            </tr>

            <tr>
                <td>Address</td>
                <td>{{ $user->address }}</td>
            </tr>

            <tr>
                <td>credit</td>
                <td>{{ $user->credit }}</td>
            </tr>

            <tr>
                <td>Location</td>
                <td>{{ $user->location->city . ',' .
                       $user->location->state . ',' . 
                       $user->location->country . ',' }}
                </td>
            </tr>
        </table>
    </body>
</html>
