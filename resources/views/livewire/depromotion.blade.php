
 <div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $depromotions,
                'modal' => 'modals/depromotion_modal',
                'id' => $depromotion_id,
                'title' => 'ရာထူးလျော့',
                'search_id' => 'depromotion_search',
                'columns' => ['စဉ်', 'ဝန်ထမ်းအမည်','မှ','ထိ','ယခင်လုပ်ကိုင်ခဲ့ဖူးသည့်ရာထူး','ရာထူးတိုးလျော့','လုပ်ဆောင်ချက်'],
                'column_vals' => ['staff','from_date','to_date','previousRank','Rank'],
            ]) 
         
            
        </div>
    </div>
</div> 

