@extends('admin.layouts.app')

@section('content')

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Edit Service
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            Update service information
        </p>

    </div>


    @if($errors->any())

        <div class="mb-5 p-4 rounded-lg bg-red-50 border border-red-200">

            <ul class="list-disc list-inside text-sm text-red-600">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('services.update', $service) }}"
          method="POST"
          class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

        @csrf
        @method('PUT')


        {{-- Category --}}
        <div class="mb-5">

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Category <span class="text-red-500">*</span>
            </label>

            <select name="category_id"
                    required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg">

                @foreach($categories as $category)

                    <option value="{{ $category->id }}"
                        {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>

                        {{ $category->title }}

                    </option>

                @endforeach

            </select>

        </div>


        {{-- Title --}}
        <div class="mb-5">

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Title <span class="text-red-500">*</span>
            </label>

            <input type="text"
                   name="title"
                   value="{{ old('title', $service->title) }}"
                   required
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg">

        </div>


        {{-- Subtitle --}}
        <div class="mb-5">

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Sort Code
            </label>

            <input type="text"
                   name="sub_title"
                   value="{{ old('sub_title', $service->sub_title) }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg">

        </div>


        {{-- Paragraph --}}
        <div class="mb-5">

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Paragraph
            </label>

            <textarea name="paragraph"
                      rows="5"
                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg">{{ old('paragraph', $service->paragraph) }}</textarea>

        </div>


        {{-- Link --}}
        <div class="mb-5">

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Link
            </label>

            <input type="text"
                   name="link"
                   value="{{ old('link', $service->link) }}"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg">

        </div>


        {{-- Icon --}}
        <div class="mb-6">

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Icon
            </label>

            <input type="text"
                   name="icon"
                   value="{{ old('icon', $service->icon) }}"
                   placeholder="fa-solid fa-globe"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg">

        </div>

        <div class="mb-6">

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Status
            </label>

            <select name="status"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg">

                <option value="1"
                    {{ old('status', $service->status) == 1 ? 'selected' : '' }}>
                    Active
                </option>

                <option value="0"
                    {{ old('status', $service->status) == 0 ? 'selected' : '' }}>
                    Inactive
                </option>

            </select>

        </div>


        <div class="flex justify-end gap-3">

            <a href="{{ route('services.index') }}"
               class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm">
                Cancel
            </a>

            <button type="submit"
                    class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium">
                Update Service
            </button>

        </div>

    </form>

</div>

@endsection