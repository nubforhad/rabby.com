@extends('admin.layouts.app')

@section('title', 'NET App Details')

@section('page-title', 'NET App Details')

@section('content')

<div class="py-6">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Page Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

            <div class="flex items-center gap-3">

                <a
                    href="{{ route('net-apps.index') }}"
                    class="w-10 h-10 rounded-xl
                           bg-white
                           border border-gray-200
                           text-gray-600
                           flex items-center justify-center
                           hover:bg-gray-50 transition"
                >
                    ←
                </a>

                <div>

                    <h2 class="text-2xl font-bold text-gray-800">
                        NET App Details
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        View application information
                    </p>

                </div>

            </div>


            {{-- Edit Button --}}
            <a
                href="{{ route('net-apps.edit', $netApp->id) }}"
                class="inline-flex items-center
                       justify-center gap-2
                       px-4 py-2.5
                       bg-indigo-600
                       text-white
                       text-sm font-semibold
                       rounded-xl
                       hover:bg-indigo-700
                       transition"
            >

                <svg
                    class="w-4 h-4"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"
                    />
                </svg>

                Edit App

            </a>

        </div>


        {{-- Main Card --}}
        <div
            class="bg-white
                   rounded-2xl
                   border border-gray-200
                   shadow-sm
                   overflow-hidden"
        >

            {{-- App Hero --}}
            <div
                class="p-6 sm:p-8
                       bg-gradient-to-r
                       from-indigo-50
                       to-white
                       border-b border-gray-200"
            >

                <div class="flex flex-col sm:flex-row sm:items-center gap-5">

                    {{-- Icon --}}
                    <div
                        class="w-20 h-20
                               rounded-2xl
                               bg-white
                               border border-indigo-100
                               shadow-sm
                               flex items-center
                               justify-center
                               text-4xl"
                    >
                        {{ $netApp->icon ?: '📱' }}
                    </div>


                    {{-- App Info --}}
                    <div class="flex-1">

                        <h3 class="text-2xl font-bold text-gray-800">
                            {{ $netApp->title }}
                        </h3>

                        <p class="mt-1 text-gray-500">
                            {{ $netApp->sub_title ?: 'No subtitle available' }}
                        </p>

                        <div class="mt-3">

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

                        </div>

                    </div>

                </div>

            </div>


            {{-- Information --}}
            <div class="p-6 sm:p-8">

                <h3
                    class="text-base
                           font-semibold
                           text-gray-800
                           mb-5"
                >
                    Application Information
                </h3>


                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">


                    {{-- ID --}}
                    <div
                        class="p-4
                               rounded-xl
                               bg-gray-50
                               border border-gray-100"
                    >

                        <p class="text-xs font-medium text-gray-500 uppercase">
                            App ID
                        </p>

                        <p class="mt-1 text-sm font-semibold text-gray-800">
                            #{{ $netApp->id }}
                        </p>

                    </div>


                    {{-- Icon --}}
                    <div
                        class="p-4
                               rounded-xl
                               bg-gray-50
                               border border-gray-100"
                    >

                        <p class="text-xs font-medium text-gray-500 uppercase">
                            Icon
                        </p>

                        <p class="mt-1 text-2xl">
                            {{ $netApp->icon ?: '📱' }}
                        </p>

                    </div>


                    {{-- Title --}}
                    <div
                        class="p-4
                               rounded-xl
                               bg-gray-50
                               border border-gray-100"
                    >

                        <p class="text-xs font-medium text-gray-500 uppercase">
                            Title
                        </p>

                        <p class="mt-1 text-sm font-semibold text-gray-800">
                            {{ $netApp->title }}
                        </p>

                    </div>


                    {{-- Sub Title --}}
                    <div
                        class="p-4
                               rounded-xl
                               bg-gray-50
                               border border-gray-100"
                    >

                        <p class="text-xs font-medium text-gray-500 uppercase">
                            Sub Title
                        </p>

                        <p class="mt-1 text-sm font-semibold text-gray-800">
                            {{ $netApp->sub_title ?: '—' }}
                        </p>

                    </div>


                    {{-- Status --}}
                    <div
                        class="p-4
                               rounded-xl
                               bg-gray-50
                               border border-gray-100"
                    >

                        <p class="text-xs font-medium text-gray-500 uppercase">
                            Status
                        </p>

                        <div class="mt-2">

                            @if($netApp->status)

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

                        </div>

                    </div>


                    {{-- Created --}}
                    <div
                        class="p-4
                               rounded-xl
                               bg-gray-50
                               border border-gray-100"
                    >

                        <p class="text-xs font-medium text-gray-500 uppercase">
                            Created At
                        </p>

                        <p class="mt-1 text-sm font-semibold text-gray-800">
                            {{ $netApp->created_at?->format('d M Y, h:i A') }}
                        </p>

                    </div>


                    {{-- Updated --}}
                    <div
                        class="p-4
                               rounded-xl
                               bg-gray-50
                               border border-gray-100"
                    >

                        <p class="text-xs font-medium text-gray-500 uppercase">
                            Last Updated
                        </p>

                        <p class="mt-1 text-sm font-semibold text-gray-800">
                            {{ $netApp->updated_at?->format('d M Y, h:i A') }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- Footer --}}
            <div
                class="px-6 py-4
                       bg-gray-50
                       border-t border-gray-200
                       flex flex-col sm:flex-row
                       sm:justify-between
                       gap-3"
            >

                <a
                    href="{{ route('net-apps.index') }}"
                    class="inline-flex items-center
                           justify-center
                           px-5 py-2.5
                           rounded-xl
                           bg-white
                           border border-gray-300
                           text-gray-700
                           text-sm font-semibold
                           hover:bg-gray-50"
                >
                    ← Back to NET Apps
                </a>


                <form
                    method="POST"
                    action="{{ route('net-apps.destroy', $netApp->id) }}"
                    onsubmit="return confirm('Are you sure you want to delete this NET App?')"
                >

                    @csrf

                    @method('DELETE')

                    <button
                        type="submit"
                        class="w-full sm:w-auto
                               inline-flex items-center
                               justify-center
                               px-5 py-2.5
                               rounded-xl
                               bg-red-50
                               border border-red-200
                               text-red-600
                               text-sm font-semibold
                               hover:bg-red-100
                               transition"
                    >
                        Delete App
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
