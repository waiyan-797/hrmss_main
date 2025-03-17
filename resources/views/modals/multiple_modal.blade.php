<div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto text-left bg-gray-900 bg-opacity-20"
    wire:ignore.self>
    <!-- Modal Content -->
    <div class="w-[900px] p-4 bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <!-- Modal Content -->
        <h2 class="mb-4 text-lg font-semibold text-gray-500 uppercase dark:text-white font-arial">{{$data['modal_title']
            ?? ''}}</h2>
        <form wire:submit.prevent="{{ $submit_form }}">
            <div class="w-full grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-3 items-center justify-items-center">
                @if($data['column_names'])
                @foreach ($data['column_names'] as $index =>$item)

                @if(!empty($data['column_types']) && isset($data['column_types'][$index]) && $data['column_types'][$index]['type'] === 'search_select')

                <div class="m-3 w-full">
                    <label for="name" class="block mb-2 text-gray-600 dark:text-green-500 font-arial text-base">
                        {{ isset($data['column_names'][$index]) ? $data['column_names'][$index] : '' }}
                        <span class="text-rose-700">
                            {{ isset($data['column_types'][$index]['require']) &&
                            $data['column_types'][$index]['require'] ? '*' : '' }}
                        </span>
                    </label>
                    <x-searchable-select placeholder="Select..."
                        :values="$data['column_types'][$index]['select_values']"
                        property="{{$data['column_types'][$index]['wire_array_name']}}_{{$data['column_types'][$index]['wire_array_key']}}"
                        class="w-full p-3 text-base border border-gray-300 rounded-lg font-arial bg-white focus:ring-2 focus:ring-green-500 focus:border-green-500" />
                    <x-input-error class="mt-2 text-sm text-red-500 font-arial"
                        :messages="$errors->get($data['column_types'][$index]['wire_array_name'] . '_'. $data['column_types'][$index]['wire_array_key'])" />
                </div>

                @elseif(!empty($data['column_types']) && isset($data['column_types'][$index]) && 
                ($data['column_types'][$index]['type'] === 'text' || $data['column_types'][$index]['type'] === 'number'))
                <div class="m-3 w-full">
                    <label for="name" class="block mb-2 text-gray-600 dark:text-green-500 font-arial text-base">
                        {{-- {{$data['column_names'][$index] ?? ''}}<span class="text-rose-700">{{
                            $data['column_types'][$index]['require'] ? '*' : ''}}</span> --}}
                        {{ isset($data['column_names'][$index]) ? $data['column_names'][$index] : '' }}
                        <span class="text-rose-700">
                            {{ isset($data['column_types'][$index]['require']) &&
                            $data['column_types'][$index]['require'] ? '*' : '' }}
                        </span>
                    </label>
                    <x-text-input
                        wire:model="{{$data['column_types'][$index]['wire_array_name']}}_{{$data['column_types'][$index]['wire_array_key']}}"
                        id="{{$data['column_types'][$index]['wire_array_key']}}"
                        name="{{$data['column_types'][$index]['wire_array_key']}}"
                        type="{{$data['column_types'][$index]['type']}}"
                        class="block w-[10rem] p-2 text-sm border rounded " />

                </div>
                @elseif (!empty($data['column_types']) && isset($data['column_types'][$index]) && $data['column_types'][$index]['type'] === 'search_select')
                <div class="m-3 w-full">
                    <label for="name" class="block mb-2 text-gray-600 dark:text-green-500 font-arial text-base">
                        {{$data['column_names'][$index] ?? ''}}<span class="text-rose-700">{{ $data['column_types'][$index]['require'] ? '*' : ''}}</span>
                    </label>
                    @if (
                    !is_string($data['column_types'][$index]['select_values']))
                    <x-select
                        wire:model="{{$data['column_types'][$index]['wire_array_name']}}_{{$data['column_types'][$index]['wire_array_key']}}"
                        id="{{$data['column_types'][$index]['wire_array_key']}}"
                        name="{{$data['column_types'][$index]['wire_array_key']}}"
                        class="block w-full p-2 text-sm border rounded"
                        :values="$data['column_types'][$index]['select_values']" placeholder="Select..." />
                        <x-input-error class="mt-2"
                        :messages="$errors->get('postings_rank')" />
                    @endif
                </div>

                @elseif(!empty($data['column_types']) && isset($data['column_types'][$index]) && $data['column_types'][$index]['type'] === 'date')
                <div class="m-3 w-full">
                    <label for="{{$data['column_types'][$index]['wire_array_key']}}"
                        class="block mb-2 text-gray-600 dark:text-green-500 font-arial text-base">
                        {{ isset($data['column_names'][$index]) ? $data['column_names'][$index] : '' }}
                        <span class="text-rose-700">
                            {{ isset($data['column_types'][$index]['require']) &&
                            $data['column_types'][$index]['require'] ? '*' : '' }}
                        </span>
                    </label>

                    <x-date-select
                        wire:model="{{$data['column_types'][$index]['wire_array_name']}}_{{$data['column_types'][$index]['wire_array_key']}}"
                        id="{{$data['column_types'][$index]['wire_array_key']}}"
                        name="{{$data['column_types'][$index]['wire_array_key']}}" class="block w-full mt-1" />
                    {{--
                    <x-input-error class="mt-2"
                        :messages="$errors->get('{{$data['column_types'][$index]['wire_array_name']}}_{{$data['column_types'][$index]['wire_array_key']}}')" />
                    --}}
                </div>

                @elseif ($data['column_types'][$index]['type'] == 'select')
                <div class="m-3 w-full">
                    <label for="name" class="block mb-2 text-gray-600 dark:text-green-500 font-arial text-base">
                        {{$data['column_names'][$index] ?? ''}}<span class="text-rose-700">{{ $data['column_types'][$index]['require'] ? '*' : ''}}</span>
                    </label>
                    @if (
                    !is_string($data['column_types'][$index]['select_values']))
                    <x-select
                        wire:model="{{$data['column_types'][$index]['wire_array_name']}}_{{$data['column_types'][$index]['wire_array_key']}}"
                        id="{{$data['column_types'][$index]['wire_array_key']}}"
                        name="{{$data['column_types'][$index]['wire_array_key']}}"
                        class="block w-full p-2 text-sm border rounded"
                        :values="$data['column_types'][$index]['select_values']" placeholder="Select..." />
                        <x-input-error class="mt-2"
                        :messages="$errors->get('postings_rank')" />
                    @endif
                </div>
                
                @elseif (!empty($data['column_types']) && isset($data['column_types'][$index]) && $data['column_types'][$index]['type'] == 'checkbox')
                <div class="w-full m-3">
                    <label for="{{$data['column_types'][$index]['wire_array_key']}}"
                        class="block mb-2 text-gray-600 dark:text-green-500 font-arial text-base">
                        {{$data['column_names'][$index] ?? ''}} <span class="text-rose-700">{{
                            $data['column_types'][$index]['require'] ? '*' : ''}}</span>
                    </label>
                    <input
                        wire:model="{{$data['column_types'][$index]['wire_array_name']}}_{{$data['column_types'][$index]['wire_array_key']}}"
                        type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600" {{
                        ${$data['column_types'][$index]['wire_array_name'].'_'.$data['column_types'][$index]['wire_array_key']}==1
                        ? 'checked' : '' }} />
                    {{--
                    <x-input-error class="mt-2"
                        :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])" />
                    --}}

                </div>

                @endif

                @endforeach
                @endif
            </div>

            @if($errors->get('postings_rank'))
            @dd($errors)
            @endif



            <div class="mt-3">
                <button type="submit" class="px-4 py-2 text-white bg-green-700 rounded hover:bg-green-800 font-arial">{{
                    $submit_button_text }}</button>
                <button type="button" wire:click="{{ $cancel_action }}"
                    class="px-4 py-2 text-white bg-gray-500 rounded font-arial hover:bg-gray-600">ထွက်ရန်</button>
            </div>
        </form>
    </div>
</div>