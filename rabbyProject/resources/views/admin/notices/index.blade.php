@extends('admin.layouts.app')

@section('title', 'Notices')

@section('page-title', 'Notices')

@section('content')

<div class="max-w-screen-xl mx-auto px-3 sm:px-4 lg:px-6 py-4 sm:py-6">

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Notices
                </h1>

                <p class="text-sm text-slate-500 mt-1">
                    Manage all notices
                </p>
            </div>

            <a href="{{ route('admin.notices.create') }}"
               class="inline-flex items-center justify-center gap-2
                      px-4 py-2.5 rounded-lg
                      bg-blue-600 text-white
                      text-sm font-semibold
                      hover:bg-blue-700 transition">

                <i class="bi bi-plus-lg"></i>
                Add Notice
            </a>

        </div>
    </div>


    {{-- =========================================================
        SUCCESS MESSAGE
    ========================================================== --}}
    @if(session('success'))
        <div class="mb-5 rounded-lg border border-green-200
                    bg-green-50 px-4 py-3 text-sm text-green-700">

            <div class="flex items-center gap-2">
                <i class="bi bi-check-circle-fill"></i>
                <span>{{ session('success') }}</span>
            </div>

        </div>
    @endif


    {{-- =========================================================
        ERROR MESSAGE
    ========================================================== --}}
    @if($errors->any())
        <div class="mb-5 rounded-lg border border-red-200
                    bg-red-50 px-4 py-3 text-sm text-red-700">

            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif


    {{-- =========================================================
        NOTICE TABLE
    ========================================================== --}}
    <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">

        <div class="px-5 py-4 border-b border-slate-200 bg-slate-50">

            <div class="flex items-center justify-between">

                <div>
                    <h2 class="text-base font-semibold text-slate-800">
                        Notice List
                    </h2>

                    <p class="text-xs text-slate-500 mt-1">
                        Total {{ $notices->total() }} notices
                    </p>
                </div>

                <div class="w-9 h-9 rounded-lg bg-blue-50
                            text-blue-600 flex items-center justify-center">
                    <i class="bi bi-megaphone text-lg"></i>
                </div>

            </div>

        </div>


        {{-- Desktop Table --}}
        <div class="hidden md:block overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-slate-50 border-b border-slate-200">

                    <tr class="text-left">

                        <th class="px-5 py-3 font-semibold text-slate-600">
                            #
                        </th>

                        <th class="px-5 py-3 font-semibold text-slate-600">
                            Image
                        </th>

                        <th class="px-5 py-3 font-semibold text-slate-600">
                            Notice
                        </th>

                        <th class="px-5 py-3 font-semibold text-slate-600">
                            Sort Code
                        </th>

                        <th class="px-5 py-3 font-semibold text-slate-600">
                            Status
                        </th>

                        <th class="px-5 py-3 font-semibold text-slate-600 text-right">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse($notices as $notice)

                        <tr class="hover:bg-slate-50 transition">

                            {{-- ID --}}
                            <td class="px-5 py-4 text-slate-500">
                                {{ $loop->iteration + ($notices->currentPage() - 1) * $notices->perPage() }}
                            </td>


                            {{-- IMAGE --}}
                            <td class="px-5 py-4">

                                @if($notice->image)

                                    <img
                                        src="{{ asset('storage/' . $notice->image) }}"
                                        alt="{{ $notice->title }}"
                                        class="w-14 h-14 rounded-lg object-cover
                                               border border-slate-200"
                                    >

                                @else

                                    <div class="w-14 h-14 rounded-lg
                                                bg-slate-100
                                                flex items-center justify-center
                                                text-slate-400">

                                        <i class="bi bi-image text-xl"></i>

                                    </div>

                                @endif

                            </td>


                            {{-- NOTICE --}}
                            <td class="px-5 py-4">

                                <div class="max-w-md">

                                    <div class="font-semibold text-slate-800">
                                        {{ $notice->title }}
                                    </div>

                                    @if($notice->subtitle)
                                        <div class="text-xs text-slate-500 mt-1">
                                            {{ $notice->subtitle }}
                                        </div>
                                    @endif

                                    @if($notice->notice_text)
                                        <div class="text-xs text-slate-400 mt-1 line-clamp-2">
                                            {{ $notice->notice_text }}
                                        </div>
                                    @endif

                                </div>

                            </td>


                            {{-- SORT CODE --}}
                            <td class="px-5 py-4">

                                <span class="inline-flex items-center
                                             px-2.5 py-1 rounded-md
                                             bg-slate-100 text-slate-700
                                             text-xs font-semibold">

                                    {{ $notice->sort_code }}

                                </span>

                            </td>


                            {{-- STATUS --}}
                            <td class="px-5 py-4">

                                @if($notice->status)

                                    <span class="inline-flex items-center gap-1.5
                                                 px-2.5 py-1 rounded-full
                                                 bg-green-50 text-green-700
                                                 border border-green-200
                                                 text-xs font-semibold">

                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                        Active

                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1.5
                                                 px-2.5 py-1 rounded-full
                                                 bg-red-50 text-red-700
                                                 border border-red-200
                                                 text-xs font-semibold">

                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                        Inactive

                                    </span>

                                @endif

                            </td>


                            {{-- ACTION --}}
                            <td class="px-5 py-4">

                                <div class="flex items-center justify-end gap-2">

                                    {{-- Show --}}
                                    <a href="{{ route('admin.notices.show', $notice) }}"
                                       class="w-9 h-9 flex items-center justify-center
                                              rounded-lg bg-slate-100
                                              text-slate-600
                                              hover:bg-slate-200 transition"
                                       title="View">

                                        <i class="bi bi-eye"></i>

                                    </a>


                                    {{-- Edit --}}
                                    <a href="{{ route('admin.notices.edit', $notice) }}"
                                       class="w-9 h-9 flex items-center justify-center
                                              rounded-lg bg-blue-50
                                              text-blue-600
                                              hover:bg-blue-100 transition"
                                       title="Edit">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>


                                    {{-- Delete --}}
                                    <form
                                        action="{{ route('admin.notices.destroy', $notice) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this notice?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="w-9 h-9 flex items-center justify-center
                                                       rounded-lg bg-red-50
                                                       text-red-600
                                                       hover:bg-red-100 transition"
                                                title="Delete">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="px-5 py-12 text-center">

                                <div class="flex flex-col items-center">

                                    <div class="w-14 h-14 rounded-full
                                                bg-slate-100
                                                flex items-center justify-center
                                                text-slate-400 mb-3">

                                        <i class="bi bi-megaphone text-2xl"></i>

                                    </div>

                                    <h3 class="font-semibold text-slate-700">
                                        No notices found
                                    </h3>

                                    <p class="text-sm text-slate-500 mt-1">
                                        Create your first notice.
                                    </p>

                                    <a href="{{ route('admin.notices.create') }}"
                                       class="mt-4 inline-flex items-center gap-2
                                              px-4 py-2 rounded-lg
                                              bg-blue-600 text-white
                                              text-sm font-semibold
                                              hover:bg-blue-700">

                                        <i class="bi bi-plus-lg"></i>
                                        Add Notice

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Mobile Cards --}}
        <div class="md:hidden divide-y divide-slate-100">

            @forelse($notices as $notice)

                <div class="p-4">

                    <div class="flex gap-3">

                        @if($notice->image)

                            <img
                                src="{{ asset('storage/' . $notice->image) }}"
                                alt="{{ $notice->title }}"
                                class="w-16 h-16 rounded-lg object-cover
                                       border border-slate-200 flex-shrink-0"
                            >

                        @else

                            <div class="w-16 h-16 rounded-lg bg-slate-100
                                        flex items-center justify-center
                                        text-slate-400 flex-shrink-0">

                                <i class="bi bi-image text-xl"></i>

                            </div>

                        @endif


                        <div class="flex-1 min-w-0">

                            <div class="flex items-start justify-between gap-2">

                                <h3 class="font-semibold text-slate-800 truncate">
                                    {{ $notice->title }}
                                </h3>

                                @if($notice->status)
                                    <span class="text-xs text-green-600 font-semibold">
                                        Active
                                    </span>
                                @else
                                    <span class="text-xs text-red-600 font-semibold">
                                        Inactive
                                    </span>
                                @endif

                            </div>

                            @if($notice->subtitle)

                                <p class="text-xs text-slate-500 mt-1">
                                    {{ $notice->subtitle }}
                                </p>

                            @endif

                            <div class="flex items-center gap-2 mt-3">

                                <span class="text-xs bg-slate-100
                                             text-slate-600 px-2 py-1 rounded">
                                    Sort: {{ $notice->sort_code }}
                                </span>

                            </div>

                        </div>

                    </div>


                    <div class="flex items-center gap-2 mt-4">

                        <a href="{{ route('admin.notices.show', $notice) }}"
                           class="flex-1 inline-flex justify-center items-center gap-1
                                  px-3 py-2 rounded-lg
                                  bg-slate-100 text-slate-700 text-xs font-semibold">

                            <i class="bi bi-eye"></i>
                            View

                        </a>

                        <a href="{{ route('admin.notices.edit', $notice) }}"
                           class="flex-1 inline-flex justify-center items-center gap-1
                                  px-3 py-2 rounded-lg
                                  bg-blue-50 text-blue-600 text-xs font-semibold">

                            <i class="bi bi-pencil"></i>
                            Edit

                        </a>

                        <form
                            action="{{ route('admin.notices.destroy', $notice) }}"
                            method="POST"
                            class="flex-1"
                            onsubmit="return confirm('Are you sure you want to delete this notice?')"
                        >

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="w-full inline-flex justify-center items-center gap-1
                                           px-3 py-2 rounded-lg
                                           bg-red-50 text-red-600 text-xs font-semibold">

                                <i class="bi bi-trash"></i>
                                Delete

                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <div class="p-10 text-center text-slate-500">
                    No notices found.
                </div>

            @endforelse

        </div>


        {{-- Pagination --}}
        @if($notices->hasPages())

            <div class="px-5 py-4 border-t border-slate-200">

                {{ $notices->links() }}

            </div>

        @endif

    </div>

</div>

@endsection