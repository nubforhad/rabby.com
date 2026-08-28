@extends('admin.layouts.app')

@section('title', 'Website Settings')
@section('page-title', 'Website Settings')

@section('content')

<div class="py-6">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Page Header --}}
        <div class="mb-6">

            <h2 class="text-2xl font-bold text-gray-800">
                Website Settings
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Manage your website logo, contact information and footer details.
            </p>

        </div>


        {{-- Success Message --}}
        @if(session('success'))

            <div class="mb-6 flex items-center gap-3
                        rounded-xl border border-green-200
                        bg-green-50 px-4 py-3
                        text-sm text-green-700">

                <i class="fa-solid fa-circle-check"></i>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        {{-- Validation Errors --}}
        @if($errors->any())

            <div class="mb-6 rounded-xl border border-red-200
                        bg-red-50 px-4 py-4 text-red-700">

                <div class="flex items-center gap-2 font-semibold mb-2">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    Please fix the following errors:
                </div>

                <ul class="list-disc list-inside text-sm space-y-1">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Main Card --}}
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">


            {{-- Card Header --}}
            <div class="px-6 py-5
                        bg-gradient-to-r from-indigo-50 to-white
                        border-b border-gray-200">

                <div class="flex items-center gap-3">

                    <div
                        class="w-11 h-11 rounded-xl
                               bg-indigo-100 text-indigo-600
                               flex items-center justify-center"
                    >
                        <i class="fa-solid fa-gear text-lg"></i>
                    </div>

                    <div>

                        <h3 class="font-semibold text-gray-800">
                            General Settings
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Update your website information.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Form --}}
            <form
                method="POST"
                action="{{ route('settings.update') }}"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                <div class="p-6 space-y-8">


                    {{-- =====================================================
                         LOGO
                    ====================================================== --}}

                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Website Logo
                        </label>

                        <div class="flex flex-col sm:flex-row
                                    sm:items-center gap-5">

                            {{-- Current Logo --}}
                            <div
                                class="w-28 h-28 rounded-2xl
                                       border border-gray-200
                                       bg-gray-50
                                       flex items-center justify-center
                                       overflow-hidden"
                            >

                                @if($setting?->logo)

                                    <img
                                        id="logoPreview"
                                        src="{{ asset('storage/' . $setting->logo) }}"
                                        alt="Website Logo"
                                        class="w-full h-full object-contain p-2"
                                    >

                                @else

                                    <div
                                        id="logoPlaceholder"
                                        class="text-center text-gray-400"
                                    >
                                        <i class="fa-solid fa-image text-3xl"></i>

                                        <p class="text-xs mt-2">
                                            No Logo
                                        </p>
                                    </div>

                                    <img
                                        id="logoPreview"
                                        src=""
                                        alt="Logo Preview"
                                        class="hidden w-full h-full object-contain p-2"
                                    >

                                @endif

                            </div>


                            {{-- Upload --}}
                            <div class="flex-1">

                                <input
                                    type="file"
                                    name="logo"
                                    id="logo"
                                    accept="image/jpeg,image/png,image/webp"
                                    class="block w-full text-sm text-gray-600
                                           file:mr-4 file:py-2.5 file:px-4
                                           file:rounded-xl file:border-0
                                           file:bg-indigo-50
                                           file:text-indigo-700
                                           file:font-semibold
                                           hover:file:bg-indigo-100"
                                >

                                <p class="mt-2 text-xs text-gray-500">
                                    JPG, JPEG, PNG or WEBP. Maximum size 2MB.
                                </p>

                                @error('logo')

                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>

                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- =====================================================
                         HEADLINE
                    ====================================================== --}}

                    <div>

                        <label
                            for="headline"
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            Headline
                        </label>

                        <textarea
                            name="headline"
                            id="headline"
                            rows="4"
                            placeholder="Enter your website headline..."
                            class="w-full px-4 py-3
                                   rounded-xl border border-gray-300
                                   text-gray-700
                                   resize-none
                                   focus:border-indigo-500
                                   focus:ring-4
                                   focus:ring-indigo-500/10
                                   outline-none"
                        >{{ old('headline', $setting?->headline) }}</textarea>

                        @error('headline')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- =====================================================
                         CONTACT INFORMATION
                    ====================================================== --}}

                    <div>

                        <div class="flex items-center gap-2 mb-4">

                            <div
                                class="w-8 h-8 rounded-lg
                                       bg-blue-50 text-blue-600
                                       flex items-center justify-center"
                            >
                                <i class="fa-solid fa-address-book text-sm"></i>
                            </div>

                            <h3 class="font-semibold text-gray-800">
                                Contact Information
                            </h3>

                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                            {{-- Address --}}
                            <div class="md:col-span-2">

                                <label
                                    for="address"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Address
                                </label>

                                <textarea
                                    name="address"
                                    id="address"
                                    rows="3"
                                    placeholder="Enter your address..."
                                    class="w-full px-4 py-3
                                           rounded-xl border border-gray-300
                                           text-gray-700
                                           resize-none
                                           focus:border-indigo-500
                                           focus:ring-4
                                           focus:ring-indigo-500/10
                                           outline-none"
                                >{{ old('address', $setting?->address) }}</textarea>

                                @error('address')

                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>

                                @enderror

                            </div>


                            {{-- Mobile --}}
                            <div>

                                <label
                                    for="mobile"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Mobile
                                </label>

                                <div class="relative">

                                    <div
                                        class="absolute left-4 top-1/2
                                               -translate-y-1/2
                                               text-gray-400"
                                    >
                                        <i class="fa-solid fa-phone"></i>
                                    </div>

                                    <input
                                        type="text"
                                        name="mobile"
                                        id="mobile"
                                        value="{{ old('mobile', $setting?->mobile) }}"
                                        placeholder="+880 1XXXXXXXXX"
                                        class="w-full h-12 pl-11 pr-4
                                               rounded-xl border border-gray-300
                                               focus:border-indigo-500
                                               focus:ring-4
                                               focus:ring-indigo-500/10
                                               outline-none"
                                    >

                                </div>

                                @error('mobile')

                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>

                                @enderror

                            </div>


                            {{-- Email --}}
                            <div>

                                <label
                                    for="email"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Email
                                </label>

                                <div class="relative">

                                    <div
                                        class="absolute left-4 top-1/2
                                               -translate-y-1/2
                                               text-gray-400"
                                    >
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>

                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        value="{{ old('email', $setting?->email) }}"
                                        placeholder="info@example.com"
                                        class="w-full h-12 pl-11 pr-4
                                               rounded-xl border border-gray-300
                                               focus:border-indigo-500
                                               focus:ring-4
                                               focus:ring-indigo-500/10
                                               outline-none"
                                    >

                                </div>

                                @error('email')

                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>

                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- =====================================================
                         SOCIAL / WEBSITE
                    ====================================================== --}}

                    <div>

                        <div class="flex items-center gap-2 mb-4">

                            <div
                                class="w-8 h-8 rounded-lg
                                       bg-indigo-50 text-indigo-600
                                       flex items-center justify-center"
                            >
                                <i class="fa-solid fa-globe text-sm"></i>
                            </div>

                            <h3 class="font-semibold text-gray-800">
                                Social & Website
                            </h3>

                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                            {{-- Facebook --}}
                            <div>

                                <label
                                    for="fb_link"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Facebook Link
                                </label>

                                <div class="relative">

                                    <div
                                        class="absolute left-4 top-1/2
                                               -translate-y-1/2
                                               text-gray-400"
                                    >
                                        <i class="fa-brands fa-facebook"></i>
                                    </div>

                                    <input
                                        type="url"
                                        name="fb_link"
                                        id="fb_link"
                                        value="{{ old('fb_link', $setting?->fb_link) }}"
                                        placeholder="https://facebook.com/yourpage"
                                        class="w-full h-12 pl-11 pr-4
                                               rounded-xl border border-gray-300
                                               focus:border-indigo-500
                                               focus:ring-4
                                               focus:ring-indigo-500/10
                                               outline-none"
                                    >

                                </div>

                                @error('fb_link')

                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>

                                @enderror

                            </div>


                            {{-- Website --}}
                            <div>

                                <label
                                    for="website_link"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Website Link
                                </label>

                                <div class="relative">

                                    <div
                                        class="absolute left-4 top-1/2
                                               -translate-y-1/2
                                               text-gray-400"
                                    >
                                        <i class="fa-solid fa-link"></i>
                                    </div>

                                    <input
                                        type="url"
                                        name="website_link"
                                        id="website_link"
                                        value="{{ old('website_link', $setting?->website_link) }}"
                                        placeholder="https://example.com"
                                        class="w-full h-12 pl-11 pr-4
                                               rounded-xl border border-gray-300
                                               focus:border-indigo-500
                                               focus:ring-4
                                               focus:ring-indigo-500/10
                                               outline-none"
                                    >

                                </div>

                                @error('website_link')

                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>

                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- =====================================================
                         FOOTER
                    ====================================================== --}}

                    <div>

                        <label
                            for="footer_text"
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            Footer Text
                        </label>

                        <textarea
                            name="footer_text"
                            id="footer_text"
                            rows="4"
                            placeholder="Enter footer text..."
                            class="w-full px-4 py-3
                                   rounded-xl border border-gray-300
                                   text-gray-700
                                   resize-none
                                   focus:border-indigo-500
                                   focus:ring-4
                                   focus:ring-indigo-500/10
                                   outline-none"
                        >{{ old('footer_text', $setting?->footer_text) }}</textarea>

                        @error('footer_text')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                </div>


                {{-- Form Footer --}}
                <div
                    class="px-6 py-4
                           bg-gray-50
                           border-t border-gray-200
                           flex justify-end"
                >

                    <button
                        type="submit"
                        class="inline-flex items-center gap-2
                               px-6 py-3
                               bg-indigo-600
                               text-white
                               rounded-xl
                               text-sm font-semibold
                               shadow-sm
                               hover:bg-indigo-700
                               focus:outline-none
                               focus:ring-4
                               focus:ring-indigo-500/20
                               transition"
                    >
                        <i class="fa-solid fa-floppy-disk"></i>

                        Save Settings
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- Logo Preview --}}
<script>

    document.getElementById('logo')?.addEventListener('change', function (event) {

        const file = event.target.files[0];

        if (!file) {
            return;
        }

        const reader = new FileReader();

        reader.onload = function (e) {

            const preview = document.getElementById('logoPreview');
            const placeholder = document.getElementById('logoPlaceholder');

            preview.src = e.target.result;
            preview.classList.remove('hidden');

            if (placeholder) {
                placeholder.classList.add('hidden');
            }
        };

        reader.readAsDataURL(file);
    });

</script>

@endsection