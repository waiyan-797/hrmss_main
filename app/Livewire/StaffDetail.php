<?php

namespace App\Livewire;

use App\Models\Abroad;
use App\Models\Award;
use App\Models\Awarding;
use App\Models\AwardType;
use App\Models\BloodType;
use App\Models\Children;
use App\Models\Country;
use App\Models\Department;
use App\Models\Division;
use App\Models\Education;
use App\Models\EducationGroup;
use App\Models\EducationType;
use App\Models\Ethnic;
use App\Models\FatherSibling;
use App\Models\Gender;
use App\Models\Language;
use App\Models\Leave as ModelsLeave;
use App\Models\LeaveType;
use App\Models\MaritalStatus;
use App\Models\Ministry;
use App\Models\MotherSibling;
use App\Models\Nationality;
use App\Models\NrcRegionId;
use App\Models\NrcSign;
use App\Models\NrcTownshipCode;
use App\Models\PastOccupation;
use App\Models\Payscale;
use App\Models\PenaltyType;
use App\Models\Post;
use App\Models\Posting;
use App\Models\Punishment;
use App\Models\Rank;
use App\Models\Recommendation;
use App\Models\Region;
use App\Models\Relation;
use App\Models\Religion;
use App\Models\School;
use App\Models\Section;
use App\Models\Sibling;
use App\Models\SocialActivity;
use App\Models\Spouse;
use App\Models\SpouseFatherSibling;
use App\Models\SpouseMotherSibling;
use App\Models\SpouseSibling;
use App\Models\Staff;
use App\Models\StaffEducation;
use App\Models\StaffLanguage;
use App\Models\Township;
use App\Models\Training;
use App\Models\TrainingLocation;
use App\Models\TrainingType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

use function Livewire\Volt\rules;

class StaffDetail extends Component
{
    use WithFileUploads;

    public $saveDraftCheck;

    public $has_military_friend_text ;
    public $comment, $displayAlertBox ;

    public $message, $confirm_add, $confirm_edit, $staff_id, $tab;
    public $staff, $staff_status_id;

    //personal_info
    public $staff_photo, $staff_nrc_front, $staff_nrc_back, $photo, $name, $nick_name, $other_name, $staff_no, $dob, $attendid, $gpms_staff_no, $spouse_name, $gender_id, $ethnic_id, $religion_id, $height_feet, $height_inch, $hair_color, $eye_color, $government_staff_started_date, $prominent_mark, $skin_color, $weight, $blood_type_id, $marital_status_id, $place_of_birth, $nrc_region_id, $nrc_township_code_id, $nrc_sign_id, $nrc_code, $nrc_front, $nrc_back, $phone, $mobile, $email, $current_address_street, $current_address_ward, $current_address_house_no, $current_address_region_id,  $current_address_township_or_town_id, $permanent_address_street, $permanent_address_ward, $permanent_address_house_no, $permanent_address_region_id, $permanent_address_township_or_town_id, $previous_addresses, $life_insurance_proposal, $life_insurance_policy_no, $life_insurance_premium, $military_solider_no, $military_join_date, $military_dsa_no, $military_gazetted_date, $military_leave_date, $military_leave_reason, $military_served_army, $military_brief_history_or_penalty, $military_pension, $military_gazetted_no, $veteran_no, $veteran_date, $last_serve_army, $health_condition, $tax_exception;
    public $leave_search, $leave_name, $leave_type_name, $leave_id, $staff_name, $from_date, $to_date, $qty, $order_no, $remark;
    public  $submit_button_text, $cancel_action, $submit_form, $leave_types;

    public $leave_modal_open  = false;

    public $modal_title;

    public $confirm_delete = false;

    public $educations = [];
    //job_info
    public $current_rank_id, $current_rank_date, $current_department_id, $current_division_id, $side_department_id, $side_division_id, $salary_paid_by, $join_date, $is_direct_appointed = false, $payscale_id, $current_salary, $current_increment_time, $is_parents_citizen_when_staff_born = false;
    public $recommendations = [];
    public $postings = [];


    //relative
    public $father_name, $father_ethnic_id, $father_religion_id, $father_place_of_birth, $father_occupation, $father_address_street,$father_address_house_no, $father_address_ward, $father_address_township_or_town_id, $father_address_region_id, $transfer_remark, $transfer_department_id, $is_newly_appointed = false,
        $mother_name, $mother_ethnic_id, $mother_religion_id, $mother_place_of_birth, $mother_occupation, $mother_address_street,$mother_address_house_no, $mother_address_ward, $mother_address_township_or_town_id, $mother_address_region_id,
        $family_in_politics = false , $family_in_politics_text ;

    public $siblings = [];
    public $father_siblings = [];
    public $mother_siblings = [];
    public $spouses = [];
    public $children = [];
    public $spouse_siblings = [];
    public $spouse_father_siblings = [];
    public $spouse_mother_siblings = [];


    //detail_personal_info
    public $last_school_name, $last_school_subject, $last_school_row_no, $last_school_major, $student_life_political_social, $habit, $revolution, $transfer_reason_salary, $during_work_political_social, $has_military_friend = false, $foreigner_friend_name, $foreigner_friend_occupation, $foreigner_friend_nationality_id, $foreigner_friend_country_id, $foreigner_friend_how_to_know, $recommended_by_military_person;
    public $schools = [];
    public $trainings = [];
    public $awards = [];
    public $past_occupations = [];
    public $abroads = [];
    public $socials = [];
    public $staff_languages = [];
    public $punishments = [];
    public $withoutScopeRanks ;

    protected $personal_info_rules = [
        'photo' => '',
        'name' => 'required',
        'nick_name' => '',
        'other_name' => '',
        'staff_no' => '',
        'dob' => 'required',
        'attendid' => '',
        'gpms_staff_no' => '',
        'spouse_name' => '',
        'gender_id' => '',
        'ethnic_id' => '',
        'religion_id' => '',
        'height_feet' => 'required',
        'height_inch' => '',
        'hair_color' => 'required',
        'eye_color' => 'required',
        'prominent_mark' => 'required',
        'skin_color' => 'required',
        'weight' => 'required',
        'blood_type_id' => '',
        'marital_status_id' => '',
        'place_of_birth' => 'required',
        'nrc_region_id' => 'required',
        'nrc_township_code_id' => 'required',
        'nrc_sign_id' => 'required',
        'nrc_code' => 'required',
        'nrc_front' => '',
        'nrc_back' => '',
        'phone' => 'required',
        'mobile' => '',
        'email' => 'required',
        'current_address_street' => '',
        'current_address_ward' => '',
        'current_address_house_no' => '',
        'current_address_region_id' => 'required',
        'current_address_township_or_town_id' => 'required',
        'permanent_address_street' => '',
        'permanent_address_ward' => '',
        'permanent_address_house_no' => '',
        'permanent_address_region_id' => 'required',
        'permanent_address_township_or_town_id' => 'required',
        'previous_addresses' => '',
        'military_solider_no' => '',
        'military_join_date' => '',
        'military_dsa_no' => '',
        'military_gazetted_date' => '',
        'military_leave_date' => '',
        'military_leave_reason' => '',
        'military_served_army' => '',
        'military_brief_history_or_penalty' => '',
        'military_pension' => '',
        'military_gazetted_no' => '',
        'veteran_no' => '',
        'veteran_date' => '',
        'last_serve_army' => '',
        'health_condition' => '',
        'tax_exception' => '',
        'life_insurance_proposal' => '',
        'life_insurance_policy_no' => '',
        'life_insurance_premium' => '',
    ];

    protected $job_info_rules = [
        'is_parents_citizen_when_staff_born' => 'required',
        'current_rank_id' => 'required',
        'current_rank_date' => 'required|date',
        'current_department_id' => 'required',
        'transfer_department_id' => '',
        'transfer_remark' => '',
        'government_staff_started_date' => '',
        'current_division_id' => '',
        'side_department_id' => '',
        'side_division_id' => '',
        'salary_paid_by' => '',
        'join_date' => 'required|date',
        'is_newly_appointed' => 'required',
        'is_direct_appointed' => 'required',
        'payscale_id' => 'required',
        'current_salary' => 'required|integer',
        'current_increment_time' => 'required|integer',
    ];

    protected $relative_info_rules = [
        'father_name' => 'required',
        'father_ethnic_id' => '',
        'father_religion_id' => '',
        'father_place_of_birth' => '',
        'father_occupation' => '',
        'father_address_house_no' => '',
        'father_address_street' => '',
        'father_address_ward' => '',
        'father_address_township_or_town_id' => '',
        'father_address_region_id' => '',
        'mother_name' => 'required',
        'mother_ethnic_id' => '',
        'mother_religion_id' => '',
        'mother_place_of_birth' => '',
        'mother_occupation' => '',
        'mother_address_house_no' => '',
        'mother_address_street' => '',
        'mother_address_ward' => '',
        'mother_address_township_or_town_id' => '',
        'mother_address_region_id' => '',
        'family_in_politics' => '',
        'family_in_politics_text' => '',
    ];

    protected $detail_personal_info_rules = [
        'last_school_name' => 'nullable|string',
        'last_school_subject' => 'nullable|string',
        'last_school_row_no' => 'nullable|string',
        'last_school_major' => 'nullable|string',
        'student_life_political_social' => 'nullable|string',
        'habit' => 'nullable|string',
        'revolution' => 'nullable|string',
        'transfer_reason_salary' => 'nullable|string',
        'during_work_political_social' => 'nullable|string',
        'has_military_friend' => 'nullable|boolean',
        'foreigner_friend_name' => 'nullable|string',
        'foreigner_friend_occupation' => 'nullable|string',
        'foreigner_friend_nationality_id' => 'nullable|exists:nationalities,id',
        'foreigner_friend_country_id' => 'nullable|exists:countries,id',
        'foreigner_friend_how_to_know' => 'nullable|string',
        'recommended_by_military_person' => 'nullable|string',
    ];

    protected $messages = [
        'last_school_name.max' => 'The last school name may not exceed 1000 characters.',
        'last_school_major.max' => 'The major may not exceed 255 characters.',
        'student_life_political_social.max' => 'The student life political or social field may not exceed 1000 characters.',
        'habit.max' => 'The habit field may not exceed 500 characters.',
        'revolution.max' => 'The revolution field may not exceed 1000 characters.',
        'transfer_reason_salary.max' => 'The transfer reason or salary field may not exceed 1000 characters.',
        'during_work_political_social.max' => 'The during work political or social field may not exceed 1000 characters.',
        'has_military_friend.boolean' => 'The has military friend field must be true or false.',
        'foreigner_friend_name.max' => 'The foreigner friend name may not exceed 255 characters.',
        'foreigner_friend_occupation.max' => 'The foreigner friend occupation may not exceed 255 characters.',
        'foreigner_friend_nationality_id.exists' => 'The selected foreigner friend nationality is invalid.',
        'foreigner_friend_country_id.exists' => 'The selected foreigner friend country is invalid.',
        'foreigner_friend_how_to_know.max' => 'The foreigner friend how-to-know field may not exceed 1000 characters.',
        'recommended_by_military_person.max' => 'The recommended by military person field may not exceed 255 characters.',

    ];

    public function getWireValue($arrayName, $index, $key)
    {
        return data_get($this->{$arrayName}, "{$index}.{$key}", null);
    }

    public function validate_rules()
    {
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

    public function mount()
    {
        $this->saveDraftCheck = false;
        if ($this->staff_id) {
            $this->staff = Staff::find($this->staff_id);
            $this->initializeArrays($this->staff_id);
            $this->loadStaffData($this->staff_id);
        }
        $this->leave_types = LeaveType::all();
        $this->withoutScopeRanks = Rank::withoutGlobalScopes()->get();
    }

    private function initializeArrays($staff_id)
    {
        $staff_educations = StaffEducation::where('staff_id', $staff_id)->get();
        $recommendations = Recommendation::where('staff_id', $staff_id)->get();
        $postings = Posting::where('staff_id', $staff_id)->get();
        $schools = School::where('staff_id', $staff_id)->get();
        $trainings = Training::where('staff_id', $staff_id)->get();
        $awards = Awarding::where('staff_id', $staff_id)->get();
        $past_occupations = PastOccupation::where('staff_id', $staff_id)->get();
        $abroads = Abroad::where('staff_id', $staff_id)->get();
        $punishments = Punishment::where('staff_id', $staff_id)->get();
        $siblings = Sibling::where('staff_id', $staff_id)->get();
        $father_siblings = FatherSibling::where('staff_id', $staff_id)->get();
        $mother_siblings = MotherSibling::where('staff_id', $staff_id)->get();
        $spouses = Spouse::where('staff_id', $staff_id)->get();
        $children = Children::where('staff_id', $staff_id)->get();
        $spouse_siblings = SpouseSibling::where('staff_id', $staff_id)->get();
        $spouse_father_siblings = SpouseFatherSibling::where('staff_id', $staff_id)->get();
        $spouse_mother_siblings = SpouseMotherSibling::where('staff_id', $staff_id)->get();
        $socials = SocialActivity::where('staff_id', $staff_id)->get();
        $staff_languages = StaffLanguage::where('staff_id', $staff_id)->get();

        $this->educations = [];
        $this->recommendations = [];
        $this->postings = [];
        $this->schools = [];
        $this->trainings = [];
        $this->awards = [];
        $this->past_occupations = [];
        $this->abroads = [];
        $this->punishments = [];
        $this->siblings = [];
        $this->father_siblings = [];
        $this->mother_siblings = [];
        $this->spouses = [];
        $this->children = [];
        $this->spouse_siblings = [];
        $this->spouse_father_siblings = [];
        $this->spouse_mother_siblings = [];
        $this->socials = [];
        $this->staff_languages = [];

        foreach ($staff_educations as $edu) {
            $this->educations[] = [

                'education_id' => $edu->id,
                'education_group' => $edu->education_group_id,
                'education_type' => $edu->education_type_id,
                'education' => $edu->education_id,
                'country_id' => $edu->country_id,
                'education_types' => EducationType::where('education_group_id', $edu->education_group_id)->get(),
                '_educations' => Education::where('education_type_id', $edu->education_type_id)->get(),
                'degree_certificate' => $edu->degree_certificate,
            ];
        }

        foreach ($recommendations as $rec) {
            $this->recommendations[] = [
                'id' => $rec->id,
                'recommend_by' => $rec->recommend_by,
            ];
        }

        foreach ($postings as $post) {
            $this->postings[] = [
                'id' => $post->id,
                'rank' => $post->rank_id,
                'post' => $post->post_id,
                'from_date' => $post->from_date,
                'to_date' => $post->to_date,
                'department' => $post->department_id,
                'division' => $post->division_id,
                'location' => $post->location,
                'ministry' => $post->ministry_id,
                'remark' => $post->remark,
            ];
        }

        foreach ($schools as $sch) {

            $this->schools[] = [
                'id' => $sch->id,
                'education_group' => $sch->education_group_id,
                'education_type' => $sch->education_type_id,
                'education' => $sch->education_id,
                'school_name' => $sch->school_name,
                'town' => $sch->town,
                'from_date' => $sch->from_date,
                'to_date' => $sch->to_date,
                'remark' => $sch->remark,
            ];

        }

        foreach ($trainings as $tra) {
            $this->trainings[] = [
                'id' => $tra->id,
                'training_type' => $tra->training_type_id,
                'batch' => $tra->batch,
                'diploma_name' => $tra->diploma_name,
                'from_date' => $tra->from_date,
                'to_date' => $tra->to_date,
                'location' => $tra->location,
                'country' => $tra->country_id,
                'training_location' => $tra->training_location_id,
                'remark' => $tra->remark,
            ];
        }

        foreach ($awards as $awa) {
            $this->awards[] = [
                'id' => $awa->id,
                'award_type' => $awa->award_type_id,
                'award' => $awa->award_id,
                'order_no' => $awa->order_no,
                'remark' => $awa->remark,
            ];
        }

        foreach ($past_occupations as $ocu) {
            $this->past_occupations[] = [
                'id' => $ocu->id,
                'rank' => $ocu->rank_id,
                'department' => $ocu->department_id,
                'section' => $ocu->section_id,
                'address' => $ocu->address,
                'from_date' => $ocu->from_date,
                'to_date' => $ocu->to_date,
                'remark' => $ocu->remark,
            ];
        }

        foreach ($abroads as $abroad) {
            $this->abroads[] = [
                'id' => $abroad->id,
                'country' => $abroad->countries()->pluck('country_id')->toArray(),
                'particular' => $abroad->particular,
                // 'training_success_fail' => false,
                'training_success_fail' => $abroad->training_success_fail == 1 ? true : false,
                'training_success_count' => $abroad->training_success_count,
                'sponser' => $abroad->sponser,
                'meet_with' => $abroad->meet_with,
                'from_date' => $abroad->from_date,
                'to_date' => $abroad->to_date,
                'actual_abroad_date' => $abroad->actual_abroad_date,
                'position' => $abroad->position,
            ];
        }

        foreach ($punishments as $pun) {

            $this->punishments[] = [
                'id' => $pun->id,
                'penalty_type' => $pun->penalty_type_id,
                'reason' => $pun->reason,
                'from_date' => $pun->from_date,
                'to_date' => $pun->to_date,
            ];
        }

        foreach ($socials as $social) {
            $this->socials[] = [
                'id' => $social->id,
                'particular' => $social->particular,
                'remark' => $social->remark,
            ];
        }

        foreach ($staff_languages as $lang) {
            $this->staff_languages[] = [
                'id' => $lang->id,
                'language' => $lang->language_id,
                'rank' => $lang->rank,
                'writing' => $lang->writing,
                'reading' => $lang->reading,
                'speaking' => $lang->speaking,
                'remark' => $lang->remark,
            ];
        }

        function relative_array($sib)
        {
            return [
                'id' => $sib->id,
                'name' => $sib->name,
                'ethnic' => $sib->ethnic_id,
                'religion' => $sib->religion_id,
                'gender_id' => $sib->gender_id,
                'place_of_birth' => $sib->place_of_birth,
                'occupation' => $sib->occupation,
                'address' => $sib->address,
                'relation' => $sib->relation_id,
            ];
        }

        foreach ($siblings as $sib) {
            $this->siblings[] = relative_array($sib);
        }

        foreach ($father_siblings as $sib) {
            $this->father_siblings[] = relative_array($sib);
        }

        foreach ($mother_siblings as $sib) {
            $this->mother_siblings[] = relative_array($sib);
        }

        foreach ($spouses as $sib) {
            $this->spouses[] = relative_array($sib);
        }

        foreach ($children as $sib) {
            $this->children[] = relative_array($sib);
        }

        foreach ($spouse_siblings as $sib) {
            $this->spouse_siblings[] = relative_array($sib);
        }

        foreach ($spouse_father_siblings as $sib) {
            $this->spouse_father_siblings[] = relative_array($sib);
        }

        foreach ($spouse_mother_siblings as $sib) {
            $this->spouse_mother_siblings[] = relative_array($sib);
        }
    }

    private function loadStaffData($staff_id)
    {
        $this->staff = Staff::find($staff_id);

        $this->fillPersonalInfo($this->staff);
        $this->fillJobInfo($this->staff);
        $this->fillRelativeInfo($this->staff);
        $this->fillDetailPersonalInfo($this->staff);
    }

    private function fillPersonalInfo($staff)
    {
        $this->staff_photo = $staff->staff_photo;
        $this->name = $staff->name;
        $this->nick_name = $staff->nick_name;
        $this->other_name = $staff->other_name;
        $this->staff_no = $staff->staff_no;
        $this->dob = $staff->dob;
        $this->attendid = $staff->attendid;
        $this->gpms_staff_no = $staff->gpms_staff_no;
        $this->spouse_name = $staff->spouse_name;
        $this->gender_id = $staff->gender_id;
        $this->ethnic_id = $staff->ethnic_id;
        $this->religion_id = $staff->religion_id;
        $this->height_feet = $staff->height_feet;
        $this->height_inch = $staff->height_inch;
        $this->hair_color = $staff->hair_color;
        $this->eye_color = $staff->eye_color;
        $this->prominent_mark = $staff->prominent_mark;
        $this->skin_color = $staff->skin_color;
        $this->weight = $staff->weight;
        $this->blood_type_id = $staff->blood_type_id;
        $this->marital_status_id = $staff->marital_status_id;
        $this->place_of_birth = $staff->place_of_birth;
        $this->nrc_region_id = $staff->nrc_region_id_id;
        $this->nrc_township_code_id = $staff->nrc_township_code_id;
        $this->nrc_sign_id = $staff->nrc_sign_id;
        $this->nrc_code = $staff->nrc_code;
        $this->staff_nrc_front = $staff->nrc_front;
        $this->staff_nrc_back = $staff->nrc_back;
        $this->phone = $staff->phone;
        $this->mobile = $staff->mobile;
        $this->email = $staff->email;
        $this->current_address_street = $staff->current_address_street;
        $this->current_address_ward = $staff->current_address_ward;
        $this->current_address_house_no = $staff->current_address_house_no;
        $this->current_address_region_id = $staff->current_address_region_id;
        $this->current_address_township_or_town_id = $staff->current_address_township_or_town_id;
        $this->permanent_address_street = $staff->permanent_address_street;
        $this->permanent_address_ward = $staff->permanent_address_ward;
        $this->permanent_address_house_no = $staff->permanent_address_house_no;
        $this->permanent_address_region_id = $staff->permanent_address_region_id;
        $this->permanent_address_township_or_town_id = $staff->permanent_address_township_or_town_id;
        $this->previous_addresses = $staff->previous_addresses;
        $this->military_solider_no = $staff->military_solider_no;
        $this->military_join_date = $staff->military_join_date;
        $this->military_dsa_no = $staff->military_dsa_no;
        $this->military_gazetted_date = $staff->military_gazetted_date;
        $this->military_leave_date = $staff->military_leave_date;
        $this->military_leave_reason = $staff->military_leave_reason;
        $this->military_served_army = $staff->military_served_army;
        $this->military_brief_history_or_penalty = $staff->military_brief_history_or_penalty;
        $this->military_pension = $staff->military_pension;
        $this->military_gazetted_no = $staff->military_gazetted_no;
        $this->veteran_no = $staff->veteran_no;
        $this->veteran_date = $staff->veteran_date;
        $this->last_serve_army = $staff->last_serve_army;
        $this->health_condition = $staff->health_condition;
        $this->tax_exception = $staff->tax_exception;
        $this->life_insurance_proposal = $staff->life_insurance_proposal;
        $this->life_insurance_policy_no = $staff->life_insurance_policy_no;
        $this->life_insurance_premium = $staff->life_insurance_premium;
    }

    private function fillJobInfo($staff)
    {
        $this->current_rank_id = $staff->current_rank_id;
        $this->current_rank_date = $staff->current_rank_date;
        $this->current_department_id = $staff->current_department_id;
        $this->transfer_department_id = $staff->transfer_department_id;
        $this->transfer_remark = $staff->transfer_remark;
        $this->government_staff_started_date = $staff->government_staff_started_date;
        $this->current_division_id = $staff->current_division_id ?? auth()->user()->division_id;
        $this->side_department_id = $staff->side_department_id;
        $this->side_division_id = $staff->side_division_id;
        $this->salary_paid_by = $staff->salary_paid_by;
        $this->join_date = $staff->join_date;
        $this->is_newly_appointed = $staff->is_newly_appointed;
        $this->is_direct_appointed = $staff->is_direct_appointed;
        $this->payscale_id = $staff->payscale_id;
        $this->current_salary = $staff->current_salary;
        $this->current_increment_time = $staff->current_increment_time;
        $this->is_parents_citizen_when_staff_born = $staff->is_parents_citizen_when_staff_born;
    }

    private function fillRelativeInfo($staff)
    {
        $this->father_name = $staff->father_name;
        $this->father_ethnic_id = $staff->father_ethnic_id;
        $this->father_religion_id = $staff->father_religion_id;
        $this->father_place_of_birth = $staff->father_place_of_birth;
        $this->father_occupation = $staff->father_occupation;
        $this->father_address_house_no = $staff->father_address_house_no;
        $this->father_address_street = $staff->father_address_street;
        $this->father_address_ward = $staff->father_address_ward;
        $this->father_address_township_or_town_id = $staff->father_address_township_or_town_id;
        $this->father_address_region_id = $staff->father_address_region_id;

        $this->mother_name = $staff->mother_name;
        $this->mother_ethnic_id = $staff->mother_ethnic_id;
        $this->mother_religion_id = $staff->mother_religion_id;
        $this->mother_place_of_birth = $staff->mother_place_of_birth;
        $this->mother_occupation = $staff->mother_occupation;
        $this->mother_address_house_no = $staff->mother_address_house_no;
        $this->mother_address_street = $staff->mother_address_street;
        $this->mother_address_ward = $staff->mother_address_ward;
        $this->mother_address_township_or_town_id = $staff->mother_address_township_or_town_id;
        $this->mother_address_region_id = $staff->mother_address_region_id;

        $this->family_in_politics = $staff->family_in_politics;
        $this->family_in_politics_text = $staff->family_in_politics_text;
    }

    private function fillDetailPersonalInfo($staff)
    {
        $this->last_school_name = $staff->last_school_name;
        $this->last_school_subject = $staff->last_school_subject;
        $this->last_school_row_no = $staff->last_school_row_no;
        $this->last_school_major = $staff->last_school_major;
        $this->student_life_political_social = $staff->student_life_political_social;
        $this->habit = $staff->habit;
        $this->revolution = $staff->revolution;
        $this->transfer_reason_salary = $staff->transfer_reason_salary;
        $this->during_work_political_social = $staff->during_work_political_social;
        $this->has_military_friend = $staff->has_military_friend;
        $this->has_military_friend_text = $staff->has_military_friend_text;

        $this->foreigner_friend_name = $staff->foreigner_friend_name;
        $this->foreigner_friend_occupation = $staff->foreigner_friend_occupation;
        $this->foreigner_friend_nationality_id = $staff->foreigner_friend_nationality_id;
        $this->foreigner_friend_country_id = $staff->foreigner_friend_country_id;
        $this->foreigner_friend_how_to_know = $staff->foreigner_friend_how_to_know;
        $this->recommended_by_military_person = $staff->recommended_by_military_person;
    }

    public function add_edu()
    {
        $this->educations[] = [
            'education_id' => '',
            'education_group' => '',
            'education_type' => '',
            'education' => '',
            'country_id' => '',
            'education_types' => [],
            '_educations' => [],
            'degree_certificate' => '',
        ];
    }

    public function add_recommendation()
    {
        $this->recommendations[] = ['recommend_by' => ''];
    }

    public function add_posting()
    {
        $this->postings[] = ['rank' => '', 'post' => '', 'from_date' => '', 'to_date' => '', 'department' => '', 'division' => '', 'location' => '', 'remark' => '', 'ministry' => ''];
    }

    public function add_siblings()
    {
        $this->siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => '', 'gender_id' => ''];
    }

    public function add_father_siblings()
    {
        $this->father_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => '', 'gender_id' => ''];
    }

    public function add_mother_siblings()
    {
        $this->mother_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => '', 'gender_id' => ''];
    }

    public function add_spouses()
    {
        $this->spouses[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => '', 'gender_id' => ''];
    }

    public function add_children()
    {
        $this->children[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => '', 'gender_id' => ''];
    }

    public function add_spouse_siblings()
    {
        $this->spouse_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => '', 'gender_id' => ''];
    }

    public function add_spouse_father_siblings()
    {
        $this->spouse_father_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => '', 'gender_id' => ' '];
    }

    public function add_spouse_mother_siblings()
    {
        $this->spouse_mother_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => '', 'gender_id' => '',
        ];
    }

    public function add_schools()
    {

        $this->schools[] = [
            'education_group' => '',
            'education_type' => '',
            'education' => '',
            'school_name' => '',
            'town' => '',
            'remark' => '',
            'from_date' => '',
            'to_date' => '',

        ];
    }

    public function add_trainings()
    {
        $this->trainings[] = [
            'batch' => '',
            'training_type' => '',
            'from_date' => '',
            'to_date' => '',
            'location' => '',
            'country' => '',
            'training_location' => '',
            'remark' => '',
            'diploma_name' => '',
        ];
    }

    public function add_awardings()
    {
        $this->awards[] = [
            'award_type' => '',
            'award' => '',
            'order_no' => '',
            'remark' => '',

        ];
    }

    public function add_past_occupations()
    {
        $this->past_occupations[] = ['rank' => '', 'department' => '', 'section' => '', 'from_date' => '', 'to_date' => '', 'remark' => ''];
    }

    public function add_punishments()
    {
        $this->punishments[] = ['penalty_type' => '', 'reason' => '', 'from_date' => '', 'to_date' => ''];
    }

    public function add_abroads()
    {
        $this->abroads[] = ['country' => [], 'particular' => '', 'training_success_fail' => false, 'training_success_count' => '', 'sponser' => '', 'meet_with' => '', 'from_date' => '', 'to_date' => '', 'actual_abroad_date' => '', 'position' => ''];
    }

    public function add_socials()
    {
        $this->socials[] = ['particular' => '', 'remark' => ''];
    }

    public function add_staff_languages()
    {
        $this->staff_languages[] = ['language' => '', 'rank' => '', 'writing' => '', 'reading' => '', 'speaking' => '', 'remark' => ''];
    }

    public function removeEdu($index)
    {
        $draft_education = $this->educations[$index];
        $education = StaffEducation::find($draft_education['education_id']);
        if ($education) {
            Storage::disk('upload')->delete($education->degree_certificate);
            $education->delete();
        }
        unset($this->educations[$index]);
        $this->educations = array_values($this->educations);
        // to re_indexing the array (eg: before remove (1,2,3) - after (1,3) 2 missing) reindex will do like (1,2) back
    }



    public function removeModel($propertyName, Model $model, $index): void
    {
        $draft_model = $this->$propertyName[$index];
        $gotModel = optional($model::find(optional($draft_model)['id']));
        
        if ($gotModel) {
            $gotModel->delete();
        }
        array_splice($this->$propertyName, $index, 1);

    }
    

    public function removeRecommendation($index)
    {
        $this->removeModel('recommendations', new Recommendation() , $index);    
    }

    public function removePosting($index)
    {
        $this->removeModel('postings', new Posting() , $index);    
    }

    public function remove_siblings($index)
    {
        $this->removeModel('siblings', new Sibling() , $index);    
        
    }

    public function remove_father_siblings($index)
    {
        $this->removeModel('father_siblings', new FatherSibling() , $index);    
    }

    public function remove_mother_siblings($index)
    {
        $this->removeModel('mother_siblings', new MotherSibling() , $index);    
    }

    public function remove_spouses($index)
    {
        $this->removeModel('spouses', new Spouse() , $index);    
    }

    public function remove_children($index)
    {
        $this->removeModel('children', new Children() , $index);    
    }

    public function remove_spouse_siblings($index)
    {
        $this->removeModel('spouse_siblings', new SpouseSibling() , $index);    

    }

    public function remove_spouse_father_siblings($index)
    {
        $this->removeModel('spouse_father_siblings', new SpouseFatherSibling() , $index);    
    }

    public function remove_spouse_mother_siblings($index)
    {
        $this->removeModel('spouse_mother_siblings', new SpouseMotherSibling() , $index);    
    }

    public function remove_schools($index)
    {

        $this->removeModel('schools', new School() , $index);    
    }

    public function remove_trainings($index)
    {
        $this->removeModel('trainings', new Training() , $index);
    }

    public function remove_awardings($index)
    {
        $this->removeModel('awards', new Award() , $index);
    }

    public function remove_past_occupations($index)
    {
        $this->removeModel('past_occupations', new PastOccupation() , $index);
    }

    public function remove_abroads($index)
    {
        $this->removeModel('abroads', new Abroad() , $index);        
    }

    public function remove_socials($index)
    {
        $this->removeModel('socials', new SocialActivity() , $index);        
    }

    public function remove_staff_languages($index)
    {
        $this->removeModel('staff_languages', new StaffLanguage() , $index);                
    }

    public function remove_punishments($index)
    {
        $this->removeModel('punishments', new Punishment() , $index);                
    }

    public function submit_staff()
    {
        $_status = $this->staff_status_id;
        if ($_status == 3) {
            return $this->rejectStaff();
        }
        $rules = $this->validate_rules();
        $this->validate($rules);

        $staff = Staff::find($this->staff_id);

        if ($this->photo) {
            $_photo = Storage::disk('upload')->put('staffs', $this->photo);
            if (($staff != null) && ($old = $staff->staff_photo)) {
                $staff->staff_photo = null;
                Storage::disk('upload')->delete($old);
            }
        }

        if ($this->nrc_front) {
            $_nrc_front = Storage::disk('upload')->put('staffs', $this->nrc_front);
            if (($staff != null) && ($old = $staff->nrc_front)) {
                $staff->nrc_front = null;

                Storage::disk('upload')->delete($old);
            }
        }

        if ($this->nrc_back) {
            $_nrc_back = Storage::disk('upload')->put('staffs', $this->nrc_back);
            if (($staff != null) && ($old = $staff->nrc_back)) {
                $staff->nrc_back = null;

                Storage::disk('upload')->delete($old);
            }
        }

        $personal_info = [
            'staff_photo' => $staff?->staff_photo ?: ($this->photo ? $_photo : null),
            'name' => $this->name,
            'nick_name' => $this->nick_name,
            'other_name' => $this->other_name,
            'staff_no' => $this->staff_no,
            'attendid' => $this->attendid,
            'gpms_staff_no' => $this->gpms_staff_no,
            'spouse_name' => $this->spouse_name,
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
            'marital_status_id' => $this->marital_status_id,
            'place_of_birth' => $this->place_of_birth,
            'nrc_region_id_id' => $this->nrc_region_id,
            'nrc_township_code_id' => $this->nrc_township_code_id,
            'nrc_sign_id' => $this->nrc_sign_id,
            'nrc_code' => $this->nrc_code,
            'nrc_front' => $staff?->nrc_front ?: ($this->nrc_front ? $_nrc_front : null),
            'nrc_back' => $staff?->nrc_back ?: ($this->nrc_back ? $_nrc_back : null),
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'current_address_street' => $this->current_address_street,
            'current_address_ward' => $this->current_address_ward,
            'current_address_house_no' => $this->current_address_house_no,
            'current_address_region_id' => $this->current_address_region_id,
            'current_address_township_or_town_id' => $this->current_address_township_or_town_id,
            'permanent_address_street' => $this->permanent_address_street,
            'permanent_address_ward' => $this->permanent_address_ward,
            'permanent_address_house_no' => $this->permanent_address_house_no,
            'permanent_address_region_id' => $this->permanent_address_region_id,
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
            'military_gazetted_no' => $this->military_gazetted_no,
            'veteran_no' => $this->veteran_no,
            'veteran_date' => $this->veteran_date,
            'last_serve_army' => $this->last_serve_army,
            'health_condition' => $this->health_condition,
            'tax_exception' => $this->tax_exception,
            'life_insurance_proposal' => $this->life_insurance_proposal,
            'life_insurance_policy_no' => $this->life_insurance_policy_no,
            'life_insurance_premium' => $this->life_insurance_premium,
        ];

        $job_info = [
            'is_parents_citizen_when_staff_born' => $this->is_parents_citizen_when_staff_born,
            'current_rank_id' => $this->current_rank_id,
            'current_rank_date' => $this->current_rank_date,
            'current_department_id' => $this->current_department_id,
            'transfer_department_id' => $this->transfer_department_id,
            'transfer_remark' => $this->transfer_remark,
            'government_staff_started_date' => $this->government_staff_started_date,
            'current_division_id' => $this->current_division_id ?? auth()->user()->division_id,
            'side_department_id' => $this->side_department_id,
            'side_division_id' => $this->side_division_id,
            'salary_paid_by' => $this->salary_paid_by,
            'join_date' => $this->join_date,
            'is_newly_appointed' => $this->is_newly_appointed,
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
            'father_address_house_no' => $this->father_address_house_no,
            'father_address_street' => $this->father_address_street,
            'father_address_ward' => $this->father_address_ward,
            'father_address_township_or_town_id' => $this->father_address_township_or_town_id,
            'father_address_region_id' => $this->father_address_region_id,
            'mother_name' => $this->mother_name,
            'mother_ethnic_id' => $this->mother_ethnic_id,
            'mother_religion_id' => $this->mother_religion_id,
            'mother_place_of_birth' => $this->mother_place_of_birth,
            'mother_occupation' => $this->mother_occupation,
            'mother_address_house_no' => $this->mother_address_house_no,
            'mother_address_street' => $this->mother_address_street,
            'mother_address_ward' => $this->mother_address_ward,
            'mother_address_township_or_town_id' => $this->mother_address_township_or_town_id,
            'mother_address_region_id' => $this->mother_address_region_id,
            'family_in_politics' => $this->family_in_politics,
            'family_in_politics_text' => $this->family_in_politics_text,

        ];

        $detail_personal_info = [
            'last_school_name' => $this->last_school_name,
            'last_school_subject' => $this->last_school_subject,
            'last_school_row_no' => $this->last_school_row_no,
            'last_school_major' => $this->last_school_major,
            'student_life_political_social' => $this->student_life_political_social,
            'habit' => $this->habit,
            'revolution' => $this->revolution,
            'transfer_reason_salary' => $this->transfer_reason_salary,
            'during_work_political_social' => $this->during_work_political_social,
            'has_military_friend' => $this->has_military_friend,
            'has_military_friend_text' => $this->has_military_friend_text,
            'foreigner_friend_name' => $this->foreigner_friend_name,
            'foreigner_friend_occupation' => $this->foreigner_friend_occupation,
            'foreigner_friend_nationality_id' => $this->foreigner_friend_nationality_id,
            'foreigner_friend_country_id' => $this->foreigner_friend_country_id,
            'foreigner_friend_how_to_know' => $this->foreigner_friend_how_to_know,
            'recommended_by_military_person' => $this->recommended_by_military_person,
        ];

        $dataMapping = [
            'job_info' => $job_info,
            'relative' => $relative,
            'detail_personal_info' => $detail_personal_info,
            'default' => $personal_info,
        ];

        $staff_create = $dataMapping[$this->tab] ?? $dataMapping['default'];
        if (auth()->user()->role_id != 2) {
            $staff_create['current_division_id'] = auth()->user()->division_id;
        }
        $staff_create['status_id'] = $_status;
        $staff = Staff::updateOrCreate(['id' => $this->staff_id], $staff_create);
        $this->staff_id = $staff->id;
        $this->staff_photo = $staff->staff_photo;
        $this->staff_nrc_front = $staff->nrc_front;
        $this->staff_nrc_back = $staff->nrc_back;
        switch ($this->tab) {
            case 'personal_info':
                $this->saveEducations($staff->id);
                break;

            case 'job_info':
                $this->saveRecommendations($staff->id);
                $this->savePostings($staff->id);
                break;

            case 'relative':
                $this->saveRelatives($staff->id);
                break;

            case 'detail_personal_info':
                $this->saveAbroads($staff->id);
                $this->saveSocials($staff->id);
                $this->saveStaffLanguages($staff->id);
                $this->saveSchools($staff->id);
                $this->savePastOccupations($staff->id);
                $this->saveAwards($staff->id);
                $this->saveTrainings($staff->id);
                $this->savePunishments($staff->id);
                break;
        }

        $this->reset(['photo', 'nrc_front', 'nrc_back']);
        $this->initializeArrays($this->staff_id);

        $this->loadStaffData($staff->id);
        $this->message = 'Saved Successfully';
        if ($_status == 5 || $_status == 3 || $_status == 4 || ($_status == 2 && auth()->user()->role_id != 2)) {
            $message = match ($_status) {
                2 => 'Submitted Successfully',
                5 => 'Approved Successfully',
                3 => 'Reject Successfully',
                4 => 'Sent Back Successfully',
            };
            session()->flash('message', $message);

            return redirect()->route('staff', [
                'status' => $_status,
            ]);
        }
    }

    public function rejectStaff()
    {
        $this->displayAlertBox = true;
    }

    public function submitReject()
    {
        $staff = Staff::find($this->staff_id);
        $staff->update([
            'status_id' => 3,
            'comment' => $this->comment,
        ]);
        $this->staff = $staff;
        $this->message = 'Staff has been rejected.';
        $this->displayAlertBox = false;
    }

    private function saveAbroads($staffId)
    {



        foreach ($this->abroads as $abroad) {
            $ab = Abroad::updateOrCreate([

                [

                    'id' => $abroad->id ?? null,

                ],
                'staff_id' => $staffId,
                'particular' => $abroad['particular'],
                'training_success_fail' => $abroad['training_success_fail'],
                'training_success_count' => $abroad['training_success_count'],
                'sponser' => $abroad['sponser'],
                'meet_with' => $abroad['meet_with'],
                'from_date' => $abroad['from_date'],
                'to_date' => $abroad['to_date'],
                'actual_abroad_date' => '2024-12-09',
                'position' => $abroad['position'],
            ]);

            $ab->countries()->attach($abroad['country']);
        }
    }

    private function saveSocials($staffId)
    {


        foreach ($this->socials as $social) {
            SocialActivity::updateOrCreate(

                [
                    'id' => $social->id ?? null 

                ],
                [
                    'staff_id' => $staffId,
                    'particular' => $social['particular'],
                    'remark' => $social['remark'],
                ]);
        }
    }

    private function saveStaffLanguages($staffId)
    {

        foreach ($this->staff_languages as $lang) {
            StaffLanguage::updateOrCreate(
                [

                   'id' => $lang->id ?? null 

                ],
                [
                    'staff_id' => $staffId,
                    'language_id' => $lang['language'],
                    'rank' => $lang['rank'],
                    'writing' => $lang['writing'],
                    'reading' => $lang['reading'],
                    'speaking' => $lang['speaking'],
                    'remark' => $lang['remark'],
                ]);
        }
    }

    private function saveSchools($staffId)
    {

        
        // Validation rules and messages
        $rules = [
            'schools.*.education_group' => 'required',
            'schools.*.education_type' => 'required',
            'schools.*.education' => 'required',
            'schools.*.school_name' => 'required|string|max:255',
            'schools.*.town' => 'required|string|max:255',
            'schools.*.from_date' => 'required',
            'schools.*.to_date' => 'required',
            'schools.*.remark' => 'nullable|string|max:1000',
        ];

        $messages = [
            'schools.*.education_group.required' => 'The education group field is required.',
            'schools.*.education_type.required' => 'The education type field is required.',
            'schools.*.education.required' => 'The education level field is required.',
            'schools.*.school_name.required' => 'The school name field is required.',
            'schools.*.school_name.string' => 'The school name must be a string.',
            'schools.*.school_name.max' => 'The school name may not exceed 255 characters.',
            'schools.*.town.required' => 'The town field is required.',
            'schools.*.town.string' => 'The town must be a string.',
            'schools.*.town.max' => 'The town may not exceed 255 characters.',
            'schools.*.from_date.required' => 'The start date is required.',
            'schools.*.to_date.required' => 'The end date is required.',
            'schools.*.remark.string' => 'The remark must be a string.',
            'schools.*.remark.max' => 'The remark may not exceed 1000 characters.',
        ];

        // Validate the input
        $this->validate($rules, $messages);

        foreach ($this->schools as $school) {

            School::updateOrCreate(

                [
                    'id' => $school['id'] ?? null 
                

                ],
                [
                    'staff_id' => $staffId,
                    'education_group_id' => $school['education_group'],
                    'education_type_id' => $school['education_type'],
                    'education_id' => $school['education'],
                    'school_name' => $school['school_name'],
                    'town' => $school['town'],
                    'from_date' => $school['from_date'],
                    'to_date' => $school['to_date'],
                    'remark' => $school['remark'],
                ]
            );
        }
    }

    private function savePastOccupations($staffId)
    {

        $rules = [
            'past_occupations.*.rank' => 'required',
            'past_occupations.*.department' => 'required',
            'past_occupations.*.section' => 'required|nullable',
            'past_occupations.*.address' => 'required|string',
            'past_occupations.*.from_date' => 'required|date|date_format:Y-m-d',
            'past_occupations.*.to_date' => 'required|date|after_or_equal:occupations.*.from_date|date_format:Y-m-d',
            'past_occupations.*.remark' => 'nullable|string',
        ];

        $messages = [
            'past_occupations.*.rank.required' => 'The rank field is required.',

            'past_occupations.*.department.required' => 'The department field is required.',

            'past_occupations.*.section.required' => 'The section field is required.',

            'past_occupations.*.address.required' => 'The address field is required.',
            'past_occupations.*.address.string' => 'The address must be a string.',

            'past_occupations.*.from_date.required' => 'The from date is required.',
            'past_occupations.*.from_date.date' => 'The from date must be a valid date.',
            'past_occupations.*.from_date.date_format' => 'The from date must be in the format YYYY-MM-DD.',

            'past_occupations.*.to_date.required' => 'The from to date is required.',
            'past_occupations.*.to_date.date' => 'The to date must be a valid date.',
            'past_occupations.*.to_date.after_or_equal' => 'The to date must be after or equal to the from date.',
            'past_occupations.*.to_date.date_format' => 'The to date must be in the format YYYY-MM-DD.',

            'past_occupations.*.remark.string' => 'The remark must be a string.',
        ];

        $this->validate($rules, $messages);
        foreach ($this->past_occupations as $occupation) {
            PastOccupation::updateOrCreate(

                ['id' => $occupation['id'] ?? null ],
                [
                    'staff_id' => $staffId,
                    'rank_id' => $occupation['rank'],
                    'department_id' => $occupation['department'],
                    'section_id' => $occupation['section'],
                    'address' => $occupation['address'],
                    'from_date' => $occupation['from_date'],
                    'to_date' => $occupation['to_date'],
                    'remark' => $occupation['remark'],
                ]);
        }
    }

    // validation done
    private function saveAwards($staffId)
    {

        $rules = [
            'awards.*.award_type' => 'required',
            'awards.*.award' => 'required',
            'awards.*.order_no' => 'required|string',
            'awards.*.remark' => '',
        ];

        $messages = [
            'awards.*.award_type.required' => 'The award type is required.',

            'awards.*.award.required' => 'The award is required.',

            'awards.*.order_no.string' => 'The order number must be a string.',
            'awards.*.order_no.required' => 'The order no is required.',
        ];

        $this->validate($rules, $messages);

        foreach ($this->awards as $award) {
            Awarding::updateOrCreate(
                ['id' => $award['id'] ?? null ],
                [

                    'staff_id' => $staffId,
                    'award_type_id' => $award['award_type'],
                    'award_id' => $award['award'],
                    'order_no' => $award['order_no'],
                    'remark' => $award['remark'] ?: null,
                ]);
        }
    }

    // validation done
    private function saveTrainings($staffId)
    {

        $rules = [
            'trainings.*.training_type' => 'required|numeric',
            'trainings.*.diploma_name' => 'string',
            'trainings.*.from_date' => 'required|date|date_format:Y-m-d',
            'trainings.*.to_date' => 'required|date|after_or_equal:trainings.*.from_date|date_format:Y-m-d',
            'trainings.*.location' => 'nullable|string',
            'trainings.*.country_id' => 'nullable|numeric',
            'trainings.*.remark' => 'nullable|string',
            'trainings.*.training_location_id' => 'nullable|numeric',
        ];

        $messages = [
            'trainings.*.training_type.required' => 'The training type is required.',
            'trainings.*.training_type.numeric' => 'The training type must be a valid number.',
            'trainings.*.training_type.exists' => 'The selected training type is invalid.',

            'trainings.*.diploma_name.required' => 'The diploma name is required.',
            'trainings.*.diploma_name.string' => 'The diploma name must be a string.',
            'trainings.*.diploma_name.max' => 'The diploma name may not exceed 255 characters.',

            'trainings.*.from_date.required' => 'The start date is required.',
            'trainings.*.from_date.date' => 'The start date must be a valid date.',
            'trainings.*.from_date.date_format' => 'The start date must be in the format YYYY-MM-DD.',

            'trainings.*.to_date.required' => 'The end date is required.',
            'trainings.*.to_date.date' => 'The end date must be a valid date.',
            'trainings.*.to_date.after_or_equal' => 'The end date must be after or equal to the start date.',
            'trainings.*.to_date.date_format' => 'The end date must be in the format YYYY-MM-DD.',

            'trainings.*.location.string' => 'The location must be a string.',
            'trainings.*.location.max' => 'The location may not exceed 255 characters.',

            'trainings.*.country_id.numeric' => 'The country must be a valid number.',
            'trainings.*.country_id.exists' => 'The selected country is invalid.',

            'trainings.*.remark.string' => 'The remark must be a string.',
            'trainings.*.remark.max' => 'The remark may not exceed 1000 characters.',

            'trainings.*.training_location_id.numeric' => 'The training location must be a valid number.',
            'trainings.*.training_location_id.exists' => 'The selected training location is invalid.',
        ];

        // Perform validation
        $this->validate($rules, $messages);

        foreach ($this->trainings as $training) {
            Training::updateOrCreate(
                [
                    'id' => $training['id'] ?? null ,

                ],
                [
                    'staff_id' => $staffId,
                    'training_type_id' => $training['training_type'],
                    'diploma_name' => $training['diploma_name'],
                    'batch' => $training['batch'],
                    'from_date' => $training['from_date'],
                    'to_date' => $training['to_date'],
                    'location' => $training['location'],
                    'country_id' => $training['country'],
                    'training_location_id' => $training['training_location'],
                    'remark' => $training['remark'],
                ]);
        }
    }

    private function savePunishments($staffId)
    {


        foreach ($this->punishments as $punishment) {

            Punishment::updateOrCreate(
                ['id' => $punishment['id'] ?? null ],
                [

                    'staff_id' => $staffId,
                    'penalty_type_id' => $punishment['penalty_type'],
                    'reason' => $punishment['reason'],
                    'from_date' => $punishment['from_date'],
                    'to_date' => $punishment['to_date'],
                ]);
        }

    }

    private function saveEducations($staffId)
    {
        $_validation = $this->validate_educations();
        $this->validate($_validation['validate'], $_validation['messages']);
        $degree_path = null;
        foreach (
            $this->educations as $education) {

            (str_starts_with($education['degree_certificate'], 'staffs/') && $education['degree_certificate'])
            ? $degree_path = $education['degree_certificate']
            : $degree_path = Storage::disk('upload')->put('staffs', $education['degree_certificate']);

            StaffEducation::updateOrCreate([
                'id' => $education['education_id'] == '' ? null : $education['education_id'],
            ], [
                'education_group_id' => $education['education_group'],
                'education_type_id' => $education['education_type'],
                'education_id' => $education['education'] == '' ? null : $education['education'],
                'staff_id' => $staffId,
                'country_id' => $education['country_id'] == '' ? null : $education['country_id'],
                'degree_certificate' => $degree_path,
            ]);
        }
    }

    public function validate_educations()
    {
        $validations = [
            'educations.*.education_group' => 'required',
            'educations.*.education_type' => 'required',
        ];

        $validation_messages = [
            'educations.*.education_group.required' => 'Field is required.',
            'educations.*.education_type.required' => 'Field is required.',
        ];

        return [
            'validate' => $validations,
            'messages' => $validation_messages,
        ];
    }

    private function saveRecommendations($staffId)
    {

        foreach ($this->recommendations as $recommendation) {
            Recommendation::updateOrCreate(
                [
                    'id' => $recommendation['id'] ?? null ,
                ],
                [
                    'recommend_by' => $recommendation['recommend_by'],
                    'staff_id' => $staffId,
                ]);
        }
    }

    private function savePostings($staffId)
    {
        foreach ($this->postings as $posting) {
            Posting::updateOrCreate(
                [
                    'id' => $posting['id'] == '' ? null : $posting['id'],
                ],
                [
                    'staff_id' => $staffId,
                    'rank_id' => $posting['rank'],
                    'from_date' => $posting['from_date'],
                    'to_date' => $posting['to_date'],
                    'department_id' => $posting['department'],
                    'division_id' => $posting['division'] ?: null,
                    'location' => $posting['location'],
                    'remark' => $posting['remark'] ?: null,
                    'ministry_id' => $posting['ministry'],
                ]);
        }
    }

    private function relativeFields($staffId, $relative)
    {
        $fields = [
            'staff_id' => $staffId,
            'name' => $relative['name'],
            'ethnic_id' => $relative['ethnic'],
            'religion_id' => $relative['religion'],
            'place_of_birth' => $relative['place_of_birth'],
            'gender_id' => $relative['gender_id'],
            'occupation' => $relative['occupation'],
            'address' => $relative['address'],
            'relation_id' => $relative['relation'],
        ];

        return $fields;
    }

    private function deleteFromModels(array $ids, Model $model)
    {

        $filteredIds = array_filter($ids, function ($value) {
            return is_int($value);
        });

        $model::whereNotIn('id', $filteredIds)->delete();
    }

    private function saveRelatives($staffId)
    {
        foreach ($this->siblings as $relative) {
            Sibling::updateOrCreate(
                [
                    'id' => $relative['id'] ?? null,
                ],
                $this->relativeFields($staffId, $relative));
        }

        foreach ($this->father_siblings as $relative) {
            FatherSibling::updateOrCreate(
                [
                    'id' => $relative['id'] ?? null,
                ],
                $this->relativeFields($staffId, $relative));
        }

        foreach ($this->mother_siblings as $relative) {
            MotherSibling::updateOrCreate(

                [
                    'id' => $relative['id'] ?? null,
                ],
                $this->relativeFields($staffId, $relative));
        }

        foreach ($this->spouses as $relative) {
            Spouse::updateOrCreate(

                [
                    'id' => $relative['id'] ?? null,
                ],
                $this->relativeFields($staffId, $relative));
        }

        foreach ($this->children as $relative) {
            Children::updateOrCreate(

                [
                    'id' => $relative['id'] ?? null,
                ],
                $this->relativeFields($staffId, $relative));
        }

        foreach ($this->spouse_siblings as $relative) {
            SpouseSibling::updateOrCreate(

                [
                    'id' => $relative['id'] ?? null,
                ],
                $this->relativeFields($staffId, $relative));
        }

        foreach ($this->spouse_father_siblings as $relative) {
            SpouseFatherSibling::updateOrCreate(

                [
                    'id' => $relative['id'] ?? null,
                ],
                $this->relativeFields($staffId, $relative));
        }

        foreach ($this->spouse_mother_siblings as $relative) {
            SpouseMotherSibling::updateOrCreate(

                [
                    'id' => $relative['id'] ?? null,
                ],
                $this->relativeFields($staffId, $relative));
        }
    }

    public function updatedCurrentAddressRegionId()
    {
        $this->current_address_township_or_town_id = null;
    }

    public function updatedPermanentAddressRegionId()
    {
        $this->permanent_address_township_or_town_id = null;
    }

    public function updatedFatherAddressRegionId()
    {
        $this->father_address_township_or_town_id = null;
    }

    public function updatedMotherAddressRegionId()
    {
        $this->mother_address_township_or_town_id = null;
    }

    public function updatedNrcRegionId()
    {
        $this->nrc_township_code_id = null;
    }

    public function setStaffStatus($status)
    {
        $this->staff_status_id = $status;
    }

    public function handleCustomColumnUpdate($array, $index, $field, $arr_ini, $value)
    {
        match ($arr_ini) {
            'eduTypes' => $this->$array[$index][$field] = EducationType::where('education_group_id', $value)->get(),
            'edus' => $this->$array[$index][$field] = Education::where('education_type_id', $value)->get(),
            default => [],
        };
    }

    public function render()
    {
        $data = [
            'ethnics' => Ethnic::all(),
            'religions' => Religion::all(),
            'regions' => Region::all(),
            'genders' => Gender::all(),
            'blood_types' => null,
            'marital_statuses' => null,
            'education_groups' => null,
            'education_types' => null,
            '_educations' => null,
            'current_address_townships' => null,
            'permanent_address_townships' => null,
            'ranks' => null,
            'divisions' => null,
            'departments' => null,
            'payscales' => null,
            'posts' => null,
            'nationalities' => null,
            'countries' => null,
            'training_types' => null,
            'training_locations' => null,
            'award_types' => null,
            '_awards' => null,
            'sections' => null,
            'penalty_types' => null,
            'languages' => null,
            'relatives' => null,
            'relations' => null,
            'father_townships' => null,
            'spouse_father_townships' => null,
            'mother_townships' => null,
            'spouse_mother_townships' => null,
            'nrc_region_ids' => null,
            'nrc_township_codes' => null,
            'nrc_signs' => null,
        ];

        switch ($this->tab) {
            case 'personal_info':
                $data['genders'] = Gender::all();
                $data['blood_types'] = BloodType::all();
                $data['marital_statuses'] = MaritalStatus::all();
                $data['education_groups'] = EducationGroup::all();
                $data['_educations'] = Education::all();
                $data['_countries'] = Country::all();
                $data['current_address_township_or_towns'] = Township::where('region_id', $this->current_address_region_id)->get();
                $data['permanent_address_township_or_towns'] = Township::where('region_id', $this->permanent_address_region_id)->get();
                $data['current_address_townships'] = Township::where('region_id', $this->current_address_region_id)->get();
                $data['permanent_address_townships'] = Township::where('region_id', $this->permanent_address_region_id)->get();
                $data['nrc_region_ids'] = NrcRegionId::all();
                $data['nrc_township_codes'] = NrcTownshipCode::where('nrc_region_id_id', $this->nrc_region_id)->get();
                $data['nrc_signs'] = NrcSign::all();
                break;

            case 'job_info':
                $data['posts'] = Post::all();
                $data['ranks'] = $this->withoutScopeRanks;
                $data['ministrys'] = Ministry::all();
                $data['divisions'] = Division::all();
                $data['departments'] = Department::all();
                $data['payscales'] = Payscale::all();
                break;

            case 'detail_personal_info':
                $data['education_groups'] = EducationGroup::all();
                $data['education_types'] = EducationType::all();
                $data['_educations'] = Education::all();
                $data['_countries'] = Country::all();

                $data['nationalities'] = Nationality::all();
                $data['countries'] = Country::all();
                $data['training_types'] = TrainingType::all();
                $data['training_locations'] = TrainingLocation::all();
                $data['award_types'] = AwardType::all();
                $data['_awards'] = Award::all();
                $data['sections'] = Section::all();
                $data['penalty_types'] = PenaltyType::all();
                $data['languages'] = Language::all();
                $data['ranks'] = $this->withoutScopeRanks;
                $data['departments'] = Department::all();
                break;

            case 'relative':
                $data['relatives'] = [
                    'siblings' => ['label' => 'ညီကိုမောင်နှမ', 'data' => $this->siblings],
                    'father_siblings' => ['label' => 'အဘ၏ ညီအစ်ကို မောင်နှမများ', 'data' => $this->father_siblings],
                    'mother_siblings' => ['label' => 'အမိ၏ ညီအစ်ကို မောင်နှမများ', 'data' => $this->mother_siblings],
                    'spouses' => ['label' => 'ခင်ပွန်း/ဇနီးသည်', 'data' => $this->spouses],
                    'children' => ['label' => 'သားသမီးများ', 'data' => $this->children],
                    'spouse_siblings' => ['label' => 'ခင်ပွန်း/ဇနီးသည်၏ ညီအစ်ကို မောင်နှမများ', 'data' => $this->spouse_siblings],
                    'spouse_father_siblings' => ['label' => 'ခင်ပွန်း/ဇနီးသည် အဘနှင့် ညီအစ်ကို မောင်နှမများ', 'data' => $this->spouse_father_siblings],
                    'spouse_mother_siblings' => ['label' => 'ခင်ပွန်း/ဇနီးသည် အမိနှင့် ညီအစ်ကို မောင်နှမများ', 'data' => $this->spouse_mother_siblings],
                ];
                $data['relations'] = Relation::all();
                $data['father_township_or_towns'] = Township::where('region_id', $this->father_address_region_id)->get();
                $data['father_townships'] = Township::where('region_id', $this->father_address_region_id)->get();
                $data['mother_township_or_towns'] = Township::where('region_id', $this->mother_address_region_id)->get();
                $data['mother_townships'] = Township::where('region_id', $this->mother_address_region_id)->get();
                break;
        }
        $leave_modal_open = $this->leave_modal_open;

        return view('livewire.staff-detail', $data);
    }

    public function leave_modal()
    {
        $this->modal_title = 'ခွင့်';
        $this->leave_modal_open = ! $this->leave_modal_open;
    }

    public function add_new()
    {
        $this->resetValidation();
        $this->reset(['staff_name', 'leave_type_name', 'from_date', 'to_date', 'qty', 'order_no', 'remark']);
        $this->confirm_add = true;
        $this->confirm_edit = false;
    }

    public function submitForm()
    {
        if ($this->confirm_add == true) {
            $this->createPosition();
        } else {
            $this->updatePosition();
        }
    }

    public function createPosition()
    {
        $this->validate();
        ModelsLeave::create([
            'staff_id' => $this->staff_name,
            'leave_type_id' => $this->leave_type_name,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'qty' => $this->qty,
            'order_no' => $this->order_no,
            'remark' => $this->remark,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }

    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->leave_id = $id;
        $leave = ModelsLeave::findOrFail($id);
        $this->staff_name = $leave->staff_id;
        $this->leave_type_name = $leave->leave_type_id;
    }

    // update
    public function updatePosition()
    {
        $this->validate();
        $leave = ModelsLeave::findOrFail($this->leave_id);
        $leave->update([
            'staff_id' => $this->staff_name,
            'leave_type_id' => $this->leave_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    // delete confirm
    public function delete_confirm($id)
    {
        $this->leave_id = $id;
        $this->confirm_delete = true;
    }

    public function delete($id)
    {
        ModelsLeave::find($id)->delete();
        $this->confirm_delete = false;
    }

    public function closeModal()
    {
        $this->displayAlertBox = false;
    }

    public function saveDraft()
    {
        $this->saveDraftCheck = true;
        // $this->submit_staff();
    }
}
