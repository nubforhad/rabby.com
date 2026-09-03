@extends('admin.layouts.app')

@section('title', 'Notice Details')

@section('page-title', 'Notice Details')

@section('content')

<div class="max-w-4xl mx-auto px-3 sm:px-4 lg:px-6 py-4 sm:py-6">

    {{-- Header --}}
    <div class="mb-6">

        <div class="flex flex-col sm:flex-row
                    sm:items-center sm:justify-between gap-4">

            <div class="flex items-center gap-3">

                <a href="{{ route('admin.notices.index') }}"
                   class="w-9 h-9 flex items-center justify-center
                          rounded-lg bg-slate-100
                          text-slate-600 hover:bg-slate-200">

                    <i class="bi bi-arrow-left"></i>

                </a>

                <div>

                    <h1 class="text-2xl font-bold text-slate-800">
                        Notice Details
                    </h1>

                    <p class="text-sm text-slate-500 mt-1">
                        View notice information
                    </p>

                </div>

            </div>


            <a href="{{ route('admin.notices.edit', $notice) }}"
               class="inline-flex items-center justify-center
                      gap-2 px-4 py-2.5
                      rounded-lg bg-blue-600
                      text-white text-sm font-semibold
                      hover:bg-blue-700">

                <i class="bi bi-pencil-square"></i>
                Edit Notice

            </a>

        </div>

    </div>


    {{-- Notice Card --}}
    <div class="bg-white border border-slate-200
                rounded-xl shadow-sm overflow-hidden">

        {{-- Image --}}
        @if($notice->image)

            <div class="bg-slate-50 border-b border-slate-200 p-5">

                <img
                    src="{{ asset('storage/' . $notice->image) }}"
                    alt="{{ $notice->title }}"
                    class="w-full max-h-[400px] object-contain rounded-lg"
                >

            </div>

        @endif


        <div class="p-5">

            {{-- Title --}}
            <div class="mb-5">

                <div class="flex flex-wrap items-center gap-2 mb-2">

                    @if($notice->status)

                        <span class="inline-flex items-center gap-1.5
                                     px-2.5 py-1 rounded-full
                                     bg-green-50 text-green-700
                                     border border-green-200
                                     text-xs font-semibold">

                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                            Active

                        </span>

                    @else

                        <span class="inline-flex items-center gap-1.5
                                     px-2.5 py-1 rounded-full
                                     bg-red-50 text-red-700
                                     border border-red-200
                                     text-xs font-semibold">

                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                            Inactive

                        </span>

                    @endif


                    <span class="px-2.5 py-1 rounded-full
                                 bg-slate-100 text-slate-600
                                 text-xs font-semibold">

                        Sort: {{ $notice->sort_code }}

                    </span>

                </div>


                <h2 class="text-2xl font-bold text-slate-800">
                    {{ $notice->title }}
                </h2>


                @if($notice->subtitle)

                    <p class="text-sm text-slate-500 mt-2">
                        {{ $notice->subtitle }}
                    </p>

                @endif

            </div>


            {{-- Notice Text --}}
            @if($notice->notice_text)

                <div class="border-t border-slate-100 pt-5">

                    <h3 class="text-sm font-semibold text-slate-700 mb-3">
                        Notice
                    </h3>

                    <div class="text-sm text-slate-600
                                leading-7 whitespace-pre-line">

                        {{ $notice->notice_text }}

                    </div>

                </div>

            @endif


            {{-- Link --}}
            @if($notice->link)

                <div class="border-t border-slate-100
                            mt-5 pt-5">

                    <h3 class="text-sm font-semibold text-slate-700 mb-2">
                        Related Link
                    </h3>

                    <a href="{{ $notice->link }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-flex items-center gap-2
                              text-sm text-blue-600
                              hover:text-blue-700
                              break-all">

                        <i class="bi bi-box-arrow-up-right"></i>

                        {{ $notice->link }}

                    </a>

                </div>

            @endif


            {{-- Date --}}
            <div class="border-t border-slate-100
                        mt-5 pt-5">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <div>

                        <p class="text-xs text-slate-400">
                            Created At
                        </p>

                        <p class="text-sm text-slate-700 mt-1">
                            {{ $notice->created_at?->format('d M Y, h:i A') }}
                        </p>

                    </div>


                    <div>

                        <p class="text-xs text-slate-400">
                            Last Updated
                        </p>

                        <p class="text-sm text-slate-700 mt-1">
                            {{ $notice->updated_at?->format('d M Y, h:i A') }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection