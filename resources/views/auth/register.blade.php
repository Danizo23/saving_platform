<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sajili</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('/image/meeting1.jpg');">

    <div class="bg-white bg-opacity-90 p-8 rounded-lg shadow-xl w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" />
                @error('name')
                    <p class="text-red-600 text-sm mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" />
                @error('email')
                    <p class="text-red-600 text-sm mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" />
                @error('password')
                    <p class="text-red-600 text-sm mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" />
                @error('password_confirmation')
                    <p class="text-red-600 text-sm mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full py-2 bg-gradient-to-r from-indigo-500 to-pink-500 text-white font-semibold rounded hover:from-indigo-600 hover:to-pink-600">
                    Register
                </button>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:underline">Already registered?</a>
            </div>
        </form>
    </div>

</body>
</html>
