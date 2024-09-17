<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Investment Companies12</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf({{$staff->id}})">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word({{$staff->id}})">WORD</x-primary-button>
            <br><br>


            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th colspan="3" class="border border-black text-center p-2">မူလအင်အား</th>
                        <th colspan="2" class="border border-black text-center p-2">အသစ်ခန့်အပ်</th>
                        <th colspan="2" class="border border-black text-center p-2">အခြားဌာနမှ<br>ရောက်ရှိ</th>
                        <th colspan="2" class="border border-black text-center p-2">အခြားဌာနသို့<br>ပြေင်းရွေ့ခြင်း</th>
                        <th colspan="2" class="border border-black text-center p-2">ပင်စင်ခံစားခြင်း</th>
                        <th colspan="2" class="border border-black text-center p-2">နုတ်ထွက်ခြင်း</th>
                        <th colspan="2" class="border border-black text-center p-2">ထုတ်ပယ်ခြင်း/<br>ထုတ်ပစ်ခြင်း</th>
                        <th colspan="2" class="border border-black text-center p-2">ကွယ်လွန်ခြင်း</th>
                        <th colspan="3" class="border border-black text-center p-2">၃၁-၃-၂၀၂၄ထိအင်အားစုစုပေါင်း</th>
                        <th rowspan="2" class="border border-black text-center p-2">မှတ်ချက်</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ပေါင်း</th>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ပေါင်း</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black text-center p-2">၁</td>
                        <td class="border border-black text-center p-2">၃</td>
                        <td class="border border-black text-center p-2">၄</td>
                        <td class="border border-black text-center p-2">၅(၃+၄)</td>
                        <td class="border border-black text-center p-2">၆</td>
                        <td class="border border-black text-center p-2">၇</td>
                        <td class="border border-black text-center p-2">၈</td>
                        <td class="border border-black text-center p-2">၉</td>
                        <td class="border border-black text-center p-2">၁၀</td>
                        <td class="border border-black text-center p-2">၁၁</td>
                        <td class="border border-black text-center p-2">၁၂</td>
                        <td class="border border-black text-center p-2">၁၃</td>
                        <td class="border border-black text-center p-2">၁၄</td>
                        <td class="border border-black text-center p-2">၁၅</td>
                        <td class="border border-black text-center p-2">၁၆</td>
                        <td class="border border-black text-center p-2">၁၇</td>
                        <td class="border border-black text-center p-2">၁၈</td>
                        <td class="border border-black text-center p-2">၁၉</td>
                        <td class="border border-black text-center p-2">၂၀<br>(၃+၆+၈)-(၁၀+၁၂+၁၄+၁၆+၁၈)</td>
                        <td class="border border-black text-center p-2">၂၁<br>(၄+၇+၉)-(၁၁+၁၃+၁၅+၁၇+၁၉)</td>
                        <td class="border border-black text-center p-2">၂၂<br>(၂၁+၂၂)</td>
                        <td class="border border-black text-center p-2">၂၃</td>
                    </tr>
                    <tr>
                        <td class="border border-black text-center p-2">၁</td>
                        <td class="border border-black text-right p-2">၂၄၄</td>
                        <td class="border border-black text-right p-2">၂၀၄</td>
                        <td class="border border-black text-right p-2">၄၄၈</td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2">၁၄</td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2">၁</td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2">၁</td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2">၁</td>
                        <td class="border border-black text-right p-2">၁</td>
                        <td class="border border-black text-right p-2">၇</td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2">၂၄၃</td>
                        <td class="border border-black text-right p-2">၂၁၀</td>
                        <td class="border border-black text-right p-2">၄၅၃</td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">၂၄၄</td>
                        <td class="border border-black text-center p-2">၂၀၄</td>
                        <td class="border border-black text-center p-2">၄၄၈</td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">၁</td>
                        <td class="border border-black text-center p-2">၁</td>
                        <td class="border border-black text-center p-2">၇</td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">၂၄၃</td>
                        <td class="border border-black text-center p-2">၂၁၀</td>
                        <td class="border border-black text-center p-2">၄၅၃</td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
</div>
