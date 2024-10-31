<a href="{{ route($route_name) }}" class="{{request()->routeIs($route_name) ? 'bg-white/90 text-green-700' : 'text-white'}} font-arial flex items-center p-2 font-semibold rounded-lg hover:bg-gray-100 hover:text-green-700 group" wire:navigate>
    {!! $icon !!}
    <span class="ml-3 flex-1 text-sm">{{ $label }}</span>
    @if ($count)
        <span class="flex flex-row items-center justify-center w-5 h-5 text-sm font-semibold rounded-full text-primary-800 bg-green-200 p-2">
            {{ $count }}
        </span>
    @endif
</a>
