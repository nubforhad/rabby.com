<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'Laravel') }}
        @hasSection('title')
            - @yield('title')
        @endif
    </title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap"
        rel="stylesheet"
    />

    {{-- Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>


<body class="font-sans antialiased bg-gray-100">

<div
    x-data="{ sidebarOpen: false }"
    class="min-h-screen"
>

    {{-- =====================================================
        MOBILE OVERLAY
    ====================================================== --}}
    <div
        x-show="sidebarOpen"
        x-transition.opacity
        @click="sidebarOpen = false"
        class="fixed inset-0 z-40 bg-black/50 lg:hidden"
        style="display: none;"
    ></div>


    {{-- =====================================================
        SIDEBAR
    ====================================================== --}}
    <aside
        class="fixed inset-y-0 left-0 z-50 w-64
               bg-slate-900 text-white
               transform transition-transform duration-300
               lg:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >

        {{-- Sidebar Header --}}
        <div
            class="h-16 flex items-center justify-between
                   px-5 border-b border-slate-700"
        >

            <a
                href="{{ route('dashboard') }}"
                class="flex items-center gap-3"
            >

                {{-- Logo --}}
                <div
                    class="w-9 h-9 rounded-lg
                           bg-indigo-600
                           flex items-center justify-center
                           font-bold text-white"
                >
                    A
                </div>

                <span class="text-lg font-bold">
                    Admin Panel
                </span>

            </a>


            {{-- Mobile Close --}}
            <button
                @click="sidebarOpen = false"
                type="button"
                class="lg:hidden text-gray-300
                       hover:text-white text-xl"
            >
                &times;
            </button>

        </div>


        {{-- =================================================
            SIDEBAR MENU
        ================================================== --}}
        <nav
            class="p-4 space-y-1
                   h-[calc(100vh-4rem)]
                   overflow-y-auto"
        >

            {{-- Dashboard --}}
            <a
                href="{{ route('dashboard') }}"
                class="flex items-center gap-3
                       px-4 py-3 rounded-lg
                       transition

                       {{ request()->routeIs('dashboard')
                            ? 'bg-indigo-600 text-white'
                            : 'text-gray-300 hover:bg-slate-800 hover:text-white' }}"
            >

                <span class="text-lg">
                    📊
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            {{-- Users --}}
            <a
                href="#"
                class="flex items-center gap-3
                       px-4 py-3 rounded-lg
                       text-gray-300
                       hover:bg-slate-800
                       hover:text-white
                       transition"
            >

                <span class="text-lg">
                    👥
                </span>

                <span>
                    Users
                </span>

            </a>


            {{-- Products --}}
            <a
                href="#"
                class="flex items-center gap-3
                       px-4 py-3 rounded-lg
                       text-gray-300
                       hover:bg-slate-800
                       hover:text-white
                       transition"
            >

                <span class="text-lg">
                    📦
                </span>

                <span>
                    Products
                </span>

            </a>


            {{-- Orders --}}
            <a
                href="#"
                class="flex items-center gap-3
                       px-4 py-3 rounded-lg
                       text-gray-300
                       hover:bg-slate-800
                       hover:text-white
                       transition"
            >

                <span class="text-lg">
                    🛒
                </span>

                <span>
                    Orders
                </span>

            </a>


            {{-- Reports --}}
            <a
                href="#"
                class="flex items-center gap-3
                       px-4 py-3 rounded-lg
                       text-gray-300
                       hover:bg-slate-800
                       hover:text-white
                       transition"
            >

                <span class="text-lg">
                    📈
                </span>

                <span>
                    Reports
                </span>

            </a>


            {{-- Settings --}}
            <a
                href="#"
                class="flex items-center gap-3
                       px-4 py-3 rounded-lg
                       text-gray-300
                       hover:bg-slate-800
                       hover:text-white
                       transition"
            >

                <span class="text-lg">
                    ⚙️
                </span>

                <span>
                    Settings
                </span>

            </a>


            {{-- Divider --}}
            <div class="border-t border-slate-700 my-4"></div>


            {{-- Logout --}}
            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="w-full flex items-center gap-3
                           px-4 py-3 rounded-lg
                           text-red-400
                           hover:bg-red-500/10
                           hover:text-red-300
                           transition"
                >

                    <span class="text-lg">
                        🚪
                    </span>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </nav>

    </aside>



    {{-- =====================================================
        MAIN CONTENT AREA
    ====================================================== --}}
    <div class="lg:ml-64">


        {{-- =================================================
            HEADER
        ================================================== --}}
        <header
            class="h-16 bg-white border-b border-gray-200
                   flex items-center justify-between
                   px-4 sm:px-6
                   sticky top-0 z-30"
        >

            {{-- Left Side --}}
            <div class="flex items-center gap-4">

                {{-- Mobile Menu Button --}}
                <button
                    @click="sidebarOpen = true"
                    type="button"
                    class="lg:hidden
                           p-2 rounded-lg
                           text-gray-600
                           hover:bg-gray-100"
                >
                    ☰
                </button>


                {{-- Page Title --}}
                <div>

                    <h1 class="text-lg font-semibold text-gray-800">

                        @hasSection('page-title')
                            @yield('page-title')
                        @else
                            Dashboard
                        @endif

                    </h1>

                    <p class="hidden sm:block text-xs text-gray-500">
                        Admin Panel
                    </p>

                </div>

            </div>


            {{-- Right Side --}}
            <div class="flex items-center gap-3">


                {{-- Notification --}}
                <button
                    type="button"
                    class="relative p-2 rounded-lg
                           hover:bg-gray-100
                           text-gray-600"
                >

                    🔔

                    <span
                        class="absolute top-1 right-1
                               w-2 h-2
                               bg-red-500
                               rounded-full"
                    ></span>

                </button>


                {{-- User Dropdown --}}
                <div
                    x-data="{ open: false }"
                    class="relative"
                >

                    <button
                        @click="open = !open"
                        type="button"
                        class="flex items-center gap-2
                               p-1.5 rounded-lg
                               hover:bg-gray-100"
                    >

                        {{-- Avatar --}}
                        <div
                            class="w-9 h-9 rounded-full
                                   bg-indigo-600
                                   text-white
                                   flex items-center justify-center
                                   font-semibold"
                        >

                            {{ strtoupper(
                                substr(auth()->user()->name ?? 'A', 0, 1)
                            ) }}

                        </div>


                        {{-- User Name --}} 
                            <div class="hidden md:block text-left">
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ auth()->user()->name ?? 'Admin' }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    Administrator
                                </p>
                            </div> 


                        <span class="hidden md:block text-gray-400">
                            ▾
                        </span>

                    </button>


                    {{-- Dropdown --}}
                    <div
                        x-show="open"
                        x-transition
                        @click.outside="open = false"
                        class="absolute right-0 mt-2
                               w-48 bg-white
                               rounded-lg shadow-lg
                               border border-gray-200
                               py-2"
                        style="display: none;"
                    >

                        <a
                            href="#"
                            class="block px-4 py-2
                                   text-sm text-gray-700
                                   hover:bg-gray-100"
                        >
                            👤 Profile
                        </a>


                        <a
                            href="#"
                            class="block px-4 py-2
                                   text-sm text-gray-700
                                   hover:bg-gray-100"
                        >
                            ⚙️ Settings
                        </a>


                        <div class="border-t my-2"></div>


                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="w-full text-left
                                       px-4 py-2
                                       text-sm text-red-600
                                       hover:bg-red-50"
                            >
                                🚪 Logout
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </header>



        {{-- =================================================
            PAGE HEADING
        ================================================== --}}
        @if (isset($header))

            <header class="bg-white shadow-sm">

                <div
                    class="max-w-7xl mx-auto
                           py-5 px-4
                           sm:px-6 lg:px-8"
                >

                    {{ $header }}

                </div>

            </header>

        @endif



        {{-- =================================================
            PAGE CONTENT
        ================================================== --}}
        <main class="p-4 sm:p-6">

            {{-- Success Message --}}
            @if (session('success'))

                <div
                    class="mb-5 rounded-lg
                           bg-green-50
                           border border-green-200
                           px-4 py-3
                           text-sm text-green-700"
                >
                    {{ session('success') }}
                </div>

            @endif


            {{-- Error Message --}}
            @if (session('error'))

                <div
                    class="mb-5 rounded-lg
                           bg-red-50
                           border border-red-200
                           px-4 py-3
                           text-sm text-red-700"
                >
                    {{ session('error') }}
                </div>

            @endif


            {{-- {{ $slot }} --}}

        </main>

    </div>

</div>


@stack('scripts')

</body>
</html>  