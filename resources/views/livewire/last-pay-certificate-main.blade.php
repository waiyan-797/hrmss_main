<div class="flex justify-center w-full h-[83vh] overflow-y-auto">
    <div class="w-full mx-auto px-3 py-4">
        @include('table', [
            'data_values' => $lastPayCerts,
            'modal' => '',
            'is_crud_modal' =>  true ,
                
            'id' => $staff_id,
            'title' => 'last pay certificate',
            // 'search_id' => 'staff_search',
            'columns' => ['No', 'staff', 'From Division', 'To Division',
             'Action' ],
            'column_vals' => ['staff', 'FromDivision', 'ToDivision'],
        ])

        
    </div>
</div>