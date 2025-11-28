<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Eveet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Make Event</h2>

            @if ($errors->has('authentication'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ $errors->first('authentication') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('club.event.store', $club) }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="name" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <input type="description" name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                    <input type="address" name="address" id="address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="host_id" class="block text-gray-700 text-sm font-bold mb-2">Host</label>
                    <input type="host_id" name="host_id" id="host_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="coordinator_id" class="block text-gray-700 text-sm font-bold mb-2">Coordinator</label>
                    <input type="coordinator_id" name="coordinator_id" id="coordinator_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="city" class="block text-gray-700 text-sm font-bold mb-2">City</label>
                    <input type="city" name="city" id="city" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div><div class="mb-4">
                    <label for="state" class="block text-gray-700 text-sm font-bold mb-2">State</label>
                    <input type="state" name="state" id="state" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div><div class="mb-4">
                    <label for="country" class="block text-gray-700 text-sm font-bold mb-2">Country</label>
                    <input type="country" name="country" id="country" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
