@extends('admin.layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Categories
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Manage all categories
            </p>
        </div>

        <a href="{{ route('categories.create') }}"
           class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition">
            + Add Category
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-5 px-4 py-3 rounded-lg bg-green-50 border border-green-200 text-green-700">
            {{ session('success') }}
        </div>
    @endif


    {{-- Table Card --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">
                            #
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">
                            Title
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">
                            Subtitle
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">
                            Link
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">
                            Status
                        </th>

                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody class="bg-white divide-y divide-gray-200">

                    @forelse($categories as $category)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-800">
                                    {{ $category->title }}
                                </div>
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $category->subtitle ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-sm">

                                @if($category->link)

                                    <a href="{{ $category->link }}"
                                       target="_blank"
                                       class="text-blue-600 hover:underline">
                                        {{ $category->link }}
                                    </a>

                                @else
                                    <span class="text-gray-400">-</span>
                                @endif

                            </td>

                            <td class="px-6 py-4">

                                @if($category->status)

                                    <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                        Active
                                    </span>

                                @else

                                    <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full bg-red-100 text-red-700">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-end items-center gap-2">

                                    <a href="{{ route('categories.show', $category) }}"
                                       class="px-3 py-1.5 text-xs font-medium rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700">
                                        View
                                    </a>

                                    <a href="{{ route('categories.edit', $category) }}"
                                       class="px-3 py-1.5 text-xs font-medium rounded-lg bg-blue-100 hover:bg-blue-200 text-blue-700">
                                        Edit
                                    </a>

                                    <form action="{{ route('categories.destroy', $category) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this category?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-3 py-1.5 text-xs font-medium rounded-lg bg-red-100 hover:bg-red-200 text-red-700">
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="px-6 py-10 text-center text-gray-500">

                                No categories found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection