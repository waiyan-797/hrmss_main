<div class="w-full">
    <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button><br>
    <h1 class="text-center text-sm font-bold ">ပြည်ထောင်စုရာထူးဝန်အဖွဲ့</h1>
    <h1 class="text-center text-sm font-bold ">လုပ်သက်မှတ်တွက်ချက်မှု စနစ်သစ်</h1>
    <h1 class="text-left text-sm font-bold ">အမည်။ {{ $staff->name }}</h1>
    <h1 class="text-left text-sm font-bold ">ရာထူး။ {{ $staff->current_rank?->name }}</h1>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-center p-2">စဥ်</th>
                        <th class="border border-black text-center p-2">ရာထူး</th>
                        <th class="border border-black text-center p-2">နှစ်</th>
                        <th class="border border-black text-center p-2">ရမှတ်</th>
                        <th class="border border-black text-center p-2">မှတ်ချက်</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black text-center p-2">၁။</td>
                        <td class="border border-black text-center p-2">လက်ရှိရာထူး</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($first_promotion_points) }}
                        </td>
                        <td class="border border-black text-center p-2">   {{ en2mm($first_promotion_points*3) }}</td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-black text-center p-2">၂။</td>
                        <td class="border border-black text-center p-2">တစ်ဆင့်နိမ့်ရာထူး</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($second_promotion_points) }}
                        </td>
                        <td class="border border-black text-center p-2"> {{ en2mm($second_promotion_points*2) }}</td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-black text-center p-2">၃။</td>
                        <td class="border border-black text-center p-2">နောက်တစ်ဆင့်နိမ့်ရာထူး</td>
                        <td class="border border-black text-center p-2">{{ en2mm($third_promotion_points) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($third_promotion_points*1) }}</td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-black text-center p-2">၄။</td>
                        <td class="border border-black text-center p-2">နောက်တစ်ဆင့်နိမ့်ရာထူးများ</td>
                        <td class="border border-black text-center p-2">{{ en2mm($fourth_promotion_points) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($fourth_promotion_points*0.5) }}</td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">လုပ်သက်ပေါင်း</td>
                        <td class="border border-black text-center p-2"> {{ en2mm($first_promotion_points+$second_promotion_points+$third_promotion_points+$fourth_promotion_points) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($first_promotion_points*3+$second_promotion_points*2+$third_promotion_points*1+$fourth_promotion_points*0.5)}}</td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">လက်ကျန်လုပ်သက်</td>
                        <td class="border border-black text-center p-2">{{ en2mm(44-($first_promotion_points+$second_promotion_points+$third_promotion_points+$fourth_promotion_points)) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm((44 - ($first_promotion_points + $second_promotion_points + $third_promotion_points + $fourth_promotion_points)) * 3) }}
                        </td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">ဝန်ထမ်းရမှတ်</td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">{{ en2mm(($first_promotion_points * 3 + $second_promotion_points * 2 + $third_promotion_points * 1 + $fourth_promotion_points * 0.5) * 100 / 
                            (($first_promotion_points * 3 + $second_promotion_points * 2 + $third_promotion_points * 1 + $fourth_promotion_points * 0.5) + 
                            ((44 - ($first_promotion_points + $second_promotion_points + $third_promotion_points + $fourth_promotion_points)) * 3))) }}
                        </td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
