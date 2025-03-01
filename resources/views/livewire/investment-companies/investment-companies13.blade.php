<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            {{-- <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button> --}}
            <br><br>
            <h2 class="font-semibold text-base text-center">ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h2>
            <h2 class="font-semibold text-base text-center">ဘွဲ့ရရှိသူများစာရင်း</h2>
            <br>
            
            {{-- <div class="flex justify-around my-3" >
               
                <div class=" w-96 mr-6">
                    <x-searchable-select
                    placeholder="ပညာအရည်အချင်း"
                    class="block w-full mt-1"
                    property="education_id" :values="$educations"
                       />
                   </div>
                   <div class="w-96 mr-6">
                    <x-searchable-select
                    placeholder="ပညာအရည်အချင်းအမျိုးအစား"
                    class="block w-full mt-1"
                    property="education_type_id" :values="$education_types"
                       />
                </div>
                <div class="w-96 mr-6">
                    <x-searchable-select
                    placeholder="ပညာအရည်အချင်းအုပ်စု"
                    class="block w-full mt-1"
                    property="education_group_id" :values="$education_groups"
                       />
                </div>
            </div> --}}
            <x-select wire:model.live="education_id" :values="$educations" placeholder='ဘွဲ့ရွေးပါ' />
            <x-select wire:model.live="education_type_id" :values="$education_types" placeholder='ဘွဲ့အမျိုးအစားရွေးပါ' />
            <x-select wire:model.live="education_group_id" :values="$education_groups" placeholder='ဘွဲ့အုပ်စုရွေးပါ' />
           
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black p-2 text-center">စဉ်</th>
                        <th class="border border-black p-2 text-center">အမည်</th>
                        <th class="border border-black p-2 text-center">ရာထူး</th>
                        <th class="border border-black p-2 text-center">ပညာအရည်အချင်း</th>
                        <th class="border border-black p-2 text-center">နိုင်ငံ</th>
                        <th class="border border-black p-2 text-center">မှတ်ချက်</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $serialNumber = 1; 
                    @endphp
                    @foreach($staffs as  $staff)
                        <tr>
                            <td class="border border-black p-2 text-center">{{en2mm($serialNumber++)}}</td>
                            <td class="border border-black p-2 text-center">{{ $staff->name }}</td>
                            <td class="border border-black p-2 text-center">{{ $staff->current_rank ? $staff->current_rank->name : null }}</td>
                            <td class="border border-black p-2 text-center">
                                {{ 
                                    $staff->staff_educations->isNotEmpty() 
                                    ? $staff->staff_educations->pluck('education.name')->filter()->implode(', ') 
                                    : null 
                                }}
                            </td>
                            <td class="border border-black p-2 text-center">
                                {{ 
                                    $staff->staff_educations->isNotEmpty() 
                                    ? $staff->staff_educations->pluck('country.name')->filter()->implode('၊ ') 
                                    : null 
                                }}
                            </td>
                            <td class="border border-black p-2 text-center"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
