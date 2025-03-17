<?php

namespace App\Livewire\StaffDetail;

use App\Models\Posting;
use App\Models\Sibling;
use Livewire\Component;
use Carbon\Carbon;

class SpouseFatherSibling extends Component
{
    

    public static function datas($religions,$ethnics,$genders,$relations){{
        
        return [
            'modal_title' => 'ခင်ပွန်း/ဇနီးသည် အဘနှင့် ညီအစ်ကို မောင်နှမများ',
            'column_names' => ['အမည်', 'လူမျိုး', 'ဘာသာ','ကျား/မ','ဇာတိ','အလုပ်အကိုင်','နေရပ်လိပ်စာ','တော်စပ်ပုံ'],
            'column_types' => [
                [
                    'type' => 'text',
                    'wire_array_name' => 'spouseFatherSibling',
                    'wire_array_key' => 'name',
                    'require' => true,
                ],
                
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'spouseFatherSibling',
                    'wire_array_key' => 'ethnic',
                    'select_values' => $ethnics,
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'spouseFatherSibling',
                    'wire_array_key' => 'religion',
                    'select_values' => $religions,
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'spouseFatherSibling',
                    'wire_array_key' => 'gender',
                    'select_values' => $genders,
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'spouseFatherSibling',
                    'wire_array_key' => 'place_of_birth',
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'spouseFatherSibling',
                    'wire_array_key' => 'occupation',
                    'require' => false,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'spouseFatherSibling',
                    'wire_array_key' => 'address',
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'spouseFatherSibling',
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
            'spouseFatherSibling_name' => 'required',
            'spouseFatherSibling_ethnic' => 'required',
            'spouseFatherSibling_religion' => 'required',
            'spouseFatherSibling_gender' => 'required',
            'spouseFatherSibling_place_of_birth' => 'required',
            'spouseFatherSibling_address' => 'required',
            'spouseFatherSibling_relation' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'spouseFatherSibling_name.required' => 'name is required',
            'spouseFatherSibling_ethnic.required' => 'ethnic is required',
            'spouseFatherSibling_religion.required' => 'religion is required',
            'spouseFatherSibling_gender.required' => 'gender is required',
            'spouseFatherSibling_place_of_birth.required' => 'place of birth is required',
            'spouseFatherSibling_address.required' => 'address is required',
            'spouseFatherSibling_relation.required' => 'relation is required',
        ];
    }

    public function spouseFatherSiblingsCreate($id,$staffId,$spouseFatherSibling_name,$spouseFatherSibling_ethnic,$spouseFatherSibling_religion,$spouseFatherSibling_gender,$spouseFatherSibling_place_of_birth,$spouseFatherSibling_occupation,$spouseFatherSibling_address,$spouseFatherSibling_relation){


      $spouseFatherSibling= \App\Models\SpouseFatherSibling::updateOrCreate([
        'id'=>$id
      ],[
            'staff_id' => $staffId,
            'name' => $spouseFatherSibling_name,
            'ethnic_id' => $spouseFatherSibling_ethnic,
            'religion_id' => $spouseFatherSibling_religion,
            'gender_id' => $spouseFatherSibling_gender,
            'place_of_birth' => $spouseFatherSibling_place_of_birth,
            'occupation' => $spouseFatherSibling_occupation,
            'address' => $spouseFatherSibling_address,
            'relation_id' => $spouseFatherSibling_relation,
        ]);

     return $spouseFatherSibling;
    }



    
}
