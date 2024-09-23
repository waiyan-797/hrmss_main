<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Pension Family List</h1>
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
                            <th scope="col" class="px-3 py-3 border border-gray-300">ကွယ်လွန်ဝန်ထမ်းအမည်</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">တာဝန်ထမ်းဆောင်ခဲ့သည့်ရာထူး</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">စတင်အမှုထမ်းသောနေ့</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">အမှုထမ်းသက်ဆုံးခန်းတိုင်သည့်နေ့</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">လုပ်သက်</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">ကွယ်လွန်သည့်နေ့</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">မိသားစုပင်စင်ခံစားမည့်အမည်</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">ကွယ်လွန်သူသည်ပင်စင်စားဖြစ်လျှင်ပင်စင်ယူသောနေ့</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">ကွယ်လွန်သူနှင့်တော်စပ်ပုံ</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">မိသားစုပင်စင်ခံစားသည့်နေ့</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">ထုတ်ယူလိုသည့်ဘဏ်</th>
                            <th scope="col" class="px-3 py-3 border border-gray-300">ရရှိမည့်ပင်စင်လစာ/ဆုငွေ</th>
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

