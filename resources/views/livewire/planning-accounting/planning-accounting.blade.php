<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Planning Accounting</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <div class="w-full mb-4">
                <h2 class="font-semibold text-base">စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲဝန်ထမ်းအင်အားစာရင်း</h2>
                <table class="w-full text-center">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 border border-black">စဥ်</th>
                            <th class="p-2 border border-black">အမည်</th>
                            <th class="p-2 border border-black">ရာထူး</th>
                            <th class="p-2 border border-black">မှတ်ချက်</th>
                        </tr>
                    </thead>
                    <tbody class="text-center h-8 p-2">
                       @foreach($staffs as $staff)
                        <tr>
                            <td class="border border-black p-2">{{ $loop->index+1}}</td>
                            <td class="border border-black p-2">{{ $staff->name}}</td>
                            <td class="border border-black p-2">{{ $staff->current_rank->name}}</td>
                            <td class="border border-black p-2"></td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
</div>
