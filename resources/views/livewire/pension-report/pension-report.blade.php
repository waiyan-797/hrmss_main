<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-base">Pension Report</h1>
            
            <div   class=" w-44">
                <x-text-input 
                    wire:model.live='searchName'
                 
                />
            </div>
        <table class="md:w-full  mt-6">
                <thead>
                    <tr>
                        <th class="border border-black text-center p-2">စဥ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">ရာထူး</th>
                        <th class="border border-black text-left p-1">ဌာန</th>
                        <th class="border border-black text-left p-1">txtsection</th>
                        <th class="border border-black text-left p-1">မွေးသက္ကရာဇ်</th>
                        <th class="border border-black text-left p-1">ပင်စင်ယူသည့်ရက်စွဲ</th>
                        <th class="border border-black text-left p-1">ပင်စင်အမျိုးအစား</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
                    <tr>
                        <td class="border border-black text-right p-1">{{ $loop->index+1}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->name}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->current_rank->name}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->current_department->name}}</td>
                        <td class="border border-black text-left p-1">-</td>
                        <td class="border border-black text-left p-1">{{ $staff->dob}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->retire_date}}</td>
                        
                        <td class="border border-black text-left p-1">
                            {{ $staff->pension_type?->name}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
