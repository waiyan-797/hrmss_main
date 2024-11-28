 <div>


    <div>
        <x-input-label for="အမည်" :value="__('အမည်')" />
        <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>
    {{$nrc_region_id}}
    <div>
        <x-input-label for="မွေးသက္ကရာဇ်" :value="__('မွေးသက္ကရာဇ်')" />
        <x-text-input wire:model="dob" id="dob" name="dob" type="date" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('dob')" />
    </div>
    <div class="col-span-4">
        <x-input-label :value="__('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်(တိုင်းဒေသကြီး/ပြည်နယ်, မြို့/မြို့နယ်, အမှတ်အသား, ကုဒ်)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-select wire:model.change="nrc_region_id" :values="$nrc_region_ids" placeholder="Select Region ID" id="nrc_region_id" name="nrc_region_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('nrc_region_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model.change="nrc_township_code_id" :values="$nrc_township_codes" placeholder="Select Township Code" id="nrc_township_code_id" name="nrc_township_code_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('nrc_township_code_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model.change="nrc_sign_id" :values="$nrc_signs" placeholder="Select Sign" id="nrc_sign_id" name="nrc_sign_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('nrc_sign_id')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="nrc_code" id="nrc_code" placeholder="Code" name="nrc_code" type="number" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('nrc_code')" />
            </div>
        </div>
        <br>

        <div class="grid grid-cols-2 gap-4">
            <!-- NRC Front Section -->
            <div class="flex flex-col">
                <div class="mb-4">
                    @if ( $nrc_front)
                        <img src="{{ route('file', $nrc_front) }}" class="w-40 h-40 rounded-md border-2 border-gray-400">
                    @else
                        <img src="{{ $nrc_front ? $nrc_front->temporaryUrl() : asset('img/img.png') }}" class="w-40 h-40 rounded-md border-2 border-gray-400">
                    @endif
                </div>
                <x-input-label for="nrc_front" :value="__('နိုင်ငံသားစိစစ်ရေးကတ်ပြား (အရှေ့ဘက်)')"/>
                <x-input-file wire:model='nrc_front' id="nrc_front" accept=".jpg, .jpeg, .png" name="nrc_front" class="block w-full text-sm border rounded-lg cursor-pointer text-gray-700 focus:outline-none placeholder-gray-400 mt-1 font-arial bg-white border-gray-300" />
                <x-input-error class="mt-1" :messages="$errors->get('nrc_front')" />
            </div>

            <!-- NRC Back Section -->
            <div class="flex flex-col">
                <div class="mb-4">
                    @if ( $nrc_back)
                        <img src="{{ route('file', $nrc_back) }}" class="w-40 h-40 rounded-md border-2 border-gray-400">
                    @else
                        <img src="{{ $nrc_back ? $nrc_back->temporaryUrl() : asset('img/img.png') }}" class="w-40 h-40 rounded-md border-2 border-gray-400">
                    @endif
                </div>
                <x-input-label for="nrc_back" :value="__('နိုင်ငံသားစိစစ်ရေးကတ်ပြား (အနောက်ဘက်)')"/>
                <input wire:model='nrc_back' id="nrc_back" accept=".jpg, .jpeg, .png" name="nrc_back" type="file" class="block w-full text-sm border rounded-lg cursor-pointer text-gray-700 focus:outline-none placeholder-gray-400 mt-1 font-arial bg-white border-gray-300" />
                <x-input-error class="mt-1" :messages="$errors->get('nrc_back')" />
            </div>
        </div>

        <div class="col-span-3">
            <x-input-label :value="__('လက်ရှိနေရပ်လိပ်စာ အပြည့်အစုံ (လမ်း,ရပ်ကွက်,မြို့/မြို့နယ်,ခရိုင်,ပြည်နယ်/တိုင်းဒေသကြီး)')" />
            <div class="flex flex-row gap-2">
                <div>
                    <x-select wire:model.change="current_address_region_id" :values="$regions" placeholder="ပြည်နယ်/တိုင်းဒေသကြီး" id="current_address_region_id" name="current_address_region_id" class="mt-1 block w-full" required/>
                    <x-input-error class="mt-2" :messages="$errors->get('current_address_region_id')" />
                </div>
                <div>
                    <x-select wire:model="current_address_township_or_town_id" :values="$current_address_townships" placeholder="မြို့/မြို့နယ်" id="current_address_township_or_town_id" name="current_address_township_or_town_id" class="mt-1 block w-full" required/>
                    <x-input-error class="mt-2" :messages="$errors->get('current_address_township_or_town_id')" />
                </div>
                <div>
                    <x-text-input wire:model="current_address_ward" placeholder="ရပ်ကွက်" id="current_address_ward" name="current_address_ward" type="text" class="mt-1 block w-full" required/>
                    <x-input-error class="mt-2" :messages="$errors->get('current_address_ward')" />
                </div>
                <div>
                    <x-text-input wire:model="current_address_street" placeholder="လမ်း" id="current_address_street" name="current_address_street" type="text" class="mt-1 block w-full" required/>
                    <x-input-error class="mt-2" :messages="$errors->get('current_address_street')" />
                </div>
            </div>
        </div>
        <div class="col-span-3">
            <x-input-label :value="__('အမြဲတမ်းနေရပ်လိပ်စာ အပြည့်အစုံ (လမ်း,ရပ်ကွက်,မြို့/မြို့နယ်,ခရိုင်,ပြည်နယ်/တိုင်းဒေသကြီး)')" />
            <div class="flex flex-row gap-2">
                <div>
                    <x-select wire:model.change="permanent_address_region_id" :values="$regions" placeholder="ပြည်နယ်/တိုင်းဒေသကြီး" id="permanent_address_region_id" name="permanent_address_region_id" class="mt-1 block w-full" required/>
                    <x-input-error class="mt-2" :messages="$errors->get('permanent_address_region_id')" />
                </div>
                <div>
                    <x-select wire:model="permanent_address_township_or_town_id" :values="$permanent_address_townships" placeholder="မြို့/မြို့နယ်" id="permanent_address_township_or_town_id" name="permanent_address_township_or_town_id" class="mt-1 block w-full" required/>
                    <x-input-error class="mt-2" :messages="$errors->get('permanent_address_township_or_town_id')" />
                </div>
                <div>
                    <x-text-input wire:model="permanent_address_ward" placeholder="ရပ်ကွက်" id="permanent_address_ward" name="permanent_address_ward" type="text" class="mt-1 block w-full" required/>
                    <x-input-error class="mt-2" :messages="$errors->get('permanent_address_ward')" />
                </div>
                <div>
                    <x-text-input wire:model="permanent_address_street" placeholder="လမ်း" id="permanent_address_street" name="permanent_address_street" type="text" class="mt-1 block w-full" required/>
                    <x-input-error class="mt-2" :messages="$errors->get('permanent_address_street')" />
                </div>
            </div>
        </div>

        <x-input-label for="ဖုန်းနံပါတ်" :value="__('ဖုန်းနံပါတ်')" />
        <x-text-input wire:model="phone" id="phone" name="phone" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
    </div>

    <x-primary-button 
    wire:click='submit'
    >
        {{$staff ? 'Update' : 'Save'}}
    </x-primary-button >
</div> 