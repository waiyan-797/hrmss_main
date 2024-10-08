<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <table class="w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black p-2 text-center">စဥ်</th>
                        <th rowspan="2" class="border border-black p-2 text-center">အကြောင်းအရာ</th>
                        <th colspan="3" class="border border-black p-2 text-center">၃၁-၁၂-၂၀၂၃ထိ<br>အင်အား</th>
                        <th colspan="2" class="border border-black p-2 text-center">အသစ်ခန့်အပ်</th>
                        <th colspan="2" class="border border-black p-2 text-center">အခြားဌာနမှ<br>ရောက်ရှိ</th>
                        <th colspan="2" class="border border-black p-2 text-center">အခြားဌာနသို့<br>ပြောင်းရွေ့ခြင်း
                        </th>
                        <th colspan="2" class="border border-black p-2 text-center">ပင်စင်ခံစားခြင်း</th>
                        <th colspan="2" class="border border-black p-2 text-center">နုတ်ထွက်ခြင်း</th>
                        <th colspan="2" class="border border-black p-2 text-center">ထုတ်ပယ်ခြင်း/<br>ထုတ်ပစ်ခြင်း
                        </th>
                        <th colspan="2" class="border border-black p-2 text-center">ကွယ်လွန်ခြင်း</th>
                        <th colspan="3" class="border border-black p-2 text-center">၃၁-၃-၂၀၂၄ထိအင်အားစုစုပေါင်း</th>
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

            <div class="flex justify-start my-2">
              <p class="w-1/5 ml-10">ရှင်းလင်းချက်။</p>
              <p class="w-3/4">လက်ထောက်ညွှန်ကြားရေးမှူး ဒေါ်ဧဧသန့်သည် လုပ်သက် ၁၀နှစ်အထက်သို့ရောက်ရှိ<br>လက်ထောက်ညွှန်ကြားရေးမှူး ‌ဒေါ်မေသူဇာဝင့်သည် လုပ်သက် ၁၀နှစ်အထက်သို့ရောက်ရှိ</p>
            </div>

            <p class="float-right mr-32">(လက်မှတ်)<br>တာဝန်ခံအရာရှိ</p>

        </div>
    </div>
</div>
