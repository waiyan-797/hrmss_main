<?php

namespace App\Livewire;

use App\Models\BloodType;
use App\Models\Children;
use App\Models\Country;
use App\Models\Department;
use App\Models\District;
use App\Models\Division;
use App\Models\Education;
use App\Models\EducationGroup;
use App\Models\EducationType;
use App\Models\Ethnic;
use App\Models\FatherSibling;
use App\Models\Gender;
use App\Models\MotherSibling;
use App\Models\Nationality;
use App\Models\Payscale;
use App\Models\Post;
use App\Models\Posting;
use App\Models\Rank;
use App\Models\Recommendation;
use App\Models\Region;
use App\Models\Relation;
use App\Models\Religion;
use App\Models\Sibling;
use App\Models\Spouse;
use App\Models\SpouseFatherSibling;
use App\Models\SpouseMotherSibling;
use App\Models\SpouseSibling;
use App\Models\Staff;
use App\Models\StaffEducation;
use App\Models\Township;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;

class StaffDetail extends Component
{
    use WithFileUploads;
    public $message;
    //personal_info
    public $photo, $name, $nick_name, $other_name, $staff_no, $dob, $gender_id, $ethnic_id, $religion_id, $height_feet, $height_inch, $hair_color, $eye_color, $prominent_mark, $skin_color, $weight, $blood_type_id, $place_of_birth, $nrc, $phone, $mobile, $email, $current_address_street, $current_address_ward, $current_address_region_id, $current_address_district_id, $current_address_township_or_town_id, $permanent_address_street, $permanent_address_ward, $permanent_address_region_id, $permanent_address_district_id, $permanent_address_township_or_town_id, $previous_addresses, $military_solider_no, $military_join_date, $military_dsa_no, $military_gazetted_date, $military_leave_date, $military_leave_reason, $military_served_army, $military_brief_history_or_penalty, $military_pension;
    public $educations = [];
    //job_info
    public $current_rank_id, $current_rank_date, $current_department_id, $current_division_id, $side_department_id, $side_division_id, $salary_paid_by, $join_date, $form_of_appointment, $is_direct_appointed = false, $payscale_id, $current_salary, $current_increment_time, $is_parents_citizen_when_staff_born = false;
    public $recommendations = [];
    public $postings = [];
    //relative
    public $father_name, $father_ethnic_id, $father_religion_id, $father_place_of_birth, $father_occupation, $father_address_street, $father_address_ward, $father_address_township_or_town_id, $father_address_district_id, $father_address_region_id, $mother_name, $mother_ethnic_id, $mother_religion_id, $mother_place_of_birth, $mother_occupation, $mother_address_street, $mother_address_ward, $mother_address_township_or_town_id, $mother_address_district_id, $mother_address_region_id, $family_in_politics = false;
    public $siblings = [];
    public $father_siblings = [];
    public $mother_siblings = [];
    public $spouses = [];
    public $children = [];
    public $spouse_siblings = [];
    public $spouse_father_siblings = [];
    public $spouse_mother_siblings = [];

    #[Url]
    public ?string $tab = 'personal_info';

    protected $personal_info_rules = [
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

    protected $job_info_rules = [
        'is_parents_citizen_when_staff_born' => 'required',
        'current_rank_id' => 'required',
        'current_rank_date' => 'required',
        'current_department_id' => 'required',
        'current_division_id' => '',
        'side_department_id' => 'required',
        'side_division_id' => '',
        'salary_paid_by' => 'required',
        'join_date' => 'required',
        'form_of_appointment' => 'required',
        'is_direct_appointed' => 'required',
        'payscale_id' => 'required',
        'current_salary' => 'required|integer',
        'current_increment_time' => 'required|integer',
    ];

    protected $relative_info_rules = [
        'father_name' => 'required',
        'father_ethnic_id' => 'required',
        'father_religion_id' => 'required',
        'father_place_of_birth' => 'required',
        'father_occupation' => 'required',
        'father_address_street' => 'required',
        'father_address_ward' => 'required',
        'father_address_township_or_town_id' => 'required',
        'father_address_district_id' => 'required',
        'father_address_region_id' => 'required',
        'mother_name' => 'required',
        'mother_ethnic_id' => 'required',
        'mother_religion_id' => 'required',
        'mother_place_of_birth' => 'required',
        'mother_occupation' => 'required',
        'mother_address_street' => 'required',
        'mother_address_ward' => 'required',
        'mother_address_township_or_town_id' => 'required',
        'mother_address_district_id' => 'required',
        'mother_address_region_id' => 'required',
        'family_in_politics' => 'required',
    ];

    // protected $detail_personal_info_rules = [
    //     'last_school_name' => 'required',
    //     'last_school_subject' => 'required',
    //     'last_school_row_no' => 'required',
    //     'last_school_major' => 'required',
    //     'student_life_political_social' => 'required',
    //     'habit' => 'required',
    //     'past_occupation' => 'required',
    //     'revolution' => 'required',
    //     'transfer_reason_salary' => 'required',
    //     'during_work_political_social' => 'required',
    //     'military_friend' => 'required',
    //     'foreigner_friend_name' => 'required',
    //     'foreigner_friend_occupation' => 'required',
    //     'foreigner_friend_nationality_id' => 'required',
    //     'foreigner_friend_country_id' => 'required',
    //     'foreigner_friend_how_to_know' => 'required',
    //     'recommended_by_military_person' => 'required',
    // ];

    public function validate_rules() {
        switch ($this->tab) {
            case 'job_info':
                return $this->job_info_rules;
            case 'relative':
                return $this->relative_info_rules;
            case 'detail_personal_info':
                return $this->detail_personal_info_rules;
            default:
                return $this->personal_info_rules;
        }
    }

    public function mount(){
        $this->educations[] = ['education_group' => '', 'education_type' => '', 'education' => ''];
        $this->recommendations[] = ['recommend_by' => '', 'ministry' => '', 'department' => '', 'rank' => '', 'remark' => ''];
        $this->postings[] = ['rank' => '', 'post' => '', 'from_date' => '', 'to_date' => '', 'department' => '', 'division' => '', 'location' => '', 'remark' => ''];
        $this->siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => ''];
        $this->father_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => ''];
        $this->mother_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => ''];
        $this->spouses[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => ''];
        $this->children[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => ''];
        $this->spouse_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => ''];
        $this->spouse_father_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => ''];
        $this->spouse_mother_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => ''];
    }

    public function add_edu(){
        $this->educations[] = ['education_group' => '', 'education_type' => '', 'education' => ''];
    }

    public function add_recommendation(){
        $this->recommendations[] = ['recommend_by' => '', 'ministry' => '', 'department' => '', 'rank' => '', 'remark' => ''];
    }

    public function add_posting(){
        $this->postings[] = ['rank' => '', 'post' => '', 'from_date' => '', 'to_date' => '', 'department' => '', 'division' => '', 'location' => '', 'remark' => ''];
    }

    public function add_siblings(){
        $this->siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => ''];
    }

    public function add_father_siblings(){
        $this->father_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => ''];
    }

    public function add_mother_siblings(){
        $this->mother_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => ''];
    }

    public function add_spouses(){
        $this->spouses[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => ''];
    }

    public function add_children(){
        $this->children[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => ''];
    }

    public function add_spouse_siblings(){
        $this->spouse_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => ''];
    }

    public function add_spouse_father_siblings(){
        $this->spouse_father_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => ''];
    }

    public function add_spouse_mother_siblings(){
        $this->spouse_mother_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => ''];
    }

    public function removeEdu($index){
        unset($this->educations[$index]);
        $this->educations = array_values($this->educations); //to re_indexing the array (eg: before remove (1,2,3) - after (1,3) 2 missing) reindex will do like (1,2) back
    }

    public function removeRecommendation($index){
        unset($this->recommendations[$index]);
        $this->recommendations = array_values($this->recommendations);
    }

    public function remove_siblings($index){
        unset($this->siblings[$index]);
        $this->siblings = array_values($this->siblings);
    }

    public function remove_father_siblings($index){
        unset($this->father_siblings[$index]);
        $this->father_siblings = array_values($this->father_siblings);
    }

    public function remove_mother_siblings($index){
        unset($this->mother_siblings[$index]);
        $this->mother_siblings = array_values($this->mother_siblings);
    }

    public function remove_spouses($index){
        unset($this->spouses[$index]);
        $this->spouses = array_values($this->spouses);
    }

    public function remove_children($index){
        unset($this->children[$index]);
        $this->children = array_values($this->children);
    }

    public function remove_spouse_siblings($index){
        unset($this->spouse_siblings[$index]);
        $this->spouse_siblings = array_values($this->spouse_siblings);
    }

    public function remove_spouse_father_siblings($index){
        unset($this->spouse_father_siblings[$index]);
        $this->spouse_father_siblings = array_values($this->spouse_father_siblings);
    }

    public function remove_spouse_mother_siblings($index){
        unset($this->spouse_mother_siblings[$index]);
        $this->spouse_mother_siblings = array_values($this->spouse_mother_siblings);
    }

    public function submit_staff(){
        $rules = $this->validate_rules();
        $this->validate($rules);
        $staff_create = null;

        if ($this->photo) {
            $this->photo = Storage::disk('upload')->put('staffs', $this->photo);
        // if ($old = $user->avatar) {
        //     Storage::disk('upload')->delete($old);
        // }
        }

        $personal_info = [
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
        ];

        $job_info = [
            'is_parents_citizen_when_staff_born' => $this->is_parents_citizen_when_staff_born,
            'current_rank_id' => $this->current_rank_id,
            'current_rank_date' => $this->current_rank_date,
            'current_department_id' => $this->current_department_id,
            'current_division_id' => $this->current_division_id,
            'side_department_id' => $this->side_department_id,
            'side_division_id' => $this->side_division_id,
            'salary_paid_by' => $this->salary_paid_by,
            'join_date' => $this->join_date,
            'form_of_appointment' => $this->form_of_appointment,
            'is_direct_appointed' => $this->is_direct_appointed,
            'payscale_id' => $this->payscale_id,
            'current_salary' => $this->current_salary,
            'current_increment_time' => $this->current_increment_time,
        ];

        $relative = [
            'father_name' => $this->father_name,
            'father_ethnic_id' => $this->father_ethnic_id,
            'father_religion_id' => $this->father_religion_id,
            'father_place_of_birth' => $this->father_place_of_birth,
            'father_occupation' => $this->father_occupation,
            'father_address_street' => $this->father_address_street,
            'father_address_ward' => $this->father_address_ward,
            'father_address_township_or_town_id' => $this->father_address_township_or_town_id,
            'father_address_district_id' => $this->father_address_district_id,
            'father_address_region_id' => $this->father_address_region_id,
            'mother_name' => $this->mother_name,
            'mother_ethnic_id' => $this->mother_ethnic_id,
            'mother_religion_id' => $this->mother_religion_id,
            'mother_place_of_birth' => $this->mother_place_of_birth,
            'mother_occupation' => $this->mother_occupation,
            'mother_address_street' => $this->mother_address_street,
            'mother_address_ward' => $this->mother_address_ward,
            'mother_address_township_or_town_id' => $this->mother_address_township_or_town_id,
            'mother_address_district_id' => $this->mother_address_district_id,
            'mother_address_region_id' => $this->mother_address_region_id,
            'family_in_politics' => $this->family_in_politics,
        ];

        // $detail_personal_info = [
        //     'last_school_name' => $this->last_school_name,
        //     'last_school_subject' => $this->last_school_subject,
        //     'last_school_row_no' => $this->last_school_row_no,
        //     'last_school_major' => $this->last_school_major,
        //     'student_life_political_social' => $this->student_life_political_social,
        //     'habit' => $this->habit,
        //     'past_occupation' => $this->past_occupation,
        //     'revolution' => $this->revolution,
        //     'transfer_reason_salary' => $this->transfer_reason_salary,
        //     'during_work_political_social' => $this->during_work_political_social,
        //     'military_friend' => $this->military_friend,
        //     'foreigner_friend_name' => $this->foreigner_friend_name,
        //     'foreigner_friend_occupation' => $this->foreigner_friend_occupation,
        //     'foreigner_friend_nationality_id' => $this->foreigner_friend_nationality_id,
        //     'foreigner_friend_country_id' => $this->foreigner_friend_country_id,
        //     'foreigner_friend_how_to_know' => $this->foreigner_friend_how_to_know,
        //     'recommended_by_military_person' => $this->recommended_by_military_person,
        // ];

        $dataMapping = [
            'job_info' => $job_info,
            'relative' => $relative,
            // 'detail_personal_info' => $detail_personal_info,
            'default' => $personal_info,
        ];

        $staff_create = $dataMapping[$this->tab] ?? $dataMapping['default'];

        $staff = Staff::create($staff_create);

        if ($this->tab == 'personal_info') {
            $this->saveEducations($staff->id);
        } elseif ($this->tab == 'job_info') {
            $this->saveRecommendations($staff->id);
            $this->savePostings($staff->id);
        } elseif ($this->tab == 'relative') {
            $this->saveRelatives($staff->id);
        }

        $this->resetExcept('tab');
        $this->message = 'Saved Successfully';
    }
    private function saveEducations($staffId){
        foreach ($this->educations as $education) {
            StaffEducation::create([
                'education_group_id' => $education['education_group'],
                'education_type_id' => $education['education_type'],
                'education_id' => $education['education'],
                'staff_id' => $staffId,
            ]);
        }
    }

    private function saveRecommendations($staffId){
        foreach ($this->recommendations as $recommendation) {
            Recommendation::create([
                'recommend_by' => $recommendation['recommend_by'],
                'ministry' => $recommendation['ministry'],
                'department' => $recommendation['department'],
                'rank' => $recommendation['rank'],
                'remark' => $recommendation['remark'],
                'staff_id' => $staffId,
            ]);
        }
    }

    private function savePostings($staffId){
        foreach ($this->postings as $posting) {
            Posting::create([
                'staff_id' => $staffId,
                'rank_id' => $posting['rank'],
                'post_id' => $posting['post'],
                'from_date' => $posting['from_date'],
                'to_date' => $posting['to_date'],
                'department_id' => $posting['department'],
                'division_id' => $posting['division'],
                'location' => $posting['location'],
                'remark' => $posting['remark'],
            ]);
        }
    }
    private function relativeFields($staffId, $relative){
        $fields = [
            'staff_id' => $staffId,
            'name' => $relative['name'],
            'ethnic_id' => $relative['ethnic'],
            'religion_id' => $relative['religion'],
            'place_of_birth' => $relative['place_of_birth'],
            'occupation' => $relative['occupation'],
            'address' => $relative['address'],
            'relation_id' => $relative['relation'],
        ];

        return $fields;
    }

    private function saveRelatives($staffId){
        foreach($this->siblings as $relative){
            Sibling::create($this->relativeFields($staffId, $relative));
        }

        foreach($this->father_siblings as $relative){
            FatherSibling::create($this->relativeFields($staffId, $relative));
        }

        foreach($this->mother_siblings as $relative){
            MotherSibling::create($this->relativeFields($staffId, $relative));
        }

        foreach($this->spouses as $relative){
            Spouse::create($this->relativeFields($staffId, $relative));
        }

        foreach($this->children as $relative){
            Children::create($this->relativeFields($staffId, $relative));
        }

        foreach($this->spouse_siblings as $relative){
            SpouseSibling::create($this->relativeFields($staffId, $relative));
        }

        foreach($this->spouse_father_siblings as $relative){
            SpouseFatherSibling::create($this->relativeFields($staffId, $relative));
        }

        foreach($this->spouse_mother_siblings as $relative){
            SpouseMotherSibling::create($this->relativeFields($staffId, $relative));
        }
    }

    public function render()
    {
        $ethnics = Ethnic::get();
        $religions = Religion::get();
        $regions = Region::get();
        $districts = District::get();
        $townships = Township::get();

        // Initialize variables for all potential data sets
        $genders = $blood_types = $education_groups = $education_types = $_educations = null;
        $ranks = $divisions = $departments = $payscales = $posts = null;
        $nationalities = $countries = null;
        $relatives = $relations = null;

        switch ($this->tab) {
            case 'personal_info':
                $genders = Gender::get();
                $blood_types = BloodType::get();
                $education_groups = EducationGroup::get();
                $education_types = EducationType::get();
                $_educations = Education::get();
                break;

            case 'job_info':
                $posts = Post::get();
                $ranks = Rank::get();
                $divisions = Division::get();
                $departments = Department::get();
                $payscales = Payscale::get();
                break;

            case 'detail_personal_info':
                $nationalities = Nationality::get();
                $countries = Country::get();
                break;

            case 'relative':
                $relatives = [
                    'siblings' => [
                        'label' => 'Siblings',
                        'data' => $this->siblings,
                    ],

                    'father_siblings' => [
                        'label' => 'Father Siblings',
                        'data' => $this->father_siblings,
                    ],

                    'mother_siblings' => [
                        'label' => 'Mother Siblings',
                        'data' => $this->mother_siblings,
                    ],

                    'spouses' => [
                        'label' => 'Spouses',
                        'data' => $this->spouses,
                    ],

                    'children' => [
                        'label' => 'Children',
                        'data' => $this->children,
                    ],

                    'spouse_siblings' => [
                        'label' => 'Spouse Siblings',
                        'data' => $this->spouse_siblings,
                    ],

                    'spouse_father_siblings' => [
                        'label' => 'Spouse Father Siblings',
                        'data' => $this->spouse_father_siblings,
                    ],

                    'spouse_mother_siblings' => [
                        'label' => 'Spouse Mother Siblings',
                        'data' => $this->spouse_mother_siblings,
                    ],
                ];
                $relations = Relation::get();
                break;
        }

        return view('livewire.staff-detail', compact('genders', 'relations', 'relatives', 'ethnics', 'religions', 'blood_types', 'regions', 'districts', 'townships', 'education_groups', 'education_types', '_educations', 'ranks', 'divisions', 'departments', 'payscales', 'nationalities', 'countries', 'posts'));
    }

}
