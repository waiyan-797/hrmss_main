<aside id="side_bar" class="left-0 z-40 w-auto {{isset($header) ? 'h-[83vh]' : 'h-[90vh]'}}">
    <div class="overflow-y-auto py-5 px-3 h-full bg-green-700 border-r border-gray-200">
        <button class="space-y-2" wire:click="toggleNav">
            <i class="fa-solid fa-bars size-[2.3rem] text-yellow-300 group-hover:text-yellow-500"></i>
        </button>
        @if ($collapsed)
        <ul class="space-y-2">
            <li>
                <livewire:side-nav-button label="ဒက်ရှ်ဘုတ်"
                    icon='
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 text-yellow-300 group-hover:text-yellow-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                        </svg>
                    '
                    route_name="dashboard" count="" />
            </li>

            @if(isSuperAdmin() || isHRAdmin())
            <li>
                <livewire:side-nav-drop-down label="အပြင်အဆင်များ"
                    icon='
                        <i class="fa-solid fa-gear size-2 text-yellow-300 group-hover:text-yellow-500"></i>
                    '

                    :lists="[
        
        ['group'=>'Location','route_name' => 'region', 'name' => 'တိုင်းဒေသကြီး/ပြည်နယ်'],
        ['group'=>'Location','route_name' => 'district', 'name' => 'ခရိုင်'],
        ['group'=>'Location','route_name' => 'township', 'name' => 'မြို့/မြို့နယ်'],
        ['group'=>'Location','route_name' => 'training_location', 'name' => 'တည်နေရာ'],
        

        ['group'=>'Awards','route_name' => 'award_type', 'name' => 'ဘွဲ့တံဆိပ်အမျိုးအစား'],
        ['group'=>'Awards','route_name' => 'award', 'name' => 'ဘွဲ့တံဆိပ်'],
        
        ['group'=>'Education','route_name' => 'education_group', 'name' => 'ဘွဲ့အုပ်စု'],
        ['group'=>'Education','route_name' => 'education_type', 'name' => 'ဘွဲ့အမျိုးအစား'],
        ['group'=>'Education','route_name' => 'education', 'name' => 'ဘွဲ့'],
        ['group'=>'Education','route_name' => 'training_type', 'name' => 'သင်တန်းအမျိုးအစား'],

        // ['group'=>'Roles and Responsibilities','route_name' => 'post', 'name' => 'တာဝန်'],
        ['group'=>'Roles and Responsibilities','route_name' => 'ministry', 'name' => 'ဝန်ကြီးဌာန'],
        ['group'=>'Roles and Responsibilities','route_name' => 'department', 'name' => 'ဌာန'],
        ['group'=>'Roles and Responsibilities','route_name' => 'division', 'name' => 'ဌာနခွဲ'],
        ['group'=>'Roles and Responsibilities','route_name' => 'section', 'name' => 'ဌာနစိတ်'],
        
        ['group'=>'Staff and Compensation','route_name' => 'staff_type', 'name' => 'ဝန်ထမ်းအမျိုးအစား'],
        ['group'=>'Staff and Compensation','route_name' => 'payscale', 'name' => 'လစာနှုန်း'],
        ['group'=>'Staff and Compensation','route_name' => 'rank', 'name' => 'ရာထူး'],
        ['group'=>'Staff and Compensation','route_name' => 'division_rank', 'name' => 'ဌာနအလိုက်ဖွဲ့စည်းပုံ'],

        ['group'=>'Staff and Compensation','route_name' => 'penalty_type', 'name' => 'ပြစ်ဒဏ်အမျိုးအစား'],
        ['group'=>'Staff and Compensation','route_name' => 'salary', 'name' => 'လစာ'],

        ['group'=>'pension','route_name' => 'pension_type', 'name' => 'ပင်စင်အမျိုးအစား'],
        ['group'=>'pension','route_name' => 'pension_year', 'name' => 'ပင်စင်နှစ်'],
    
        ['group'=>'Demographics','route_name' => 'country', 'name' => 'နိုင်ငံ'],
        ['group'=>'Demographics','route_name' => 'nationality', 'name' => 'နိုင်ငံသား'],
        ['group'=>'Demographics','route_name' => 'ethnic', 'name' => 'လူမျိုး'],
        ['group'=>'Demographics','route_name' => 'religion', 'name' => 'ဘာသာ'],
        ['group'=>'Demographics','route_name' => 'gender', 'name' => 'ကျား/မ'],
        ['group'=>'Demographics','route_name' => 'blood_type', 'name' => 'သွေးအုပ်စု'],
        ['group'=>'Demographics','route_name' => 'language', 'name' => 'ဘာသာစကား'],
    
        ['group'=>'Relation','route_name' => 'marital_status', 'name' => 'အိမ်ထောင်ရေးအခြေအနေ'],
        ['group'=>'Relation','route_name' => 'relation_type', 'name' => 'တော်စပ်ပုံအမျိုးအစား'],
        ['group'=>'Relation','route_name' => 'relation', 'name' => 'တော်စပ်ပုံ'],

        ['group'=>'Others','route_name' => 'leave_type', 'name' => 'ခွင့်အမျိုးအစား'],
        ['group'=>'Others','route_name' => 'letter_type', 'name' => 'စာအဆင့်အတန်း'],
        ['group'=>'Others','route_name' => 'difficulty_level', 'name' => 'အခက်အခဲအဆင့်'],

        
                    ]"/>
            </li>
            @endif

            <li>
                <a href="{{ route('staff' , ['status'=> 1]) }}" class="{{request()->routeIs('staff') ? 'bg-white/90 text-green-700' : 'text-white'}} font-arial flex items-center p-2 font-semibold rounded-lg hover:bg-gray-100 hover:text-green-700 group" wire:navigate>
                    <i class="fa-solid fa-user-tie size-2 text-yellow-300 group-hover:text-yellow-500"></i>
                    <span class="ml-3 flex-1 text-sm"> ဝန်ထမ်း</span>
                </a>
            </li>

            <li>
                <livewire:side-nav-button label="နေ့စား"
                    icon='
                        <i class="fa-solid fa-user size-2 text-yellow-300 group-hover:text-yellow-500"></i>
                    '
                    route_name="labour"
                    count="" />
            </li>

            @if(isAdmins())
            <li>
                @php
                $lists = [
                ];

                if (isHRAdmin() ) {
                $lists =  [
                ['group'=>'', 'route_name' => 'report', 'name' => 'ဝန်ထမ်းရေးရာ'],
                ['group'=>'', 'route_name' => 'attend_training', 'name' => 'သင်တန်းတက်ရောက်'],
                ['group'=>'', 'route_name' => 'pension', 'name' => 'ပြုန်းတီးစာရင်း'],
                ['group'=>'', 'route_name' => 'travel_abroad', 'name' => 'နိုင်ငံခြားသွားရောက်မှုများ'],
                ['group'=>'', 'route_name' => 'employee_taking_leave', 'name' => 'ခွင့်ယူသည့်ဝန်ထမ်းစာရင်း'],
                ['group'=>'', 'route_name' => 'staff_strength_list', 'name' => 'ဝန်ထမ်းအင်အားစာရင်း'],
                ['group'=>'', 'route_name' => 'employee_information', 'name' => 'ဝန်ထမ်းအချက်အလက်များ'],
                ['group'=>'', 'route_name' => 'personnel_account', 'name' => 'ဝန်ထမ်းရေးရာ+ငွေစာရင်း'],

                ];
                }

                if (isFinanceAdmin()) {
                $lists =
                [['route_name' => 'personnel_account', 'name' => 'ဝန်ထမ်းရေးရာ+ငွေစာရင်း'],

                [
                'route_name' => 'finance', 'name' => 'ငွေစာရင်း'

                ],
                ['route_name' => 'employee_taking_leave', 'name' => 'ခွင့်ယူသည့်ဝန်ထမ်းစာရင်း'],


                ];

                }


                if (isSuperAdmin()) {
                $lists =  $lists = [
                ['group'=>'', 'route_name' => 'report', 'name' => 'ဝန်ထမ်းရေးရာ'],
                ['group'=>'', 'route_name' => 'attend_training', 'name' => 'သင်တန်းတက်ရောက်'],
                ['group'=>'', 'route_name' => 'pension', 'name' => 'ပြုန်းတီးစာရင်း'],
                ['group'=>'', 'route_name' => 'travel_abroad', 'name' => 'နိုင်ငံခြားသွားရောက်မှုများ'],
                ['group'=>'', 'route_name' => 'employee_taking_leave', 'name' => 'ခွင့်ယူသည့်ဝန်ထမ်းစာရင်း'],
                ['group'=>'', 'route_name' => 'staff_strength_list', 'name' => 'ဝန်ထမ်းအင်အားစာရင်း'],
                ['group'=>'', 'route_name' => 'employee_information', 'name' => 'ဝန်ထမ်းအချက်အလက်များ'],
                ['group'=>'', 'route_name' => 'personnel_account', 'name' => 'ဝန်ထမ်းရေးရာ+ငွေစာရင်း'],
                ['group'=>'', 'route_name' => 'finance', 'name' => 'ငွေစာရင်း'],
                // ['route_name' => 'employee_taking_leave', 'name' => 'ခွင့်ယူသည့်ဝန်ထမ်းစာရင်း'],

                ];
                }



                @endphp

                <livewire:side-nav-drop-down label="အစီရင်ခံစာများ"
                    icon='
                        <i class="fa-solid fa-file size-2 text-yellow-300 group-hover:text-yellow-500"></i>
                    '
                    :lists="$lists" />
            </li>

            @endif

            @if(isSuperAdmin())
            <li>
                <livewire:side-nav-drop-down label="အသုံးပြုသူများ"
                    icon='
                        <i class="fa-solid fa-users size-2 text-yellow-300 group-hover:text-yellow-500"></i>
                    '
                    :lists="[
                        ['route_name' => 'user_create', 'name' => 'user_create'],
                    ]" />
            </li>

            @endif
        </ul>
        @else
        <ul class="space-y-2">
            <li>
                <livewire:side-nav-button label=""
                    icon='
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 text-yellow-300 group-hover:text-yellow-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                        </svg>
                    '
                    route_name="dashboard" count="" />
            </li>

            @if(isSuperAdmin() || isHRAdmin())
            <li>
            <livewire:side-nav-drop-down 
    label=""
    icon='
        <i class="fa-solid fa-gear size-2 text-yellow-300 group-hover:text-yellow-500"></i>
    '
    :lists="[
        
        ['group'=>'Location','route_name' => 'region', 'name' => 'တိုင်းဒေသကြီး/ပြည်နယ်'],
        ['group'=>'Location','route_name' => 'district', 'name' => 'ခရိုင်'],
        ['group'=>'Location','route_name' => 'township', 'name' => 'မြို့/မြို့နယ်'],
        ['group'=>'Location','route_name' => 'training_location', 'name' => 'တည်နေရာ'],
        

        ['group'=>'Awards','route_name' => 'award_type', 'name' => 'ဘွဲ့တံဆိပ်အမျိုးအစား'],
        ['group'=>'Awards','route_name' => 'award', 'name' => 'ဘွဲ့တံဆိပ်'],
        
        ['group'=>'Education','route_name' => 'education_group', 'name' => 'ဘွဲ့အုပ်စု'],
        ['group'=>'Education','route_name' => 'education_type', 'name' => 'ဘွဲ့အမျိုးအစား'],
        ['group'=>'Education','route_name' => 'education', 'name' => 'ဘွဲ့'],
        ['group'=>'Education','route_name' => 'training_type', 'name' => 'သင်တန်းအမျိုးအစား'],

        // ['group'=>'Roles and Responsibilities','route_name' => 'post', 'name' => 'တာဝန်'],
        ['group'=>'Roles and Responsibilities','route_name' => 'ministry', 'name' => 'ဝန်ကြီးဌာန'],
        ['group'=>'Roles and Responsibilities','route_name' => 'department', 'name' => 'ဌာန'],
        ['group'=>'Roles and Responsibilities','route_name' => 'division', 'name' => 'ဌာနခွဲ'],
        ['group'=>'Roles and Responsibilities','route_name' => 'section', 'name' => 'ဌာနစိတ်'],
        
        ['group'=>'Staff and Compensation','route_name' => 'staff_type', 'name' => 'ဝန်ထမ်းအမျိုးအစား'],
        ['group'=>'Staff and Compensation','route_name' => 'payscale', 'name' => 'လစာနှုန်း'],
        ['group'=>'Staff and Compensation','route_name' => 'rank', 'name' => 'ရာထူး'],
        ['group'=>'Staff and Compensation','route_name' => 'division_rank', 'name' => 'ဌာနအလိုက်ဖွဲ့စည်းပုံ'],

        ['group'=>'Staff and Compensation','route_name' => 'penalty_type', 'name' => 'ပြစ်ဒဏ်အမျိုးအစား'],
        ['group'=>'Staff and Compensation','route_name' => 'salary', 'name' => 'လစာ'],

        ['group'=>'pension','route_name' => 'pension_type', 'name' => 'ပင်စင်အမျိုးအစား'],
        ['group'=>'pension','route_name' => 'pension_year', 'name' => 'ပင်စင်နှစ်'],
    
        ['group'=>'Demographics','route_name' => 'country', 'name' => 'နိုင်ငံ'],
        ['group'=>'Demographics','route_name' => 'nationality', 'name' => 'နိုင်ငံသား'],
        ['group'=>'Demographics','route_name' => 'ethnic', 'name' => 'လူမျိုး'],
        ['group'=>'Demographics','route_name' => 'religion', 'name' => 'ဘာသာ'],
        ['group'=>'Demographics','route_name' => 'gender', 'name' => 'ကျား/မ'],
        ['group'=>'Demographics','route_name' => 'blood_type', 'name' => 'သွေးအုပ်စု'],
        ['group'=>'Demographics','route_name' => 'language', 'name' => 'ဘာသာစကား'],
    
        ['group'=>'Relation','route_name' => 'marital_status', 'name' => 'အိမ်ထောင်ရေးအခြေအနေ'],
        ['group'=>'Relation','route_name' => 'relation_type', 'name' => 'တော်စပ်ပုံအမျိုးအစား'],
        ['group'=>'Relation','route_name' => 'relation', 'name' => 'တော်စပ်ပုံ'],

        ['group'=>'Others','route_name' => 'leave_type', 'name' => 'ခွင့်အမျိုးအစား'],
        ['group'=>'Others','route_name' => 'letter_type', 'name' => 'စာအဆင့်အတန်း'],
        ['group'=>'Others','route_name' => 'difficulty_level', 'name' => 'အခက်အခဲအဆင့်'],

        
                    ]"/>
            </li>
            @endif

            <li>
                <a href="{{ route('staff' , ['status'=> 1]) }}" class="{{request()->routeIs('staff') ? 'bg-white/90 text-green-700' : 'text-white'}} font-arial flex items-center p-2 font-semibold rounded-lg hover:bg-gray-100 hover:text-green-700 group" wire:navigate>
                    <i class="fa-solid fa-user-tie size-2 text-yellow-300 group-hover:text-yellow-500"></i>

                    <!-- <span class="ml-3 flex-1 text-sm"> ဝန်ထမ်း</span> -->
                </a>
            </li>

            <li>
                <livewire:side-nav-button label=""
                    icon='
                        <i class="fa-solid fa-user size-2 text-yellow-300 group-hover:text-yellow-500"></i>
                    '
                    route_name="labour"
                    count="" />
            </li>

            @if(isAdmins())
            <li>
                @php
                $lists = [

                ];

                if (isHRAdmin() ) {
                $lists = [
                ['group'=>'', 'route_name' => 'report', 'name' => 'ဝန်ထမ်းရေးရာ'],
                ['group'=>'', 'route_name' => 'attend_training', 'name' => 'သင်တန်းတက်ရောက်'],
                ['group'=>'', 'route_name' => 'pension', 'name' => 'ပြုန်းတီးစာရင်း'],
                ['group'=>'', 'route_name' => 'travel_abroad', 'name' => 'နိုင်ငံခြားသွားရောက်မှုများ'],
                ['group'=>'', 'route_name' => 'employee_taking_leave', 'name' => 'ခွင့်ယူသည့်ဝန်ထမ်းစာရင်း'],
                ['group'=>'', 'route_name' => 'staff_strength_list', 'name' => 'ဝန်ထမ်းအင်အားစာရင်း'],
                ['group'=>'', 'route_name' => 'employee_information', 'name' => 'ဝန်ထမ်းအချက်အလက်များ'],
                ['group'=>'', 'route_name' => 'personnel_account', 'name' => 'ဝန်ထမ်းရေးရာ+ငွေစာရင်း'],

                ];
                }

                if (isFinanceAdmin()) {
                $lists =
                [['route_name' => 'personnel_account', 'name' => 'ဝန်ထမ်းရေးရာ+ငွေစာရင်း'],

                [
                'route_name' => 'finance', 'name' => 'ငွေစာရင်း'

                ],
                ['route_name' => 'employee_taking_leave', 'name' => 'ခွင့်ယူသည့်ဝန်ထမ်းစာရင်း'],


                ];

                }


                if (isSuperAdmin()) {
                $lists = [
                ['group'=>'', 'route_name' => 'report', 'name' => 'ဝန်ထမ်းရေးရာ'],
                ['group'=>'', 'route_name' => 'attend_training', 'name' => 'သင်တန်းတက်ရောက်'],
                ['group'=>'', 'route_name' => 'pension', 'name' => 'ပြုန်းတီးစာရင်း'],
                ['group'=>'', 'route_name' => 'travel_abroad', 'name' => 'နိုင်ငံခြားသွားရောက်မှုများ'],
                ['group'=>'', 'route_name' => 'employee_taking_leave', 'name' => 'ခွင့်ယူသည့်ဝန်ထမ်းစာရင်း'],
                ['group'=>'', 'route_name' => 'staff_strength_list', 'name' => 'ဝန်ထမ်းအင်အားစာရင်း'],
                ['group'=>'', 'route_name' => 'employee_information', 'name' => 'ဝန်ထမ်းအချက်အလက်များ'],
                ['group'=>'', 'route_name' => 'personnel_account', 'name' => 'ဝန်ထမ်းရေးရာ+ငွေစာရင်း'],
                ['group'=>'', 'route_name' => 'finance', 'name' => 'ငွေစာရင်း'],
                // ['route_name' => 'employee_taking_leave', 'name' => 'ခွင့်ယူသည့်ဝန်ထမ်းစာရင်း'],

                ];
                }



                @endphp

                <livewire:side-nav-drop-down label=""
                    icon='
                        <i class="fa-solid fa-file size-2 text-yellow-300 group-hover:text-yellow-500"></i>
                    '
                    :lists="$lists" />
            </li>

            @endif

            @if(isSuperAdmin())
            <li>
                <livewire:side-nav-drop-down label=""
                    icon='
                        <i class="fa-solid fa-users size-2 text-yellow-300 group-hover:text-yellow-500"></i>

                    '
                    :lists="[
                        ['route_name' => 'user_create', 'name' => 'user_create'],
                    ]" />
            </li>

            @endif
        </ul>
        @endif
    </div>
</aside>