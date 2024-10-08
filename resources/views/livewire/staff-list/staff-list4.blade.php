<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
          <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
          <br><br>
            <h1 class="font-bold text-center text-base">
                ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲ
                ဝန်ထမ်းအင်အားစာရင်း</h1>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-center p-2">စဥ်</th>
                        <th class="border border-black text-left p-2">အမည်/ရာထူး</th>
                        <th class="border border-black text-left p-2">မူလဌာန</th>
                        <th class="border border-black text-center p-2">ခုနှစ်<br>မှ-ထိ</th>
                        <th class="border border-black text-left p-2">ပြောင်းရွေ့ဌာန</th>
                        <th class="border border-black text-center p-2">ခုနှစ်<br>မှ-ထိ</th>
                        <th class="border border-black text-center p-2">လက်ရှိဌာန<br>ရောက်ရှိ ရက်စွဲ</th>
                        <th class="border border-black text-center p-2">မှတ်ချက်</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
                    <tr>
                        <td class="border border-black text-center p-2">{{ $loop->index+1}}</td>
                        <td class="border border-black text-left p-2">{{ $staff->name}}၊
                            @foreach($staff->postings as $posting)
                            {{ $staff->rank?->name}}
                            @endforeach
                        </td>
                        <td class="border border-black text-left p-2">{{ $staff->postings[0]->department->name }}</td>
                        <td class="border border-black text-center p-2">{{ $posting->from_date}}<br>{{ $posting->to_date}}</td>
                        <td class="border border-black text-left p-2">{{ $staff->side_department->name}}</td>
                        <td class="border border-black text-center p-2">  
                            {{ \Carbon\Carbon::parse($posting->to_date)->format('d m Y') }}-{{ \Carbon\Carbon::now()->format('d-m-Y')}}
<br>
                        
                    
            </td>
                        <td class="border border-black text-center p-2">{{en2mm(Carbon\Carbon::parse($staff->postings->sortByDesc('from_date')->first()?->from_date)->format('d-m-y'))}}</td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
