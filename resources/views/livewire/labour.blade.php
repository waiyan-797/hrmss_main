

<div class="flex justify-center w-full h-[83vh] overflow-y-auto">
    <div class="w-full mx-auto px-3 py-4">
        @include('table', [
            'data_values' => $staffs,
            'modal' => '',
     
            'id' => $staff_id,
            'title' => 'နေ့စား',
            'is_labour' => true ,
            'search_id' => 'staff_search',
            'columns' => ['No', 'Name' , ],
            'column_vals' => [ 'name', ],
        ])



        
    </div>
</div>