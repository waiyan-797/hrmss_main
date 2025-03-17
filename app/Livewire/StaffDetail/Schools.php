<?php

namespace App\Livewire\StaffDetail;

use App\Models\School;
use Livewire\Component;

class Schools extends Component
{

    public static function datas($education_groups,$education_types){

        return [
            'modal_title' => 'နေခဲ့ဖူးသောကျောင်းများ (ခုနှစ်၊ သက္ကရာဇ် ဖော်ပြရန်)',
            'column_names' => ['ဘွဲ့အုပ်စု', 'ဘွဲ့အမျိုးအစား', 'ရရှိခဲ့သောဘွဲ့အမည်', 'ကျောင်းအမည်', 'မြို့','မှ','ထိ','မှတ်ချက်'],
            'column_types' => [
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'schools',
                    'wire_array_key' => 'education_group',
                    'select_values' => $education_groups,
                    'require' => true,
                ],
                [
                    
                    'type' => 'select',
                    'wire_array_name' => 'schools',
                    'wire_array_key' => 'education_type',
                    'select_values' =>  $education_types,
                    'require' => true,

                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'schools',
                    'wire_array_key' => 'education',
                    'require' => false,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'schools',
                    'wire_array_key' => 'school_name',
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'schools',
                    'wire_array_key' => 'town',
                    'require' => false,

                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'schools',
                    'wire_array_key' => 'from_date',
                    'require' => false,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'schools',
                    'wire_array_key' => 'to_date',
                    'require' => false,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'schools',
                    'wire_array_key' => 'remark',
                    'require' => false,

                ],
            ],

        ];
    }


    public static function rules(): array
    {
        return [
            'schools_education_group' => 'required',
            'schools_education_type' => 'required',
            'schools_school_name' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'schools_education_group.required' => 'education_group eield is required.',
            'schools_education_type.required' => 'education_type date is required.',
            'schools_school_name.required' => 'education_type date is required.',
        ];
    }

    public function schoolCreate($id,$staffId,$schools_education_group,$schools_education_type,$schools_education,$schools_school_name,$schools_town,$schools_from_date,$schools_to_date,$schools_remark){
        $school=   School::updateOrCreate([
            'id'=>$id
        ],
            [
        'staff_id' => $staffId,
        'education_group_id' => $schools_education_group == '' ? null : $schools_education_group,
        'education_type_id' => $schools_education_type == '' ? null : $schools_education_type,
        'education' => $schools_education == '' ? null : $schools_education,
        'school_name' => $schools_school_name == '' ? null : $schools_school_name,
        'town' => $schools_town == '' ? null : $schools_town,
        'from_date' => $schools_from_date == '' ? null : $schools_from_date,
        'to_date' => $schools_to_date == '' ? null : $schools_to_date,
        'remark' => $schools_remark == '' ? null : $schools_remark,
          ]);
  
          return $school;
      }
}
