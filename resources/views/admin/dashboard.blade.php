<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>
</head>
<body>
<div>
    <script>
        async function approve(clubId) {
            try {
                const response = await fetch(`/admin/approve/${clubId}`, {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Accept": "application/json"
                    }
                });

                const data = await response.json();
                document.getElementById(clubId).remove();
                alert(data['message']);
                console.log(data);
            } catch (error) {
                console.error('Error:', error);
            }
        }

        async function reject(clubId) {
            try {
                const response = await fetch(`/admin/reject/${clubId}`, {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Accept": "application/json"
                    }
                });

                const data = await response.json();
                document.getElementById(clubId).remove();
                alert(data['message']);
                console.log(data);
            } catch (error) {
                console.error('Error:', error);
            }
        }
    </script>

    <div>
        <table>
            <tr>
                <td><h1>Name: </h1></td>
                <td><h1>{{ auth()->user()->first_name }}</h1></td>
            </tr>
        </table>
    </div>

    @foreach ($clubs as $club)
        <div id="{{ $club->id }}">
            <h3>{{ $club->name }} # {{ $club->id }}</h3>
            <h2>{{ $club->owner->first_name }}</h2>
            <button onclick="approve({{ $club->id }})">Approve</button>
            <button onclick="reject({{ $club->id }})">Reject</button>
        </div>
    @endforeach
</div>
</body>