<div  class=" w-screen">

   <div class=" w-96  ms-7">


   <div class=" flex  gap-x-4   mt-10   justify-around">
    <x-select
    wire:model.live="selectedRankId"


    class="block w-full p-2 text-sm border rounded"
    :values="$ranks"
    placeholder="Select..."
/>



<x-select
wire:model.live="selectDivisionId"


class="block w-full p-2 text-sm border rounded"
:values="$divisions"
placeholder="Select..."
/>
   </div>





   </div>
{{--

    <div class=" mt-5 flex justify-center items-center    ">
        <ul wire:sortable="updateOrder" class="  w-screen" wire:sortable.options="{ animation: 100 }" >
            @foreach($staffs as  $key=> $member)
                <li wire:sortable.item="{{ $member->id}}" wire:key="staff-{{ $member->id }}" class="p-2 border mb-1">
                    <div wire:sortable.handle >
                    <span class=" text-lg  ">

                         {{$key + 1  }}
                    </span>
                    <span class=" text-lg">
                        {{ $member->name }}

                    </span>

                    <span class=" text-lg">
                        {{ $member->current_rank->name }}

                    </span>

                    <span class=" text-lg">
                        {{ $member->current_department?->name }}

                    </span>

                    <span class=" text-lg">
                        {{ $member->current_rank_date }}

                    </span>



                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</div> --}}

<div class="mt-5 flex justify-center items-center">
    <div class="w-screen border border-gray-300">
        <!-- Table Header -->
        <div class="flex bg-gray-200 p-2 font-semibold">
            <div class="w-12 text-center border-r">စဉ်</div>
            <div class="flex-1 px-2 border-r">အမည်</div>
            <div class="flex-1 px-2 border-r">ရာထူး</div>
            <div class="flex-1 px-2 border-r">ဌာန</div>
            <div class="flex-1 px-2">လက်ရှိရာထူးရရှိရက်စွဲ</div>
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
                    <div class="flex-1 px-2">{{
                   formatDMYmm(  $member->current_rank_date)

                     }}</div>
                </li>
            @endforeach
        </ul>
    </div>
</div>




