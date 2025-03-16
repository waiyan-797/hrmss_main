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
            @if($action_name === 'postings')
            {{-- @dd($postings) --}}
            @foreach($postings as $index => $posting)
            <tr
                class="border-b font-arial dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600 {{$index % 2 ? 'bg-white hover:bg-gray-50' : 'bg-gray-200 hover:bg-white'}}">

                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$posting['rank']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$posting['from_date']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$posting['to_date']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$posting['ministry']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$posting['department']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$posting['sub_department'] !== null ? $posting['sub_department']: '-'}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$posting['location'] !== null ?$posting['location'] : '-'}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$posting['remark'] !== null ? $posting['remark'] : '-'}}</td>


                <td class="px-4 py-2 min-w-[80px]">

                    <button type="button" wire:click='add_multiple_modal("multiple_modal",{{$index}})'
                        class="font-medium text-green-600 hover:underline mx-2">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L6.75 19.96l-4.5 1.013 1.013-4.5 13.294-13.294zM19.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25h-2.25" />
                        </svg>


                    </button>


                    <button type="button" wire:click="showConfirmRemove({{$index}}, {{$posting['id']}})"
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
             ()
            @elseif($action_name === 'schools')
            {{-- @dd($schools) --}}
            @foreach($schools as $index => $school)
            <tr
                class="border-b font-arial dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600 {{$index % 2 ? 'bg-white hover:bg-gray-50' : 'bg-gray-200 hover:bg-white'}}">

                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$school['education_group']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$school['education_type']}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$school['education'] !== null ? $school['education']: '-'}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$school['school_name'] !== null ? $school['school_name']: '-'}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$school['town'] !== null ? $school['town']: '-'}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$school['from_date'] !== null ? $school['from_date']: '-'}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$school['to_date'] !== null ?$school['to_date'] : '-'}}</td>
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$school['remark'] !== null ? $school['remark'] : '-'}}</td>


                <td class="px-4 py-2 min-w-[80px]">

                    <button type="button" wire:click='add_schools_modal("multiple_modal",{{$index}})'
                        class="font-medium text-green-600 hover:underline mx-2">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L6.75 19.96l-4.5 1.013 1.013-4.5 13.294-13.294zM19.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25h-2.25" />
                        </svg>


                    </button>


                    <button type="button" wire:click="showConfirmRemove({{$index}}, {{$school['id']}})"
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

            @elseif($action_name === 'trainings')
    @foreach($trainings as $index => $training)
        <tr class="border-b font-arial dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-600 {{$index % 2 ? 'bg-white hover:bg-gray-50' : 'bg-gray-200 hover:bg-white'}}">
        
            <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$training['training_type']}}</td>
            <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$training['batch'] !== null ? $training['batch'] : '-'}}</td>
            <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$training['from_date'] !== null ? $training['from_date'] : '-'}}</td>
            <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$training['to_date'] !== null ? $training['to_date'] : '-'}}</td>
            <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$training['location'] !== null ? $training['location'] : '-'}}</td>
            <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$training['country'] !== null ? $training['country'] : '-'}}</td>
            <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$training['training_location'] !== null ? $training['training_location'] : '-'}}</td>
            <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$training['remark'] !== null ? $training['remark'] : '-'}}</td>
        
            <td class="px-4 py-2 min-w-[80px]">
                <button type="button" wire:click='add_trainings_modal("multiple_modal", {{$index}})' class="font-medium text-green-600 hover:underline mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L6.75 19.96l-4.5 1.013 1.013-4.5 13.294-13.294zM19.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25h-2.25" />
                    </svg>
                </button>

                <button type="button" wire:click="showConfirmRemove({{$index}}, {{$training['id']}})" class="font-medium text-red-600 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </button>
            </td>
        
        </tr>
    @endforeach

    @elseif($action_name === 'awards')
    @foreach($awards as $index => $award)
        <tr class="border-b font-arial dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-600 {{$index % 2 ? 'bg-white hover:bg-gray-50' : 'bg-gray-200 hover:bg-white'}}">
        
            <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$award['award_type']}}</td>
            <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$award['award'] !== null ? $award['award'] : '-'}}</td>
            <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$award['order_no'] !== null ? $award['order_no'] : '-'}}</td>
            <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$award['remark'] !== null ? $award['remark'] : '-'}}</td>
        
            <td class="px-4 py-2 min-w-[80px]">
                <button type="button" wire:click='add_awards_modal("multiple_modal", {{$index}})' class="font-medium text-green-600 hover:underline mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L6.75 19.96l-4.5 1.013 1.013-4.5 13.294-13.294zM19.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25h-2.25" />
                    </svg>
                </button>

                <button type="button" wire:click="showConfirmRemove({{$index}}, {{$award['id']}})" class="font-medium text-red-600 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </button>
            </td>
        
        </tr>
    @endforeach

    @elseif($action_name === 'punishments')
    {{-- @dd($punishments) --}}
    @foreach($punishments as $index => $punishment)
    <tr
        class="border-b font-arial dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600 {{$index % 2 ? 'bg-white hover:bg-gray-50' : 'bg-gray-200 hover:bg-white'}}">

        <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$punishment['penalty_type']}}</td>
        <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$punishment['reason'] !== null ? $punishment['reason'] : '-'}}</td>
        <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$punishment['from_date'] !== null ? $punishment['from_date'] : '-'}}</td>
        <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$punishment['to_date'] !== null ? $punishment['to_date'] : '-'}}</td>

        <td class="px-4 py-2 min-w-[80px]">

            {{-- Edit Button --}}
            <button type="button" wire:click='add_punishments_modal("multiple_modal",{{$index}})'
                class="font-medium text-green-600 hover:underline mx-2">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L6.75 19.96l-4.5 1.013 1.013-4.5 13.294-13.294zM19.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25h-2.25" />
                </svg>

            </button>

            {{-- Delete Button --}}
            <button type="button" wire:click="showConfirmRemove({{$index}}, {{$punishment['id']}})"
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
    @elseif($action_name === 'socials')
    {{-- @dd($socials) --}}
    @foreach($socials as $index => $social)
    <tr
        class="border-b font-arial dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600 {{$index % 2 ? 'bg-white hover:bg-gray-50' : 'bg-gray-200 hover:bg-white'}}">

        <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$social['particular'] !== null ? $social['particular'] : '-'}}</td>
        <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$social['remark'] !== null ? $social['remark'] : '-'}}</td>

        <td class="px-4 py-2 min-w-[80px]">

            <button type="button" wire:click='add_socials_modal("multiple_modal",{{$index}})'
                class="font-medium text-green-600 hover:underline mx-2">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L6.75 19.96l-4.5 1.013 1.013-4.5 13.294-13.294zM19.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25h-2.25" />
                </svg>

            </button>

            <button type="button" wire:click="showConfirmRemove({{$index}}, {{$social['id']}})"
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
            
    @elseif($action_name === 'staff_languages')
    {{-- @dd($languages) --}}
    @foreach($staff_languages as $index => $language)
    <tr
        class="border-b font-arial dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600 {{$index % 2 ? 'bg-white hover:bg-gray-50' : 'bg-gray-200 hover:bg-white'}}">

        <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$language['language'] !== null ? $language['language'] : '-'}}</td>
        <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$language['rank'] !== null ? $language['rank'] : '-'}}</td>
        <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$language['writing'] !== null ? $language['writing'] : '-'}}</td>
        <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$language['reading'] !== null ? $language['reading'] : '-'}}</td>
        <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$language['speaking'] !== null ? $language['speaking'] : '-'}}</td>
        <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$language['remark'] !== null ? $language['remark'] : '-'}}</td>

        <td class="px-4 py-2 min-w-[80px]">

            {{-- Edit Button --}}
            <button type="button" wire:click='add_languages_modal("multiple_modal",{{$index}})'
                class="font-medium text-green-600 hover:underline mx-2">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L6.75 19.96l-4.5 1.013 1.013-4.5 13.294-13.294zM19.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25h-2.25" />
                </svg>

            </button>

            {{-- Delete Button --}}
            <button type="button" wire:click="showConfirmRemove({{$index}}, {{$language['id']}})"
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
    Livewire.on('showConfirmRemove', ({ index, id }) => {
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

                Livewire.dispatch('removeSchool', { index: index, id: id });
            }
        });
    });   
});

document.addEventListener('livewire:initialized', () => {
    Livewire.on('showConfirmRemoveSchool', ({ index, id }) => {
        Swal.fire({
            title: 'Are You Sure?',
            text: 'Do you want to delete this school?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('removeSchools', { index: index, id: id });
            }
        });
    });
});
</script>
@endscript