<x-layout>
    <div class="mx-auto max-w-md rounded-lg border border-gray-200 bg-white p-8 shadow-sm">
        <h2 class="mb-6 text-center text-2xl font-bold">Login</h2>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="mb-2 block font-semibold">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required class="w-full rounded border border-gray-300 px-3 py-2" />
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="mb-2 block font-semibold">Password</label>
                <input id="password" name="password" type="password" required class="w-full rounded border border-gray-300 px-3 py-2" />
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full rounded bg-red-500 px-4 py-2 font-semibold text-white hover:bg-red-600">
                Login
            </button>
        </form>
    </div>
</x-layout>
