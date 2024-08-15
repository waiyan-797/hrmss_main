<?php

namespace App\Livewire;

use App\Models\BloodType;
use App\Models\District;
use App\Models\Education;
use App\Models\EducationGroup;
use App\Models\EducationType;
use App\Models\Ethnic;
use App\Models\Gender;
use App\Models\Region;
use App\Models\Religion;
use App\Models\Staff;
use App\Models\StaffEducation;
use App\Models\Township;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;

class StaffDetail extends Component
{
    use WithFileUploads;
    public $message;
    public $photo, $name, $nick_name, $other_name, $staff_no, $dob, $gender_id, $ethnic_id, $religion_id, $height_feet, $height_inch, $hair_color, $eye_color, $prominent_mark, $skin_color, $weight, $blood_type_id, $place_of_birth, $nrc, $phone, $mobile, $email, $current_address_street, $current_address_ward, $current_address_region_id, $current_address_district_id, $current_address_township_or_town_id, $permanent_address_street, $permanent_address_ward, $permanent_address_region_id, $permanent_address_district_id, $permanent_address_township_or_town_id, $previous_addresses, $military_solider_no, $military_join_date, $military_dsa_no, $military_gazetted_date, $military_leave_date, $military_leave_reason, $military_served_army, $military_brief_history_or_penalty, $military_pension;
    public $educations = [];
    public $incrase_rate = 0;
    #[Url]
    public ?string $tab = 'personal_info';

    protected $rules = [
        'photo' => '',
        'name' => 'required',
        'nick_name' => 'required',
        'other_name' => 'required',
        'staff_no' => 'required',
        'dob' => 'required',
        'gender_id' => 'required',
        'ethnic_id' => '',
        'religion_id' => '',
        'height_feet' => 'required',
        'height_inch' => 'required',
        'hair_color' => 'required',
        'eye_color' => 'required',
        'prominent_mark' => 'required',
        'skin_color' => 'required',
        'weight' => 'required',
        'blood_type_id' => '',
        'place_of_birth' => 'required',
        'nrc' => 'required',
        'phone' => 'required',
        'mobile' => 'required',
        'email' => 'required',
        'current_address_street' => 'required',
        'current_address_ward' => 'required',
        'current_address_region_id' => 'required',
        'current_address_district_id' => 'required',
        'current_address_township_or_town_id' => 'required',
        'permanent_address_street' => 'required',
        'permanent_address_ward' => 'required',
        'permanent_address_region_id' => 'required',
        'permanent_address_district_id' => 'required',
        'permanent_address_township_or_town_id' => 'required',
        'previous_addresses' => 'required',
        'military_solider_no' => 'required',
        'military_join_date' => 'required',
        'military_dsa_no' => 'required',
        'military_gazetted_date' => 'required',
        'military_leave_date' => 'required',
        'military_leave_reason' => 'required',
        'military_served_army' => 'required',
        'military_brief_history_or_penalty' => 'required',
        'military_pension' => 'required',
    ];

    public function mount(){
        $this->educations[] = ['education_group' => '', 'education_type' => '', 'education' => ''];
    }

    public function add_edu(){
        $this->educations[] = ['education_group' => '', 'education_type' => '', 'education' => ''];
    }

    public function removeEdu($index){
        unset($this->educations[$index]);
        $this->educations = array_values($this->educations); //to re_indexing the array (eg: before remove (1,2,3) - after (1,3) 2 missing) reindex will do like (1,2) back
    }

    public function submit_staff(){
        $this->validate();

        $staff = Staff::create([
            'staff_photo' => $this->photo,
            'name' => $this->name,
            'nick_name' => $this->nick_name,
            'other_name' => $this->other_name,
            'staff_no' => $this->staff_no,
            'dob' => $this->dob,
            'gender_id' => $this->gender_id,
            'ethnic_id' => $this->ethnic_id,
            'religion_id' => $this->religion_id,
            'height_feet' => $this->height_feet,
            'height_inch' => $this->height_inch,
            'hair_color' => $this->hair_color,
            'eye_color' => $this->eye_color,
            'prominent_mark' => $this->prominent_mark,
            'skin_color' => $this->skin_color,
            'weight' => $this->weight,
            'blood_type_id' => $this->blood_type_id,
            'place_of_birth' => $this->place_of_birth,
            'nrc' => $this->nrc,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'current_address_street' => $this->current_address_street,
            'current_address_ward' => $this->current_address_ward,
            'current_address_region_id' => $this->current_address_region_id,
            'current_address_district_id' => $this->current_address_district_id,
            'current_address_township_or_town_id' => $this->current_address_township_or_town_id,
            'permanent_address_street' => $this->permanent_address_street,
            'permanent_address_ward' => $this->permanent_address_ward,
            'permanent_address_region_id' => $this->permanent_address_region_id,
            'permanent_address_district_id' => $this->permanent_address_district_id,
            'permanent_address_township_or_town_id' => $this->permanent_address_township_or_town_id,
            'previous_addresses' => $this->previous_addresses,
            'military_solider_no' => $this->military_solider_no,
            'military_join_date' => $this->military_join_date,
            'military_dsa_no' => $this->military_dsa_no,
            'military_gazetted_date' => $this->military_gazetted_date,
            'military_leave_date' => $this->military_leave_date,
            'military_leave_reason' => $this->military_leave_reason,
            'military_served_army' => $this->military_served_army,
            'military_brief_history_or_penalty' => $this->military_brief_history_or_penalty,
            'military_pension' => $this->military_pension,
        ]);

        foreach ($this->educations as $index => $education) {
            StaffEducation::create([
                'education_group_id' => $education['education_group'],
                'education_type_id' => $education['education_type'],
                'education_id' => $education['education'],
                'staff_id' => $staff->id,
            ]);
        }

        $this->reset();
        $this->message = 'Saved Successfully';
    }

    public function render()
    {
        $genders = Gender::get();
        $ethnics = Ethnic::get();
        $religions = Religion::get();
        $blood_types = BloodType::get();
        $regions = Region::get();
        $districts = District::get();
        $townships = Township::get();
        $education_groups = EducationGroup::get();
        $education_types = EducationType::get();
        $_educations = Education::get();

        return view('livewire.staff-detail', [
            'genders' => $genders,
            'ethnics' => $ethnics,
            'religions' => $religions,
            'blood_types' => $blood_types,
            'regions' => $regions,
            'districts' => $districts,
            'townships' => $townships,
            'education_groups' => $education_groups,
            'education_types' => $education_types,
            '_educations' => $_educations,
        ]);
    }
}
