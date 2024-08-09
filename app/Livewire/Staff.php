<?php

namespace App\Livewire;

use App\Models\Staff as ModelsStaff;
use Livewire\Component;

class Staff extends Component
{
    public $inputs = [];
    public function save()
    {
        $this->validate();

        foreach ($this->inputs as $input) {
            ModelsStaff::create([
                'staff_photo' => $input['staff_photo'],
                'staff_no' => $input['staff_no'],
                'name' => $input['name'],
                'nick_name' => $input['nick_name'],
                'other_name' => $input['other_name'],
                'dob' => $input['dob'],
                'gender_id' => $input['gender_id'],
                'ethnic_id' => $input['ethnic_id'],
                'religion_id' => $input['religion_id'],
                'height_feet' => $input['height_feet'],
                'height_inch' => $input['height_inch'],
                'hair_color' => $input['hair_color'],
                'eye_color' => $input['eye_color'],
                'prominent_mark' => $input['prominent_mark'],
                'skin_color' => $input['skin_color'],
                'weight' => $input['weight'],
                'blood_type_id' => $input['blood_type_id'],
                'place_of_birth' => $input['place_of_birth'],
                'nrc' => $input['nrc'],
                'phone' => $input['phone'],
                'mobile' => $input['mobile'],
                'email' => $input['email'],
                'current_address_street' => $input['current_address_street'],
                'current_address_ward' => $input['current_address_ward'],
                'current_address_township_or_town_id' => $input['current_address_township_or_town_id'],
                'current_address_district_id' => $input['current_address_district_id'],
                'current_address_region_id' => $input['current_address_region_id'],
                'permanent_address_street' => $input['permanent_address_street'],
                'permanent_address_ward' => $input['permanent_address_ward'],
                'permanent_address_township_or_town_id' => $input['permanent_address_township_or_town_id'],
                'permanent_address_district_id' => $input['permanent_address_district_id'],
                'permanent_address_region_id' => $input['permanent_address_region_id'],
                'previous_addresses' => $input['previous_addresses'],
                'military_solider_no' => $input['military_solider_no'],
                'military_join_date	' => $input['military_join_date	'],
                'military_dsa_no' => $input['military_dsa_no'],
                'military_gazetted_date' => $input['military_gazetted_date'],
                'military_leave_date' => $input['military_leave_date'],
                'military_leave_reason' => $input['military_leave_reason'],
                'military_served_army' => $input['military_served_army'],
                'military_brief_history_or_penalty' => $input['military_brief_history_or_penalty'],
                'military_pension' => $input['military_pension'],
                'education_group_id' => $input['education_group_id'],
                'education_type_id' => $input['education_type_id'],
                'education_id' => $input['education_id'],
                'father_name' => $input['father_name'],
                'father_ethnic_id' => $input['father_ethnic_id'],
                'father_religion_id' => $input['father_religion_id'],
                'father_place_of_birth' => $input['father_place_of_birth'],
                'father_occupation' => $input['father_occupation'],
                'father_address_street' => $input['father_address_street'],
                'father_address_ward' => $input['father_address_ward'],
                'father_address_township_or_town_id' => $input['father_address_township_or_town_id'],
                'father_address_district_id' => $input['father_address_district_id'],
                'father_address_region_id' => $input['father_address_region_id'],
                'mother_name' => $input['mother_name'],
                'mother_ethnic_id' => $input['mother_ethnic_id'],
                'mother_religion_id' => $input['mother_religion_id'],
                'mother_place_of_birth' => $input['mother_place_of_birth'],
                'mother_occupation' => $input['mother_occupation'],
                'mother_address_street' => $input['mother_address_street'],
                'mother_address_ward' => $input['mother_address_ward'],
                'mother_address_township_or_town_id' => $input['mother_address_township_or_town_id'],
                'mother_address_district_id' => $input['mother_address_district_id'],
                'mother_address_region_id' => $input['mother_address_region_id'],
                'is_parents_citizen_when_staff_born' => $input['is_parents_citizen_when_staff_born'],
                'current_rank_id' => $input['current_rank_id'],
                'current_rank_date' => $input['current_rank_date'],
                'current_department_id' => $input['current_department_id'],
                'current_division_id' => $input['current_division_id'],
                'side_department_id' => $input['side_department_id'],
                'side_division_id' => $input['side_division_id'],
                'salary_paid_by' => $input['salary_paid_by'],
                'join_date' => $input['join_date'],
                'form_of_appointment' => $input['form_of_appointment'],
                'is_direct_appointed' => $input['is_direct_appointed'],
                'payscale_id' => $input['payscale_id'],
                'current_salary' => $input['current_salary'],
                'current_increment_time' => $input['current_increment_time'],
                'recommend_by' => $input['recommend_by'],
                'family_in_politics' => $input['family_in_politics'],
                'last_school_name' => $input['last_school_name'],
                'last_school_subject' => $input['last_school_subject'],
                'last_school_row_no' => $input['last_school_row_no'],
                'last_school_major' => $input['last_school_major'],
                'student_life_political_social' => $input['student_life_political_social'],
                'habit' => $input['habit'],
                'past_occupation' => $input['past_occupation'],
                'revolution' => $input['revolution'],
                'transfer_reason_salary' => $input['transfer_reason_salary'],
                'during_work_political_social' => $input['during_work_political_social'],
                'military_friend' => $input['military_friend'],
                'foreigner_friend_name' => $input['foreigner_friend_name'],
                'foreigner_friend_occupation' => $input['foreigner_friend_occupation'],
                'foreigner_friend_nationality_id' => $input['foreigner_friend_nationality_id'],
                'foreigner_friend_country_id' => $input['foreigner_friend_country_id'],
                'foreigner_friend_how_to_know' => $input['foreigner_friend_how_to_know'],
                'recommended_by_military_person' => $input['recommended_by_military_person'],
            ]);
        }
        session()->flash('success', 'Staff Save successfully.');
        $this->reset(['inputs']);
        return redirect()->to('/staff');
    }
    public function render()
    {
        return view('livewire.staff');
    }
}
