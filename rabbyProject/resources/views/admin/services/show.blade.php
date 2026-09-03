@extends('admin.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="flex items-center justify-between mb-6">

        <div>

            <h1 class="text-2xl font-bold text-gray-800">
                Service Details
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                View service information
            </p>

        </div>

        <a href="{{ route('services.edit', $service) }}"
           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium">
            Edit
        </a>

    </div>


    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

        <div class="divide-y divide-gray-100">

            {{-- Category --}}
            <div class="px-6 py-4">

                <div class="text-sm font-medium text-gray-500 mb-1">
                    Category
                </div>

                <div class="text-sm font-semibold text-blue-600">
                    {{ $service->category?->title ?? '-' }}
                </div>

            </div>


            {{-- Title --}}
            <div class="px-6 py-4">

                <div class="text-sm font-medium text-gray-500 mb-1">
                    Title
                </div>

                <div class="text-lg font-semibold text-gray-800">
                    {{ $service->title }}
                </div>

            </div>


            {{-- Subtitle --}}
            <div class="px-6 py-4">

                <div class="text-sm font-medium text-gray-500 mb-1">
                    Sort Code
                </div>

                <div class="text-sm text-gray-800">
                    {{ $service->sub_title ?? '-' }}
                </div>

            </div>


            {{-- Paragraph --}}
            <div class="px-6 py-4">

                <div class="text-sm font-medium text-gray-500 mb-1">
                    Paragraph
                </div>

                <div class="text-sm text-gray-700 leading-6">
                    {{ $service->paragraph ?? '-' }}
                </div>

            </div>


            {{-- Link --}}
            <div class="px-6 py-4">

                <div class="text-sm font-medium text-gray-500 mb-1">
                    Link
                </div>

                @if($service->link)

                    <a href="{{ $service->link }}"
                       target="_blank"
                       class="text-sm text-blue-600 hover:underline break-all">
                        {{ $service->link }}
                    </a>

                @else

                    <span class="text-sm text-gray-400">
                        -
                    </span>

                @endif

            </div>


            {{-- Icon --}}
            <div class="px-6 py-4">

                <div class="text-sm font-medium text-gray-500 mb-1">
                    Icon
                </div>

                @if($service->icon)

                    <div class="flex items-center gap-3">

                        <span class="text-2xl">
                            {!! $service->icon !!}
                        </span>

                        <span class="text-sm text-gray-600">
                            {{ $service->icon }}
                        </span>

                    </div>

                @else

                    <span class="text-sm text-gray-400">
                        -
                    </span>

                @endif

            </div>

        </div>

    </div>


    <div class="mt-5">

        <a href="{{ route('services.index') }}"
           class="text-sm text-gray-600 hover:text-gray-900">
            ← Back to Services
        </a>

    </div>

</div>

@endsection