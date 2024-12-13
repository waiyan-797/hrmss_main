<div 
    x-data="{
        open: false,
        search: '',
        selected: @entangle($property).live || [], // Two-way binding for Livewire
        options: @js($values),
        isHighNeeded: @js($isHighNeeded),

        // Filtered options based on search input
        get filteredOptions() {
            if (!this.search.trim()) return this.options;
            return this.options.filter(option => option.name.toLowerCase().includes(this.search.toLowerCase()));
        },

        // Get selected option names
        get selectedLabels() {
            return this.options
                .filter(option => this.selected.includes(option.id))
                .map(option => option.name);
        },

        // Toggle selection of an option
        toggleOption(option) {
            if (this.selected.includes(option.id)) {
                this.selected = this.selected.filter(id => id !== option.id); // Remove if already selected
            } else {
                this.selected.push(option.id); // Add if not selected
            }
        }
    }"
    class="relative {{ $class }}"
    :class="{ 'h-60': open && isHighNeeded }"
>
    <!-- Button to toggle dropdown -->
    <button 
        @click="open = !open" 
        class="w-full text-normal border-gray-300 rounded-md bg-white py-2 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:border-sky-500 focus:ring-sky-500"
    >
        <span class="block truncate" x-text="selectedLabels.length ? selectedLabels.join(', ') : '{{ $placeholder }}'"></span>
        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
            <svg class="h-5 w-5 text-gray-800" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
            </svg>
        </span>
    </button>

    <!-- Dropdown -->
    <div 
        x-show="open" 
        @click.away="open = false" 
        x-cloak 
        class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg"
    >
        <!-- Search box -->
        <input 
            type="text" 
            x-model="search" 
            placeholder="Search..." 
            class="block w-full border-0 border-b border-gray-300 pb-2 pl-3 focus:ring-0"
        >

        <!-- Options list -->
        <ul class="max-h-60 overflow-auto">
            <template x-for="option in filteredOptions" :key="option.id">
                <li 
                    @click="toggleOption(option)" 
                    class="cursor-pointer select-none py-2 pl-3 pr-9 hover:bg-gray-100" 
                    :class="{'bg-sky-600 text-white': selected.includes(option.id)}"
                >
                    <span x-text="option.name" class="block truncate"></span>
                </li>
            </template>
        </ul>
    </div>
</div>
