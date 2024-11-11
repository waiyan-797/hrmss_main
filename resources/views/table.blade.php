<div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
    @if ($message)
        <div id="alert-border-1" class="flex items-center p-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ms-3 text-sm font-medium font-arial"> {{$message}} </div>
            <button type="button" wire:click="$set('message', null)" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-1" aria-label="Close">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif
    <div class="font-arial text-md uppercase text-white bg-green-700 py-3 px-6 font-semibold flex flex-row justify-between items-center">
        {{ $title }}
        <div class="flex flex-row gap-3">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input wire:model.live='{{ $search_id }}' type="text" id="{{ $search_id }}" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-64 bg-gray-50 focus:ring-green-500 focus:border-green-500" placeholder="{{$title}} ရှာဖွေရန်">
            </div>
            @if(!(isset($is_crud_modal) && $is_crud_modal == false ))
            <button wire:click='add_new' type="button" class="text-green-500 bg-white border border-white hover:bg-green-200 hover:text-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:text-green-800 dark:border-gray-200 dark:hover:text-green-700 dark:focus:ring-green-700 dark:hover:bg-green-200 dark:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="sr-only">Add Icon</span>
            </button>
            @endif 
        </div>
    </div>
    <table class="w-full text-sm text-gray-500 dark:text-gray-400">
        @if ($data_values->isEmpty())
            <tbody>
                <tr class="font-arial bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td colspan="3" class="px-6 py-4">No Information</td>
                </tr>
            </tbody>
        @else
            <thead class="font-arial text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                <tr>
                    @foreach ($columns as $col)
                        <th scope="col" class="px-6 py-3">{{$col}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($data_values as $value)
                    @php
                        $startIndex = ($data_values->currentPage() - 1) * $data_values->perPage() + 1;
                        $index = $startIndex + $loop->index;
                    @endphp
                    <tr class="font-arial bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 text-gray-500 dark:text-gray-300">{{$index}}</td>
                        @foreach ($column_vals as $val)
                            <td class="px-6 py-4 text-gray-500 dark:text-gray-300">
                                @if (gettype($value->$val) == 'object')
                                    {{ $value->$val->name }}
                                @elseif (is_string($value->$val) && Str::contains($value->$val, 'staffs/') || Str::contains($value->$val, 'avatars/'))
                                    <img src="{{ route('file', $value->$val) }}" alt="Image" class="w-20 h-20 mx-auto rounded-full">
                                @else
                                    {{ $value->$val ? $value->$val : '-' }}
                                @endif
                            </td>
                        @endforeach
                        <td class="px-6 py-4">
                            @if(!(isset($is_crud_modal) && $is_crud_modal == false ))
                            {{-- @if() --}}
                            @if($confirm_delete == true && $id === $value->id)
                                <div>
                                    <div>Confirm?</div>
                                    <button wire:click="delete({{$value->id}})" class="text-red-600 dark:text-red-500 hover:underline">Delete</button> |
                                    <button wire:click="$set('confirm_delete', false)" class="text-green-600 dark:text-green-500 hover:underline">Back</button>
                                </div>
                            @else
                                @if (isset($value->staff_no))
                                    <button type="button" wire:click='open_report({{$value->id}})' class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">Reports</button> |
                                @endif
                                <button type="button" wire:click='edit_modal({{$value->id}})' class=" font-medium text-green-600 dark:text-green-500 hover:underline">Edit</button>
                                @if(!($disabledMode ?? false) == 'toggle') |
                                    <button type="button" wire:click="delete_confirm({{ $value->id }})" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</button>
                                @endif
                            @endif
                            @else
                            <a 
                            href="
                            {{
                                route('staff_detail', ['confirm_add' => 0 , 'confirm_edit' => 1, 'staff_id' => $value->id, 'tab' => 'personal_info'])
                            }}
                            "
                            
                            
                             class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">Show</a> 
                            
                            @endif
                        </td>
                        <td>
                            @if($title == 'ဝန်ထမ်း')
                                <a class="font-arial text-green-600 dark:text-green-500 hover:underline" href={{route('staff_leave',[ $value->id ])}}>ခွင့်</a> |
                                <a class="font-arial text-green-600 dark:text-green-500 hover:underline" href={{route('staff_increment',[ $value->id ])}}>နှစ်တိုး</a> |
                                <a class="font-arial text-green-600 dark:text-green-500 hover:underline" href={{route('staff_promotion',[ $value->id ])}}>ရာထူးတိုး</a> |
                                <a class="font-arial text-green-600 dark:text-green-500 hover:underline" href={{route('staff_retirement',[ $value->id ])}} >ပြုန်းတီး</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        @endif
    </table>
    <div class="px-6 py-3 bg-gray-100 dark:bg-gray-700">
        {{ $data_values->links('pagination') }}
    </div>
    @if ($confirm_edit || $confirm_add)
        @include($modal)
    @endif
</div>
