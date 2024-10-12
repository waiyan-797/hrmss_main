<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>


            <div class="w-full mb-4">
                <h1 class="font-semibold text-base mb-2 text-center">
                    ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
                <div class="w-full rounded-lg">
                    <table class="w-full text-center">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-2 border border-black">စဥ်</th>
                                <th class="p-2 border border-black">အမည်နှင့်အမျိုးသားမှတ်ပုံတင်အမှတ်</th>
                                <th class="p-2 border border-black">မွေးနေ့သက္ကရာဇာ်</th>
                                <th class="p-2 border border-black text-left">(က)ရာထူး<br>(ခ)
                                    လစာနှုန်း<br>(ဂ)နောက်ဆုံးထုတ်လစာ</th>
                                <th class="p-2 border border-black">စတင်အမှုထမ်းသည့်နေ့</th>
                                <th class="p-2 border border-black">စတင်ကင်းကွာ/ပျက်ကွက်သည့်နေ့</th>
                                <th class="p-2 border border-black">
                                    ဝန်ထမ်းအဖြစ်မှထုတ်ပစ်/ရာထူးမှထုတ်ပယ်သည့်နေ့အမိန့်စာရက်စွဲ</th>
                                <th class="p-2 border border-black">လုပ်သက်</th>
                                <th class="p-2 border border-black">
                                    ဝန်ထမ်းအဖြစ်မှထုတ်ပစ်/ရာထူးမှထုတ်ပယ်ခံရသည့်အကြောင်းအရင်း</th>
                                <th class="p-2 border border-black">မှတ်ချက်</th>
                            </tr>
                        </thead>
                        <tbody class="text-center h-8 p-2">
                            <tr>
                                <td class="border border-black p-2">(က)</td>
                                <td class="border border-black p-2">(ခ)</td>
                                <td class="border border-black p-2">(ဂ)</td>
                                <td class="border border-black p-2">(ဃ)</td>
                                <td class="border border-black p-2">(င)</td>
                                <td class="border border-black p-2">(စ)</td>
                                <td class="border border-black p-2">(ဆ)</td>
                                <td class="border border-black p-2">(ဇ)</td>
                                <td class="border border-black p-2">(ဈ)</td>
                                <td class="border border-black p-2">(ည)</td>
                            </tr>
                            @foreach($staffs as $staff)
                            <tr>
                                <td class="border border-black p-2">{{ $loop->index+1}}</td>
                                <td class="border border-black p-2">{{ $staff->name}}၊{{ $staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code }}</td>
                                <td class="border border-black p-2">{{ en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-y')) }}</td>
                                <td class="border border-black p-2">{{ $staff->current_rank?->name}}၊{{ $staff->payscale?->name}}၊{{ $staff->current_salary}}</td>
                                <td class="border border-black p-2">{{en2mm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-y'))}}</td>
                                <td class="border border-black p-2">{{ $staff->lost_contact_from_date}}</td>
                                <td class="border border-black p-2">{{ $staff->retire_date}}</td>
                                <td class="border border-black p-2">
                                      @php
                                    $join_date = Carbon\Carbon::parse($staff->join_date);
                                    $join_date_duration = $join_date->diff(Carbon\Carbon::now());
                                @endphp
                                {{formatPeriodMM($join_date_duration->y, $join_date_duration->m, $join_date_duration->d)}}</td>
                                <td class="border border-black p-2">{{ $staff->retire_remark}}</td>
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
