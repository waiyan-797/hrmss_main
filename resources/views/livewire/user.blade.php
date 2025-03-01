<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table',[
                'data_values' => $users,
                'modal' => 'modals/user_modal',
                'id' => $user_id,
                'title' => 'Users',
                'search_id' => 'user_search',
                'columns' => ['id', 'name', 'email','role id' , 'division'  , 'status'  ,'image',  'action' ] ,
                'column_vals' => ['name','email','role'  ,'division'  , 'status' ,'avatar' ],
                'disabledMode' => 'toggle' ,
            ])
        </div>
    </div>
</div>
