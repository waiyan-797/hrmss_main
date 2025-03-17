<?php

namespace App\Livewire\StaffDetail;

use App\Models\Posting;
use App\Models\Sibling;
use Livewire\Component;
use Carbon\Carbon;

class FatherSibling extends Component
{
    

    public static function datas($religions,$ethnics,$genders,$relations){{
        
        return [
            'modal_title' => 'အဘ၏ ညီအစ်ကို မောင်နှမများ',
            'column_names' => ['အမည်', 'လူမျိုး', 'ဘာသာ','ကျား/မ','ဇာတိ','အလုပ်အကိုင်','နေရပ်လိပ်စာ','တော်စပ်ပုံ'],
            'column_types' => [
                [
                    'type' => 'text',
                    'wire_array_name' => 'fatherSibling',
                    'wire_array_key' => 'name',
                    'require' => true,
                ],
                
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'fatherSibling',
                    'wire_array_key' => 'ethnic',
                    'select_values' => $ethnics,
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'fatherSibling',
                    'wire_array_key' => 'religion',
                    'select_values' => $religions,
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'fatherSibling',
                    'wire_array_key' => 'gender',
                    'select_values' => $genders,
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'fatherSibling',
                    'wire_array_key' => 'place_of_birth',
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'fatherSibling',
                    'wire_array_key' => 'occupation',
                    'require' => false,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'fatherSibling',
                    'wire_array_key' => 'address',
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'fatherSibling',
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
            'fatherSibling_name' => 'required',
            'fatherSibling_ethnic' => 'required',
            'fatherSibling_religion' => 'required',
            'fatherSibling_gender' => 'required',
            'fatherSibling_place_of_birth' => 'required',
            'fatherSibling_address' => 'required',
            'fatherSibling_relation' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'fatherSibling_name.required' => 'name is required',
            'fatherSibling_ethnic.required' => 'ethnic is required',
            'fatherSibling_religion.required' => 'religion is required',
            'fatherSibling_gender.required' => 'gender is required',
            'fatherSibling_place_of_birth.required' => 'place of birth is required',
            'fatherSibling_address.required' => 'address is required',
            'fatherSibling_relation.required' => 'relation is required',
        ];
    }

    public function fatherSiblingsCreate($id,$staffId,$fatherSibling_name,$fatherSibling_ethnic,$fatherSibling_religion,$fatherSibling_gender,$fatherSibling_place_of_birth,$fatherSibling_occupation,$fatherSibling_address,$fatherSibling_relation){


      $fatherSibling= \App\Models\FatherSibling::updateOrCreate([
        'id' => $id
      ],[
            'staff_id' => $staffId,
            'name' => $fatherSibling_name,
            'ethnic_id' => $fatherSibling_ethnic,
            'religion_id' => $fatherSibling_religion,
            'gender_id' => $fatherSibling_gender,
            'place_of_birth' => $fatherSibling_place_of_birth,
            'occupation' => $fatherSibling_occupation,
            'address' => $fatherSibling_address,
            'relation_id' => $fatherSibling_relation,
        ]);

     return $fatherSibling;
    }



    
}
