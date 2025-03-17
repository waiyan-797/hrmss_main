<?php

namespace App\Livewire\StaffDetail;

use App\Models\Posting;
use App\Models\Sibling;
use Livewire\Component;
use Carbon\Carbon;

class MotherSibling extends Component
{
    

    public static function datas($religions,$ethnics,$genders,$relations){{
        
        return [
            'modal_title' => 'အမိ၏ ညီအစ်ကို မောင်နှမများ',
            'column_names' => ['အမည်', 'လူမျိုး', 'ဘာသာ','ကျား/မ','ဇာတိ','အလုပ်အကိုင်','နေရပ်လိပ်စာ','တော်စပ်ပုံ'],
            'column_types' => [
                [
                    'type' => 'text',
                    'wire_array_name' => 'motherSibling',
                    'wire_array_key' => 'name',
                    'require' => true,
                ],
                
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'motherSibling',
                    'wire_array_key' => 'ethnic',
                    'select_values' => $ethnics,
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'motherSibling',
                    'wire_array_key' => 'religion',
                    'select_values' => $religions,
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'motherSibling',
                    'wire_array_key' => 'gender',
                    'select_values' => $genders,
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'motherSibling',
                    'wire_array_key' => 'place_of_birth',
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'motherSibling',
                    'wire_array_key' => 'occupation',
                    'require' => false,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'motherSibling',
                    'wire_array_key' => 'address',
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'motherSibling',
                    'wire_array_key' => 'relation',
                    'select_values' => $relations,
                    'require' => true,
                ]
            ],

        ];

    }
}

    public static function rules(): array
    {
        return [
            'motherSibling_name' => 'required',
            'motherSibling_ethnic' => 'required',
            'motherSibling_religion' => 'required',
            'motherSibling_gender' => 'required',
            'motherSibling_place_of_birth' => 'required',
            'motherSibling_address' => 'required',
            'motherSibling_relation' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'motherSibling_name.required' => 'name is required',
            'motherSibling_ethnic.required' => 'ethnic is required',
            'motherSibling_religion.required' => 'religion is required',
            'motherSibling_gender.required' => 'gender is required',
            'motherSibling_place_of_birth.required' => 'place of birth is required',
            'motherSibling_address.required' => 'address is required',
            'motherSibling_relation.required' => 'relation is required',
        ];
    }

    public function motherSiblingsCreate($id,$staffId,$motherSibling_name,$motherSibling_ethnic,$motherSibling_religion,$motherSibling_gender,$motherSibling_place_of_birth,$motherSibling_occupation,$motherSibling_address,$motherSibling_relation){


      $motherSibling= \App\Models\MotherSibling::updateOrCreate([
        'id'=>$id
      ],[
            'staff_id' => $staffId,
            'name' => $motherSibling_name,
            'ethnic_id' => $motherSibling_ethnic,
            'religion_id' => $motherSibling_religion,
            'gender_id' => $motherSibling_gender,
            'place_of_birth' => $motherSibling_place_of_birth,
            'occupation' => $motherSibling_occupation,
            'address' => $motherSibling_address,
            'relation_id' => $motherSibling_relation,
        ]);

     return $motherSibling;
    }



    
}
