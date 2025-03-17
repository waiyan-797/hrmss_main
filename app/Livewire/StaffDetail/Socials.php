<?php

namespace App\Livewire\StaffDetail;

use App\Models\SocialActivity;
use Livewire\Component;

class Socials extends Component
{
    public static function datas(){
        return [
            'modal_title' => 'လူမှုရေးလှုပ်ရှားမှု',
            'column_names' => ['အကြောင်းအရာ', 'မှတ်ချက်'],
            'column_types' => [
                [
                    'type' => 'text',
                    'wire_array_name' => 'socials',
                    'wire_array_key' => 'particular',
                    'require'   => false,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'socials',
                    'wire_array_key' => 'remark',
                    'require'   => false,
                ],
            ]
        ];
        
    }
//     public function setEditData($editId, $staffId, $socials_particular, $socials_remark)
// {
//     $post = SocialActivity::findOrFail($editId);

//     $post->staff_id = $staffId;
//     $post->particular = $socials_particular == '' ? null : $socials_particular;
//     $post->remark = $socials_remark == '' ? null : $socials_remark;

//     $post->save();

//     return $post;
// }
public function socialCreate($id,$staffId, $socials_particular, $socials_remark){
    $social = SocialActivity::updateOrCreate([
        'id'=>$id
    ],
        [
            'staff_id' => $staffId,
            'particular' => $socials_particular == '' ? null : $socials_particular,
            'remark' => $socials_remark == '' ? null : $socials_remark,
      ]);

      return $social;
  }

}
