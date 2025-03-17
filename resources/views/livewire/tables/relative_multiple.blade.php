<div class="w-full overflow-x-auto">
    <table class="w-full text-sm rounded-lg table-auto">
        <thead class="text-xs font-semibold  text-gray-900 uppercase font-arial bg-gray-50">
            <tr>
                @foreach ($column_names as $index => $name)
                <th scope="col" class="px-4 py-2  text-gray-700">

                    <span class="flex flex-row items-center gap-1">
                        <span>{{ $name }}</span>

                    </span>
                </th>
                @endforeach
                <th scope="col" class="px-4 py-2 min-w-[80px] text-gray-700">လုပ်ဆောင်ချက်</th>
            </tr>
        </thead>
        <tbody class="">
           
            
            @if($action_name === 'siblings')
            {{-- @dd($postings) --}}
            @foreach($siblings as $index => $sibling)
            <tr
                class="border-b font-arial dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600 {{$index % 2 ? 'bg-white hover:bg-gray-50' : 'bg-gray-200 hover:bg-white'}}">

                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$sibling['name']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$sibling['ethnic']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$sibling['religion']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$sibling['gender_id']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$sibling['place_of_birth']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$sibling['occupation']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$sibling['address'] !== null ?$sibling['address'] : '-'}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$sibling['relation'] !== null ? $sibling['relation'] : '-'}}</td>


                <td class="px-4 py-2 min-w-[80px]">

                    <button type="button" wire:click='add_siblings_modal("multiple_modal",{{$index}})'
                        class="font-medium text-green-600 hover:underline mx-2">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L6.75 19.96l-4.5 1.013 1.013-4.5 13.294-13.294zM19.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25h-2.25" />
                        </svg>


                    </button>


                    <button type="button" wire:click="siblingShowConfirmRemove({{$index}}, {{$sibling['id']}})"
                        class="font-medium text-red-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                    </button>

                </td>


            </tr>
            @endforeach
            @elseif($action_name === 'father_siblings')
            {{-- @dd($postings) --}}
            @foreach($father_siblings as $index => $father_sibling)
            <tr
                class="border-b font-arial dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600 {{$index % 2 ? 'bg-white hover:bg-gray-50' : 'bg-gray-200 hover:bg-white'}}">

                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$father_sibling['name']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$father_sibling['ethnic']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$father_sibling['religion']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$father_sibling['gender_id']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$father_sibling['place_of_birth']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$father_sibling['occupation']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$father_sibling['address'] !== null ?$father_sibling['address'] : '-'}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$father_sibling['relation'] !== null ? $father_sibling['relation'] : '-'}}</td>


                <td class="px-4 py-2 min-w-[80px]">

                    <button type="button" wire:click='add_father_siblings_modal("multiple_modal",{{$index}})'
                        class="font-medium text-green-600 hover:underline mx-2">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L6.75 19.96l-4.5 1.013 1.013-4.5 13.294-13.294zM19.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25h-2.25" />
                        </svg>


                    </button>


                    <button type="button" wire:click="fatherSiblingShowConfirmRemove({{$index}}, {{$father_sibling['id']}})"
                        class="font-medium text-red-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                    </button>

                </td>


            </tr>
            @endforeach
            @elseif($action_name === 'mother_siblings')
            {{-- @dd($postings) --}}
            @foreach($mother_siblings as $index => $mother_sibling)
            <tr
                class="border-b font-arial dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600 {{$index % 2 ? 'bg-white hover:bg-gray-50' : 'bg-gray-200 hover:bg-white'}}">

                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$mother_sibling['name']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$mother_sibling['ethnic']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$mother_sibling['religion']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$mother_sibling['gender_id']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$mother_sibling['place_of_birth']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$mother_sibling['occupation']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$mother_sibling['address'] !== null ?$mother_sibling['address'] : '-'}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$mother_sibling['relation'] !== null ? $mother_sibling['relation'] : '-'}}</td>


                <td class="px-4 py-2 min-w-[80px]">

                    <button type="button" wire:click='add_mother_siblings_modal("multiple_modal",{{$index}})'
                        class="font-medium text-green-600 hover:underline mx-2">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L6.75 19.96l-4.5 1.013 1.013-4.5 13.294-13.294zM19.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25h-2.25" />
                        </svg>


                    </button>


                    <button type="button" wire:click="motherSiblingShowConfirmRemove({{$index}}, {{$mother_sibling['id']}})"
                        class="font-medium text-red-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                    </button>

                </td>


            </tr>
            @endforeach
            @elseif($action_name === 'spouses')
            {{-- @dd($postings) --}}
            @foreach($spouses as $index => $spouse)
            <tr
                class="border-b font-arial dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600 {{$index % 2 ? 'bg-white hover:bg-gray-50' : 'bg-gray-200 hover:bg-white'}}">

                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse['name']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse['ethnic']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse['religion']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse['gender_id']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse['place_of_birth']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse['occupation']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse['address'] !== null ?$spouse['address'] : '-'}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse['relation'] !== null ? $spouse['relation'] : '-'}}</td>


                <td class="px-4 py-2 min-w-[80px]">

                    <button type="button" wire:click='add_spouses_modal("multiple_modal",{{$index}})'
                        class="font-medium text-green-600 hover:underline mx-2">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L6.75 19.96l-4.5 1.013 1.013-4.5 13.294-13.294zM19.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25h-2.25" />
                        </svg>


                    </button>


                    <button type="button" wire:click="spouseShowConfirmRemove({{$index}}, {{$spouse['id']}})"
                        class="font-medium text-red-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                    </button>

                </td>


            </tr>
            @endforeach
            @elseif($action_name === 'children')
            {{-- @dd($postings) --}}
            @foreach($children as $index => $child)
            <tr
                class="border-b font-arial dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600 {{$index % 2 ? 'bg-white hover:bg-gray-50' : 'bg-gray-200 hover:bg-white'}}">

                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$child['name']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$child['ethnic']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$child['religion']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$child['gender_id']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$child['place_of_birth']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$child['occupation']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$child['address'] !== null ?$child['address'] : '-'}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$child['relation'] !== null ? $child['relation'] : '-'}}</td>


                <td class="px-4 py-2 min-w-[80px]">

                    <button type="button" wire:click='add_children_modal("multiple_modal",{{$index}})'
                        class="font-medium text-green-600 hover:underline mx-2">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L6.75 19.96l-4.5 1.013 1.013-4.5 13.294-13.294zM19.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25h-2.25" />
                        </svg>


                    </button>


                    <button type="button" wire:click="childrenShowConfirmRemove({{$index}}, {{$child['id']}})"
                        class="font-medium text-red-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                    </button>

                </td>


            </tr>
            @endforeach
            @elseif($action_name === 'spouse_siblings')
            {{-- @dd($postings) --}}
            @foreach($spouse_siblings as $index => $spouse_sibling)
            <tr
                class="border-b font-arial dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600 {{$index % 2 ? 'bg-white hover:bg-gray-50' : 'bg-gray-200 hover:bg-white'}}">

                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_sibling['name']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_sibling['ethnic']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_sibling['religion']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_sibling['gender_id']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_sibling['place_of_birth']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_sibling['occupation']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_sibling['address'] !== null ?$spouse_sibling['address'] : '-'}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_sibling['relation'] !== null ? $spouse_sibling['relation'] : '-'}}</td>


                <td class="px-4 py-2 min-w-[80px]">

                    <button type="button" wire:click='add_spouse_siblings_modal("multiple_modal",{{$index}})'
                        class="font-medium text-green-600 hover:underline mx-2">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L6.75 19.96l-4.5 1.013 1.013-4.5 13.294-13.294zM19.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25h-2.25" />
                        </svg>


                    </button>


                    <button type="button" wire:click="spouseSiblingShowConfirmRemove({{$index}}, {{$spouse_sibling['id']}})"
                        class="font-medium text-red-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                    </button>

                </td>


            </tr>
            @endforeach
            @elseif($action_name === 'spouse_father_siblings')
            {{-- @dd($postings) --}}
            @foreach($spouse_father_siblings as $index => $spouse_father_sibling)
            <tr
                class="border-b font-arial dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600 {{$index % 2 ? 'bg-white hover:bg-gray-50' : 'bg-gray-200 hover:bg-white'}}">

                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_father_sibling['name']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_father_sibling['ethnic']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_father_sibling['religion']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_father_sibling['gender_id']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_father_sibling['place_of_birth']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_father_sibling['occupation']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_father_sibling['address'] !== null ?$spouse_father_sibling['address'] : '-'}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_father_sibling['relation'] !== null ? $spouse_father_sibling['relation'] : '-'}}</td>


                <td class="px-4 py-2 min-w-[80px]">

                    <button type="button" wire:click='add_spouse_father_siblings_modal("multiple_modal",{{$index}})'
                        class="font-medium text-green-600 hover:underline mx-2">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L6.75 19.96l-4.5 1.013 1.013-4.5 13.294-13.294zM19.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25h-2.25" />
                        </svg>


                    </button>


                    <button type="button" wire:click="spouseFatherSiblingShowConfirmRemove({{$index}}, {{$spouse_father_sibling['id']}})"
                        class="font-medium text-red-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                    </button>

                </td>


            </tr>
            @endforeach
            @elseif($action_name === 'spouse_mother_siblings')
            {{-- @dd($postings) --}}
            @foreach($spouse_mother_siblings as $index => $spouse_mother_sibling)
            <tr
                class="border-b font-arial dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600 {{$index % 2 ? 'bg-white hover:bg-gray-50' : 'bg-gray-200 hover:bg-white'}}">

                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_mother_sibling['name']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_mother_sibling['ethnic']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_mother_sibling['religion']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_mother_sibling['gender_id']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_mother_sibling['place_of_birth']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_mother_sibling['occupation']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_mother_sibling['address'] !== null ?$spouse_mother_sibling['address'] : '-'}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$spouse_mother_sibling['relation'] !== null ? $spouse_mother_sibling['relation'] : '-'}}</td>


                <td class="px-4 py-2 min-w-[80px]">

                    <button type="button" wire:click='add_spouse_mother_siblings_modal("multiple_modal",{{$index}})'
                        class="font-medium text-green-600 hover:underline mx-2">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L6.75 19.96l-4.5 1.013 1.013-4.5 13.294-13.294zM19.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25h-2.25" />
                        </svg>


                    </button>


                    <button type="button" wire:click="spouseMotherSiblingShowConfirmRemove({{$index}}, {{$spouse_mother_sibling['id']}})"
                        class="font-medium text-red-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                    </button>

                </td>


            </tr>
            @endforeach
            @endif

        </tbody>
    </table>
</div>
@script
<script >
    document.addEventListener('livewire:initialized', () => {
        @this.on('showConfirmRemove', (index, id) => {

            Swal.fire({
                title: 'Are You Sure?',
                text: 'Do you want to delete this item?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('showConfirmRemove with index:', index, 'and id:', id);
                    Livewire.dispatch('removePosting', { index: index, id: id });
                }
            });
        });
    });

    document.addEventListener('livewire:initialized', () => {
        @this.on('siblingShowConfirmRemove', (index, id) => {
            console.log(index);
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Do you want to delete this item?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                
                    Livewire.dispatch('removeSiblings', { index: index[0], id: index[1] });
                }
            });
        });
    });

    document.addEventListener('livewire:initialized', () => {
        @this.on('fatherSiblingShowConfirmRemove', (index, id) => {
            console.log(index, id);
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Do you want to delete this item?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('fatherSiblingShowConfirmRemove with index:', index, 'and id:', id);
                    Livewire.dispatch('removeFatherSibling', { index: index[0], id: index[1] });
                }
            });
        });
    });

    document.addEventListener('livewire:initialized', () => {
        @this.on('motherSiblingShowConfirmRemove', (index, id) => {
            console.log(index, id);
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Do you want to delete this item?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('motherSiblingShowConfirmRemove with index:', index, 'and id:', id);
                    Livewire.dispatch('removeMotherSibling', { index: index[0], id: index[1] });
                }
            });
        });
    });

    document.addEventListener('livewire:initialized', () => {
        @this.on('spouseShowConfirmRemove', (index, id) => {
            console.log(index, id);
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Do you want to delete this item?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('spouseShowConfirmRemove with index:', index, 'and id:', id);
                    Livewire.dispatch('removeSpouse', { index: index[0], id: index[1] });
                }
            });
        });
    });

    document.addEventListener('livewire:initialized', () => {
        @this.on('spouseSiblingShowConfirmRemove', (index, id) => {
            console.log(index, id);
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Do you want to delete this item?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('spouseSiblingShowConfirmRemove with index:', index, 'and id:', id);
                    Livewire.dispatch('removeSpouseSibling', { index: index[0], id: index[1] });
                }
            });
        });
    });

    document.addEventListener('livewire:initialized', () => {
        @this.on('spouseFatherSiblingShowConfirmRemove', (index, id) => {
            console.log(index, id);
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Do you want to delete this item?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('spouseFatherSiblingShowConfirmRemove with index:', index, 'and id:', id);
                    Livewire.dispatch('removeSpouseFatherSibling', { index: index[0], id: index[1] });
                }
            });
        });
    });

    document.addEventListener('livewire:initialized', () => {
        @this.on('spouseMotherSiblingShowConfirmRemove', (index, id) => {
            console.log(index, id);
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Do you want to delete this item?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('spouseMotherSiblingShowConfirmRemove with index:', index, 'and id:', id);
                    Livewire.dispatch('removeSpouseMotherSibling', { index: index[0], id: index[1] });
                }
            });
        });
    });

    document.addEventListener('livewire:initialized', () => {
        @this.on('childrenShowConfirmRemove', (index, id) => {
            console.log(index, id);
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Do you want to delete this item?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('childrenShowConfirmRemove with index:', index, 'and id:', id);
                    Livewire.dispatch('removeChildren', { index: index[0], id: index[1] });
                }
            });
        }); 
    });
</script>
@endscript