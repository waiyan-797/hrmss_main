<div  class=" w-screen">

   <div class=" w-96  ms-7">
    <x-searchable-select  property="selectedRankId" :values="$ranks" 
    id="current_rank_id" name="current_rank_id" class="mt-1 block " required/>
   </div>

 
    <div class=" mt-5 flex justify-center items-center    ">
        <ul wire:sortable="updateOrder" class="  w-screen" wire:sortable.options="{ animation: 100 }" >
            @foreach($staffs as $member)
                <li wire:sortable.item="{{ $member->id}}" wire:key="staff-{{ $member->id }}" class="p-2 border mb-1">
                    <div wire:sortable.handle >
                    <span class=" text-lg  ">
                        {{$member->sort_no}}
                    </span>
                    <span class=" text-lg">
                        {{ $member->name }}

                    </span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    
</div>