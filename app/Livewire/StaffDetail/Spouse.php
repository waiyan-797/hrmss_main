<?php

namespace App\Livewire\StaffDetail;

use App\Models\Posting;
use App\Models\Sibling;
use Livewire\Component;
use Carbon\Carbon;

class Spouse extends Component
{
    

    public static function datas($religions,$ethnics,$genders,$relations){{
        
        return [
            'modal_title' => 'ခင်ပွန်း/ဇနီးသည်',
            'column_names' => ['အမည်', 'လူမျိုး', 'ဘာသာ','ကျား/မ','ဇာတိ','အလုပ်အကိုင်','နေရပ်လိပ်စာ','တော်စပ်ပုံ'],
            'column_types' => [
                [
                    'type' => 'text',
                    'wire_array_name' => 'spouses',
                    'wire_array_key' => 'name',
                    'require' => true,
                ],
                
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'spouse',
                    'wire_array_key' => 'ethnic',
                    'select_values' => $ethnics,
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'spouse',
                    'wire_array_key' => 'religion',
                    'select_values' => $religions,
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'spouse',
                    'wire_array_key' => 'gender',
                    'select_values' => $genders,
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'spouse',
                    'wire_array_key' => 'place_of_birth',
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'spouse',
                    'wire_array_key' => 'occupation',
                    'require' => false,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'spouse',
                    'wire_array_key' => 'address',
                    'require' => true,
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'spouse',
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
            'spouse_name' => 'required',
            'spouse_ethnic' => 'required',
            'spouse_religion' => 'required',
            'spouse_gender' => 'required',
            'spouse_place_of_birth' => 'required',
            'spouse_address' => 'required',
            'spouse_relation' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'spouse_name.required' => 'name is required',
            'spouse_ethnic.required' => 'ethnic is required',
            'spouse_religion.required' => 'religion is required',
            'spouse_gender.required' => 'gender is required',
            'spouse_place_of_birth.required' => 'place of birth is required',
            'spouse_address.required' => 'address is required',
            'spouse_relation.required' => 'relation is required',
        ];
    }

    public function spouseCreate($id,$staffId,$spouse_name,$spouse_ethnic,$spouse_religion,$spouse_gender,$spouse_place_of_birth,$spouse_occupation,$spouse_address,$spouse_relation){


      $spouse= \App\Models\Spouse::updateOrCreate([
        'id' => $id
      ],[
            'staff_id' => $staffId,
            'name' => $spouse_name,
            'ethnic_id' => $spouse_ethnic,
            'religion_id' => $spouse_religion,
            'gender_id' => $spouse_gender,
            'place_of_birth' => $spouse_place_of_birth,
            'occupation' => $spouse_occupation,
            'address' => $spouse_address,
            'relation_id' => $spouse_relation,
        ]);

     return $spouse;
    }



    
}
