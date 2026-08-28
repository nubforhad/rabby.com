@extends('admin.layouts.app')

@section('title', 'Edit NET App')

@section('page-title', 'Edit NET App')

@section('content')

<div class="py-6">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Page Header --}}
        <div class="mb-6">

            <div class="flex items-center gap-3">

                <a
                    href="{{ route('net-apps.index') }}"
                    class="w-10 h-10 rounded-xl
                           bg-white border border-gray-200
                           text-gray-600
                           flex items-center justify-center
                           hover:bg-gray-50 transition"
                >
                    ←
                </a>

                <div
                    class="w-11 h-11 rounded-xl
                           bg-indigo-100
                           text-indigo-600
                           flex items-center justify-center"
                >
                    <svg
                        class="w-6 h-6"
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
                </div>

                <div>

                    <h2 class="text-2xl font-bold text-gray-800">
                        Edit NET App
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Update application information
                    </p>

                </div>

            </div>

        </div>


        {{-- Validation Errors --}}
        @if($errors->any())

            <div
                class="mb-6
                       p-4
                       rounded-xl
                       bg-red-50
                       border border-red-200
                       text-red-700"
            >

                <p class="font-semibold text-sm mb-2">
                    Please fix the following errors:
                </p>

                <ul class="list-disc list-inside text-sm space-y-1">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Form Card --}}
        <div
            class="bg-white
                   rounded-2xl
                   border border-gray-200
                   shadow-sm
                   overflow-hidden"
        >

            {{-- Card Header --}}
            <div
                class="px-6 py-5
                       bg-gray-50/70
                       border-b border-gray-200"
            >

                <h3 class="text-base font-semibold text-gray-800">
                    Application Information
                </h3>

                <p class="text-sm text-gray-500 mt-1">
                    Modify the NET App details below.
                </p>

            </div>


            {{-- Form --}}
            <form
                method="POST"
                action="{{ route('net-apps.update', $netApp->id) }}"
            >

                @csrf

                @method('PUT')


                <div class="p-6 space-y-6">


                    {{-- Icon + Title --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                        {{-- Icon --}}
                        <div>

                            <label
                                for="icon"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                App Icon
                            </label>

                            <div class="relative">

                                <div
                                    class="absolute left-3 top-1/2
                                           -translate-y-1/2
                                           w-9 h-9
                                           rounded-lg
                                           bg-indigo-50
                                           flex items-center
                                           justify-center
                                           text-lg"
                                >
                                    {{ old('icon', $netApp->icon ?: '📱') }}
                                </div>

                                <input
                                    type="text"
                                    id="icon"
                                    name="icon"
                                    value="{{ old('icon', $netApp->icon) }}"
                                    placeholder="📊"
                                    class="w-full h-12
                                           pl-14 pr-4
                                           rounded-xl
                                           border border-gray-300
                                           bg-white
                                           text-gray-800
                                           placeholder-gray-400
                                           shadow-sm
                                           outline-none
                                           transition
                                           focus:border-indigo-500
                                           focus:ring-4
                                           focus:ring-indigo-500/10"
                                >

                            </div>

                            @error('icon')

                                <p class="mt-1.5 text-sm text-red-600">
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
                                Title
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">

                                <div
                                    class="absolute left-3 top-1/2
                                           -translate-y-1/2
                                           text-gray-400"
                                >

                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7 8h10M7 12h10M7 16h6"
                                        />
                                    </svg>

                                </div>

                                <input
                                    type="text"
                                    id="title"
                                    name="title"
                                    value="{{ old('title', $netApp->title) }}"
                                    required
                                    placeholder="Dashboard"
                                    class="w-full h-12
                                           pl-11 pr-4
                                           rounded-xl
                                           border border-gray-300
                                           bg-white
                                           text-gray-800
                                           placeholder-gray-400
                                           shadow-sm
                                           outline-none
                                           transition
                                           focus:border-indigo-500
                                           focus:ring-4
                                           focus:ring-indigo-500/10"
                                >

                            </div>

                            @error('title')

                                <p class="mt-1.5 text-sm text-red-600">
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

                        <div class="relative">

                            <div
                                class="absolute left-3 top-1/2
                                       -translate-y-1/2
                                       text-gray-400"
                            >

                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h10"
                                    />
                                </svg>

                            </div>

                            <input
                                type="text"
                                id="sub_title"
                                name="sub_title"
                                value="{{ old('sub_title', $netApp->sub_title) }}"
                                placeholder="Admin Dashboard"
                                class="w-full h-12
                                       pl-11 pr-4
                                       rounded-xl
                                       border border-gray-300
                                       bg-white
                                       text-gray-800
                                       placeholder-gray-400
                                       shadow-sm
                                       outline-none
                                       transition
                                       focus:border-indigo-500
                                       focus:ring-4
                                       focus:ring-indigo-500/10"
                            >

                        </div>

                        @error('sub_title')

                            <p class="mt-1.5 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Status --}}
                    <div
                        class="p-4
                               rounded-xl
                               border border-gray-200
                               bg-gray-50"
                    >

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm font-semibold text-gray-800">
                                    Application Status
                                </p>

                                <p class="text-xs text-gray-500 mt-1">
                                    Enable or disable this application.
                                </p>

                            </div>


                            <label
                                class="relative inline-flex
                                       items-center
                                       cursor-pointer
                                       flex-shrink-0"
                            >

                                <input
                                    type="checkbox"
                                    name="status"
                                    value="1"
                                    {{ old('status', $netApp->status) ? 'checked' : '' }}
                                    class="sr-only peer"
                                >

                                <div
                                    class="w-11 h-6
                                           bg-gray-300
                                           rounded-full
                                           peer-checked:bg-indigo-600
                                           transition"
                                ></div>

                                <div
                                    class="absolute
                                           left-0.5 top-0.5
                                           w-5 h-5
                                           bg-white
                                           rounded-full
                                           shadow
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
                        href="{{ route('net-apps.index') }}"
                        class="inline-flex items-center
                               justify-center
                               px-5 py-2.5
                               rounded-xl
                               border border-gray-300
                               bg-white
                               text-gray-700
                               text-sm font-semibold
                               hover:bg-gray-50
                               transition"
                    >
                        Cancel
                    </a>


                    <button
                        type="submit"
                        class="inline-flex items-center
                               justify-center
                               gap-2
                               px-5 py-2.5
                               rounded-xl
                               bg-indigo-600
                               text-white
                               text-sm font-semibold
                               hover:bg-indigo-700
                               transition"
                    >

                        <svg
                            class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linecap="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>

                        Update NET App

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
