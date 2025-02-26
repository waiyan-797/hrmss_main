<div  class=" w-screen">

   <div class=" w-96  ms-7">


   <div class=" flex  gap-x-4   mt-10   justify-around">
    <x-select
    wire:model.live="selectedRankId"


    class="block w-full p-2 text-sm border rounded"
    :values="$ranks"
    placeholder="Select..."
/>


{{--
<x-select
wire:model.live="selectDivisionId"


class="block w-full p-2 text-sm border rounded"
:values="$divisions"
placeholder="Select..."
/> --}}
   </div>





   </div>

<div class="mt-5 flex justify-center items-center">
    <div class="w-screen border border-gray-300">

        <!-- Move Up / Down & Save Buttons -->
        <div class="flex justify-start gap-x-4 items-center p-2 bg-gray-100">
            <div>
                <button wire:click="moveUp" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Move Up</button>
                <button wire:click="moveDown" class="bg-blue-500 text-white px-4 py-2 rounded">Move Down</button>
            </div>
            <button wire:click="saveOrder" class="bg-green-500 text-white px-4 py-2 rounded">Save Order</button>
        </div>

        <!-- Table Header -->
        <div class="flex bg-gray-200 p-2 font-semibold">
            <div class="w-12 text-center border-r">စဉ်</div>
            <div class="flex-1 px-2 border-r">အမည်</div>
            <div class="flex-1 px-2 border-r">ရာထူး</div>
            <div class="flex-1 px-2 border-r">ဌာန</div>
            <div class="flex-1 px-2">လက်ရှိရာထူးရရှိရက်စွဲ</div>
        </div>

        <!-- Table Body -->
        <ul>
            @foreach($sortedStaffs as $index => $staffId)
                @php
                    $member = $staffs->where('id', $staffId)->first();
                @endphp
                <li wire:click="selectRow({{ $staffId }})"
                    class="flex border-b p-2 items-center cursor-pointer
                           {{ $selectedStaffId === $staffId ? 'bg-green-200' : 'hover:bg-gray-100' }}">
                    <div class="w-12 text-center border-r">{{ $index + 1 }}</div>
                    {{-- <div class="w-12 text-center border-r">{{ $member->sort_no }}</div> --}}
                    <div class="flex-1 px-2 border-r">{{ $member->name }}</div>
                    <div class="flex-1 px-2 border-r">{{ $member->current_rank->name }}</div>
                    <div class="flex-1 px-2 border-r">{{ $member->current_department?->name }}</div>
                    <div class="flex-1 px-2">{{ formatDMYmm($member->current_rank_date) }}</div>
                </li>
            @endforeach
        </ul>

        <!-- Flash Message -->
        @if (session()->has('message'))
            <div class="text-green-600 p-2">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>

