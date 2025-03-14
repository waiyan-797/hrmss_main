<div x-data="{ openGroup: null, open: false }">
    <!-- Top-level button for the menu -->
    <button @click="open = !open" type="button" class="{{ collect($lists)->contains(fn($list) => request()->routeIs($list['route_name'])) ? 'bg-white/90 text-green-700' : 'text-white' }} flex items-center p-2 w-full text-base font-semibold rounded-lg transition duration-75 group hover:bg-gray-100 hover:text-green-700">
        {!! $icon !!}
        <span class="flex-1 ml-3 text-left whitespace-nowrap font-arial text-sm">{{ $label }}</span>
        <svg :class="{ 'rotate-180': open }" aria-hidden="true" class="w-5 h-5 transform transition-transform" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </button>
    
    <ul x-show="open" x-cloak x-transition class="py-2 space-y-2 font-arial text-sm text-green-700">
        @php
            $grouped = collect($lists)->groupBy('group');
        @endphp
        
        @foreach ($grouped as $group => $items)
            @if ($group !== '')
                <!-- If group is not empty, display group dropdown header -->
                <li>
                    <button @click="openGroup === '{{ $group }}' ? openGroup = null : openGroup = '{{ $group }}'" type="button" class="text-white flex items-center p-2 w-full text-base font-semibold rounded-lg transition duration-75 group hover:bg-gray-100 hover:text-green-700">
                        <span class="flex-1 ml-3 text-left whitespace-nowrap font-arial text-sm">{{ $group }}</span>
                        <svg :class="{ 'rotate-180': openGroup === '{{ $group }}' }" aria-hidden="true" class="w-5 h-5 transform transition-transform" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <ul x-show="openGroup === '{{ $group }}'" x-cloak x-transition class="py-2 space-y-2 font-arial text-sm text-green-700 pl-6">
                        @foreach ($items as $item)
                            @if ($item['route_name'] == 'sperator')
                                <div class="bg-slate-600 h-[1px] w-full"></div>
                            @else
                                <li>
                                    <a href="{{ route($item['route_name']) }}" class="{{ request()->routeIs($item['route_name']) ? 'bg-white/90 text-green-700' : 'text-white' }} flex items-center p-2 pl-11 w-full rounded-lg transition duration-75 group hover:bg-gray-100 hover:text-green-700 font-semibold" wire:navigate>{{ $item['name'] }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @else
                <!-- If group is empty, show items directly in the top-level dropdown -->
                @foreach ($items as $item)
                    @if ($item['route_name'] == 'sperator')
                        <div class="bg-slate-600 h-[1px] w-full"></div>
                    @else
                        <li>
                            <a href="{{ route($item['route_name']) }}" class="{{ request()->routeIs($item['route_name']) ? 'bg-white/90 text-green-700' : 'text-white' }} flex items-center p-2 pl-11 w-full rounded-lg transition duration-75 group hover:bg-gray-100 hover:text-green-700 font-semibold" wire:navigate>{{ $item['name'] }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
</div>
