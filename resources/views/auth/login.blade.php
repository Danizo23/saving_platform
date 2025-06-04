<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Ingia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- kama unatumia Vite -->
</head>
<body class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('/image/meeting1.jpg');">

    <div class="bg-white bg-opacity-90 p-8 rounded-lg shadow-xl w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

        @if(session('status'))
            <div class="mb-4 text-green-600 font-medium">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" required autofocus
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

                <div class="text-right mt-2">
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
                        Forget Password?
                    </a>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mt-4">
                <input id="remember_me" type="checkbox" name="remember"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                <label for="remember_me" class="ml-2 block text-sm text-gray-900">Remember_me</label>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full py-2 bg-gradient-to-r from-indigo-500 to-pink-500 text-white font-semibold rounded hover:from-indigo-600 hover:to-pink-600">
                    Submit
                </button>
            </div>
        </form>
    </div>

</body>
</html>
