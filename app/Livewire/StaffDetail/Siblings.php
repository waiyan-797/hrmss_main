<?php

namespace App\Livewire\StaffDetail;

use App\Models\Posting;
use App\Models\Sibling;
use Livewire\Component;
use Carbon\Carbon;

class Siblings extends Component
{
    

    public static function datas($religions,$ethnics,$genders,$relations){{
        
        return [
            'modal_title' => 'ညီကိုမောင်နှမ',
            'column_names' => ['အမည်', 'လူမျိုး', 'ဘာသာ','ကျား/မ','ဇာတိ','အလုပ်အကိုင်','နေရပ်လိပ်စာ','တော်စပ်ပုံ'],
            'column_types' => [
                [
                    'type' => 'text',
                    'wire_array_name' => 'siblings',
                    'wire_array_key' => 'name',
                    'require' => true,
                ],
                
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'siblings',
                    'wire_array_key' => 'ethnic',
                    'select_values' => $ethnics,
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'siblings',
                    'wire_array_key' => 'religion',
                    'select_values' => $religions,
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'siblings',
                    'wire_array_key' => 'gender',
                    'select_values' => $genders,
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'siblings',
                    'wire_array_key' => 'place_of_birth',
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'siblings',
                    'wire_array_key' => 'occupation',
                    'require' => false,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'siblings',
                    'wire_array_key' => 'address',
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'siblings',
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
            'siblings_name' => 'required',
            'siblings_ethnic' => 'required',
            'siblings_religion' => 'required',
            'siblings_gender' => 'required',
            'siblings_place_of_birth' => 'required',
            'siblings_address' => 'required',
            'siblings_relation' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'siblings_name.required' => 'name is required',
            'siblings_ethnic.required' => 'ethnic is required',
            'siblings_religion.required' => 'religion is required',
            'siblings_gender.required' => 'gender is required',
            'siblings_place_of_birth.required' => 'place of birth is required',
            'siblings_address.required' => 'address is required',
            'siblings_relation.required' => 'relation is required',
        ];
    }

    public function siblingsCreate($id,$staffId,$sibling_name,$sibling_ethnic,$sibling_religion,$sibling_gender,$sibling_place_of_birth,$sibling_occupation,$sibling_address,$sibling_relation){

      $sibling= Sibling::updateOrCreate([
        'id'=> $id
      ],[
            'staff_id' => $staffId,
            'name' => $sibling_name,
            'ethnic_id' => $sibling_ethnic,
            'religion_id' => $sibling_religion,
            'gender_id' => $sibling_gender,
            'place_of_birth' => $sibling_place_of_birth,
            'occupation' => $sibling_occupation,
            'address' => $sibling_address,
            'relation_id' => $sibling_relation,
        ]);

     return $sibling;
    }



    
}
