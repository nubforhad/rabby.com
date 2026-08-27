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
            <a href="#"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
                      text-gray-300 hover:bg-slate-800 hover:text-white transition">

                <span>📦</span>
                <span>Products</span>
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
                <div class="flex items-center gap-3">

                    <div
                        class="hidden sm:flex w-9 h-9 rounded-full
                               bg-indigo-600 text-white
                               items-center justify-center font-semibold"
                    >
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <form
                            method="POST"
                            action="{{ route('logout') }}"
                        >

                            @csrf

                     
                        <div class="hidden md:block">
                            <p class="text-sm font-semibold">
                                {{ auth()->user()->name ?? 'Admin' }}
                            </p>
                            <p class="text-xs text-gray-500">
                                Administrator
                            </p>
                        </div>
                     </form>

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
