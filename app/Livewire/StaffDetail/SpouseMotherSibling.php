<?php

namespace App\Livewire\StaffDetail;

use App\Models\Posting;
use App\Models\Sibling;
use Livewire\Component;
use Carbon\Carbon;

class SpouseMotherSibling extends Component
{
    

    public static function datas($religions,$ethnics,$genders,$relations){{
        
        return [
            'modal_title' => 'ခင်ပွန်း/ဇနီးသည် အမိနှင့် ညီအစ်ကို မောင်နှမများ',
            'column_names' => ['အမည်', 'လူမျိုး', 'ဘာသာ','ကျား/မ','ဇာတိ','အလုပ်အကိုင်','နေရပ်လိပ်စာ','တော်စပ်ပုံ'],
            'column_types' => [
                [
                    'type' => 'text',
                    'wire_array_name' => 'spouseMotherSibling',
                    'wire_array_key' => 'name',
                    'require' => true,
                ],
                
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'spouseMotherSibling',
                    'wire_array_key' => 'ethnic',
                    'select_values' => $ethnics,
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'spouseMotherSibling',
                    'wire_array_key' => 'religion',
                    'select_values' => $religions,
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'spouseMotherSibling',
                    'wire_array_key' => 'gender',
                    'select_values' => $genders,
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'spouseMotherSibling',
                    'wire_array_key' => 'place_of_birth',
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'spouseMotherSibling',
                    'wire_array_key' => 'occupation',
                    'require' => false,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'spouseMotherSibling',
                    'wire_array_key' => 'address',
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'spouseMotherSibling',
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
            'spouseMotherSibling_name' => 'required',
            'spouseMotherSibling_ethnic' => 'required',
            'spouseMotherSibling_religion' => 'required',
            'spouseMotherSibling_gender' => 'required',
            'spouseMotherSibling_place_of_birth' => 'required',
            'spouseMotherSibling_address' => 'required',
            'spouseMotherSibling_relation' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'spouseMotherSibling_name.required' => 'name is required',
            'spouseMotherSibling_ethnic.required' => 'ethnic is required',
            'spouseMotherSibling_religion.required' => 'religion is required',
            'spouseMotherSibling_gender.required' => 'gender is required',
            'spouseMotherSibling_place_of_birth.required' => 'place of birth is required',
            'spouseMotherSibling_address.required' => 'address is required',
            'spouseMotherSibling_relation.required' => 'relation is required',
        ];
    }

    public function spouseMotherSiblingsCreate($id,$staffId,$spouseMotherSibling_name,$spouseMotherSibling_ethnic,$spouseMotherSibling_religion,$spouseMotherSibling_gender,$spouseMotherSibling_place_of_birth,$spouseMotherSibling_occupation,$spouseMotherSibling_address,$spouseMotherSibling_relation){


      $spouseMotherSibling= \App\Models\SpouseMotherSibling::updateOrCreate([
        'id'=>$id
      ],[
            'staff_id' => $staffId,
            'name' => $spouseMotherSibling_name,
            'ethnic_id' => $spouseMotherSibling_ethnic,
            'religion_id' => $spouseMotherSibling_religion,
            'gender_id' => $spouseMotherSibling_gender,
            'place_of_birth' => $spouseMotherSibling_place_of_birth,
            'occupation' => $spouseMotherSibling_occupation,
            'address' => $spouseMotherSibling_address,
            'relation_id' => $spouseMotherSibling_relation,
        ]);

     return $spouseMotherSibling;
    }



    
}
