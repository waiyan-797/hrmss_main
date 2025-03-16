<?php

namespace App\Livewire\StaffDetail;

use App\Models\Posting;
use App\Models\School;
use Livewire\Component;
use Carbon\Carbon;

class Postings extends Component
{
    

    public static function datas($ranks,$ministrys,$departments){

        return [
            'modal_title' => 'လုပ်ကိုင်ခဲ့ဖူးသည့်အလုပ်အကိုင်',
            'column_names' => ['ရာထူး/အဆင့်', 'မှ', 'ထိ', 'ဝန်ကြီးဌာန', 'ဦးစီးဌာန', 'ဌာနခွဲ', 'နေရာ', 'မှတ်ချက်'],
            'column_types' => [
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'postings',
                    'wire_array_key' => 'rank',
                    'select_values' => $ranks,
                    'require' => true,
                ],
                [
                    'type' => 'date',
                    'wire_array_name' => 'postings',
                    'wire_array_key' => 'from_date',
                    'require' => true,

                ],
                [
                    'type' => 'date',
                    'wire_array_name' => 'postings',
                    'wire_array_key' => 'to_date',
                    'require' => true,

                ],
                [
                    'type' => 'select',
                    'wire_array_name' => 'postings',
                    'wire_array_key' => 'ministry',
                    'select_values' => $ministrys,
                    'require' => true,


                ],
                [
                    'type' => 'select',
                    'wire_array_name' => 'postings',
                    'wire_array_key' => 'department',
                    'select_values' => $departments,
                    'require' => true,


                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'postings',
                    'wire_array_key' => 'sub_department',
                    'require' => false,

                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'postings',
                    'wire_array_key' => 'location',
                    'require' => false,

                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'postings',
                    'wire_array_key' => 'remark',
                    'require' => false,

                ],
            ],

        ];

    }

    public static function rules(): array
    {
        return [
            'postings_rank' => 'required',
            'postings_from_date' => 'required',
            'postings_to_date' => 'required',
            'postings_ministry' => 'required',
            'postings_department' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'postings_rank.required' => 'rank eield is required.',
            'postings_from_date.required' => 'from date is required.',
            'postings_to_date.required' => 'to date field is required.',
            'postings_ministry.required' => 'ministry field is required.',
            'postings_department.required' => 'department field is required.',
        ];
    }

    public function setEditData($editId,$staffId,$postings_rank,$postings_from_date,$postings_to_date,$postings_department,$postings_sub_department,$postings_location,$postings_remark,$postings_ministry){
        $post = Posting::findOrFail($editId);
                $post->staff_id = $staffId;
                $post->rank_id = $postings_rank == '' ? null : $postings_rank;
                $post->from_date = $postings_from_date == '' ? null : $postings_from_date;
                $post->to_date = $postings_to_date == '' ? null : $postings_to_date;
                $post->department_id = $postings_department == '' ? null : $postings_department;
                $post->sub_department = $postings_sub_department == '' ? null : $postings_sub_department;
                $post->location = $postings_location == '' ? null : $postings_location;
                $post->remark = $postings_remark == '' ? null : $postings_remark;
                $post->ministry_id = $postings_ministry == '' ? null : $postings_ministry;

                $post->save();
        return $post;

    }

    public function setCreate($staffId,$postings_rank,$postings_from_date,$postings_to_date,$postings_department,$postings_sub_department,$postings_location,$postings_remark,$postings_ministry){
      $posting=   Posting::updateOrCreate([
            'staff_id' => $staffId,
            'rank_id' => $postings_rank == '' ? null : $postings_rank,
            'from_date' => $postings_from_date == '' ? null : $postings_from_date,
            'to_date' => $postings_to_date == '' ? null : $postings_to_date,
            'department_id' => $postings_department == '' ? null : $postings_department,
            'sub_department' => $postings_sub_department == '' ? null : $postings_sub_department,
            'location' => $postings_location == '' ? null : $postings_location,
            'remark' => $postings_remark == '' ? null : $postings_remark,
            'ministry_id' => $postings_ministry == '' ? null : $postings_ministry,
        ]);

        return $posting;
    }

    
}