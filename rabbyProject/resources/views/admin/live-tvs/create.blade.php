@extends('admin.layouts.app')

@section('title', 'Add Live TV')
@section('page-title', 'Add Live TV')

@section('content')

<div class="py-6">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mb-6">

            <div class="flex items-center gap-3">

                <a
                    href="{{ route('live-tvs.index') }}"
                    class="w-10 h-10 rounded-xl
                           bg-white border border-gray-200
                           text-gray-600
                           flex items-center justify-center
                           hover:bg-gray-50"
                >
                    ←
                </a>

                <div
                    class="w-11 h-11 rounded-xl
                           bg-red-100 text-red-600
                           flex items-center justify-center"
                >
                    <i class="fa-solid fa-tv text-lg"></i>
                </div>

                <div>

                    <h2 class="text-2xl font-bold text-gray-800">
                        Add Live TV
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Add a new live TV channel
                    </p>

                </div>

            </div>

        </div>


        {{-- Validation --}}
        @if($errors->any())

            <div class="mb-6 p-4 rounded-xl
                        bg-red-50 border border-red-200
                        text-red-700">

                <ul class="list-disc list-inside text-sm space-y-1">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Card --}}
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 bg-gray-50/70 border-b border-gray-200">

                <h3 class="font-semibold text-gray-800">
                    Live TV Information
                </h3>

                <p class="mt-1 text-sm text-gray-500">
                    Enter channel details and streaming link.
                </p>

            </div>


            <form method="POST" action="{{ route('live-tvs.store') }}">

                @csrf

                <div class="p-6 space-y-6">


                    {{-- Icon + Title --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                        {{-- Icon --}}
                        <div>

                            <label
                                for="icon"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Icon
                            </label>

                            <div class="relative">

                                <div
                                    class="absolute left-3 top-1/2
                                           -translate-y-1/2
                                           w-9 h-9 rounded-lg
                                           bg-indigo-50
                                           text-indigo-600
                                           flex items-center justify-center"
                                >
                                    <i class="{{ old('icon', 'fa-solid fa-tv') }}"></i>
                                </div>

                                <input
                                    type="text"
                                    id="icon"
                                    name="icon"
                                    value="{{ old('icon') }}"
                                    placeholder="fa-solid fa-tv"
                                    class="w-full h-12
                                           pl-14 pr-4
                                           rounded-xl
                                           border border-gray-300
                                           focus:border-indigo-500
                                           focus:ring-4
                                           focus:ring-indigo-500/10
                                           outline-none"
                                >

                            </div>

                            <p class="mt-2 text-xs text-gray-500">
                                Example: fa-solid fa-tv
                            </p>

                            @error('icon')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Title --}}
                        <div>

                            <label
                                for="title"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Title <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                id="title"
                                name="title"
                                value="{{ old('title') }}"
                                required
                                placeholder="Live TV"
                                class="w-full h-12
                                       px-4
                                       rounded-xl
                                       border border-gray-300
                                       focus:border-indigo-500
                                       focus:ring-4
                                       focus:ring-indigo-500/10
                                       outline-none"
                            >

                            @error('title')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>


                    {{-- Sub Title --}}
                    <div>

                        <label
                            for="sub_title"
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            Sub Title
                        </label>

                        <input
                            type="text"
                            id="sub_title"
                            name="sub_title"
                            value="{{ old('sub_title') }}"
                            placeholder="Watch live television"
                            class="w-full h-12
                                   px-4
                                   rounded-xl
                                   border border-gray-300
                                   focus:border-indigo-500
                                   focus:ring-4
                                   focus:ring-indigo-500/10
                                   outline-none"
                        >

                    </div>


                    {{-- Link --}}
                    <div>

                        <label
                            for="link"
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            Live TV Link
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">

                            <div
                                class="absolute left-3 top-1/2
                                       -translate-y-1/2
                                       text-gray-400"
                            >
                                <i class="fa-solid fa-link"></i>
                            </div>

                            <input
                                type="url"
                                id="link"
                                name="link"
                                value="{{ old('link') }}"
                                required
                                placeholder="https://example.com/live"
                                class="w-full h-12
                                       pl-10 pr-4
                                       rounded-xl
                                       border border-gray-300
                                       focus:border-indigo-500
                                       focus:ring-4
                                       focus:ring-indigo-500/10
                                       outline-none"
                            >

                        </div>

                        <p class="mt-2 text-xs text-gray-500">
                            Enter the complete Live TV URL.
                        </p>

                        @error('link')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Status --}}
                    <div
                        class="p-4 rounded-xl
                               border border-gray-200
                               bg-gray-50"
                    >

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-semibold text-gray-800">
                                    Channel Status
                                </p>

                                <p class="text-xs text-gray-500 mt-1">
                                    Enable this channel for users.
                                </p>

                            </div>

                            <label class="relative inline-flex items-center cursor-pointer">

                                <input
                                    type="checkbox"
                                    name="status"
                                    value="1"
                                    {{ old('status', true) ? 'checked' : '' }}
                                    class="sr-only peer"
                                >

                                <div
                                    class="w-11 h-6
                                           bg-gray-300 rounded-full
                                           peer-checked:bg-indigo-600
                                           transition"
                                ></div>

                                <div
                                    class="absolute left-0.5 top-0.5
                                           w-5 h-5 bg-white rounded-full shadow
                                           transition
                                           peer-checked:translate-x-5"
                                ></div>

                            </label>

                        </div>

                    </div>

                </div>


                {{-- Footer --}}
                <div
                    class="px-6 py-4
                           bg-gray-50
                           border-t border-gray-200
                           flex flex-col-reverse
                           sm:flex-row
                           sm:justify-end
                           gap-3"
                >

                    <a
                        href="{{ route('live-tvs.index') }}"
                        class="px-5 py-2.5 rounded-xl
                               bg-white border border-gray-300
                               text-gray-700 text-sm font-semibold
                               text-center hover:bg-gray-50"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="px-5 py-2.5 rounded-xl
                               bg-indigo-600 text-white
                               text-sm font-semibold
                               hover:bg-indigo-700"
                    >
                        Save Live TV
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection 
