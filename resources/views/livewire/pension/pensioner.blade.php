<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Pensioner</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf({{$staff->id}})">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word({{$staff->id}})">WORD</x-primary-button>
            <br><br>
            <div class="relative overflow-x-auto shadow-md mb-5">
                <table class="w-full text-sm text-gray-500 dark:text-gray-400">
                    <thead class="font-arial text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                        <tr>
                            <th scope="col" class="px-3 py-3 border border-gray-300">စဥ်</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">အမည်</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">တာဝန်ထမ်းဆောင်ခဲ့သည့်ရာထူး</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">တာဝန်ထမ်းဆောင်ခဲ့သည့်ဌာနခွဲ
                            </th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">မွေးသက္ကရာဇ်</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">စုစုပေါင်းလုပ်သက်</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">ပင်စင်အမျိုးအစား</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">ပင်စင်ခံစားသည့်ရက်စွဲ</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">ပင်စင်လစာ</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">ဆုငွေ</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">ထုတ်ယူသည့်ဘဏ်</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">ပင်စင်ရုံး၏ ခွင့်ပြုမိန့်</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">ဆက်သွယ်ရန်လိပ်စာ/တယ်လီဖုန်းနံပါတ်</th>
                        </tr>
                    </thead>
                     <tbody>
                       
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
</div>

