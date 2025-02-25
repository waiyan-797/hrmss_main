{{-- @props(['values', 'property', 'placeholder'=>null])

<div x-data="{
        open: false,
        search: '',
        placeholder: @js($placeholder),
        selectedId: @entangle($property).live,
        options: @js($values),
        dropdownStyles: '',
        get filteredOptions() {
            if (!this.search.trim()) return this.options;
            return this.options.filter(option => option.name.toLowerCase().includes(this.search.toLowerCase()));
        },
        get selectedOption() {
            if (!this.selectedId) return null;
            return this.options.find(option => option.id === this.selectedId);
        },
        selectOption(option) {
            this.selectedId = (option == '') ? option : option.id;
            this.open = false;
        },
        setDropdownPosition(button) {
            const rect = button.getBoundingClientRect();
            this.dropdownStyles = `top: ${rect.bottom}px; left: ${rect.left}px; width: ${rect.width}px;`;
        }
    }"
    @resize.window="open && setDropdownPosition($refs.button)"
>
    <div class="relative">
        <button x-ref="button" @click="open = !open; open && setDropdownPosition($refs.button)" type="button"
            {!! $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 p-2.5 font-arial cursor-pointer']) !!}>
            <span class="block truncate" x-text="selectedOption ? selectedOption.name : placeholder"></span>
            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                <svg class="h-5 w-5 text-gray-800" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                </svg>
            </span>
        </button>
    </div>
    <div x-show="open" @click.away="open = false" x-cloak class="fixed z-50 max-h-40 overflow-auto rounded-md bg-white py-1 text-sm shadow-lg" :style="dropdownStyles">
        <input type="text" x-model="search" placeholder="Search..." class="font-arial block w-full border-0 border-b border-gray-300 bg-white pb-2 pl-3 text-left focus:ring-0">
        <ul class="max-h-60 overflow-auto font-arial">
            <li @click="selectOption('')" class="cursor-pointer select-none py-2 pl-3 pr-9 hover:bg-gray-100 hover:text-gray-800" :class="{'bg-sky-600 text-white': selectedOption == ''}">
                <span class="font-normal block truncate">Select...</span>
            </li>
            <template x-for="option in filteredOptions" :key="option.id">
                <li @click="selectOption(option)" class="cursor-pointer select-none py-2 pl-3 pr-9 hover:bg-gray-100 hover:text-gray-800" :class="{'bg-sky-600 text-white': selectedOption && selectedOption.id === option.id}">
                    <span x-text="option.name" class="font-normal block truncate"></span>
                </li>
            </template>
        </ul>
    </div>
</div> --}}



@props(['values', 'property', 'placeholder' => null])

<div x-data="{
        open: false,
        search: '',
        placeholder: @js($placeholder),
        selectedId: @entangle($property).live,
        options: @js($values),
        dropdownStyles: '',
        get filteredOptions() {
            if (!this.search.trim()) return this.options;
            return this.options.filter(option => option.name.toLowerCase().includes(this.search.toLowerCase()));
        },
        get selectedOption() {
            if (!this.selectedId) return null;
            return this.options.find(option => option.id === this.selectedId);
        },
        selectOption(option) {
            this.selectedId = (option === '') ? option : option.id;
            this.open = false;
        },
        setDropdownPosition(button) {
            const rect = button.getBoundingClientRect();
            this.dropdownStyles = `top: ${rect.bottom}px; left: ${rect.left}px; width: ${rect.width}px;`;
        },
        debounce(func, wait) {
            let timeout;
            return function(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        },
        handleSearch: null,
        init() {
            this.handleSearch = this.debounce(() => {
                this.filteredOptions = this.filteredOptions();
            }, 300);
        },
    }"
    @resize.window="open && setDropdownPosition($refs.button)"
    x-init="init"
>
    <div class="relative">
        <button x-ref="button" @click="open = !open; open && setDropdownPosition($refs.button)" type="button"
            {!! $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 p-2.5 font-arial cursor-pointer']) !!}>
            <span class="block truncate text-start" x-text="selectedOption ? selectedOption.name : placeholder"></span>
            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                <svg class="h-5 w-5 text-gray-800" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                </svg>
            </span>
        </button>
    </div>
    <div x-show="open" @click.away="open = false" x-cloak class="fixed z-50 max-h-40 overflow-auto rounded-md bg-white py-1 text-sm shadow-lg" :style="dropdownStyles">
        <input type="text" x-model="search" @input="handleSearch" placeholder="Search..." class=" font-arial block w-full border-0 border-b border-gray-300 bg-white pb-2 pl-3 text-left focus:ring-0">
        <ul class="max-h-60 overflow-auto font-arial">
            <li @click="selectOption('')" class="cursor-pointer select-none py-2 pl-3 pr-9 hover:bg-gray-100 hover:text-gray-800" :class="{'bg-sky-600 text-white': selectedOption == ''}">
                <span class="font-normal block truncate text-left">Select...</span>
            </li>
            <template x-for="option in filteredOptions.slice(0, 10)" :key="option.id">
                <li @click="selectOption(option)" class="cursor-pointer flex justify-start select-none py-2 pl-3 pr-9 hover:bg-gray-100 hover:text-gray-800" :class="{'bg-sky-600 text-white': selectedOption && selectedOption.id === option.id}">
                    <span x-text="option.name" class="font-normal text-center block truncate"></span>
                </li>
            </template>
        </ul>
    </div>
</div>
