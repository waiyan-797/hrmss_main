@props(['file' => null])

<span class="flex flex-row gap-1 mt-1">
    <input type="file"
        {!! $attributes->merge([
            'class' => "block w-full text-sm border rounded-lg cursor-pointer text-gray-700 focus:outline-none placeholder-gray-400 font-arial bg-white border-gray-300"
            ])
        !!}
    />
    @php
        $isTemporaryFile = $file && str_contains($file, sys_get_temp_dir());
    @endphp

    @if ($isTemporaryFile == null && $file)
        <a href="{{route('file', $file)}}" target="_blank" class="p-3 rounded-full text-white bg-yellow-400">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
            </svg>
        </a>
    @endif
</span>
