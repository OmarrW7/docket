<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docket</title>

    @vite('resources/css/app.css')
</head>
<body>
  @if(session('success'))
    <div
        id="success-toast"
        class="fixed top-5 right-5 z-50 flex items-center gap-3 rounded-xl border border-green-200 bg-white px-5 py-4 shadow-xl transition-all duration-500"
        role="alert"
    >
        <!-- Success Icon -->
        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100 text-green-600">
            ✓
        </div>

        <!-- Message -->
        <div>
            <p class="font-semibold text-gray-800">Success</p>
            <p class="text-sm text-gray-600">
                {{ session('success') }}
            </p>
        </div>
    </div>

    <script>
        const toast = document.getElementById('success-toast');

        // Start hidden
        toast.classList.add('opacity-0', 'translate-x-10');

        // Fade in
        setTimeout(() => {
            toast.classList.remove('opacity-0', 'translate-x-10');
        }, 100);

        // Fade out after 3 seconds
        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-x-10');

            setTimeout(() => {
                toast.remove();
            }, 500);
        }, 3000);
    </script>
@endif

    <header>
      <nav>
        <h1>Docket</h1>
        <a href="{{ route('tasks.index') }}">All Tasks</a>
        <a href="{{ route('tasks.create') }}">Create New Task</a>
        @auth
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="rounded bg-gray-200 px-3 py-2 hover:bg-red-500 hover:text-white">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endauth
      </nav>
    </header>

    <main class="container">
     {{ $slot }}
    </main>
</body>
</html>