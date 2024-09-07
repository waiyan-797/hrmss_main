<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $awards,
                'modal' => 'modals/award_modal',
                'id' => $award_id,
                'title' => 'ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်',
                'search_id' => 'award_search',
                'columns' => ['စဉ်	','ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်','ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်အမျိုးအစား', 'လုပ်ဆောင်ချက်'],
                'column_vals' => ['name', 'award_type'],
            ])
        </div>
    </div>
</div>

