@extends('admin.layouts.app')

@section('content')

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header --}}
    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Add Category
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            Create a new category
        </p>

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="mb-5 p-4 rounded-lg bg-red-50 border border-red-200">

            <ul class="list-disc list-inside text-sm text-red-600">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    {{-- Form --}}
    <form action="{{ route('categories.store') }}"
          method="POST"
          class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

        @csrf


        {{-- Title --}}
        <div class="mb-5">

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Title <span class="text-red-500">*</span>
            </label>

            <input type="text"
                   name="title"
                   value="{{ old('title') }}"
                   required
                   placeholder="Enter category title"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

        </div>


        {{-- Subtitle --}}
        <div class="mb-5">

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Subtitle
            </label>

            <input type="text"
                   name="subtitle"
                   value="{{ old('subtitle') }}"
                   placeholder="Enter category subtitle"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

        </div>


        {{-- Link --}}
        <div class="mb-5">

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Link
            </label>

            <input type="text"
                   name="link"
                   value="{{ old('link') }}"
                   placeholder="https://example.com"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

        </div>


        {{-- Status --}}
        <div class="mb-6">

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Status
            </label>

            <select name="status"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>
                    Active
                </option>

                <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>
                    Inactive
                </option>

            </select>

        </div>


        {{-- Buttons --}}
        <div class="flex items-center justify-end gap-3">

            <a href="{{ route('categories.index') }}"
               class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium">
                Cancel
            </a>

            <button type="submit"
                    class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium">
                Save Category
            </button>

        </div>

    </form>

</div>

@endsection