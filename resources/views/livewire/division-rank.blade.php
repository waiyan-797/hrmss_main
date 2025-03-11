

{{-- <div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $division_ranks,
                'modal' => 'modals/division_rank_modal',
                'id' => $division_rank_id,
                'title' => 'ဌာနအလိုက်ဖွဲ့စည်းပုံ',
                'search_id' => 'division_rank_search',
                'columns' => ['စဉ်', 'ဌာန','ရာထူး','ဖွဲ့စည်းပုံ','လုပ်ဆောင်ချက်'],
                'column_vals' => ['division','rank','allowed_qty'],
            ])
        </div>
    </div>
    {{ $division_ranks->links() }}
</div> --}}

<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <!-- Include the search input for division and rank -->
            <div class="mb-4 flex justify-between">
                <div class="w-1/2">
                    <select
                        wire:model="division_name"
                        class="text-sm font-arial block w-full mb-4 p-2.5 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option value="" selected>ဌာနခွဲ</option>
                        @foreach ($divisions as $division)
                            <option value="{{ $division->id }}"> {{ $division->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            @include('table', [
                'data_values' => $division_ranks,
                'modal' => 'modals/division_rank_modal',
                'id' => $division_rank_id,
                'title' => 'ဌာနအလိုက်ဖွဲ့စည်းပုံ',
                'search_id' => 'division_rank_search',
                'columns' => ['စဉ်', 'ဌာန', 'ရာထူး', 'ဖွဲ့စည်းပုံ', 'လုပ်ဆောင်ချက်'],
                'column_vals' => ['division', 'rank', 'allowed_qty'],
            ])
        </div>
    </div>
    <!-- Add pagination links -->
    {{ $division_ranks->links() }}
</div>



