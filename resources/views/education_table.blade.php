<div class="w-full overflow-x-auto">
    <table class="w-full text-sm rounded-lg table-auto">
        <thead class="text-xs font-semibold text-center text-gray-900 uppercase font-arial bg-gray-50">
            <tr>
                @foreach ($column_names as $index => $name)
                    <th scope="col" class="px-4 py-2 min-w-[120px] text-gray-700">
                        <span class="flex flex-row items-center gap-1">
                            <span>{{ $name }}</span>
                            <span>
                                @if ($data_master_add_stats[$index] != null && auth()->user()->role_id == 2)
                                    <button wire:click='add_master("{{$data_master_add_stats[$index]}}")' type="button" class="inline-flex items-center p-1 text-sm font-medium text-center text-green-500 bg-transparent border border-gray-300 rounded-full hover:bg-green-200 hover:text-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 dark:text-green-800 dark:border-gray-200 dark:hover:text-green-700 dark:focus:ring-green-700 dark:hover:bg-green-200 dark:bg-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 h-3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        <span class="sr-only">Add Icon</span>
                                    </button>
                                @endif
                            </span>
                        </span>
                    </th>
                @endforeach
                <th scope="col" class="px-4 py-2 min-w-[80px] text-gray-700">လုပ်ဆောင်ချက်</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($column_vals as $index => $val)
                <tr class="bg-white border-b font-arial dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    @foreach ($column_types as $type)

                        <td class="px-4 py-4 min-w-[300px] text-gray-500 dark:text-gray-300">
                            @if ($type['type'] == 'select')
                                @if ($type['next_col_update'] && !is_string($type['select_values']))
                                <div x-data="{
                                    open: false,
                                    searchQuery: '',
                                    selectedOption: @entangle($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key']),
                                    filteredOptions: [],

                                    triggerSearch() {
                                        if (this.searchQuery.length >= 3) {
                                            $wire.call('searchOptions', this.searchQuery, '{{ $type['wire_array_key'] }}').then(result => {

                                                console.log('triggerSearch result', result); // Debug log
                                                this.filteredOptions = result || [];


                                            });
                                        } else {
                                            this.filteredOptions = [];
                                        }
                                    },

                                    fetchDependentData() {
                                        if ('{{ $type['next_col_update'] }}' && this.selectedOption) {
                                            $wire.call('handleCustomColumnUpdate',
                                                '{{ $type['wire_array_name'] }}',
                                                {{ $index }},
                                                '{{ $type['next_col_update'] }}',
                                                '{{ $type['ini_array'] }}',
                                                this.selectedOption,
                                                '{{ $type['next_col_model'] }}',
                                                '{{ $type['next_col_model_related'] }}'
                                            );
                                        }
                                    },

                                    init() {
                                        this.$watch('searchQuery', () => this.triggerSearch());
                                        this.$watch('selectedOption', (value) => {
                                            if (value) {
                                                this.fetchDependentData();
                                            }
                                        });

                                        window.addEventListener('searchResultsUpdated', event => {
                                            console.log('dfdsfsdffdfdf');
                                            if(event.detail.field === '{{ $type['wire_array_key'] }}') {
                                                console.log('Received searchResultsUpdated event', event.detail.results); // Debug log
                                                this.filteredOptions = event.detail.results || [];
                                                console.log('Updated filteredOptions', this.filteredOptions); // Debug log

                                                setTimeout(() => {
                                                    this.filteredOptions = Array.from(event.detail.results) || [];
                                                    console.log('Updated filteredOptions:', this.filteredOptions);
                                                }, 100);
                                            }
                                        });
                                    }
                                }" class="relative">
                                    <input type="hidden" wire:model.defer="{{ $type['wire_array_name'] }}.{{ $index }}.{{ $type['wire_array_key'] }}" x-model="selectedOption" />
                                    <button @click="open = !open" type="button" class="w-full py-2 pl-3 pr-10 text-left bg-white border rounded-md">
                                        <span x-text="filteredOptions.find(opt => opt.id == selectedOption)?.name || 'Select...'"></span>
                                        <span class="absolute right-0 pr-2">▼</span>
                                    </button>
                                    <div x-show="open" class="absolute w-full bg-white border rounded-md">
                                        <input type="text" x-model="searchQuery" placeholder="Search..." class="w-full p-2 border-b" />
                                        <ul class="overflow-auto max-h-56">
                                            <template x-for="option in filteredOptions" :key="option.id">
                                                <li @click="selectedOption = option.id; open = false; fetchDependentData();" class="p-2 cursor-pointer hover:bg-gray-200">
                                                    <span x-text="option.name"></span>
                                                </li>
                                            </template>
                                            <li x-show="filteredOptions.length === 0 && searchQuery.length >= 3" class="p-2">No results found.</li>
                                        </ul>
                                    </div>
                                </div>









<x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                                @elseif ($type['next_col_update'] && is_string($type['select_values']))
                                    <x-select
:disabled="$type['disabled']"
                                        wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                        wire:change="handleCustomColumnUpdate(
                                            '{{$type['wire_array_name']}}',
                                            {{ $index }},
                                            '{{ $type['next_col_update'] }}',
                                            '{{ $type['ini_array'] }}',
                                            $event.target.value,
                                            '{{$type['next_col_model']}}',
                                            '{{$type['next_col_model_related']}}'
                                        )"
                                        id="{{$type['wire_array_key']}}"
                                        name="{{$type['wire_array_key']}}"
                                        class="block w-full p-2 text-sm border rounded"
                                        :values="$this->{$type['wire_array_name']}[$index][$type['select_values']]"
                                        placeholder="Select..."
                                    />
                                    <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                                @elseif (!$type['next_col_update'] && is_string($type['select_values']))
                                    <x-select
:disabled="$type['disabled']"
                                        wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                        id="{{$type['wire_array_key']}}"
                                        name="{{$type['wire_array_key']}}"
                                        class="block w-full p-2 text-sm border rounded"
                                        :values="$this->{$type['wire_array_name']}[$index][$type['select_values']]"
                                        placeholder="Select..."
                                    />
                                    <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                                @else
                                    <x-select
:disabled="$type['disabled']"
                                        wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                        id="{{$type['wire_array_key']}}"
                                        name="{{$type['wire_array_key']}}"
                                        class="block w-full p-2 text-sm border rounded"
                                        :values="$type['select_values']"
                                        placeholder="Select..."
                                    />
                                    <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                                @endif
                            @elseif ($type['type'] == 'search_select')
                                <x-searchable-select
                                    placeholder="Select..."
                                    :values="$type['select_values']"
                                    property="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                    class="block w-full p-2 text-sm border rounded font-arial"
                                />
                                <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                            @elseif ($type['type'] == 'text' || $type['type'] == 'number' || $type['type'] == 'date')
                                <x-text-input
                                    wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                    id="{{$type['wire_array_key']}}"
                                    name="{{$type['wire_array_key']}}"
                                    type="{{$type['type']}}"
                                    class="block w-full p-2 text-sm border rounded"
                                />
                                <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                            @elseif ($type['type'] == 'file')
                                <x-input-file
                                    wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                    id="{{$type['wire_array_key']}}"
                                    name="{{$type['wire_array_key']}}"
                                    type="{{$type['type']}}"
                                    file="{{$this->getWireValue($type['wire_array_name'], $index, $type['wire_array_key'])}}"
                                    class="block w-full mb-1 text-sm border rounded"
                                    accept=".pdf"
                                />
                                <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                            @elseif ($type['type'] == 'checkbox')
                                <input
                                    wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                    type="checkbox"
                                    class="w-4 h-4 text-indigo-600 form-checkbox"
                                />
                                <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                            @elseif ($type['type'] == 'multiple-select')
                                <x-multiple-select
                                    model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                    class="block w-full text-sm border rounded"
                                    placeholderValue="Select..."
                                    :options="$type['select_values']"
                                />
                                <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                            @endif
                        </td>
                    @endforeach
                    <td class="px-4 py-2 min-w-[80px]">
                        <button type="button" wire:click="{{$del_method}}({{ $index }})"
                            class="font-medium text-red-600 hover:underline">
                            Remove
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
