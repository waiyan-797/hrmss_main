<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $marital_statuses,
                'modal' => 'modals/marital_status_modal',
                'id' => $marital_status_id,
                'title' => 'အိမ်ထောင်ရေးအခြေအနေ',
                'search_id' => 'marital_status_search',
                'columns' => ['စဉ်', 'အိမ်ထောင်ရေးအခြေအနေ','အိမ်ထောင်ရှိ/မရှိ','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name', 'marital_status_type'],
            ])
        </div>
    </div>
</div>

