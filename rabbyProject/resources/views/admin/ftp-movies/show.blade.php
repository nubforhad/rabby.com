@extends('admin.layouts.app')

@section('title', 'FTP Movie Details')
@section('page-title', 'FTP Movie Details')

@section('content')

<div class="py-6">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col sm:flex-row sm:items-center
                    sm:justify-between gap-4 mb-6">

            <div class="flex items-center gap-3">

                <a
                    href="{{ route('ftp-movies.index') }}"
                    class="w-10 h-10 rounded-xl
                           bg-white border border-gray-200
                           text-gray-600
                           flex items-center justify-center
                           hover:bg-gray-50"
                >
                    <i class="fa-solid fa-arrow-left"></i>
                </a>

                <div>

                    <h2 class="text-2xl font-bold text-gray-800">
                        FTP Movie Details
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        View FTP movie information
                    </p>

                </div>

            </div>


            <a
                href="{{ route('ftp-movies.edit', $ftpMovie) }}"
                class="inline-flex items-center justify-center gap-2
                       px-4 py-2.5
                       bg-indigo-600 text-white
                       rounded-xl text-sm font-semibold
                       hover:bg-indigo-700"
            >
                <i class="fa-solid fa-pen-to-square"></i>
                Edit
            </a>

        </div>


        <div class="bg-white rounded-2xl border border-gray-200
                    shadow-sm overflow-hidden">


            {{-- Hero --}}
            <div
                class="p-6 sm:p-8
                       bg-gradient-to-r from-indigo-50 to-white
                       border-b border-gray-200"
            >

                <div class="flex flex-col sm:flex-row
                            sm:items-center gap-5">


                    <div
                        class="w-20 h-20 rounded-2xl
                               bg-white border border-indigo-100
                               shadow-sm
                               flex items-center justify-center
                               text-3xl text-indigo-600"
                    >
                        <i class="{{ $ftpMovie->icon ?: 'fa-solid fa-film' }}"></i>
                    </div>


                    <div class="flex-1">

                        <h3 class="text-2xl font-bold text-gray-800">
                            {{ $ftpMovie->title }}
                        </h3>

                        <p class="mt-1 text-gray-500">
                            {{ $ftpMovie->sub_title ?: 'No subtitle available' }}
                        </p>

                        <div class="mt-3">

                            @if($ftpMovie->status)

                                <span
                                    class="inline-flex items-center gap-2
                                           px-3 py-1.5 rounded-full
                                           text-xs font-semibold
                                           bg-green-100 text-green-700"
                                >
                                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                    Active
                                </span>

                            @else

                                <span
                                    class="inline-flex items-center gap-2
                                           px-3 py-1.5 rounded-full
                                           text-xs font-semibold
                                           bg-red-100 text-red-700"
                                >
                                    <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                    Inactive
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>


            {{-- Information --}}
            <div class="p-6 sm:p-8">

                <h3 class="text-base font-semibold text-gray-800 mb-5">
                    Movie Information
                </h3>


                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">


                    <div class="p-4 rounded-xl
                                bg-gray-50 border border-gray-100">

                        <p class="text-xs font-medium text-gray-500 uppercase">
                            Movie ID
                        </p>

                        <p class="mt-1 text-sm font-semibold text-gray-800">
                            #{{ $ftpMovie->id }}
                        </p>

                    </div>


                    <div class="p-4 rounded-xl
                                bg-gray-50 border border-gray-100">

                        <p class="text-xs font-medium text-gray-500 uppercase">
                            Title
                        </p>

                        <p class="mt-1 text-sm font-semibold text-gray-800">
                            {{ $ftpMovie->title }}
                        </p>

                    </div>


                    <div class="p-4 rounded-xl
                                bg-gray-50 border border-gray-100">

                        <p class="text-xs font-medium text-gray-500 uppercase">
                            Sub Title
                        </p>

                        <p class="mt-1 text-sm font-semibold text-gray-800">
                            {{ $ftpMovie->sub_title ?: '—' }}
                        </p>

                    </div>


                    <div class="p-4 rounded-xl
                                bg-gray-50 border border-gray-100">

                        <p class="text-xs font-medium text-gray-500 uppercase">
                            Icon
                        </p>

                        <p class="mt-2 text-xl text-indigo-600">
                            <i class="{{ $ftpMovie->icon ?: 'fa-solid fa-film' }}"></i>
                        </p>

                    </div>


                    {{-- Link --}}
                    <div
                        class="sm:col-span-2
                               p-4 rounded-xl
                               bg-gray-50 border border-gray-100"
                    >

                        <p class="text-xs font-medium text-gray-500 uppercase mb-2">
                            FTP Movie Link
                        </p>

                        <div class="flex flex-col sm:flex-row
                                    sm:items-center gap-3">

                            <div
                                class="flex-1 px-4 py-3
                                       bg-white border border-gray-200
                                       rounded-lg text-sm
                                       text-gray-700 break-all"
                            >
                                {{ $ftpMovie->link }}
                            </div>

                            <a
                                href="{{ $ftpMovie->link }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center
                                       justify-center gap-2
                                       px-4 py-3
                                       bg-indigo-600 text-white
                                       rounded-lg text-sm font-semibold
                                       hover:bg-indigo-700"
                            >
                                <i class="fa-solid fa-play"></i>
                                Open FTP
                            </a>

                        </div>

                    </div>


                    <div class="p-4 rounded-xl
                                bg-gray-50 border border-gray-100">

                        <p class="text-xs font-medium text-gray-500 uppercase">
                            Created At
                        </p>

                        <p class="mt-1 text-sm font-semibold text-gray-800">
                            {{ $ftpMovie->created_at?->format('d M Y, h:i A') }}
                        </p>

                    </div>


                    <div class="p-4 rounded-xl
                                bg-gray-50 border border-gray-100">

                        <p class="text-xs font-medium text-gray-500 uppercase">
                            Updated At
                        </p>

                        <p class="mt-1 text-sm font-semibold text-gray-800">
                            {{ $ftpMovie->updated_at?->format('d M Y, h:i A') }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- Footer --}}
            <div
                class="px-6 py-4 bg-gray-50
                       border-t border-gray-200
                       flex flex-col sm:flex-row
                       sm:justify-between gap-3"
            >

                <a
                    href="{{ route('ftp-movies.index') }}"
                    class="inline-flex items-center justify-center
                           px-5 py-2.5 rounded-xl
                           bg-white border border-gray-300
                           text-gray-700 text-sm font-semibold
                           hover:bg-gray-50"
                >
                    <i class="fa-solid fa-arrow-left mr-2"></i>
                    Back to FTP Movies
                </a>


                <form
                    method="POST"
                    action="{{ route('ftp-movies.destroy', $ftpMovie) }}"
                    onsubmit="return confirm('Are you sure you want to delete this FTP Movie?')"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="w-full sm:w-auto
                               px-5 py-2.5 rounded-xl
                               bg-red-50 border border-red-200
                               text-red-600 text-sm font-semibold
                               hover:bg-red-100"
                    >
                        <i class="fa-solid fa-trash mr-1"></i>
                        Delete FTP Movie
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection