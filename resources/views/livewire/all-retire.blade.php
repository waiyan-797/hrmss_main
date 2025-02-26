<div  class=" w-screen">

    <div class=" w-96  ms-7">


    <div class=" flex  gap-x-4   mt-10   justify-around">
     <x-select
     wire:model.live="selectedRankid"


     class="block w-full p-2 text-sm border rounded"
     :values="$ranks"
     placeholder="ရာထူးအမျိုးအစား"
 />

 <x-select
 wire:model.live="selectedRetireId"


 class="block w-full p-2 text-sm border rounded"
 :values="$retire_types"
 placeholder="ပြန်းတီးအမျိုးအစား"
/>

@if($selectedRetireId ==  5)
<x-select
wire:model.live="selectedPensionId"


class="block w-full p-2 text-sm border rounded"
:values="$pensions"
placeholder="ပင်စင်အမျိုးအစား"
/>

@endif




    </div>





    </div>


 <div class="mt-5 flex justify-center items-center">
     <div class="w-screen border border-gray-300">
         <!-- Table Header -->
         <div class="flex bg-gray-200 p-2 font-semibold">
             <div class="w-12 text-center border-r">စဉ်</div>
             <div class="flex-1 px-2 border-r">အမည်</div>
             <div class="flex-1 px-2 border-r">ရာထူး</div>
             <div class="flex-1 px-2 border-r">ဌာန</div>
             <div class="flex-1 px-2 border-r">ပြုန်းတီးအမျိုးအစား</div>
             <div class="flex-1 px-2 border-r">ပင်စင်အမျိုးအစား</div>
             <div class="flex-1 px-2">ပြန်းတီးရက်စွဲ</div>
         </div>

         <!-- Table Body -->
         <ul wire:sortable="updateOrder" wire:sortable.options="{ animation: 100 }">
             @foreach($staffs as $key => $member)
                 <li wire:sortable.item="{{ $member->id }}" wire:key="staff-{{ $member->id }}"
                     class="flex border-b p-2 items-center">

                     <div wire:sortable.handle class="w-12 text-center border-r cursor-move">
                         {{en2mm( $key + 1) }}
                     </div>
                     <div class="flex-1 px-2 border-r">{{ $member->name }}</div>
                     <div class="flex-1 px-2 border-r">{{ $member->current_rank->name }}</div>
                     <div class="flex-1 px-2 border-r">{{ $member->current_department?->name }}</div>
                     <div class="flex-1 px-2 border-r">{{ $member->retire?->name }}</div>
                     <div class="flex-1 px-2 border-r">{{ $member->pension_type?->name }}</div>


                     <div class="flex-1 px-2">{{
                    formatDMYmm(  $member->retire_date)

                      }}</div>
                 </li>
             @endforeach
         </ul>
     </div>
 </div>




