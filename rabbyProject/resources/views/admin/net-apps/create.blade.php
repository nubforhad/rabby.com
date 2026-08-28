@extends('admin.layouts.app')

@section('title', 'Add NET App')

@section('page-title', 'Add NET App')

@section('content')

<div class="py-6">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- =========================
            PAGE HEADER
        ========================== --}}
        <div class="mb-6">

            <div class="flex items-center gap-3">

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
                            d="M12 6v12m6-6H6"
                        />
                    </svg>
                </div>

                <div>

                    <h2 class="text-2xl font-bold text-gray-800">
                        Add NET App
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Create a new application for your system
                    </p>

                </div>

            </div>

        </div>


        {{-- =========================
            FORM CARD
        ========================== --}}
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
                       border-b border-gray-200
                       bg-gray-50/70"
            >

                <h3 class="text-base font-semibold text-gray-800">
                    Application Information
                </h3>

                <p class="mt-1 text-sm text-gray-500">
                    Enter the basic information of the NET App.
                </p>

            </div>


            {{-- Form --}}
            <form
                method="POST"
                action="{{ route('net-apps.store') }}"
            >

                @csrf


                <div class="p-6 space-y-6">


                    {{-- =========================
                        ICON + TITLE
                    ========================== --}}
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

                                {{-- Icon Preview --}}
                                <div
                                    class="absolute left-3 top-1/2
                                           -translate-y-1/2
                                           w-9 h-9
                                           rounded-lg
                                           bg-indigo-50
                                           text-indigo-600
                                           flex items-center
                                           justify-center
                                           text-lg"
                                >
                                    {{ old('icon', '📱') }}
                                </div>

                                <input
                                    type="text"
                                    id="icon"
                                    name="icon"
                                    value="{{ old('icon') }}"
                                    placeholder="📊"
                                    class="w-full
                                           h-12
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

                            <p class="mt-2 text-xs text-gray-500">
                                Enter an emoji or icon.
                            </p>

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
                                    value="{{ old('title') }}"
                                    required
                                    placeholder="Dashboard"
                                    class="w-full
                                           h-12
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


                    {{-- =========================
                        SUB TITLE
                    ========================== --}}
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
                                value="{{ old('sub_title') }}"
                                placeholder="Admin Dashboard"
                                class="w-full
                                       h-12
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

                        <p class="mt-2 text-xs text-gray-500">
                            A short description for this application.
                        </p>

                        @error('sub_title')

                            <p class="mt-1.5 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- =========================
                        STATUS
                    ========================== --}}
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
                                    Enable this app to make it available in the system.
                                </p>

                            </div>


                            {{-- Toggle --}}
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
                                    {{ old('status', true) ? 'checked' : '' }}
                                    class="sr-only peer"
                                >

                                <div
                                    class="w-11 h-6
                                           bg-gray-300
                                           rounded-full
                                           peer
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


                {{-- =========================
                    FORM FOOTER
                ========================== --}}
                <div
                    class="px-6 py-4
                           bg-gray-50
                           border-t border-gray-200
                           flex flex-col-reverse
                           sm:flex-row
                           sm:justify-end
                           gap-3"
                >

                    {{-- Cancel --}}
                    <a
                        href="{{ route('net-apps.index') }}"
                        class="inline-flex
                               items-center
                               justify-center
                               px-5 py-2.5
                               rounded-xl
                               border border-gray-300
                               bg-white
                               text-gray-700
                               text-sm
                               font-semibold
                               hover:bg-gray-50
                               transition"
                    >
                        Cancel
                    </a>


                    {{-- Save --}}
                    <button
                        type="submit"
                        class="inline-flex
                               items-center
                               justify-center
                               gap-2
                               px-5 py-2.5
                               rounded-xl
                               bg-indigo-600
                               text-white
                               text-sm
                               font-semibold
                               shadow-sm
                               hover:bg-indigo-700
                               focus:outline-none
                               focus:ring-4
                               focus:ring-indigo-500/20
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
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>

                        Save NET App

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
