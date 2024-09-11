<aside id="side_bar" class="left-0 z-40 w-1/6 h-[83vh]">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white border-r border-gray-200">
        <ul class="space-y-2">
            <li>
                <livewire:side-nav-button label="ဒက်ရှ်ဘုတ်"
                    icon='
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-gray-600 group-hover:text-gray-900">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                        </svg>
                    '
                    route_name="dashboard" count="" />
            </li>
            <li>
                <livewire:side-nav-drop-down label="အပြင်အဆင်များ"
                    icon='
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
  <path fill-rule="evenodd" d="M11.828 2.25c-.916 0-1.699.663-1.85 1.567l-.091.549a.798.798 0 0 1-.517.608 7.45 7.45 0 0 0-.478.198.798.798 0 0 1-.796-.064l-.453-.324a1.875 1.875 0 0 0-2.416.2l-.243.243a1.875 1.875 0 0 0-.2 2.416l.324.453a.798.798 0 0 1 .064.796 7.448 7.448 0 0 0-.198.478.798.798 0 0 1-.608.517l-.55.092a1.875 1.875 0 0 0-1.566 1.849v.344c0 .916.663 1.699 1.567 1.85l.549.091c.281.047.508.25.608.517.06.162.127.321.198.478a.798.798 0 0 1-.064.796l-.324.453a1.875 1.875 0 0 0 .2 2.416l.243.243c.648.648 1.67.733 2.416.2l.453-.324a.798.798 0 0 1 .796-.064c.157.071.316.137.478.198.267.1.47.327.517.608l.092.55c.15.903.932 1.566 1.849 1.566h.344c.916 0 1.699-.663 1.85-1.567l.091-.549a.798.798 0 0 1 .517-.608 7.52 7.52 0 0 0 .478-.198.798.798 0 0 1 .796.064l.453.324a1.875 1.875 0 0 0 2.416-.2l.243-.243c.648-.648.733-1.67.2-2.416l-.324-.453a.798.798 0 0 1-.064-.796c.071-.157.137-.316.198-.478.1-.267.327-.47.608-.517l.55-.091a1.875 1.875 0 0 0 1.566-1.85v-.344c0-.916-.663-1.699-1.567-1.85l-.549-.091a.798.798 0 0 1-.608-.517 7.507 7.507 0 0 0-.198-.478.798.798 0 0 1 .064-.796l.324-.453a1.875 1.875 0 0 0-.2-2.416l-.243-.243a1.875 1.875 0 0 0-2.416-.2l-.453.324a.798.798 0 0 1-.796.064 7.462 7.462 0 0 0-.478-.198.798.798 0 0 1-.517-.608l-.091-.55a1.875 1.875 0 0 0-1.85-1.566h-.344ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd" />
</svg>

                    '
                    :lists="[
                        ['route_name' => 'region', 'name' => 'တိုင်းဒေသကြီး/ပြည်နယ်'],
                        ['route_name' => 'district', 'name' => 'ခရိုင်'],
                        ['route_name' => 'township', 'name' => 'မြို့/မြို့နယ်'],
                        ['route_name' => 'staff_type', 'name' => 'ဝန်ထမ်းအမျိုးအစား'],
                        ['route_name' => 'award', 'name' => 'ဘွဲ့တံဆိပ်'],
                        ['route_name' => 'award_type', 'name' => 'ဘွဲ့တံဆိပ်အမျိုးအစား'],
                        ['route_name' => 'post', 'name' => 'တာဝန်'],
                        ['route_name' => 'section', 'name' => 'ဌာနစိတ်'],
                        ['route_name' => 'leave_type', 'name' => 'ခွင့်အမျိုးအစား'],
                        ['route_name' => 'payscale', 'name' => 'လစာနှုန်း'],
                        ['route_name' => 'penalty_type', 'name' => 'ပြစ်ဒဏ်အမျိုးအစား'],
                        ['route_name' => 'rank', 'name' => 'ရာထူး'],
                        ['route_name' => 'division', 'name' => 'ဌာနခွဲ'],
                        ['route_name' => 'pension_year', 'name' => 'ပင်စင်နှစ်'],
                        ['route_name' => 'pension_type', 'name' => 'ပင်စင်အမျိုးအစား'],
                        ['route_name' => 'training_type', 'name' => 'သင်တန်းအမျိုးအစား'],
                        ['route_name' => 'training_location', 'name' => 'တည်နေရာ'],
                        ['route_name' => 'education_group', 'name' => 'ဘွဲ့အုပ်စု'],
                        ['route_name' => 'education_type', 'name' => 'ဘွဲ့အမျိုးအစား'],
                        ['route_name' => 'education', 'name' => 'ဘွဲ့'],
                        ['route_name' => 'nationality', 'name' => 'နိုင်ငံသား'],
                        ['route_name' => 'country', 'name' => 'နိုင်ငံ'],
                        ['route_name' => 'ethnic', 'name' => 'လူမျိုး'],
                        ['route_name' => 'religion', 'name' => 'ဘာသာ'],
                        ['route_name' => 'gender', 'name' => 'ကျား/မ'],
                        ['route_name' => 'blood_type', 'name' => 'သွေးအုပ်စု'],
                        ['route_name' => 'relation', 'name' => 'တော်စပ်ပုံ'],
                        ['route_name' => 'leave', 'name' => 'ခွင့်'],
                    ]" />
            </li>

            <li>
                <livewire:side-nav-button label="ဝန်ထမ်း"
                    icon='
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-gray-600 group-hover:text-gray-900">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    '
                    route_name="staff" count="" />
            </li>

        </ul>
    </div>
</aside>
