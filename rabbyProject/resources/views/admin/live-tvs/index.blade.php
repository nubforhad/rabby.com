@extends('admin.layouts.app')

@section('title', 'Live TVs')
@section('page-title', 'Live TVs')

@section('content')

<div class="py-6">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    Live TVs
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Manage your live TV channels
                </p>
            </div>

            <a
                href="{{ route('live-tvs.create') }}"
                class="inline-flex items-center justify-center gap-2
                       px-5 py-2.5
                       bg-indigo-600
                       text-white
                       rounded-xl
                       text-sm font-semibold
                       hover:bg-indigo-700
                       transition"
            >
                <span class="text-lg">+</span>
                Add Live TV
            </a>

        </div>


        {{-- Success --}}
        @if(session('success'))

            <div class="mb-5 px-4 py-3 rounded-xl
                        bg-green-50 border border-green-200
                        text-green-700 text-sm">
                {{ session('success') }}
            </div>

        @endif


        {{-- Table --}}
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-sm">

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
                                Link
                            </th>

                            <th class="px-6 py-4 text-left font-semibold text-gray-600">
                                Status
                            </th>

                            <th class="px-6 py-4 text-right font-semibold text-gray-600">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($liveTvs as $liveTv)

                            <tr class="hover:bg-gray-50 transition">

                                {{-- Number --}}
                                <td class="px-6 py-4 text-gray-500">
                                    {{ $liveTvs->firstItem() + $loop->index }}
                                </td>


                                {{-- Icon --}}
                                <td class="px-6 py-4">

                                    <div
                                        class="w-11 h-11 rounded-xl
                                               bg-indigo-50
                                               text-indigo-600
                                               flex items-center justify-center
                                               text-xl"
                                    >
                                        <i class="{{ $liveTv->icon ?: 'fa-solid fa-tv' }}"></i>
                                    </div>

                                </td>


                                {{-- Title --}}
                                <td class="px-6 py-4">

                                    <div class="font-semibold text-gray-800">
                                        {{ $liveTv->title }}
                                    </div>

                                </td>


                                {{-- Sub Title --}}
                                <td class="px-6 py-4 text-gray-500">
                                    {{ $liveTv->sub_title ?: '—' }}
                                </td>


                                {{-- Link --}}
                                <td class="px-6 py-4">

                                    <a
                                        href="{{ $liveTv->link }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="inline-flex items-center gap-1
                                               max-w-xs
                                               text-indigo-600
                                               hover:text-indigo-800
                                               hover:underline"
                                    >
                                        <span class="truncate">
                                            {{ $liveTv->link }}
                                        </span>

                                        <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                                    </a>

                                </td>


                                {{-- Status --}}
                                <td class="px-6 py-4">

                                    @if($liveTv->status)

                                        <span
                                            class="inline-flex items-center gap-2
                                                   px-3 py-1.5
                                                   rounded-full
                                                   text-xs font-semibold
                                                   bg-green-100
                                                   text-green-700"
                                        >
                                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
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
                                            <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                            Inactive
                                        </span>

                                    @endif

                                </td>


                                {{-- Actions --}}
                                <td class="px-6 py-4">

                                    <div class="flex justify-end items-center gap-2">

                                        <a
                                            href="{{ route('live-tvs.show', $liveTv) }}"
                                            class="px-3 py-1.5 rounded-lg
                                                   bg-gray-100
                                                   text-gray-700
                                                   text-xs font-semibold
                                                   hover:bg-gray-200"
                                        >
                                            View
                                        </a>

                                        <a
                                            href="{{ route('live-tvs.edit', $liveTv) }}"
                                            class="px-3 py-1.5 rounded-lg
                                                   bg-indigo-50
                                                   text-indigo-600
                                                   text-xs font-semibold
                                                   hover:bg-indigo-100"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            method="POST"
                                            action="{{ route('live-tvs.destroy', $liveTv) }}"
                                            onsubmit="return confirm('Are you sure you want to delete this Live TV?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="px-3 py-1.5 rounded-lg
                                                       bg-red-50
                                                       text-red-600
                                                       text-xs font-semibold
                                                       hover:bg-red-100"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="px-6 py-12 text-center">

                                    <div class="text-4xl text-gray-300 mb-3">
                                        <i class="fa-solid fa-tv"></i>
                                    </div>

                                    <p class="text-gray-500">
                                        No Live TV found.
                                    </p>

                                    <a
                                        href="{{ route('live-tvs.create') }}"
                                        class="inline-block mt-3
                                               text-indigo-600
                                               text-sm font-medium
                                               hover:underline"
                                    >
                                        Add your first Live TV
                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if($liveTvs->hasPages())

                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $liveTvs->links() }}
                </div>

            @endif

        </div>

    </div>

</div>

@endsection 
