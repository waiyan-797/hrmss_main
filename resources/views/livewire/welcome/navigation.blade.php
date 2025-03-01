<nav class="flex flex-row gap-2 mt-3">
    @auth
        <a
            href="{{ url('/dashboard') }}"
            class="rounded-lg px-4 py-2 bg-green-700 font-arial text-white shadow-md transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-800"
        >
            Dashboard
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class="rounded-lg px-4 py-2 bg-green-700 font-arial text-white shadow-md transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-800"
        >
            Sign in
        </a>

        @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="rounded-lg px-4 py-2 bg-green-700 font-arial text-white shadow-md transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-800"
            >
                Sign Up
            </a>
        @endif
    @endauth
</nav>
