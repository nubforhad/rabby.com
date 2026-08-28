<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Dashboard')</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Alpine JS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('styles')
</head>

<body class="bg-gray-100 text-gray-800">

<div
    x-data="{ sidebarOpen: false }"
    class="min-h-screen"
>

    {{-- =========================
        MOBILE OVERLAY
    ========================== --}}
    <div
        x-show="sidebarOpen"
        x-transition.opacity
        @click="sidebarOpen = false"
        class="fixed inset-0 z-40 bg-black/50 lg:hidden"
        style="display: none;"
    ></div>


    {{-- =========================
        SIDEBAR
    ========================== --}}
    <aside
        class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-white
               transform transition-transform duration-300
               lg:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >

        {{-- Logo --}}
        <div class="flex h-16 items-center justify-between px-5 border-b border-slate-700">

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3">

                <div class="w-9 h-9 rounded-lg bg-indigo-600 flex items-center justify-center font-bold">
                    A
                </div>

                <span class="text-lg font-bold">
                    Admin Panel
                </span>
            </a>

            {{-- Mobile Close --}}
            <button
                @click="sidebarOpen = false"
                class="lg:hidden text-gray-300 hover:text-white"
            >
                ✕
            </button>

        </div>


        {{-- Navigation --}}
        <nav class="p-4 space-y-1 overflow-y-auto h-[calc(100vh-4rem)]">

            {{-- Dashboard --}}
            <a href="{{ route('home') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg">

                <span>📊</span>
                <span>Website</span>
            </a>

            {{-- Dashboard --}}
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
                      bg-indigo-600 hover:bg-indigo-500 transition">

                <span>📊</span>
                <span>Dashboard</span>
            </a>


            {{-- Users --}}
            <a href="#"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
                      text-gray-300 hover:bg-slate-800 hover:text-white transition">

                <span>👥</span>
                <span>Users</span>
            </a>


            {{-- Products --}}
            <a href="{{  route('net-apps.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-slate-800 hover:text-white transition">
                <span>📦</span>
                <span>Net Apps</span>
            </a>
            
            {{-- Products --}}
            <a href="{{  route('live-tvs.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-slate-800 hover:text-white transition">
                <span>📦</span>
                <span>Live Tvs</span>
            </a>


            {{-- Orders --}}
            <a href="#"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
                      text-gray-300 hover:bg-slate-800 hover:text-white transition">

                <span>🛒</span>
                <span>Orders</span>
            </a>


            {{-- Reports --}}
            <a href="#"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
                      text-gray-300 hover:bg-slate-800 hover:text-white transition">

                <span>📈</span>
                <span>Reports</span>
            </a>


            {{-- Settings --}}
            <a href="#"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
                      text-gray-300 hover:bg-slate-800 hover:text-white transition">

                <span>⚙️</span>
                <span>Settings</span>
            </a>


            {{-- Divider --}}
            <div class="border-t border-slate-700 my-4"></div>


            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="w-full flex items-center gap-3 px-4 py-3 rounded-lg
                           text-red-400 hover:bg-red-500/10 hover:text-red-300 transition"
                >
                    <span>🚪</span>
                    <span>Logout</span>
                </button>
            </form>

        </nav>

    </aside>


    {{-- =========================
        MAIN AREA
    ========================== --}}
    <div class="lg:ml-64">


        {{-- =========================
            HEADER
        ========================== --}}
        <header class="h-16 bg-white border-b border-gray-200
                       flex items-center justify-between px-4 sm:px-6
                       sticky top-0 z-30">

            {{-- Left --}}
            <div class="flex items-center gap-4">

                {{-- Mobile Menu --}}
                <button
                    @click="sidebarOpen = true"
                    class="lg:hidden p-2 rounded-lg hover:bg-gray-100"
                >
                    ☰
                </button>

                <div>
                    <h1 class="text-lg font-semibold text-gray-800">
                        @yield('page-title', 'Dashboard')
                    </h1>

                    <p class="hidden sm:block text-xs text-gray-500">
                        Welcome to Admin Panel
                    </p>
                </div>

            </div>


            {{-- Right --}}
            <div class="flex items-center gap-3">

                {{-- Notification --}}
                <button
                    class="relative p-2 rounded-lg hover:bg-gray-100"
                >
                    🔔

                    <span
                        class="absolute top-1 right-1 w-2 h-2
                               bg-red-500 rounded-full">
                    </span>
                </button>


                {{-- User --}}  
{{-- User Profile Dropdown --}}
<div
    x-data="{ open: false }"
    class="relative"
>

    {{-- Profile Button --}}
    <button
        type="button"
        @click="open = !open"
        class="flex items-center gap-3
               rounded-lg
               px-2 py-1.5
               hover:bg-gray-100
               transition"
    >

        {{-- Avatar --}}
        <div
            class="hidden sm:flex
                   w-9 h-9
                   rounded-full
                   bg-indigo-600
                   text-white
                   items-center
                   justify-center
                   font-semibold"
        >
            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
        </div>


        {{-- User Info --}}
        <div class="hidden md:block text-left">

            <p class="text-sm font-semibold text-gray-800">
                {{ auth()->user()->name ?? 'Admin' }}
            </p>

            <p class="text-xs text-gray-500">
                Administrator
            </p>

        </div>


        {{-- Arrow --}}
        <svg
            class="hidden md:block w-4 h-4 text-gray-500"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7"
            />
        </svg>

    </button>


    {{-- Dropdown --}}
    <div
        x-show="open"
        x-transition
        @click.outside="open = false"
        class="absolute
               right-0
               mt-2
               w-52
               bg-white
               rounded-xl
               shadow-lg
               border border-gray-200
               py-2
               z-50"
        style="display: none;"
    >

        {{-- User Header --}}
        <div class="px-4 py-3 border-b border-gray-100">

            <p class="text-sm font-semibold text-gray-800">
                {{ auth()->user()->name ?? 'Admin' }}
            </p>

            <p class="text-xs text-gray-500 mt-1">
                {{ auth()->user()->email ?? '' }}
            </p>

        </div>


        {{-- Profile --}}
        <a
            href="#"
            class="flex items-center gap-3
                   px-4 py-2.5
                   text-sm text-gray-700
                   hover:bg-gray-50
                   transition"
        >

            <svg
                class="w-5 h-5 text-gray-500"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5.121 17.804A9 9 0 0112 15a9 9 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                />
            </svg>

            <span>
                Profile
            </span>

        </a>


        {{-- Settings --}}
        <a
            href="#"
            class="flex items-center gap-3
                   px-4 py-2.5
                   text-sm text-gray-700
                   hover:bg-gray-50
                   transition"
        >

            <svg
                class="w-5 h-5 text-gray-500"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 15.5a3.5 3.5 0 100-7 3.5 3.5 0 000 7z"
                />

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19.4 15a1.7 1.7 0 00.34 1.88l.06.06-1.7 1.7-.06-.06a1.7 1.7 0 00-1.88-.34 1.7 1.7 0 00-1.03 1.56V20h-2.4v-.2a1.7 1.7 0 00-1.03-1.56 1.7 1.7 0 00-1.88.34l-.06.06-1.7-1.7.06-.06A1.7 1.7 0 008.4 15a1.7 1.7 0 00-1.56-1.03H6v-2.4h.84A1.7 1.7 0 008.4 10a1.7 1.7 0 00-.34-1.88L8 8.06l1.7-1.7.06.06a1.7 1.7 0 001.88.34A1.7 1.7 0 0012.67 5.2V5h2.4v.2a1.7 1.7 0 001.03 1.56 1.7 1.7 0 001.88-.34l.06-.06 1.7 1.7-.06.06A1.7 1.7 0 0019.4 10c.25.62.86 1.03 1.56 1.03h.84v2.4h-.84A1.7 1.7 0 0019.4 15z"
                />
            </svg>

            <span>
                Settings
            </span>

        </a>


        {{-- Divider --}}
        <div class="border-t border-gray-100 my-2"></div>


        {{-- Logout --}}
        <form
            method="POST"
            action="{{ route('logout') }}"
        >

            @csrf

            <button
                type="submit"
                class="w-full
                       flex items-center gap-3
                       px-4 py-2.5
                       text-sm text-red-600
                       hover:bg-red-50
                       transition"
            >

                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1"
                    />
                </svg>

                <span>
                    Logout
                </span>

            </button>

        </form>

    </div>

</div> 


            </div>

        </header>


        {{-- =========================
            PAGE CONTENT
        ========================== --}}
        <main class="p-4 sm:p-6">

            @if(session('success'))
                <div class="mb-5 rounded-lg bg-green-50 border border-green-200
                            px-4 py-3 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif


            @if(session('error'))
                <div class="mb-5 rounded-lg bg-red-50 border border-red-200
                            px-4 py-3 text-sm text-red-700">
                    {{ session('error') }}
                </div>
            @endif


            @yield('content')

        </main>

    </div>

</div>

@stack('scripts')

</body>
</html> 
