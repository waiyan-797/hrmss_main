<div x-data="{ open: false }">
    <button @click="open = !open" type="button" class="{{collect($lists)->contains(fn($list) => request()->routeIs($list['route_name'])) ? 'bg-blue-100' : ''}} flex items-center p-2 w-full text-base font-normal text-blue-700 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
        {!! $icon !!}
        <span class="flex-1 ml-3 text-left whitespace-nowrap font-arial text-sm">{{ $label }}</span>
        <svg :class="{ 'rotate-180': open }" aria-hidden="true" class="w-5 h-5 transform transition-transform" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </button>
    <ul x-show="open" x-cloak x-transition class="py-2 space-y-2 font-arial text-sm text-blue-700">
        @foreach ($lists as $list)
            <li>
                <a href="{{ route($list['route_name']) }}" class="{{request()->routeIs($list['route_name']) ? 'bg-blue-100' : ''}} flex items-center p-2 pl-11 w-full font-normal rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" wire:navigate>{{ $list['name'] }}</a>
            </li>
        @endforeach
    </ul>
</div>
