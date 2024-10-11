<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <h1 class="text-center text-base font-bold mb-4">ရင်းနှီးမြှပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန<br>ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 border-collapse table-auto">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">စဥ်</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">အမည်</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ရာထူး</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">နိုင်ငံသားစိစစ်ရေးအမှတ်
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ဌာနခွဲ</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">မွေးသက္ကရာဇ်</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">
                                အလုပ်စတင်ဝင်ရောက်သည့်ရက်စွဲ</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">တစ်ဆင့်နိမ့်ရာထူးရရက်စွဲ
                                ရက်၊လ၊နှစ်</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">လက်ရှိရာထူးရရက်စွဲ
                                ရက်၊လ၊နှစ်</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ပညာအရည်အချင်း</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staffs as $staff)
                            <tr class="border-b">
                                <td class="px-4 py-2 text-center text-sm text-gray-600">{{$loop->index + 1}}</td>
                                <td class="px-4 py-2 text-center text-sm text-gray-600">{{$staff->name}}</td>
                                <td class="px-4 py-2 text-center text-sm text-gray-600">{{$staff->current_rank->name}}</td>
                                <td class="px-4 py-2 text-center text-sm text-gray-600">{{$staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code  }}</td>
                                <td class="px-4 py-2 text-center text-sm text-gray-600">{{$staff->current_department?->name}}</td>
                                <td class="px-4 py-2 text-center text-sm text-gray-600">{{en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-y'))}}</td>
                                <td class="px-4 py-2 text-center text-sm text-gray-600">{{en2mm(Carbon\Carbon::parse($staff->join_date)->format('d-m-y'))}}</td>
                                <td class="px-4 py-2 text-center text-sm text-gray-600">{{en2mm(Carbon\Carbon::parse($staff->postings->sortByDesc('from_date')->first()?->from_date)->format('d-m-y'))}}</td>
                                <td class="px-4 py-2 text-center text-sm text-gray-600">{{en2mm(Carbon\Carbon::parse($staff->current_rank_date)->format('d-m-y'))}}</td>
                                <td class="px-4 py-2 text-center text-sm text-gray-600">
                                    @foreach ($staff->staff_educations as $edu)
                                        <div class="mb-2">
                                            <span class="font-semibold">{{ $edu->education_group->name }}</span> -
                                            <span>{{ $edu->education_type->name }}</span>,
                                            <span>{{ $edu->education->name }}</span>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                          @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
