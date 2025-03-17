<?php

namespace App\Livewire\StaffDetail;

use App\Models\Posting;
use App\Models\Sibling;
use Livewire\Component;
use Carbon\Carbon;

class SpouseSibling extends Component
{
    

    public static function datas($religions,$ethnics,$genders,$relations){{
        
        return [
            'modal_title' => 'ခင်ပွန်း/ဇနီးသည်၏ ညီအစ်ကို မောင်နှမများ',
            'column_names' => ['အမည်', 'လူမျိုး', 'ဘာသာ','ကျား/မ','ဇာတိ','အလုပ်အကိုင်','နေရပ်လိပ်စာ','တော်စပ်ပုံ'],
            'column_types' => [
                [
                    'type' => 'text',
                    'wire_array_name' => 'spouseSibling',
                    'wire_array_key' => 'name',
                    'require' => true,
                ],
                
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'spouseSibling',
                    'wire_array_key' => 'ethnic',
                    'select_values' => $ethnics,
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'spouseSibling',
                    'wire_array_key' => 'religion',
                    'select_values' => $religions,
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'spouseSibling',
                    'wire_array_key' => 'gender',
                    'select_values' => $genders,
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'spouseSibling',
                    'wire_array_key' => 'place_of_birth',
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'spouseSibling',
                    'wire_array_key' => 'occupation',
                    'require' => false,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'spouseSibling',
                    'wire_array_key' => 'address',
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'spouseSibling',
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
            'spouseSibling_name' => 'required',
            'spouseSibling_ethnic' => 'required',
            'spouseSibling_religion' => 'required',
            'spouseSibling_gender' => 'required',
            'spouseSibling_place_of_birth' => 'required',
            'spouseSibling_address' => 'required',
            'spouseSibling_relation' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'spouseSibling_name.required' => 'name is required',
            'spouseSibling_ethnic.required' => 'ethnic is required',
            'spouseSibling_religion.required' => 'religion is required',
            'spouseSibling_gender.required' => 'gender is required',
            'spouseSibling_place_of_birth.required' => 'place of birth is required',
            'spouseSibling_address.required' => 'address is required',
            'spouseSibling_relation.required' => 'relation is required',
        ];
    }

    public function spouseSiblingsCreate($id,$staffId,$spouseSibling_name,$spouseSibling_ethnic,$spouseSibling_religion,$spouseSibling_gender,$spouseSibling_place_of_birth,$spouseSibling_occupation,$spouseSibling_address,$spouseSibling_relation){


      $spouseSibling= \App\Models\SpouseSibling::updateOrCreate([
        'id'=>$id
      ],[
            'staff_id' => $staffId,
            'name' => $spouseSibling_name,
            'ethnic_id' => $spouseSibling_ethnic,
            'religion_id' => $spouseSibling_religion,
            'gender_id' => $spouseSibling_gender,
            'place_of_birth' => $spouseSibling_place_of_birth,
            'occupation' => $spouseSibling_occupation,
            'address' => $spouseSibling_address,
            'relation_id' => $spouseSibling_relation,
        ]);

     return $spouseSibling;
    }



    
}
