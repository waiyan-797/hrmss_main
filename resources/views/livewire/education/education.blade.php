<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">ပညာအရည်အချင်း</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $educations,
                'modal' => 'modals/education_modal',
                'id' => $education_id,
                'title' => 'ပညာအရည်အချင်း',
                'search_id' => 'education_search',
                'columns' => ['စဉ်','ပညာအရည်အချင်း','ပညာအရည်အချင်း အမျိုးအစား', 'လုပ်ဆောင်ချက်'],
                'column_vals' => ['name', 'education_type'],
            ])
        </div>
    </div>
</div>

