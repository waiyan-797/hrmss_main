<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $award_types,
                'modal' => 'modals/award_type_modal',
                'id' => $award_type_id,
                'title' => 'ဘွဲ့တံဆိပ်အမျိုးအစား',
                'search_id' => 'award_type_search',
                'columns' => ['စဉ်','ဘွဲ့တံဆိပ်အမျိုးအစား','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

