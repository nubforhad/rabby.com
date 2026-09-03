@extends('admin.layouts.app')

@section('title', 'Add Notice')

@section('page-title', 'Add Notice')

@section('content')

<div class="max-w-4xl mx-auto px-3 sm:px-4 lg:px-6 py-4 sm:py-6">

    {{-- Header --}}
    <div class="mb-6">

        <div class="flex items-center gap-3">

            <a href="{{ route('admin.notices.index') }}"
               class="w-9 h-9 flex items-center justify-center
                      rounded-lg bg-slate-100
                      text-slate-600 hover:bg-slate-200">

                <i class="bi bi-arrow-left"></i>

            </a>

            <div>

                <h1 class="text-2xl font-bold text-slate-800">
                    Add Notice
                </h1>

                <p class="text-sm text-slate-500 mt-1">
                    Create a new notice
                </p>

            </div>

        </div>

    </div>


    {{-- Form --}}
    <form action="{{ route('admin.notices.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf


        <div class="bg-white border border-slate-200
                    rounded-xl shadow-sm overflow-hidden">

            {{-- Form Header --}}
            <div class="px-5 py-4 bg-slate-50
                        border-b border-slate-200">

                <h2 class="font-semibold text-slate-800">
                    Notice Information
                </h2>

                <p class="text-xs text-slate-500 mt-1">
                    Enter notice details below
                </p>

            </div>


            <div class="p-5 space-y-5">

                {{-- Name --}}
                <div>
                    <label for="name"  class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Name
                        <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        required
                        placeholder="Enter notice name"
                        class="w-full rounded-lg border border-slate-300
                               px-3 py-2.5 text-sm
                               focus:border-blue-500 focus:ring-2
                               focus:ring-blue-100 outline-none"
                    >

                    @error('name')
                        <p class="text-xs text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- Title --}}
                <div>

                    <label for="title"
                           class="block text-sm font-semibold text-slate-700 mb-1.5">

                        Title
                        <span class="text-red-500">*</span>

                    </label>

                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title') }}"
                        required
                        placeholder="Enter notice title"
                        class="w-full rounded-lg border border-slate-300
                               px-3 py-2.5 text-sm
                               focus:border-blue-500 focus:ring-2
                               focus:ring-blue-100 outline-none"
                    >

                    @error('title')
                        <p class="text-xs text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Subtitle --}}
                <div>

                    <label for="subtitle"
                           class="block text-sm font-semibold text-slate-700 mb-1.5">

                        Subtitle

                    </label>

                    <input
                        type="text"
                        name="subtitle"
                        id="subtitle"
                        value="{{ old('subtitle') }}"
                        placeholder="Enter notice subtitle"
                        class="w-full rounded-lg border border-slate-300
                               px-3 py-2.5 text-sm
                               focus:border-blue-500 focus:ring-2
                               focus:ring-blue-100 outline-none"
                    >

                    @error('subtitle')
                        <p class="text-xs text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Notice Text --}}
                <div>

                    <label for="notice_text"
                           class="block text-sm font-semibold text-slate-700 mb-1.5">

                        Notice Text

                    </label>

                    <textarea
                        name="notice_text"
                        id="notice_text"
                        rows="6"
                        placeholder="Write notice details..."
                        class="w-full rounded-lg border border-slate-300
                               px-3 py-2.5 text-sm
                               focus:border-blue-500 focus:ring-2
                               focus:ring-blue-100 outline-none resize-y"
                    >{{ old('notice_text') }}</textarea>

                    @error('notice_text')
                        <p class="text-xs text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Link --}}
                <div>

                    <label for="link"
                           class="block text-sm font-semibold text-slate-700 mb-1.5">

                        Link

                    </label>

                    <input
                        type="url"
                        name="link"
                        id="link"
                        value="{{ old('link') }}"
                        placeholder="https://example.com"
                        class="w-full rounded-lg border border-slate-300
                               px-3 py-2.5 text-sm
                               focus:border-blue-500 focus:ring-2
                               focus:ring-blue-100 outline-none"
                    >

                    <p class="text-xs text-slate-400 mt-1">
                        Optional. Enter a valid URL.
                    </p>

                    @error('link')
                        <p class="text-xs text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Sort + Status --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                    {{-- Sort Code --}}
                    <div>

                        <label for="sort_code"
                               class="block text-sm font-semibold text-slate-700 mb-1.5">

                            Sort Code

                        </label>

                        <input
                            type="number"
                            name="sort_code"
                            id="sort_code"
                            value="{{ old('sort_code', 0) }}"
                            min="0"
                            class="w-full rounded-lg border border-slate-300
                                   px-3 py-2.5 text-sm
                                   focus:border-blue-500 focus:ring-2
                                   focus:ring-blue-100 outline-none"
                        >

                        <p class="text-xs text-slate-400 mt-1">
                            Lower number will appear first.
                        </p>

                        @error('sort_code')
                            <p class="text-xs text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Status --}}
                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                            Status
                        </label>

                        <label class="relative inline-flex items-center cursor-pointer">

                            <input
                                type="checkbox"
                                name="status"
                                value="1"
                                class="sr-only peer"
                                {{ old('status', 1) ? 'checked' : '' }}
                            >

                            <div class="w-11 h-6 bg-slate-300
                                        rounded-full peer
                                        peer-checked:bg-blue-600
                                        after:content-['']
                                        after:absolute
                                        after:top-[2px]
                                        after:left-[2px]
                                        after:bg-white
                                        after:border-gray-300
                                        after:border
                                        after:rounded-full
                                        after:h-5 after:w-5
                                        after:transition-all
                                        peer-checked:after:translate-x-full
                                        peer-checked:after:border-white">
                            </div>

                            <span class="ml-3 text-sm text-slate-600">
                                Active
                            </span>

                        </label>

                    </div>

                </div>


                {{-- Image --}}
                <div>

                    <label for="image"
                           class="block text-sm font-semibold text-slate-700 mb-1.5">

                        Notice Image

                    </label>

                    <input
                        type="file"
                        name="image"
                        id="image"
                        accept="image/jpeg,image/png,image/jpg,image/webp"
                        class="block w-full text-sm text-slate-600
                               file:mr-4 file:py-2.5 file:px-4
                               file:rounded-lg file:border-0
                               file:bg-blue-50 file:text-blue-700
                               file:font-semibold
                               hover:file:bg-blue-100"
                    >

                    <p class="text-xs text-slate-400 mt-1">
                        JPG, JPEG, PNG or WEBP. Maximum 2MB.
                    </p>

                    @error('image')
                        <p class="text-xs text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                    {{-- Preview --}}
                    <div id="imagePreview" class="mt-3 hidden">

                        <img id="preview"
                             src=""
                             class="w-32 h-32 object-cover
                                    rounded-lg border border-slate-200">

                    </div>

                </div>

            </div>


            {{-- Footer --}}
            <div class="px-5 py-4 bg-slate-50
                        border-t border-slate-200
                        flex flex-col sm:flex-row
                        justify-end gap-3">

                <a href="{{ route('admin.notices.index') }}"
                   class="inline-flex items-center justify-center
                          gap-2 px-4 py-2.5
                          rounded-lg bg-white
                          border border-slate-300
                          text-slate-700
                          text-sm font-semibold
                          hover:bg-slate-100">

                    Cancel

                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center
                           gap-2 px-5 py-2.5
                           rounded-lg bg-blue-600
                           text-white text-sm font-semibold
                           hover:bg-blue-700 transition">

                    <i class="bi bi-check-lg"></i>
                    Save Notice

                </button>

            </div>

        </div>

    </form>

</div>


{{-- Image Preview Script --}}
<script>
    document.getElementById('image').addEventListener('change', function (event) {

        const file = event.target.files[0];
        const previewBox = document.getElementById('imagePreview');
        const preview = document.getElementById('preview');

        if (file) {

            preview.src = URL.createObjectURL(file);
            previewBox.classList.remove('hidden');

        } else {

            preview.src = '';
            previewBox.classList.add('hidden');

        }

    });
</script>

@endsection