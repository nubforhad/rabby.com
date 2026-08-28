```blade
@extends('admin.layouts.app')

@section('title', 'NET Apps')

@section('page-title', 'NET Apps')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                NET Apps
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Manage your NET applications
            </p>
        </div>

        <a
            href="{{ route('net-apps.create') }}"
            class="inline-flex items-center justify-center
                   px-4 py-2.5
                   bg-indigo-600
                   text-white
                   text-sm font-medium
                   rounded-lg
                   hover:bg-indigo-700
                   transition"
        >
            + Add NET App
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div
            class="mb-5 flex items-center
                   px-4 py-3
                   rounded-lg
                   bg-green-50
                   border border-green-200
                   text-green-700"
        >
            {{ session('success') }}
        </div>

    @endif


    {{-- Error Message --}}
    @if(session('error'))

        <div
            class="mb-5 px-4 py-3
                   rounded-lg
                   bg-red-50
                   border border-red-200
                   text-red-700"
        >
            {{ session('error') }}
        </div>

    @endif


    {{-- Table --}}
    <div
        class="bg-white
               rounded-xl
               border border-gray-200
               shadow-sm
               overflow-hidden"
    >

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                {{-- Table Header --}}
                <thead class="bg-gray-50 border-b border-gray-200">

                    <tr>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            #
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Icon
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Title
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Sub Title
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right font-semibold text-gray-600">
                            Action
                        </th>

                    </tr>

                </thead>


                {{-- Table Body --}}
                <tbody class="divide-y divide-gray-100">

                    @forelse($netApps as $netApp)

                        <tr class="hover:bg-gray-50 transition">

                            {{-- ID --}}
                            <td class="px-6 py-4 text-gray-500">
                                {{ $netApps->firstItem() + $loop->index }}
                            </td>


                            {{-- Icon --}}
                            <td class="px-6 py-4">

                                <div
                                    class="w-11 h-11
                                           rounded-lg
                                           bg-indigo-100
                                           flex items-center
                                           justify-center
                                           text-xl"
                                >
                                    {{ $netApp->icon ?: '📱' }}
                                </div>

                            </td>


                            {{-- Title --}}
                            <td class="px-6 py-4">

                                <div class="font-semibold text-gray-800">
                                    {{ $netApp->title }}
                                </div>

                            </td>


                            {{-- Sub Title --}}
                            <td class="px-6 py-4 text-gray-500">

                                {{ $netApp->sub_title ?: '—' }}

                            </td>


                            {{-- Status --}}
                            <td class="px-6 py-4">

                                @if($netApp->status)

                                    <span
                                        class="inline-flex items-center gap-2
                                               px-3 py-1.5
                                               rounded-full
                                               text-xs font-semibold
                                               bg-green-100
                                               text-green-700"
                                    >

                                        <span
                                            class="w-2 h-2
                                                   bg-green-500
                                                   rounded-full"
                                        ></span>

                                        Active

                                    </span>

                                @else

                                    <span
                                        class="inline-flex items-center gap-2
                                               px-3 py-1.5
                                               rounded-full
                                               text-xs font-semibold
                                               bg-red-100
                                               text-red-700"
                                    >

                                        <span
                                            class="w-2 h-2
                                                   bg-red-500
                                                   rounded-full"
                                        ></span>

                                        Inactive

                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}
                            <td class="px-6 py-4">

                                <div class="flex justify-end items-center gap-2">

                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('net-apps.edit', $netApp->id) }}"
                                        class="px-3 py-1.5
                                               rounded-lg
                                               bg-indigo-50
                                               text-indigo-600
                                               text-xs font-medium
                                               hover:bg-indigo-100
                                               transition"
                                    >
                                        Edit
                                    </a>


                                    {{-- Delete --}}
                                    <form
                                        method="POST"
                                        action="{{ route('net-apps.destroy', $netApp->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this NET App?')"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="px-3 py-1.5
                                                   rounded-lg
                                                   bg-red-50
                                                   text-red-600
                                                   text-xs font-medium
                                                   hover:bg-red-100
                                                   transition"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="px-6 py-12 text-center"
                            >

                                <div class="text-gray-400 text-4xl mb-3">
                                    📱
                                </div>

                                <p class="text-gray-500">
                                    No NET Apps found.
                                </p>

                                <a
                                    href="{{ route('net-apps.create') }}"
                                    class="inline-block mt-3
                                           text-indigo-600
                                           hover:underline
                                           text-sm"
                                >
                                    Add your first NET App
                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if($netApps->hasPages())

            <div class="px-6 py-4 border-t border-gray-200">

                {{ $netApps->links() }}

            </div>

        @endif

    </div>

</div>

@endsection
```
