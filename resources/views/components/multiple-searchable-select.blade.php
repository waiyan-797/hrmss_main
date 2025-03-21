@props(['values', 'property', 'isHighNeeded' => false])

<div 
:class="open && isHighNeeded ? 'h-60' : ''"
x-data="{
        open: false,
        search: '',
        selectedIds: @entangle($property).live,
        values: @js($values),
        isHighNeeded: @js($isHighNeeded),
        get filteredvalues() {
            if (!this.search.trim()) return this.values;
            return this.values.filter(option => option.name.toLowerCase().includes(this.search.toLowerCase()));
        },
        toggleSelection(option) {
            if (this.selectedIds.includes(option.id)) {
                this.selectedIds = this.selectedIds.filter(id => id !== option.id);
            } else {
                this.selectedIds.push(option.id);
            }
        },
        isSelected(option) {
            return this.selectedIds.includes(option.id);
        }
    }"
>
    <div class="relative mt-2">
        <button @click="open = !open" type="button" class="relative cursor-pointer w-full text-normal border-gray-300 rounded-md bg-white py-2 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:border-sky-500 focus:ring-sky-500">
            <span class="block truncate">
                <template x-if="selectedIds.length">
                    <span>
                        <template x-for="id in selectedIds" :key="id">
                            <span x-text="values.find(option => option.id === id)?.name" class="inline-block bg-gray-200 text-gray-700 px-2 py-1 rounded mr-1"></span>
                        </template>
                    </span>
                </template>
                <template x-if="!selectedIds.length">
                    Select options
                </template>
            </span>
            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                <svg class="h-5 w-5 text-gray-800" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                </svg>
            </span>
        </button>

        <div x-show="open" @click.away="open = false" x-cloak class="absolute superZ mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg">
            <input type="text" x-model="search" placeholder="Search..." class="block w-full border-0 border-b border-gray-300 bg-white pb-2 pl-3 text-left focus:ring-0">
            <ul class="max-h-60 overflow-auto">
                <template x-for="option in filteredvalues" :key="option.id">
                    <li @click="toggleSelection(option)" class="cursor-pointer select-none py-2 pl-3 pr-9 hover:bg-gray-100 hover:text-gray-800" :class="{'bg-sky-600 text-white': isSelected(option)}">
                        <span x-text="option.name" class="font-normal block truncate"></span>
                        <span x-show="isSelected(option)" class="absolute inset-y-0 right-0 flex items-center pr-2 text-white">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.704 5.293a1 1 0 00-1.408 0L9 11.586 5.704 8.293a1 1 0 00-1.408 1.414l4 4a1 1 0 001.408 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </li>
                </template>
            </ul>
        </div>
    </div>
</div>
