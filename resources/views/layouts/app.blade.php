<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="docs-page d-flex flex-row flex-column-fluid">
        {{-- @include('layout/docs/_aside') --}}

        <!--begin::Wrapper-->
            <div class="docs-wrapper d-flex flex-column flex-row-fluid" id="kt_docs_wrapper">
                @if (isset($header))
                <header class="bg-green-700 shadow h-[8vh] flex items-center">
                    <div class="w-4/5 mx-auto py-4 px-6 flex justify-end items-center gap-3">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!--begin::Content-->
                <div class="docs-content d-flex flex-column flex-column-fluid" id="kt_docs_content">
                    {{ $slot }}
                </div>

                
5q
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>


</html>
