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
use App\Models\District;
use App\Models\Division;
use App\Models\Education;
use App\Models\EducationGroup;
use App\Models\EducationType;
use App\Models\Ethnic;
use App\Models\FatherSibling;
use App\Models\Gender;
use App\Models\Language;
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
use App\Models\Spouse;
use App\Models\SpouseFatherSibling;
use App\Models\SpouseMotherSibling;
use App\Models\SpouseSibling;
use App\Models\Staff;
use App\Models\StaffEducation;
use App\Models\Township;
use App\Models\Training;
use App\Models\TrainingLocation;
use App\Models\TrainingType;
use App\Models\Leave as  ModelsLeave;
use App\Models\Ministry;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\LeaveType;
use App\Models\MaritalStatus;
use App\Models\SocialActivity;
use App\Models\StaffLanguage;
use Illuminate\Support\Facades\Auth;

class StaffDetail extends Component
{
    use WithFileUploads;

public $saveDraftCheck  ;

    public $comment  ,$displayAlertBox ;
    public $message, $confirm_add, $confirm_edit, $staff_id, $tab;
    public $staff;
    //personal_info
    public $staff_photo, $staff_nrc_front, $staff_nrc_back, $photo, $name, $nick_name, $other_name, $staff_no, $dob, $attendid, $gpms_staff_no, $spouse_name, $gender_id, $ethnic_id, $religion_id, $height_feet, $height_inch, $hair_color, $eye_color, $government_staff_started_date, $prominent_mark, $skin_color, $weight, $blood_type_id,$marital_status_id, $place_of_birth, $nrc_region_id, $nrc_township_code_id, $nrc_sign_id, $nrc_code, $nrc_front, $nrc_back, $phone, $mobile, $email, $current_address_street, $current_address_ward,$current_address_house_no, $current_address_region_id,  $current_address_township_or_town_id, $permanent_address_street, $permanent_address_ward,$permanent_address_house_no, $permanent_address_region_id, $permanent_address_township_or_town_id, $previous_addresses, $life_insurance_proposal, $life_insurance_policy_no, $life_insurance_premium, $military_solider_no, $military_join_date, $military_dsa_no, $military_gazetted_date, $military_leave_date, $military_leave_reason, $military_served_army, $military_brief_history_or_penalty, $military_pension, $military_gazetted_no, $veteran_no, $veteran_date, $last_serve_army, $health_condition, $tax_exception;
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
        $spouse_father_name, $spouse_father_ethnic_id, $spouse_father_religion_id, $spouse_father_place_of_birth, $spouse_father_occupation, $spouse_father_address_street,$spouse_father_address_house_no, $spouse_father_address_ward, $spouse_father_address_township_or_town_id, $spouse_father_address_region_id,
        $mother_name, $mother_ethnic_id, $mother_religion_id, $mother_place_of_birth, $mother_occupation, $mother_address_street,$mother_address_house_no, $mother_address_ward, $mother_address_township_or_town_id, $mother_address_region_id,
        $spouse_mother_name, $spouse_mother_ethnic_id, $spouse_mother_religion_id, $spouse_mother_place_of_birth, $spouse_mother_occupation, $spouse_mother_address_street,$spouse_mother_address_house_no, $spouse_mother_address_ward, $spouse_mother_address_township_or_town_id, $spouse_mother_address_region_id,
        $family_in_politics  , $family_in_politics_text = false;

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

    protected $personal_info_rules = [
        'photo' => '',
        'name' => 'required',
        'nick_name' => '',
        'other_name' => '',
        'staff_no' => 'required',
        'dob' => 'required',
        'attendid' => '',
        'gpms_staff_no' => '',
        'spouse_name' => '',
        'gender_id' => '',
        
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
        'marital_status_id'=>'',
        'place_of_birth' => 'required',
        'nrc_region_id' => 'required',
        'nrc_township_code_id' => 'required',
        'nrc_sign_id' => 'required',
        'nrc_code' => 'required',
        'nrc_front' => '',
        'nrc_back' => '',
        'phone' => 'required',
        'mobile' => 'required',
        'email' => 'required',
        'current_address_street' => '',
        'current_address_ward' => '',
        'current_address_house_no'=>'',
        'current_address_region_id' => 'required',
        'current_address_township_or_town_id' => 'required',
        'permanent_address_street' => '',
        'permanent_address_ward' => '',
        'permanent_address_house_no'=>'',
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
        'current_rank_date' => 'required',
        'current_department_id' => 'required',
        'transfer_department_id' => '',
        'transfer_remark' => '',
        'government_staff_started_date' => 'required',
        'current_division_id' => '',
        'side_department_id' => '',
        'side_division_id' => '',
        'salary_paid_by' => '',
        'join_date' => 'required',
        'is_newly_appointed' => 'required',
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
        'father_address_house_no'=>'',
        'father_address_street' => '',
        'father_address_ward' => '',
        'father_address_township_or_town_id' => 'required',
        'father_address_region_id' => 'required',
        'spouse_father_name' => '',
        'spouse_father_ethnic_id' => '',
        'spouse_father_religion_id' => '',
        'spouse_father_place_of_birth' => '',
        'spouse_father_occupation' => '',
        'spouse_father_address_house_no'=>'',
        'spouse_father_address_street' => '',
        'spouse_father_address_ward' => '',
        'spouse_father_address_township_or_town_id' => '',
        'spouse_father_address_region_id' => '',
        'mother_name' => 'required',
        'mother_ethnic_id' => 'required',
        'mother_religion_id' => 'required',
        'mother_place_of_birth' => 'required',
        'mother_occupation' => 'required',
        'mother_address_house_no'=>'',
        'mother_address_street' => '',
        'mother_address_ward' => '',
        'mother_address_township_or_town_id' => 'required',
        'mother_address_region_id' => 'required',
        'spouse_mother_name' => '',
        'spouse_mother_ethnic_id' => '',
        'spouse_mother_religion_id' => '',
        'spouse_mother_place_of_birth' => '',
        'spouse_mother_occupation' => '',
        'spouse_mother_address_house_no'=>'',
        'spouse_mother_address_street' => '',
        'spouse_mother_address_ward' => '',
        'spouse_mother_address_township_or_town_id' => '',
        'spouse_mother_address_region_id' => '',
        'family_in_politics' => '',
        'family_in_politics_text' => '',
        
    ];

    protected $detail_personal_info_rules = [
        'last_school_name' => '',
        'last_school_subject' => '',
        'last_school_row_no' => '',
        'last_school_major' => '',
        'student_life_political_social' => '',
        'habit' => '',
        'revolution' => '',
        'transfer_reason_salary' => '',
        'during_work_political_social' => '',
        'has_military_friend' => '',
        'foreigner_friend_name' => '',
        'foreigner_friend_occupation' => '',
        'foreigner_friend_nationality_id' => '',
        'foreigner_friend_country_id' => '',
        'foreigner_friend_how_to_know' => '',
        'recommended_by_military_person' => '',
    ];

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

        $this->saveDraftCheck = false ;
        if ($this->staff_id) {
            $this->staff = Staff::find($this->staff_id);
            $this->initializeArrays($this->staff_id);
            $this->loadStaffData($this->staff_id);
        }
        $this->leave_types = LeaveType::all();
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
                'education_group' => $edu->education_group_id,
                'education_type' => $edu->education_type_id,
                'education' => $edu->education_id , 
                'country_id' => $edu->country_id
            ];
        }

        foreach ($recommendations as $rec) {
            $this->recommendations[] = [
                'recommend_by' => $rec->recommend_by,
                'ministry' => $rec->ministry,
                'department' => $rec->department,
                'rank' => $rec->rank,
                'remark' => $rec->remark,
                'recommendation_letter' => $rec->recommendation_letter,
            ];
        }

        foreach ($postings as $post) {
            $this->postings[] = [
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
                'education_group' => $sch->education_group_id,
                'education_type' => $sch->education_type_id,
                'education' => $sch->education_id,
                'school_name' => $sch->school_name,
                'town' => $sch->town,
                'semester' => $sch->semester,
                'roll_no' => $sch->roll_no,
                'major' => $sch->major,
                'from_date' => $sch->from_date,
                'to_date' => $sch->to_date,
                'year' => $sch->year,
                'certificate' => $sch->certificate,
                'exam_mark' => $sch->exam_mark,
                'remark' => $sch->remark,
            ];
        }


        foreach ($trainings as $tra) {
            $this->trainings[] = [

                'training_type' => $tra->training_type_id,
                'batch' => $tra->batch ,

                'diploma_name' => $tra->diploma_name,
                'fees' => $tra->fees,
                'from_date' => $tra->from_date,
                'to_date' => $tra->to_date,
                'location' => $tra->location,
                'fees' => $tra->fees ,
                'country' => $tra->country_id,
                'training_location' => $tra->training_location_id,
                'remark' => $tra->remark,
            ];
        }


        foreach ($awards as $awa) {
            $this->awards[] = [
                'award_type' => $awa->award_type_id,
                'award' => $awa->award_id,
                'order_no' => $awa->order_no,
                'order_date' => $awa->order_date,
                'remark' => $awa->remark,
            ];
        }

        foreach ($past_occupations as $ocu) {
            $this->past_occupations[] = [
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
                'country' => $abroad->country_id,
                'particular' => $abroad->particular,
                'training_success_fail' => false ,
                // 'training_success_fail' => $abroad->training_success_fail,
                'training_success_count' => $abroad->training_success_count,
                'sponser' => $abroad->sponser,
                'meet_with' => $abroad->meet_with,
                'from_date' => $abroad->from_date,
                'to_date' => $abroad->to_date,
                'status' => $abroad->status,
                'actual_abroad_date' => $abroad->actual_abroad_date,
                'position' => $abroad->position,
            ];
        }

        foreach ($punishments as $pun) {
            $this->punishments[] = [
                'penalty_type' => $pun->penalty_type_id,
                'reason' => $pun->reason,
                'from_date' => $pun->from_date,
                'to_date' => $pun->to_date,
            ];
        }

        foreach ($socials as $social) {
            $this->socials[] = [
                'particular' => $social->particular,
                'from_date' => $social->from_date,
                'to_date' => $social->to_date,
                'remark' => $social->remark,
            ];
        }

        foreach ($staff_languages as $lang) {
            $this->staff_languages[] = [
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
        $staff = Staff::find($staff_id);

        $this->fillPersonalInfo($staff);
        $this->fillJobInfo($staff);
        $this->fillRelativeInfo($staff);
        $this->fillDetailPersonalInfo($staff);
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
        $this->marital_status_id=$staff->marital_status_id;
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
        $this->current_address_house_no=$staff->current_address_house_no;
        $this->current_address_region_id = $staff->current_address_region_id;
        $this->current_address_township_or_town_id = $staff->current_address_township_or_town_id;
        $this->permanent_address_street = $staff->permanent_address_street;
        $this->permanent_address_ward = $staff->permanent_address_ward;
        $this->permanent_address_house_no=$staff->permanent_address_house_no;
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
        $this->current_division_id =  $staff->current_division_id ??  auth()->user()->division_id;
        
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
        $this->father_address_house_no=$staff->father_address_house_no;
        $this->father_address_street = $staff->father_address_street;
        $this->father_address_ward = $staff->father_address_ward;
        $this->father_address_township_or_town_id = $staff->father_address_township_or_town_id;
        $this->father_address_region_id = $staff->father_address_region_id;

        $this->spouse_father_name = $staff->spouse_father_name;
        $this->spouse_father_ethnic_id = $staff->spouse_father_ethnic_id;
        $this->spouse_father_religion_id = $staff->spouse_father_religion_id;
        $this->spouse_father_place_of_birth = $staff->spouse_father_place_of_birth;
        $this->spouse_father_occupation = $staff->spouse_father_occupation;
        $this->spouse_father_address_house_no=$staff->spouse_father_address_house_no;
        $this->spouse_father_address_street = $staff->spouse_father_address_street;
        $this->spouse_father_address_ward = $staff->spouse_father_address_ward;
        $this->spouse_father_address_township_or_town_id = $staff->spouse_father_address_township_or_town_id;
        $this->spouse_father_address_region_id = $staff->spouse_father_address_region_id;

        $this->mother_name = $staff->mother_name;
        $this->mother_ethnic_id = $staff->mother_ethnic_id;
        $this->mother_religion_id = $staff->mother_religion_id;
        $this->mother_place_of_birth = $staff->mother_place_of_birth;
        $this->mother_occupation = $staff->mother_occupation;
        $this->mother_address_house_no=$staff->mother_address_house_no;
        $this->mother_address_street = $staff->mother_address_street;
        $this->mother_address_ward = $staff->mother_address_ward;
        $this->mother_address_township_or_town_id = $staff->mother_address_township_or_town_id;
        $this->mother_address_region_id = $staff->mother_address_region_id;


        $this->spouse_mother_name = $staff->spouse_mother_name;
        $this->spouse_mother_ethnic_id = $staff->spouse_mother_ethnic_id;
        $this->spouse_mother_religion_id = $staff->spouse_mother_religion_id;
        $this->spouse_mother_place_of_birth = $staff->spouse_mother_place_of_birth;
        $this->spouse_mother_occupation = $staff->spouse_mother_occupation;
        $this->spouse_mother_address_house_no=$staff->spouse_mother_address_house_no;
        $this->spouse_mother_address_street = $staff->spouse_mother_address_street;
        $this->spouse_mother_address_ward = $staff->spouse_mother_address_ward;
        $this->spouse_mother_address_township_or_town_id = $staff->spouse_mother_address_township_or_town_id;
        $this->spouse_mother_address_region_id = $staff->spouse_mother_address_region_id;
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
        $this->foreigner_friend_name = $staff->foreigner_friend_name;
        $this->foreigner_friend_occupation = $staff->foreigner_friend_occupation;
        $this->foreigner_friend_nationality_id = $staff->foreigner_friend_nationality_id;
        $this->foreigner_friend_country_id = $staff->foreigner_friend_country_id;
        $this->foreigner_friend_how_to_know = $staff->foreigner_friend_how_to_know;
        $this->recommended_by_military_person = $staff->recommended_by_military_person;
    }


    public function add_edu()
    {
        $this->educations[] = ['education_group' => '',
         'education_type' => '', 'education' => ''
            ,'country_id' => ''
        ];
    }

    public function add_recommendation()
    {
        $this->recommendations[] = ['recommend_by' => '', 'ministry' => '', 'department' => '', 'rank' => '', 'remark' => '', 'recommendation_letter' => ''];
    }

    public function add_posting()
    {
        $this->postings[] = ['rank' => '', 'post' => '', 'from_date' => '', 'to_date' => '', 'department' => '', 'division' => '', 'location' => '', 'remark' => '', 'ministry' => ''];
    }

    public function add_siblings()
    {
        $this->siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => '' , 'gender_id' => ''];
    }


    public function add_father_siblings()
    {
        $this->father_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => '' , 'gender_id' => ''];
    }

    public function add_mother_siblings()
    {
        $this->mother_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => '' , 'gender_id' => ''];
    }

    public function add_spouses()
    {
        $this->spouses[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => '' , 'gender_id' => ''];
    }

    public function add_children()
    {
        $this->children[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => '' , 'gender_id' => ''];
    }

    public function add_spouse_siblings()
    {
        $this->spouse_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => '' , 'gender_id' => ''];
    }

    public function add_spouse_father_siblings()
    {
        $this->spouse_father_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => '' , 'gender_id' => ' '];
    }

    public function add_spouse_mother_siblings()
    {
        $this->spouse_mother_siblings[] = ['name' => '', 'ethnic' => '', 'religion' => '', 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => '' , 'gender_id' => ''];
    }

    public function add_schools()
    {
        $this->schools[] = [
            'education_group' => '', 'education_type' => '', 'education' => '', 'school_name' => '', 'town' => '', 'year' => '', 'certificate' => '', 'exam_mark' => '', 'remark' => '' , 
        'from_date' => '' ,
        'to_date' => '' ,
        'semester' => '' ,
        'roll_no' => '' ,
        'major' => ''


    ];
    }

    public function add_trainings()
    {
        $this->trainings[] = [
             'batch'=>'', 'training_type' => '',
              'from_date' => '', 'to_date' => '', 'location' => '', 'country' => '', 'training_location' => ''  ,
              'remark'=> '' ,
       
        'fees' => '' ,
        'diploma_name' => ''
    ];
    }


    public function add_awardings()
    {
        $this->awards[] = ['award_type' => '', 'award' => '', 'order_no' => '', 'order_date' => ''
        ,'remark' => ''
    
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
        $this->abroads[] = [ 'country' => '', 'particular' => '', 'training_success_fail' => '', 'training_success_count' => '', 'sponser' => '', 'meet_with' => '', 'from_date' => '', 'to_date' => '', 'status' => '', 'actual_abroad_date' => '', 'position' => ''];
    }

    public function add_socials()
    {
        $this->socials[] = ['particular' => '', 'from_date' => '', 'to_date' => '', 'remark' => ''];
    }

    public function add_staff_languages()
    {
        $this->staff_languages[] = ['language' => '', 'rank' => '', 'writing' => '', 'reading' => '', 'speaking' => '', 'remark' => ''];
    }

    public function removeEdu($index)
    {
        unset($this->educations[$index]);
        $this->educations = array_values($this->educations); //to re_indexing the array (eg: before remove (1,2,3) - after (1,3) 2 missing) reindex will do like (1,2) back
    }

    public function removeRecommendation($index)
    {
        unset($this->recommendations[$index]);
        $this->recommendations = array_values($this->recommendations);
    }

    public function removePosting($index)
    {
        unset($this->postings[$index]);
        $this->postings = array_values($this->postings);
    }

    public function remove_siblings($index)
    {
        unset($this->siblings[$index]);
        $this->siblings = array_values($this->siblings);
    }

    public function remove_father_siblings($index)
    {
        unset($this->father_siblings[$index]);
        $this->father_siblings = array_values($this->father_siblings);
    }

    public function remove_mother_siblings($index)
    {
        unset($this->mother_siblings[$index]);
        $this->mother_siblings = array_values($this->mother_siblings);
    }

    public function remove_spouses($index)
    {
        unset($this->spouses[$index]);
        $this->spouses = array_values($this->spouses);
    }

    public function remove_children($index)
    {
        unset($this->children[$index]);
        $this->children = array_values($this->children);
    }

    public function remove_spouse_siblings($index)
    {
        unset($this->spouse_siblings[$index]);
        $this->spouse_siblings = array_values($this->spouse_siblings);
    }

    public function remove_spouse_father_siblings($index)
    {
        unset($this->spouse_father_siblings[$index]);
        $this->spouse_father_siblings = array_values($this->spouse_father_siblings);
    }

    public function remove_spouse_mother_siblings($index)
    {
        unset($this->spouse_mother_siblings[$index]);
        $this->spouse_mother_siblings = array_values($this->spouse_mother_siblings);
    }

    public function remove_schools($index)
    {
        unset($this->schools[$index]);
        $this->schools = array_values($this->schools);
    }

    public function remove_trainings($index)
    {
        unset($this->trainings[$index]);
        $this->trainings = array_values($this->trainings);
    }

    public function remove_awardings($index)
    {
        unset($this->awards[$index]);
        $this->awards = array_values($this->awards);
    }

    public function remove_past_occupations($index)
    {
        unset($this->past_occupations[$index]);
        $this->past_occupations = array_values($this->past_occupations);
    }

    public function remove_abroads($index)
    {
        unset($this->abroads[$index]);
        $this->abroads = array_values($this->abroads);
    }

    public function remove_socials($index)
    {
        unset($this->socials[$index]);
        $this->socials = array_values($this->socials);
    }

    public function remove_staff_languages($index)
    {
        unset($this->staff_languages[$index]);
        $this->staff_languages = array_values($this->staff_languages);
    }

    public function remove_punishments($index)
    {
        unset($this->punishments[$index]);
        $this->punishments = array_values($this->punishments);
    }

    public function submit_staff()
    {
        $rules = $this->validate_rules();
        // $this->validate($rules);
        $staff = Staff::find($this->staff_id);
        if ($this->photo) {
            
            $_photo = Storage::disk('upload')->put('staffs', $this->photo);
            if (($staff != null) && ($old = $staff->staff_photo)) {
                $staff->staff_photo = null ;
                Storage::disk('upload')->delete($old);
            }
        }

        if ($this->nrc_front) {
            $_nrc_front = Storage::disk('upload')->put('staffs', $this->nrc_front);
            if (($staff != null) && ($old = $staff->nrc_front)) {
                $staff->nrc_front = null ;

                Storage::disk('upload')->delete($old);
            }
        }

        if ($this->nrc_back) {
            $_nrc_back = Storage::disk('upload')->put('staffs', $this->nrc_back);
            if (($staff != null) && ($old = $staff->nrc_back)) {
                $staff->nrc_back = null ;

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
            'marital_status_id'=>$this->marital_status_id,
            'place_of_birth' => $this->place_of_birth,
            'nrc_region_id_id' => $this->nrc_region_id,
            'nrc_township_code_id' => $this->nrc_township_code_id,
            'nrc_sign_id' => $this->nrc_sign_id,
            'nrc_code' => $this->nrc_code,
            'nrc_front' => $staff?->nrc_front ?: ($this->nrc_front ? $_nrc_front : null),
            'nrc_back' =>  $staff?->nrc_back ?: ($this->nrc_back ? $_nrc_back : null),
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'current_address_street' => $this->current_address_street,
            'current_address_ward' => $this->current_address_ward,
            'current_address_house_no'=>$this->current_address_house_no,
            'current_address_region_id' => $this->current_address_region_id,
            'current_address_township_or_town_id' => $this->current_address_township_or_town_id,
            'permanent_address_street' => $this->permanent_address_street,
            'permanent_address_ward' => $this->permanent_address_ward,
            'permanent_address_house_no'=>$this->permanent_address_house_no,
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
            'life_insurance_premium' => $this->life_insurance_premium
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
            'father_address_house_no'=>$this->father_address_house_no,
            'father_address_street' => $this->father_address_street,
            'father_address_ward' => $this->father_address_ward,
            'father_address_township_or_town_id' => $this->father_address_township_or_town_id,
            'father_address_region_id' => $this->father_address_region_id,
            'spouse_father_name' => $this->spouse_father_name,
            'spouse_father_ethnic_id' => $this->spouse_father_ethnic_id,
            'spouse_father_religion_id' => $this->spouse_father_religion_id,
            'spouse_father_place_of_birth' => $this->spouse_father_place_of_birth,
            'spouse_father_occupation' => $this->spouse_father_occupation,
            'spouse_father_address_house_no'=>$this->spouse_father_address_house_no,
            'spouse_father_address_street' => $this->spouse_father_address_street,
            'spouse_father_address_ward' => $this->spouse_father_address_ward,
            'spouse_father_address_township_or_town_id' => $this->spouse_father_address_township_or_town_id,
            'spouse_father_address_region_id' => $this->spouse_father_address_region_id,
            'mother_name' => $this->mother_name,
            'mother_ethnic_id' => $this->mother_ethnic_id,
            'mother_religion_id' => $this->mother_religion_id,
            'mother_place_of_birth' => $this->mother_place_of_birth,
            'mother_occupation' => $this->mother_occupation,
            'mother_address_house_no'=>$this->mother_address_house_no,
            'mother_address_street' => $this->mother_address_street,
            'mother_address_ward' => $this->mother_address_ward,
            'mother_address_township_or_town_id' => $this->mother_address_township_or_town_id,
            'mother_address_region_id' => $this->mother_address_region_id,
            'spouse_mother_name' => $this->spouse_mother_name,
            'spouse_mother_ethnic_id' => $this->spouse_mother_ethnic_id,
            'spouse_mother_religion_id' => $this->spouse_mother_religion_id,
            'spouse_mother_place_of_birth' => $this->spouse_mother_place_of_birth,
            'spouse_mother_occupation' => $this->spouse_mother_occupation,
            'spouse_mother_address_house_no'=>$this->spouse_mother_address_house_no,
            'spouse_mother_address_street' => $this->spouse_mother_address_street,
            'spouse_mother_address_ward' => $this->spouse_mother_address_ward,
            'spouse_mother_address_township_or_town_id' => $this->spouse_mother_address_township_or_town_id,
            'spouse_mother_address_region_id' => $this->spouse_mother_address_region_id,
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
        // before saftdraft  // $staff_create['status_id' ]  =  auth()->user()->AdminHR() ? 1 : ($staff->status_id == 2 ? 4 :  3 ); // 1 approve :   2 ->reject  // 3 pending // 4 resubmit
        $staff_create['current_division_id'] = $this->current_division_id ?? auth()->user()->division_id;


        

        if( $this->saveDraftCheck == true ){
            $staff_create['status_id'] = 1 ;

        }else{
 // wtih saftdraft 
 $staff_create['status_id'] = $staff?->status_id == 1  ? (  isset($staff?->comment) ? 4 :   2)  : 1 ;
 if($staff?->status_id == 2 || $staff?->status_id == 4 ){

     
     $staff_create['status_id'] = 5;
 }
        }
        
       
if($staff_create['status_id'] == 5){
    $staff_create['comment'] = null ;
}


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
        if($staff->status_id){
            
                redirect()->route('staff',['status'=>   auth()->user()->AdminHR() &&  $staff->status_id == 1  ? 2   :  $staff->status_id ]);

            
        }
        

    }

    private function saveAbroads($staffId)
    {
        Abroad::where('staff_id', $staffId)->delete();
        foreach ($this->abroads as $abroad) {
            
            Abroad::create([
                'staff_id' => $staffId,
                'country_id' => $abroad['country'],
                'particular' => $abroad['particular'],
                'training_success_fail' => false ,
                // $abroad['training_success_fail'],
                'training_success_count' => $abroad['training_success_count'],
                'sponser' => $abroad['sponser'],
                'meet_with' => $abroad['meet_with'],
                'from_date' => $abroad['from_date'],
                'to_date' => $abroad['to_date'],
                // 'status' => $abroad['status'],
                'status' => 4,
                'actual_abroad_date' => '2024-12-09'
                //  $abroad['actual_abroad_date']
                 ,
                'position' => $abroad['position'],
            ]);
        }
        
    }

    private function saveSocials($staffId)
    {
        SocialActivity::where('staff_id', $staffId)->delete();
        foreach ($this->socials as $social) {
            SocialActivity::create([
                'staff_id' => $staffId,
                'particular' => $social['particular'],
                'from_date' => $social['from_date'],
                'to_date' => $social['to_date'],
                'remark' => $social['remark'],
            ]);
        }
    }

    private function saveStaffLanguages($staffId)
    {
        StaffLanguage::where('staff_id', $staffId)->delete();
        foreach ($this->staff_languages as $lang) {
            StaffLanguage::create([
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
        School::where('staff_id', $staffId)->delete();
        foreach ($this->schools as $school) {
            School::create([
                'staff_id' => $staffId,
                'education_group_id' => $school['education_group'],
                'education_type_id' => $school['education_type'],
                'education_id' => $school['education'],
                'school_name' => $school['school_name'],
                'town' => $school['town'],
                'semester' => $school['semester'],
                'roll_no' => $school['roll_no'],
                'major' => $school['major'],
                'from_date' => $school['from_date'],
                'to_date' => $school['to_date'],
                'year' => $school['year'],
                'certificate' => $school['certificate'],
                'exam_mark' => $school['exam_mark'],
                'remark' => $school['remark'],
            ]);
        }
    }

    private function savePastOccupations($staffId)
    {
        PastOccupation::where('staff_id', $staffId)->delete();
        foreach ($this->past_occupations as $occupation) {
            PastOccupation::create([
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

    private function saveAwards($staffId)
    {
        Awarding::where('staff_id', $staffId)->delete();
        foreach ($this->awards as $award) {
            Awarding::create([
                'staff_id' => $staffId,
                'award_type_id' => $award['award_type'],
                'award_id' => $award['award'],
                'order_no' => $award['order_no'],
                'order_date' => $award['order_date'],
                'remark' => $award['remark'],
            ]);
        }
    }

    private function saveTrainings($staffId)
    {
        Training::where('staff_id', $staffId)->delete();
        foreach ($this->trainings as $training) {
            Training::create([
                'staff_id' => $staffId,
                'training_type_id' => $training['training_type'],
                'diploma_name' => $training['diploma_name'],
                'fees' => $training['fees'],
                'batch'=>$training['batch'],
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
        Punishment::where('staff_id', $staffId)->delete();
        foreach ($this->punishments as $punishment) {
            Punishment::create([
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
        StaffEducation::where('staff_id', $staffId)->delete();
        foreach ($this->educations as $education) {
            StaffEducation::create([
                'education_group_id' => $education['education_group'],
                'education_type_id' => $education['education_type'],
                'education_id' => $education['education'],
                'staff_id' => $staffId,
                'country_id' =>  $education['country_id']
            ]);
        }
    }

    private function saveRecommendations($staffId)
    {
        Recommendation::where('staff_id', $staffId)->delete();
        foreach ($this->recommendations as $recommendation) {
            Recommendation::create([
                'recommend_by' => $recommendation['recommend_by'],
                'ministry' => $recommendation['ministry'],
                'department' => $recommendation['department'],
                'rank' => $recommendation['rank'],
                'remark' => $recommendation['remark'],
                'recommendation_letter' => $recommendation['recommendation_letter'],
                'staff_id' => $staffId,
            ]);
        }
    }

    private function savePostings($staffId)
    {
        Posting::where('staff_id', $staffId)->delete();
        foreach ($this->postings as $posting) {
            Posting::create([
                'staff_id' => $staffId,
                'rank_id' => $posting['rank'],
                // 'post_id' => 1,
                'from_date' => $posting['from_date'],
                'to_date' => $posting['to_date'],
                'department_id' => $posting['department'],
                'division_id' => $posting['division'],
                'location' => $posting['location'],
                'remark' => $posting['remark'],
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

    private function saveRelatives($staffId)
    {
        Sibling::where('staff_id', $staffId)->delete();
        FatherSibling::where('staff_id', $staffId)->delete();
        MotherSibling::where('staff_id', $staffId)->delete();
        Spouse::where('staff_id', $staffId)->delete();
        Children::where('staff_id', $staffId)->delete();
        SpouseSibling::where('staff_id', $staffId)->delete();
        SpouseFatherSibling::where('staff_id', $staffId)->delete();
        SpouseMotherSibling::where('staff_id', $staffId)->delete();

        foreach ($this->siblings as $relative) {
            Sibling::create($this->relativeFields($staffId, $relative));
        }

        foreach ($this->father_siblings as $relative) {
            FatherSibling::create($this->relativeFields($staffId, $relative));
        }

        foreach ($this->mother_siblings as $relative) {
            MotherSibling::create($this->relativeFields($staffId, $relative));
        }

        foreach ($this->spouses as $relative) {
            Spouse::create($this->relativeFields($staffId, $relative));
        }

        foreach ($this->children as $relative) {
            Children::create($this->relativeFields($staffId, $relative));
        }

        foreach ($this->spouse_siblings as $relative) {
            SpouseSibling::create($this->relativeFields($staffId, $relative));
        }

        foreach ($this->spouse_father_siblings as $relative) {
            SpouseFatherSibling::create($this->relativeFields($staffId, $relative));
        }

        foreach ($this->spouse_mother_siblings as $relative) {
            SpouseMotherSibling::create($this->relativeFields($staffId, $relative));
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
    public function updatedSpouseFatherAddressRegionId()
    {
        $this->spouse_father_address_township_or_town_id = null;
    }
    public function updatedSpouseMotherAddressRegionId()
    {
        $this->spouse_mother_address_township_or_town_id = null;
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

    public function render()
    {
        $data = [
            'ethnics' => Ethnic::all(),
            'religions' => Religion::all(),
            'regions' => Region::all(),
            'genders' => Gender::all(),
            'blood_types' => null,
            'marital_statuses'=>null,
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
                $data['marital_statuses']=MaritalStatus::all();
                $data['education_groups'] = EducationGroup::all();
                $data['education_types'] = EducationType::all();
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
                $data['ranks'] = Rank::all();
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
                $data['ranks'] = Rank::all();
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
                    'spouse_father_siblings' => ['label' => 'ခင်ပွန်း/ဇနီးသည် အဘ၏ ညီအစ်ကို မောင်နှမများ', 'data' => $this->spouse_father_siblings],
                    'spouse_mother_siblings' => ['label' => 'ခင်ပွန်း/ဇနီးသည် အမိ၏ ညီအစ်ကို မောင်နှမများ', 'data' => $this->spouse_mother_siblings],


                ];
                $data['relations'] = Relation::all();
                $data['father_township_or_towns'] = Township::where('region_id', $this->father_address_region_id)->get();
                $data['father_townships'] = Township::where('region_id', $this->father_address_region_id)->get();
                $data['spouse_father_townships'] = Township::where('region_id', $this->spouse_father_address_region_id)->get();
                $data['mother_township_or_towns'] = Township::where('region_id', $this->mother_address_region_id)->get();
                $data['mother_townships'] = Township::where('region_id', $this->mother_address_region_id)->get();
                $data['spouse_father_townships_or_towns'] = Township::where('region_id', $this->spouse_father_address_region_id)->get();
                $data['spouse_father_townships'] = Township::where('region_id', $this->spouse_father_address_region_id)->get();
                $data['spouse_mother_townships_or_towns'] = Township::where('region_id', $this->spouse_mother_address_region_id)->get();
                $data['spouse_mother_townships'] = Township::where('region_id', $this->spouse_mother_address_region_id)->get();
                break;
        }
        $leave_modal_open = $this->leave_modal_open;

        return view('livewire.staff-detail', $data);
    }

    public function leave_modal()
    {
        $this->modal_title = 'ခွင့်';
        $this->leave_modal_open = !$this->leave_modal_open;
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

    //update
    public function updatePosition()
    {
        $this->validate();
        $leave = ModelsLeave::findOrFail($this->leave_id);
        $leave->update([
            'staff_id' => $this->staff_name,
            'leave_type_id' => $this->leave_type_name
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
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

    public function rejectStaff(){
        
        $this->displayAlertBox = true ;
        // $staff = Staff::find($this->staff_id);
        // $staff->status_id = 3; //reject 
        // // $staff->comment = $this->comment;

        // $staff->update();
        // $this->message = 'Staff has been rejected.';
        // $this->displayAlertBox = false ;

        // return redirect()->route('staff',['status' => 3]);
       
    }

    public function submitReject(){
        $staff = Staff::find($this->staff_id);
        $staff->status_id = 3; //reject 
        $staff->comment = $this->comment;

        $staff->update();
        $this->message = 'Staff has been rejected.';
        $this->displayAlertBox = false ;

        return redirect()->route('staff',['status' => 3]);
    }

     public function closeModal(){
        $this->displayAlertBox = false ;

     }
     
     public function saveDraft(){
        $this->saveDraftCheck = true ;
// $this->submit_staff();
     }


}
