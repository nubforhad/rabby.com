@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')

<div class="space-y-6">

    {{-- Welcome --}}
    <div>
        <h2 class="text-2xl font-bold text-gray-800">
            Dashboard
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Welcome back, {{ auth()->user()->name ?? 'Admin' }}.
        </p>
    </div>


    {{-- =========================
        STAT CARDS
    ========================== --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">

        {{-- Users --}}
        <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-500">
                        Total Users
                    </p>

                    <h3 class="text-2xl font-bold mt-2">
                        120
                    </h3>
                </div>

                <div class="w-12 h-12 rounded-xl bg-indigo-100
                            flex items-center justify-center text-xl">
                    👥
                </div>

            </div>

            <p class="text-xs text-green-600 mt-4">
                ↑ 12% from last month
            </p>

        </div>


        {{-- Products --}}
        <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-500">
                        Products
                    </p>

                    <h3 class="text-2xl font-bold mt-2">
                        350
                    </h3>
                </div>

                <div class="w-12 h-12 rounded-xl bg-blue-100
                            flex items-center justify-center text-xl">
                    📦
                </div>

            </div>

            <p class="text-xs text-green-600 mt-4">
                ↑ 8% from last month
            </p>

        </div>


        {{-- Orders --}}
        <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-500">
                        Orders
                    </p>

                    <h3 class="text-2xl font-bold mt-2">
                        1,250
                    </h3>
                </div>

                <div class="w-12 h-12 rounded-xl bg-orange-100
                            flex items-center justify-center text-xl">
                    🛒
                </div>

            </div>

            <p class="text-xs text-green-600 mt-4">
                ↑ 18% from last month
            </p>

        </div>


        {{-- Revenue --}}
        <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-500">
                        Revenue
                    </p>

                    <h3 class="text-2xl font-bold mt-2">
                        ৳ 85,500
                    </h3>
                </div>

                <div class="w-12 h-12 rounded-xl bg-green-100
                            flex items-center justify-center text-xl">
                    💰
                </div>

            </div>

            <p class="text-xs text-green-600 mt-4">
                ↑ 15% from last month
            </p>

        </div>

    </div>


    {{-- =========================
        CONTENT GRID
    ========================== --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- Recent Orders --}}
        <div class="xl:col-span-2 bg-white rounded-xl border border-gray-200 shadow-sm">

            <div class="flex items-center justify-between
                        px-5 py-4 border-b">

                <h3 class="font-semibold">
                    Recent Orders
                </h3>

                <a href="#"
                   class="text-sm text-indigo-600 hover:underline">
                    View All
                </a>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="bg-gray-50">

                        <tr>
                            <th class="text-left px-5 py-3 font-medium text-gray-500">
                                Order
                            </th>

                            <th class="text-left px-5 py-3 font-medium text-gray-500">
                                Customer
                            </th>

                            <th class="text-left px-5 py-3 font-medium text-gray-500">
                                Amount
                            </th>

                            <th class="text-left px-5 py-3 font-medium text-gray-500">
                                Status
                            </th>
                        </tr>

                    </thead>


                    <tbody class="divide-y">

                        <tr>
                            <td class="px-5 py-4 font-medium">
                                #ORD-001
                            </td>

                            <td class="px-5 py-4">
                                John Doe
                            </td>

                            <td class="px-5 py-4">
                                ৳ 2,500
                            </td>

                            <td class="px-5 py-4">
                                <span class="px-2.5 py-1 rounded-full
                                             text-xs bg-green-100 text-green-700">
                                    Completed
                                </span>
                            </td>
                        </tr>


                        <tr>
                            <td class="px-5 py-4 font-medium">
                                #ORD-002
                            </td>

                            <td class="px-5 py-4">
                                Rahim
                            </td>

                            <td class="px-5 py-4">
                                ৳ 1,800
                            </td>

                            <td class="px-5 py-4">
                                <span class="px-2.5 py-1 rounded-full
                                             text-xs bg-yellow-100 text-yellow-700">
                                    Pending
                                </span>
                            </td>
                        </tr>


                        <tr>
                            <td class="px-5 py-4 font-medium">
                                #ORD-003
                            </td>

                            <td class="px-5 py-4">
                                Karim
                            </td>

                            <td class="px-5 py-4">
                                ৳ 3,200
                            </td>

                            <td class="px-5 py-4">
                                <span class="px-2.5 py-1 rounded-full
                                             text-xs bg-blue-100 text-blue-700">
                                    Processing
                                </span>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>


        {{-- Quick Actions --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm">

            <div class="px-5 py-4 border-b">
                <h3 class="font-semibold">
                    Quick Actions
                </h3>
            </div>


            <div class="p-5 space-y-3">

                <a href="#"
                   class="flex items-center gap-3 p-3 rounded-lg
                          bg-gray-50 hover:bg-indigo-50
                          hover:text-indigo-600 transition">

                    <span>➕</span>
                    <span class="text-sm font-medium">
                        Add New User
                    </span>

                </a>


                <a href="#"
                   class="flex items-center gap-3 p-3 rounded-lg
                          bg-gray-50 hover:bg-indigo-50
                          hover:text-indigo-600 transition">

                    <span>📦</span>
                    <span class="text-sm font-medium">
                        Add Product
                    </span>

                </a>


                <a href="#"
                   class="flex items-center gap-3 p-3 rounded-lg
                          bg-gray-50 hover:bg-indigo-50
                          hover:text-indigo-600 transition">

                    <span>📊</span>
                    <span class="text-sm font-medium">
                        View Reports
                    </span>

                </a>


                <a href="#"
                   class="flex items-center gap-3 p-3 rounded-lg
                          bg-gray-50 hover:bg-indigo-50
                          hover:text-indigo-600 transition">

                    <span>⚙️</span>
                    <span class="text-sm font-medium">
                        Settings
                    </span>

                </a>

            </div>

        </div>

    </div>

</div>

@endsection 
