@extends('admin.layouts.app')

@section('content')

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">

        <div>

            <h1 class="text-2xl font-bold text-gray-800">
                Category Details
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                View category information
            </p>

        </div>

        <a href="{{ route('categories.edit', $category) }}"
           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium">
            Edit
        </a>

    </div>


    {{-- Details --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

        <div class="divide-y divide-gray-100">

            <div class="px-6 py-4 flex justify-between gap-4">

                <span class="text-sm font-medium text-gray-500">
                    Title
                </span>

                <span class="text-sm font-semibold text-gray-800">
                    {{ $category->title }}
                </span>

            </div>


            <div class="px-6 py-4 flex justify-between gap-4">

                <span class="text-sm font-medium text-gray-500">
                    Subtitle
                </span>

                <span class="text-sm text-gray-800">
                    {{ $category->subtitle ?? '-' }}
                </span>

            </div>


            <div class="px-6 py-4 flex justify-between gap-4">

                <span class="text-sm font-medium text-gray-500">
                    Link
                </span>

                @if($category->link)

                    <a href="{{ $category->link }}"
                       target="_blank"
                       class="text-sm text-blue-600 hover:underline break-all">
                        {{ $category->link }}
                    </a>

                @else

                    <span class="text-sm text-gray-400">
                        -
                    </span>

                @endif

            </div>


            <div class="px-6 py-4 flex justify-between gap-4">

                <span class="text-sm font-medium text-gray-500">
                    Status
                </span>

                @if($category->status)

                    <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                        Active
                    </span>

                @else

                    <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full bg-red-100 text-red-700">
                        Inactive
                    </span>

                @endif

            </div>


            <div class="px-6 py-4 flex justify-between gap-4">

                <span class="text-sm font-medium text-gray-500">
                    Created
                </span>

                <span class="text-sm text-gray-800">
                    {{ $category->created_at?->format('d M Y, h:i A') }}
                </span>

            </div>

        </div>

    </div>


    {{-- Back --}}
    <div class="mt-5">

        <a href="{{ route('categories.index') }}"
           class="text-sm text-gray-600 hover:text-gray-900">
            ← Back to Categories
        </a>

    </div>

</div>

@endsection