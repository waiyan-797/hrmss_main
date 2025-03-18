<?php

namespace App\Livewire\StaffDetail;

use App\Models\Education;
use App\Models\StaffEducation;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Educations extends Component
{

    public static function datas($educations, $_educations, $education_types, $education_groups, $_countries)
    {
        return  [
            'column_names' => [
                'ပညာအရည်အချင်း',
                'ပညာအရည်အချင်း အုပ်စု',
                'ပညာအရည်အချင်း အမျိုးအစား',
                'ပေးအပ်သည့်နိုင်ငံ',
                'ဘွဲ့လက်မှတ်'
            ],
            'column_vals' => $educations,

            'column_types' => [
                [
                    'type' => 'select',
                    'wire_array_name' => 'educations',
                    'wire_array_key' => 'education',
                    'select_values' => is_array($_educations) ? $_educations : collect($_educations)->toArray(),
                    'next_col_update' => 'education_type',
                    'next_col_model' => 'education_type',
                    'next_col_model_related' => 'education_group',
                    'ini_array' => 'eduTypesAndGroups',
                    'disabled' => false,
                    'require' => true

                ],
                [
                'type' => 'show',
                'wire_array_name' => 'educations',
                // 'wire_array_key' => 'education_type',
                'wire_array_key' => 'education_type_text',

                // 'select_values' => $education_types,
               

               

                'disabled' => true ,
                    'require' => false




                ],
                [
                    'type' => 'show',
                'wire_array_name' => 'educations',
                // 'wire_array_key' => 'education_group',
                'wire_array_key' => 'education_group_text',

                
                'disabled' => true ,
                    'require' => false


                ],
                [
                    'type' => 'select',
                    'wire_array_name' => 'educations',
                    'wire_array_key' => 'country_id',
                    'select_values' => $_countries,

                    'require' => false

                ],
                [
                    'type' => 'file',
                    'wire_array_name' => 'educations',
                    'wire_array_key' => 'degree_certificate',
                    'require' => true

                ],
            ],
            'del_method' => 'removeEdu',
        ];
    }

    public static function rules()
    {
        return [
            'educations_education' => 'required',
           
        ];
    }

    public static function messages()
    {


        return [
            'educations_education.required' => 'Education group field is required.',
           
        ];
    }

    public function setCreate(
        $id,
        $staffId,
        $education_id,
        $country_id,
        // $degree_path,
        $degree_certificate
       
    ) {


           

       
        ($degree_certificate)
        ? $degree_path = $degree_certificate
        : $degree_path = Storage::disk('upload')->put('staffs', $degree_certificate);

   $ab =  StaffEducation::updateOrCreate([
        'id' => $id,
    ], [
        // 'education_group_id' => $education['education_group'] == '' ? null : $education['education_group'],
        // 'education_type_id' => $education['education_type'] == '' ? null : $education['education_type'],
        'education_id' => $education_id,
        'staff_id' => $staffId,
        'country_id' => $country_id,
        'degree_certificate' => $degree_path,
    ]);
        return $ab;
    }
}
