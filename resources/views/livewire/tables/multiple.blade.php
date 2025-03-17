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
            @if($column_vals)
            {{-- @dd($abroads) --}}
            @foreach($column_vals as $index => $column_val)



            <tr
                class="border-b font-arial dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600 {{$index % 2 ? 'bg-white hover:bg-gray-50' : 'bg-gray-200 hover:bg-white'}}">
                @foreach($columns as $key => $value )

                {{-- @dd($add_modal) --}}
                @if($value == 'country' && $add_modal === 'add_abroads_modal')
                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">

                    @foreach($column_val[$value] as $country)
                    <div class="bg-blue-600 rounded-md text-white m-2 p-1">{{$country->name}}</div>

                    @endforeach
                </td>

                @else

                <td class="px-4 py-4 min-w-[200px] text-gray-500 dark:text-gray-300">{{$column_val[$value]}}</td>

                @endif

                @endforeach



                <td class="px-4 py-2 min-w-[80px]">

                    <button type="button" wire:click='{{$add_modal}}("multiple_modal",{{$index}})'
                        class="font-medium text-green-600 hover:underline mx-2">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L6.75 19.96l-4.5 1.013 1.013-4.5 13.294-13.294zM19.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25h-2.25" />
                        </svg>


                    </button>


                    <button type="button" wire:click="showConfirmRemove({{$index}}, {{$column_val['id']}},'{{$del_method}}')"
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
<script>
    Livewire.on('showConfirmRemove', ({ index, id, del_method }) => {
        console.log('Event received:', index, id, del_method);
        Swal.fire({
            title: 'Are You Sure?',
            text: 'Do you want to delete this item?' + del_method,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('removeMethods', { index: index, id: id, del_method: del_method });
            }
        });
    });
</script>
@endscript