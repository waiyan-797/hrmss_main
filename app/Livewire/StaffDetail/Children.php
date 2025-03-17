<?php

namespace App\Livewire\StaffDetail;

use App\Models\Posting;
use App\Models\Sibling;
use Livewire\Component;
use Carbon\Carbon;

class Children extends Component
{
    

    public static function datas($religions,$ethnics,$genders,$relations){{
        
        return [
            'modal_title' => 'သားသမီးများ',
            'column_names' => ['အမည်', 'လူမျိုး', 'ဘာသာ','ကျား/မ','ဇာတိ','အလုပ်အကိုင်','နေရပ်လိပ်စာ','တော်စပ်ပုံ'],
            'column_types' => [
                [
                    'type' => 'text',
                    'wire_array_name' => 'children',
                    'wire_array_key' => 'name',
                    'require' => true,
                ],
                
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'children',
                    'wire_array_key' => 'ethnic',
                    'select_values' => $ethnics,
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'children',
                    'wire_array_key' => 'religion',
                    'select_values' => $religions,
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'children',
                    'wire_array_key' => 'gender',
                    'select_values' => $genders,
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'children',
                    'wire_array_key' => 'place_of_birth',
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'children',
                    'wire_array_key' => 'occupation',
                    'require' => false,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'children',
                    'wire_array_key' => 'address',
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'children',
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
            'children_name' => 'required',
            'children_ethnic' => 'required',
            'children_religion' => 'required',
            'children_gender' => 'required',
            'children_place_of_birth' => 'required',
            'children_address' => 'required',
            'children_relation' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'children_name.required' => 'name is required',
            'children_ethnic.required' => 'ethnic is required',
            'children_religion.required' => 'religion is required',
            'children_gender.required' => 'gender is required',
            'children_place_of_birth.required' => 'place of birth is required',
            'children_address.required' => 'address is required',
            'children_relation.required' => 'relation is required',
        ];
    }

    public function childrenCreate($id,$staffId,$children_name,$children_ethnic,$children_religion,$children_gender,$children_place_of_birth,$children_occupation,$children_address,$children_relation){


      $children= \App\Models\Children::updateOrCreate([
        'id'=>$id
      ],[
            'staff_id' => $staffId,
            'name' => $children_name,
            'ethnic_id' => $children_ethnic,
            'religion_id' => $children_religion,
            'gender_id' => $children_gender,
            'place_of_birth' => $children_place_of_birth,
            'occupation' => $children_occupation,
            'address' => $children_address,
            'relation_id' => $children_relation,
        ]);

     return $children;
    }



    
}
