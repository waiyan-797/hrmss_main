<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            <br><br>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <label for="startDate" class="font-semibold">Start Date</label>
                    <x-date-picker id="startDate" wire:model.live="filterRange" />
                </div>
            
                <div class="flex items-center space-x-2">
                    <label for="endDate" class="font-semibold">End Date</label>
                    <x-date-picker id="endDate" wire:model.live="filterRangeTo" />
                </div>
            </div><br>
            
            <table class="w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black p-2 text-center">စဉ်</th>
                        <th rowspan="2" class="border border-black p-2 text-center">အကြောင်းအရာ</th>
                        <th colspan="3" class="border border-black p-2 text-center">{{en2mm($day)}}-{{mmMonth($month)}}-{{en2mm($year)}}ထိ<br>အင်အား</th>
                        <th colspan="2" class="border border-black p-2 text-center">အသစ်ခန့်အပ်</th>
                        <th colspan="2" class="border border-black p-2 text-center">အခြားဌာနမှ<br>ရောက်ရှိ</th>
                        <th colspan="2" class="border border-black p-2 text-center">အခြားဌာနသို့<br>ပြောင်းရွေ့ခြင်း
                        </th>
                        <th colspan="2" class="border border-black p-2 text-center">ပင်စင်ခံစားခြင်း</th>
                        <th colspan="2" class="border border-black p-2 text-center">နုတ်ထွက်ခြင်း</th>
                        <th colspan="2" class="border border-black p-2 text-center">ထုတ်ပယ်ခြင်း/<br>ထုတ်ပစ်ခြင်း
                        </th>
                        <th colspan="2" class="border border-black p-2 text-center">ကွယ်လွန်ခြင်း</th>
                        <th colspan="3" class="border border-black p-2 text-center">{{en2mm($toDay)}}-{{mmMonth($Tomonth)}}-{{en2mm($Toyear)}}ထိအင်အားစုစုပေါင်း</th>
                        <th rowspan="2" class="border border-black p-2 text-center">မှတ်ချက်</th>
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
                    <tr class="">
                        <td class="p-2 border border-black text-center">၁</td>
                        <td class="p-2 border border-black text-center">၂</td>
                        <td class="p-2 border border-black text-center">၃</td>
                        <td class="p-2 border border-black text-center">၄</td>
                        <td class="p-2 border border-black text-center">၅</td>
                        <td class="p-2 border border-black text-center">၆</td>
                        <td class="p-2 border border-black text-center">၇</td>
                        <td class="p-2 border border-black text-center">၈</td>
                        <td class="p-2 border border-black text-center">၉</td>
                        <td class="p-2 border border-black text-center">၁၀</td>
                        <td class="p-2 border border-black text-center">၁၁</td>
                        <td class="p-2 border border-black text-center">၁၂</td>
                        <td class="p-2 border border-black text-center">၁၃</td>
                        <td class="p-2 border border-black text-center">၁၄</td>
                        <td class="p-2 border border-black text-center">၁၅</td>
                        <td class="p-2 border border-black text-center">၁၆</td>
                        <td class="p-2 border border-black text-center">၁၇</td>
                        <td class="p-2 border border-black text-center">၁၈</td>
                        <td class="p-2 border border-black text-center">၁၉</td>
                        <td class="p-2 border border-black text-center">၂၀</td>
                        <td class="p-2 border border-black text-center">၂၁</td>
                        <td class="p-2 border border-black text-center">၂၂</td>
                        <td class="p-2 border border-black text-center">၂၃</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="border border-black text-center p-2">၁</td>
                        <td class="border border-black text-center p-2">လုပ်သက်၁၀နှစ်အထက်</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_dlimit_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_dlimit_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_dlimit_staffs + $low_dlimit_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_new_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_new_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_transfer_new_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_transfer_new_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_leave_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_leave_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_q->where('retire_type_id', 5)->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_q->where('retire_type_id', 5)->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_q->where('retire_type_id', 2)->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_q->where('retire_type_id', 2)->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_q->whereIn('retire_type_id', [3, 4])->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_q->where('retire_type_id', [3, 4])->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_q->where('retire_type_id', 1)->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_q->where('retire_type_id', 1)->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_dlimit2_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_dlimit2_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_dlimit2_staffs + $low_dlimit2_staffs) }}</td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-black text-center p-2">လုပ်သက်၁၀နှစ်အောက်</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_dlimit_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_dlimit_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_dlimit_staffs2 + $low_dlimit_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_new_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_new_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_transfer_new_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_transfer_new_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_leave_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_leave_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_q2->where('retire_type_id', 5)->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_q2->where('retire_type_id', 5)->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_q2->where('retire_type_id', 2)->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_q2->where('retire_type_id', 2)->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_q2->whereIn('retire_type_id', [3, 4])->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_q2->where('retire_type_id', [3, 4])->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_q2->where('retire_type_id', 1)->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_q2->where('retire_type_id', 1)->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_dlimit2_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_dlimit2_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_dlimit2_staffs + $low_dlimit2_staffs) }}</td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">စုစုပေါင်း</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_dlimit_staffs + $high_dlimit_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_dlimit_staffs + $low_dlimit_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm(($high_dlimit_staffs + $low_dlimit_staffs) + ($high_dlimit_staffs2 + $low_dlimit_staffs2)) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_new_staffs + $high_new_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_new_staffs + $low_new_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_transfer_new_staffs + $high_transfer_new_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_transfer_new_staffs + $low_transfer_new_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_leave_staffs + $high_leave_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_leave_staffs + $low_leave_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm(($high_q->where('retire_type_id', 5)->count()) + ($high_q2->where('retire_type_id', 5)->count())) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm(($low_q->where('retire_type_id', 5)->count()) + ($low_q2->where('retire_type_id', 5)->count())) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_q->where('retire_type_id', 2)->count() + $high_q2->where('retire_type_id', 2)->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_q->where('retire_type_id', 2)->count() + $low_q2->where('retire_type_id', 2)->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_q->whereIn('retire_type_id', [3, 4])->count() + $high_q2->whereIn('retire_type_id', [3, 4])->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_q->where('retire_type_id', [3, 4])->count() + $low_q2->where('retire_type_id', [3, 4])->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_q->where('retire_type_id', 1)->count() + $high_q2->where('retire_type_id', 1)->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_q->where('retire_type_id', 1)->count() + $low_q2->where('retire_type_id', 1)->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_dlimit2_staffs + $high_dlimit2_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_dlimit2_staffs + $low_dlimit2_staffs2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm(($high_dlimit2_staffs + $low_dlimit2_staffs) + ($high_dlimit2_staffs2 + $low_dlimit2_staffs2)) }}</td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                </tbody>
            </table>

            <div>
            <p class="float-right mr-32">(လက်မှတ်)<br>တာဝန်ခံအရာရှိ</p>

            </div>


        </div>
    </div>
</div>
