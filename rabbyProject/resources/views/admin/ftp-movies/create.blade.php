@extends('admin.layouts.app')

@section('title', 'Add FTP Movie')
@section('page-title', 'Add FTP Movie')

@section('content')

<div class="py-6">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-6">

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

                <div
                    class="w-11 h-11 rounded-xl
                           bg-indigo-100 text-indigo-600
                           flex items-center justify-center"
                >
                    <i class="fa-solid fa-film"></i>
                </div>

                <div>

                    <h2 class="text-2xl font-bold text-gray-800">
                        Add FTP Movie
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Add a new FTP movie link
                    </p>

                </div>

            </div>

        </div>


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


        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 bg-gray-50/70 border-b border-gray-200">

                <h3 class="font-semibold text-gray-800">
                    FTP Movie Information
                </h3>

                <p class="mt-1 text-sm text-gray-500">
                    Enter movie details and FTP link.
                </p>

            </div>


            <form method="POST" action="{{ route('ftp-movies.store') }}">

                @csrf

                <div class="p-6 space-y-6">


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                        {{-- Icon --}}
                        <div>

                            <label
                                for="icon"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Icon
                            </label>

                            <input
                                type="text"
                                id="icon"
                                name="icon"
                                value="{{ old('icon') }}"
                                placeholder="fa-solid fa-film"
                                class="w-full h-12 px-4
                                       rounded-xl border border-gray-300
                                       focus:border-indigo-500
                                       focus:ring-4
                                       focus:ring-indigo-500/10
                                       outline-none"
                            >

                            <p class="mt-2 text-xs text-gray-500">
                                Example: fa-solid fa-film
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
                                placeholder="FTP Movies"
                                class="w-full h-12 px-4
                                       rounded-xl border border-gray-300
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
                            placeholder="Watch movies from FTP server"
                            class="w-full h-12 px-4
                                   rounded-xl border border-gray-300
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
                            FTP Movie Link
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
                                placeholder="https://example.com/movies"
                                class="w-full h-12 pl-10 pr-4
                                       rounded-xl border border-gray-300
                                       focus:border-indigo-500
                                       focus:ring-4
                                       focus:ring-indigo-500/10
                                       outline-none"
                            >

                        </div>

                        @error('link')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Status --}}
                    <div class="p-4 rounded-xl border border-gray-200 bg-gray-50">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-semibold text-gray-800">
                                    Movie Status
                                </p>

                                <p class="text-xs text-gray-500 mt-1">
                                    Enable this movie link for users.
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
                                    class="w-11 h-6 bg-gray-300
                                           rounded-full
                                           peer-checked:bg-indigo-600
                                           transition"
                                ></div>

                                <div
                                    class="absolute left-0.5 top-0.5
                                           w-5 h-5 bg-white
                                           rounded-full shadow
                                           transition
                                           peer-checked:translate-x-5"
                                ></div>

                            </label>

                        </div>

                    </div>

                </div>


                <div
                    class="px-6 py-4 bg-gray-50
                           border-t border-gray-200
                           flex flex-col-reverse
                           sm:flex-row sm:justify-end gap-3"
                >

                    <a
                        href="{{ route('ftp-movies.index') }}"
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
                        <i class="fa-solid fa-check mr-1"></i>
                        Save FTP Movie
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection