<div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
    @if ($message)
        <div id="alert-border-1"
            class="flex items-center p-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ms-3 text-sm font-medium font-arial"> {{ $message }} </div>
            <button type="button" wire:click="$set('message', null)"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-border-1" aria-label="Close">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4">
            <ul class="list-disc list-inside text-red-500">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div
        class="font-arial text-md uppercase text-white bg-green-700 py-3 px-6 font-semibold flex flex-row justify-between items-center">
        <div class="flex flex-row gap-3">

            @if (isset($status) && $status == 5)
                <div class="relative">
                    {{-- Division --}}
                    <x-select wire:model.live="{{ $selectedDivision }}" :values="$divisions" id="{{ $selectedDivision }}"
                        placeholder='ဌာနခွဲ' />
                </div>

                {{-- Rank --}}
                <div class="relative">
                    <x-select wire:model.live="{{ $selectedRank }}" :values="$ranks" id="{{ $selectedRank }}"
                        placeholder='ရာထူးများအားလုံး' />
                </div>

                {{-- Retire Checkbox --}}
                <div class="relative flex items-center space-x-2">
                    <input type="checkbox" wire:model.live="retire_type_filter" id="retire_type_filter"
                        class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <label for="retire_type_filter" class="text-sm text-white"> ပြုန်းတီး</label>
                </div>

                {{-- Retire Type --}}
                @if ($retire_type_filter)
                <div class="relative">
                    <x-select wire:model.live="selectedRetireType" :values="$retire_type"
                        id="selectedRetireType" placeholder='ပြုန်းတီး' />
                </div>
            @endif

            @endif
            <div class="relative">
                <div
                    class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input wire:model.live='{{ $search_id }}' type="text" id="{{ $search_id }}"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 w-40"
                    placeholder="{{ $title }} ရှာဖွေရန်">
            </div>


            <button wire:click='add_new' type="button"
                class="text-green-500 bg-white border border-white hover:bg-green-200 hover:text-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:text-green-800 dark:border-gray-200 dark:hover:text-green-700 dark:focus:ring-green-700 dark:hover:bg-green-200 dark:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="sr-only">Add Icon</span>
            </button>

        </div>
    </div>
    <table class="w-full text-sm text-gray-500 dark:text-gray-400">
        @if ($data_values->isEmpty())
            <tbody>
                <tr
                    class="font-arial bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td colspan="3" class="px-6 py-4">No Information</td>
                </tr>
            </tbody>
        @else
            <thead
                class="font-arial text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                <tr>
                    @foreach ($columns as $col)
                        <th scope="col" class="px-6 py-3">{{ $col }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($data_values as $value)
                    @php
                        $startIndex = ($data_values->currentPage() - 1) * $data_values->perPage() + 1;
                        $index = $startIndex + $loop->index;
                    @endphp
                    <tr
                        class="font-arial bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 text-gray-500 dark:text-gray-300">{{ $index }}</td>
                        @foreach ($column_vals as $val)
                            <td class="px-6 py-4 text-gray-500 dark:text-gray-300">
                                @if ($val == 'status')
                                    {{ $value->$val == 1 ? 'Active' : 'Inactive' }}
                                @else
                                    @if (gettype($value->$val) == 'object')
                                        {{ $val == 'education_type' ? $value?->$val?->name : $value?->$val?->name }}
                                        {{-- exclusive for only edu --}}
                                    @elseif ((is_string($value->$val) && Str::contains($value->$val, 'staffs/')) || Str::contains($value->$val, 'avatars/'))
                                        <img src="{{ route('file', $value->$val) }}" alt="Image"
                                            class="w-20 h-20 mx-auto rounded-full">
                                    @else
                                        {{ $value->$val ? $value->$val : '-' }}
                                    @endif
                                @endif
                            </td>
                        @endforeach
                        <td class="px-6 py-4">
                            @if (!(isset($is_crud_modal) && $is_crud_modal == false))
                                @if ($confirm_delete == true && $id === $value->id)
                                    <div>
                                        <div>Confirm?</div>
                                        <button wire:click="delete({{ $value->id }})"
                                            class="text-red-600 dark:text-red-500 hover:underline">Delete</button> |
                                        <button wire:click="$set('confirm_delete', false)"
                                            class="text-green-600 dark:text-green-500 hover:underline">Back</button>
                                    </div>
                                @else
                                    <button type="button" wire:click='open_report({{ $value->id }})'
                                        class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">Reports</button>
                                    |
                                    <button type="button" wire:click='edit_modal({{ $value->id }})'
                                        class=" font-medium text-green-600 dark:text-green-500 hover:underline">Edit</button>
                                    @if (!($disabledMode ?? false) == 'toggle')
                                        |
                                        <button type="button" wire:click="delete_confirm({{ $value->id }})"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</button>
                                    @endif
                                    @if ($is_labour ?? false)
                                        <a class="font-arial text-green-600 dark:text-green-500 hover:underline"
                                            href={{ route('leaveCalendar', [$value->id]) }}>
                                            | ရုံးတက်ရက်
                                        </a>
                                    @endif
                                @endif
                            @else
                                <a href="{{ route('staff_detail', ['confirm_add' => 0, 'confirm_edit' => 1, 'staff_id' => $value->id, 'tab' => 'personal_info']) }}"
                                    class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline"
                                    wire:navigate>Show</a>
                            @endif
                        </td>
                        @if ($title == 'ဝန်ထမ်း')
                            <td>
                                <a class="font-arial text-green-600 dark:text-green-500 hover:underline"
                                    href={{ route('staff_leave', [$value->id]) }} wire:navigate>ခွင့်</a> |
                                <a class="font-arial text-green-600 dark:text-green-500 hover:underline"
                                    href={{ route('staff_increment', [$value->id]) }} wire:navigate>နှစ်တိုး</a> |
                                <a class="font-arial text-green-600 dark:text-green-500 hover:underline"
                                    href={{ route('staff_promotion', [$value->id]) }} wire:navigate>ရာထူးတိုး</a> |
                                <a class="font-arial text-green-600 dark:text-green-500 hover:underline"
                                    href={{ route('staff_depromotion', [$value->id]) }} wire:navigate>ရာထူးလျော့</a> |
                                <a class="font-arial text-green-600 dark:text-green-500 hover:underline"
                                    href={{ route('staff_retirement', [$value->id]) }} wire:navigate>ပြုန်းတီး</a>
                            </td>
                        @endif
                        @if (
                            $value['comment'] != null &&
                                ($value['status_id'] == 3 || $value['status_id'] == 4 || $value['status_id'] == 5 || $value['status_id'] == 2))
                            <td class="">
                                <button type="button"
                                    class="font-arial text-green-600 dark:text-green-500 hover:underline"
                                    wire:click = "showComment('{{ $value['comment'] }}')">
                                    {{ $value['request_attach'] != null ? 'Request Comment' : 'Comment' }}
                                </button>
                                @if ($selectedComment != null)
                                    <div
                                        class="fixed w-screen h-screen inset-0 flex items-center justify-center bg-gray-600 bg-opacity-75 z-50">
                                        <div
                                            class="flex flex-col gap-2 items-center justify-center bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
                                            <h1 class="text-red-600 font-semibold font-arial text-lg">
                                                Comment
                                            </h1>
                                            <div class="font-arial text-gray-600 text-sm">
                                                {{ $selectedComment }}
                                            </div>
                                            @if ($value['request_attach'])
                                                <div class="flex flex-row items-center justify-center gap-2">
                                                    <h2 class="font-arial text-sm">Attachment: </h2>
                                                    <a href="{{ route('file', $value['request_attach']) }}"
                                                        target="_blank"
                                                        class="p-3 rounded-full text-white bg-yellow-400">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="size-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="flex flex-row items-center gap-2 justify-center">
                                                <button wire:click="closeModal"
                                                    class="ms-auto bg-gray-300 text-gray-700 px-4 py-2 rounded-md">Cancel</button>
                                                @if ($value['status_id'] == 5 && auth()->user()->role_id == 2)
                                                    <button wire:click="request_approve({{ $value['id'] }})"
                                                        class="ms-auto bg-green-300 text-green-700 px-4 py-2 rounded-md">Request
                                                        Approve</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        @elseif (
                            $value['comment'] == null &&
                                ($value['status_id'] == 2 || $value['status_id'] == 3 || $value['status_id'] == 4 || $value['status_id'] == 5))
                            <td>
                                <button type="button"
                                    class="font-arial text-red-600 dark:text-red-500 hover:underline">
                                    No Comment
                                </button>
                            </td>
                        @endif
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
