<?php

namespace App\Livewire;
use App\Models\Abroad;
use App\Models\Award;
use App\Models\Awarding;
use App\Models\AwardType;
use App\Models\BloodType;
use App\Models\Children;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
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
use App\Models\MilitaryService;
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
use App\Models\Reward;
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
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

use function Illuminate\Log\log;
use function Livewire\Volt\rules;

class StaffDetail extends Component
{
    use WithFileUploads;
    public $educations_all;
    public $saveDraftCheck;
    public $add_model, $submit_button_text;

    public $has_military_friend_text ;
    public $comment, $displayAlertBox ;

    public $message, $confirm_add, $confirm_edit, $staff_id, $tab;
    public $staff, $staff_status_id;
    public $request_attach;

    //personal_info
    public $nrc_township_codes = [];
    public $current_address_townships = [];
    public $permanent_address_townships = [];
    public $staff_photo, $staff_nrc_front, $staff_nrc_back, $photo, $name, $nick_name, $other_name, $staff_no, $dob, $attendid, $gpms_staff_no, $spouse_name, $gender_id, $ethnic_id, $religion_id, $height_feet, $height_inch, $hair_color, $eye_color, $government_staff_started_date, $prominent_mark, $skin_color, $weight, $blood_type_id, $marital_status_id, $place_of_birth, $nrc_region_id, $nrc_township_code_id, $nrc_sign_id, $nrc_code, $nrc_front, $nrc_back, $phone, $mobile, $email, $current_address_street, $current_address_ward, $current_address_house_no, $current_address_region_id,  $current_address_township_or_town_id, $permanent_address_street, $permanent_address_ward, $permanent_address_house_no, $permanent_address_region_id, $permanent_address_township_or_town_id, $previous_addresses, $life_insurance_proposal, $life_insurance_policy_no, $life_insurance_premium, $military_solider_no, $military_join_date, $military_dsa_no, $military_gazetted_date, $military_leave_date, $military_leave_reason, $military_served_army, $military_brief_history_or_penalty, $military_pension, $military_gazetted_no, $veteran_no, $veteran_date, $last_serve_army, $health_condition, $tax_exception, $military_service_id;
    public $leave_search, $leave_name, $leave_type_name, $leave_id, $staff_name, $from_date, $to_date, $qty, $order_no, $remark;
    public $cancel_action, $submit_form, $leave_types;

    //education_master
    public $education_group_name, $education_type_name, $education_name;

    public $leave_modal_open  = false;

    public $modal_title;

    public $confirm_delete = false;

    public $educations = [];
    //job_info

    // $table->date('last_increment_date')->nullable();
    public $current_rank_id, $current_rank_date, $current_department_id, $current_division_id, $side_ministry_id = null, $side_department_id = null, $side_division_id = null, $salary_paid_by, $join_date, $is_direct_appointed = false, $payscale_id, $current_salary, $current_increment_time,$last_increment_date, $is_parents_citizen_when_staff_born = false;
    public $recommendations = [];
    public $postings = [];
    public $side_departments = [];

    //relative
    public $father_townships = [];
    public $mother_townships = [];
    public $father_name, $father_ethnic_id, $father_religion_id, $father_place_of_birth, $father_occupation, $father_address_street,$father_address_house_no, $father_address_ward, $father_address_township_or_town_id, $father_address_region_id, $transfer_remark, $transfer_division_id, $is_newly_appointed = false,
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
    public $abroads = [];
    public $socials = [];
    public $staff_languages = [];
    public $staff_rewards = [];
    public $punishments = [];
    public $withoutScopeRanks;

    //master_tables
    public
        $ethnics,
        $religions,
        $regions,
        $genders,
        $military_services,
        $blood_types,
        $marital_statuses,
        $education_groups,
        $education_types,
        $_educations,
        $ranks,
        $divisions,
        $departments,
        $dica_departments,
        $payscales,
        $posts,
        $nationalities,
        $countries,
        $training_types,
        $training_locations,
        $award_types,
        $_awards,
        $sections,
        $penalty_types,
        $languages,
        $rewards,
        $relatives,
        $relations,
        $spouse_father_townships,
        $spouse_mother_townships,
        $nrc_region_ids,
        $ministrys,
        $_countries,
        $nrc_signs;

    protected $personal_info_rules = [
        'photo' => '',
        'name' => 'required',
        'nick_name' => '',
        'military_service_id' => '',
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
        'transfer_division_id' => '',
        'transfer_remark' => '',
        'government_staff_started_date' => '',
        'current_division_id' => '',
        'side_ministry_id' => '',
        'side_department_id' => '',
        'side_division_id' => '',
        'salary_paid_by' => '',
        'join_date' => 'required|date',
        'is_newly_appointed' => 'required',
        'is_direct_appointed' => '',
        'payscale_id' => 'required',
        'current_salary' => 'required|integer',
        'current_increment_time' => 'integer',
        'last_increment_date'=>'',
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
        $this->educations_all = Education::all()->toArray();
        $this->saveDraftCheck = false;
        $this->cancel_action = 'close_master_modal';
        $this->submit_button_text = 'သိမ်းရန်';
        $this->add_model = null;
        $this->ethnics= Ethnic::get();
        $this->religions= Religion::get();
        $this->regions= Region::get();
        $this->genders= Gender::get();
        $this->leave_types = LeaveType::all();
        $this->withoutScopeRanks = Rank::withoutGlobalScopes()->get();

        switch ($this->tab) {
            case 'personal_info':
                $this->military_services = MilitaryService::all();
                $this->blood_types = BloodType::all();
                $this->marital_statuses = MaritalStatus::all();
                $this->education_groups = EducationGroup::all();
                $this->education_types = EducationType::all();
                $this->_educations = Education::all();
                $this->_countries = Country::all();
                $this->nrc_region_ids = NrcRegionId::all();
                $this->nrc_signs = NrcSign::all();
                break;

            case 'job_info':
                $this->posts = Post::all();
                $this->ranks = $this->withoutScopeRanks;
                $this->ministrys = Ministry::all();
                $this->departments = Department::all();
                $this->dica_departments = Department::where('id', 129)->get();
                $this->divisions = Division::all();
                $this->payscales = Payscale::all();
                break;

            case 'detail_personal_info':
                $this->education_groups = EducationGroup::all();
                $this->education_types = EducationType::all();
                $this->_educations = Education::all();
                $this->_countries = Country::all();
                $this->nationalities = Nationality::all();
                $this->countries = Country::all();
                $this->training_types = TrainingType::all();
                $this->training_locations = TrainingLocation::all();
                $this->award_types = AwardType::all();
                $this->_awards = Award::all();
                $this->sections = Section::all();
                $this->penalty_types = PenaltyType::all();
                $this->languages = Language::all();
                $this->ranks = $this->withoutScopeRanks;
                $this->ministrys = Ministry::all();
                $this->departments = Department::all();
                break;

            case 'relative':
                $this->relations = Relation::all();
                break;
        }

        if ($this->staff_id) {
            $this->staff = Staff::find($this->staff_id);
            $this->initializeArrays($this->staff_id);
            $this->loadStaffData($this->staff_id);
        }
    }

    private function initializeArrays($staff_id)
    {
        $staff_educations = StaffEducation::where('staff_id', $staff_id)->get();
        $recommendations = Recommendation::where('staff_id', $staff_id)->get();
        $postings = Posting::where('staff_id', $staff_id)->get();
        $schools = School::where('staff_id', $staff_id)->get();
        $trainings = Training::where('staff_id', $staff_id)->get();
        $awards = Awarding::where('staff_id', $staff_id)->get();
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
        $staff_rewards = Reward::where('staff_id',$staff_id)->get();

        $this->educations = [];
        $this->recommendations = [];
        $this->postings = [];
        $this->schools = [];
        $this->trainings = [];
        $this->awards = [];
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
        $this->staff_rewards = [];

        foreach ($staff_educations as $edu) {
            $education = Education::find($edu->education_id);

            $this->educations[] = [
                'id' => $edu->id,
                'education_group' => $education->education_group_id,
                'education_type' => $education->education_type_id,
                'education' => $education->id,
                'country_id' => $edu->country_id,
                // 'education_types' => EducationType::where('education_group_id', $edu->education_group_id)->get(),
                // '_educations' => Education::where('education_type_id', $edu->education_type_id)->get(),
                'education_types' => EducationType::all(),
                '_educations' => Education::all(),
                'degree_certificate' => $edu->degree_certificate,
            ];
        }

        foreach ($recommendations as $rec) {
            $this->recommendations[] = [
                'id' => $rec->id,
                'recommend_by' => $rec->recommend_by,
            ];
        }

        $totalPostings = count($postings);
        $currentIndex = 0;

        foreach ($postings as $post) {
            $this->postings[] = [
                'id' => $post->id,
                'rank' => $post->rank_id,
                'post' => $post->post_id,
                'ministry' => $post->ministry_id,
                'department' => $post->department_id,
                'departments' => Department::where('ministry_id', $post->ministry_id)->get(),
                'sub_department' => $post->sub_department,
                'from_date' => $post->from_date,
                'to_date' => ++$currentIndex === $totalPostings ? null : $post->to_date,
                'location' => $post->location,
                'remark' => $post->remark,
            ];
        }

        foreach ($schools as $sch) {
            $this->schools[] = [
                'id' => $sch->id,
                'education_group' => $sch->education_group_id,
                'education_type' => $sch->education_type_id,
                'education' => $sch->education,
                'school_name' => $sch->school_name,
                'town' => $sch->town,
                'from_date' => $sch->from_date,
                'to_date' => $sch->to_date,
                'remark' => $sch->remark,
                // 'education_types' => EducationType::where('education_group_id', $sch->education_group_id)->get(),
                'education_types' => EducationType::all(),
                '_educations' => Education::where('education_type_id', $sch->education_type_id)->get(),
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

        foreach ($abroads as $abroad) {
            $this->abroads[] = [
                'id' => $abroad->id ,
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
                'id' => $pun->id ,
                'penalty_type' => $pun->penalty_type_id,
                'reason' => $pun->reason,
                'from_date' => $pun->from_date,
                'to_date' => $pun->to_date,
            ];
        }

        foreach ($socials as $social) {
            $this->socials[] = [
                'id'=> $social->id ,
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

        foreach ($staff_rewards as $reward) {
            $this->staff_rewards[] = [
                'id' => $reward->id,
                'name' => $reward->name,
                'type' => $reward->type,
                'year' => $reward->year,
                'remark' => $reward->remark,
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
        $this->military_service_id = $staff->military_service_id;
        $this->blood_type_id = $staff->blood_type_id;
        $this->marital_status_id = $staff->marital_status_id;
        $this->place_of_birth = $staff->place_of_birth;
        $this->nrc_region_id = $staff->nrc_region_id_id;
        $this->nrc_township_codes = NrcTownshipCode::where('nrc_region_id_id', $staff->nrc_region_id_id)->get();
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
        $this->current_address_townships = Township::where('region_id', $staff->current_address_region_id)->get();
        $this->current_address_township_or_town_id = $staff->current_address_township_or_town_id;
        $this->permanent_address_street = $staff->permanent_address_street;
        $this->permanent_address_ward = $staff->permanent_address_ward;
        $this->permanent_address_house_no = $staff->permanent_address_house_no;
        $this->permanent_address_region_id = $staff->permanent_address_region_id;
        $this->permanent_address_townships = Township::where('region_id', $staff->permanent_address_region_id)->get();
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
        $this->transfer_division_id = $staff->transfer_division_id;
        $this->transfer_remark = $staff->transfer_remark;
        $this->government_staff_started_date = $staff->government_staff_started_date;
        $this->current_division_id = $staff->current_division_id ?? Auth::user()->division_id;
        $this->side_ministry_id = $staff->side_ministry_id;
        $this->side_departments = Department::where('ministry_id', $staff->side_ministry_id)->get();
        $this->side_department_id = $staff->side_department_id;
        $this->side_division_id = $staff->side_division_id;
        $this->salary_paid_by = $staff->salary_paid_by;
        $this->join_date = $staff->join_date;
        $this->is_newly_appointed = $staff->is_newly_appointed;
        $this->is_direct_appointed = $staff->is_direct_appointed;
        $this->payscale_id = $staff->payscale_id;
        $this->current_salary = $staff->current_salary;
        $this->current_increment_time = $staff->current_increment_time;
        $this->last_increment_date=$staff->last_increment_date;
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
        $this->father_address_region_id = $staff->father_address_region_id;
        $this->father_townships = Township::where('region_id', $staff->father_address_region_id)->get();
        $this->father_address_township_or_town_id = $staff->father_address_township_or_town_id;

        $this->mother_name = $staff->mother_name;
        $this->mother_ethnic_id = $staff->mother_ethnic_id;
        $this->mother_religion_id = $staff->mother_religion_id;
        $this->mother_place_of_birth = $staff->mother_place_of_birth;
        $this->mother_occupation = $staff->mother_occupation;
        $this->mother_address_house_no = $staff->mother_address_house_no;
        $this->mother_address_street = $staff->mother_address_street;
        $this->mother_address_ward = $staff->mother_address_ward;
        $this->mother_address_region_id = $staff->mother_address_region_id;
        $this->mother_townships = Township::where('region_id', $staff->mother_address_region_id)->get();
        $this->mother_address_township_or_town_id = $staff->mother_address_township_or_town_id;

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
            'id' => null,
            'education_group' => null,
            'education_type' => null,
            'education' => null,
            'country_id' => null,
            'education_types' => [],
            '_educations' => [],
            'degree_certificate' => '',
        ];
    }

    public function add_recommendation()
    {
        $this->recommendations[] = ['id' => null, 'recommend_by' => ''];
    }

    public function add_posting()
    {
        $this->postings[] = ['id' => null, 'rank' => null, 'post' => '', 'from_date' => null, 'to_date' => null, 'department' => null, 'departments' => [], 'sub_department' => null, 'location' => '', 'remark' => null, 'ministry' => null];
    }

    public function add_siblings()
    {
        $this->siblings[] = ['id' => null, 'name' => '', 'ethnic' => null, 'religion' => null, 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => null, 'gender_id' => null];
    }

    public function add_father_siblings()
    {
        $this->father_siblings[] = ['id' => null, 'name' => '', 'ethnic' => null, 'religion' => null, 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => null, 'gender_id' => null];
    }

    public function add_mother_siblings()
    {
        $this->mother_siblings[] = ['id' => null, 'name' => '', 'ethnic' => null, 'religion' => null, 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => null, 'gender_id' => null];
    }

    public function add_spouses()
    {
        $this->spouses[] = ['id' => null, 'name' => '', 'ethnic' => null, 'religion' => null, 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => null, 'gender_id' => null];
    }

    public function add_children()
    {
        $this->children[] = ['id' => null, 'name' => '', 'ethnic' => null, 'religion' => null, 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => null, 'gender_id' => null];
    }

    public function add_spouse_siblings()
    {
        $this->spouse_siblings[] = ['id' => null, 'name' => '', 'ethnic' => null, 'religion' => null, 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => null, 'gender_id' => null];
    }

    public function add_spouse_father_siblings()
    {
        $this->spouse_father_siblings[] = ['id' => null, 'name' => '', 'ethnic' => null, 'religion' => null, 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => null, 'gender_id' => null];;
    }

    public function add_spouse_mother_siblings()
    {
        $this->spouse_mother_siblings[] = ['id' => null, 'name' => '', 'ethnic' => null, 'religion' => null, 'place_of_birth' => '', 'occupation' => '', 'address' => '', 'relation' => null, 'gender_id' => null];
    }

    public function add_schools()
    {
        $this->schools[] = [
            'id' => null,
            'education_group' => null,
            'education_type' => null,
            'education' => null,
            'school_name' => '',
            'town' => '',
            'remark' => '',
            'from_date' => '',
            'to_date' => '',
            'education_types' => [],
            '_educations' => [],
        ];
    }

    public function add_trainings()
    {
        $this->trainings[] = [
            'id' => null,
            'batch' => '',
            'training_type' => null,
            'from_date' => '',
            'to_date' => '',
            'location' => '',
            'country' => null,
            'training_location' => '',
            'remark' => '',
            'diploma_name' => '',
        ];
    }

    public function add_awardings()
    {
        $this->awards[] = [
            'id' => null,
            'award_type' => null,
            'award' => null,
            'order_no' => '',
            'remark' => '',
        ];
    }

    public function add_punishments()
    {
        $this->punishments[] = ['id' => null, 'penalty_type' => null, 'reason' => '', 'from_date' => '', 'to_date' => ''];
    }

    public function add_abroads()
    {
        $this->abroads[] = ['id' => null, 'country' => [], 'particular' => '', 'training_success_fail' => false, 'training_success_count' => '', 'sponser' => '', 'meet_with' => '', 'from_date' => '', 'to_date' => '', 'actual_abroad_date' => '', 'position' => ''];
    }

    public function add_socials()
    {
        $this->socials[] = ['id' => null, 'particular' => '', 'remark' => ''];
    }

    public function add_staff_languages()
    {
        $this->staff_languages[] = ['id' => null, 'language' => null, 'rank' => '', 'writing' => '', 'reading' => '', 'speaking' => '', 'remark' => ''];
    }


    public function add_staff_rewards()
    {
        $this->staff_rewards[] = ['id' => null, 'name' => '', 'type' => null, 'year' => '', 'remark' => ''];
    }

    public function removeModel($propertyName, $model, $index, $attaches): void
    {
        $draft_model = $this->$propertyName[$index];
        $gotModel = $model::find($draft_model['id']);
        if ($gotModel) {
            foreach ($attaches as $attach) {
                if ($gotModel->$attach) {
                    Storage::disk('upload')->delete($gotModel->$attach);
                }
            }
            $gotModel->delete();
        }

        unset($this->$propertyName[$index]);
        $this->$propertyName = array_values($this->$propertyName);
        // to re_indexing the array (eg: before remove (1,2,3) - after (1,3) 2 missing) reindex will do like (1,2) back
    }

    public function removeEdu($index)
    {
        $attaches = ['degree_certificate'];
        $this->removeModel('educations', StaffEducation::class, $index, $attaches);
    }

    public function removeRecommendation($index)
    {
        $this->removeModel('recommendations', Recommendation::class , $index, []);
    }

    public function removePosting($index)
    {
        $this->removeModel('postings', Posting::class , $index, []);
    }

    public function remove_siblings($index)
    {
        $this->removeModel('siblings', Sibling::class , $index, []);
    }

    public function remove_father_siblings($index)
    {
        $this->removeModel('father_siblings', FatherSibling::class , $index, []);
    }

    public function remove_mother_siblings($index)
    {
        $this->removeModel('mother_siblings',  MotherSibling::class , $index, []);
    }

    public function remove_spouses($index)
    {
        $this->removeModel('spouses',  Spouse::class , $index, []);
    }

    public function remove_children($index)
    {
        $this->removeModel('children',  Children::class , $index, []);
    }

    public function remove_spouse_siblings($index)
    {
        $this->removeModel('spouse_siblings',  SpouseSibling::class , $index, []);

    }

    public function remove_spouse_father_siblings($index)
    {
        $this->removeModel('spouse_father_siblings',  SpouseFatherSibling::class , $index, []);
    }

    public function remove_spouse_mother_siblings($index)
    {
        $this->removeModel('spouse_mother_siblings',  SpouseMotherSibling::class , $index, []);
    }

    public function remove_schools($index)
    {

        $this->removeModel('schools',  School::class , $index, []);
    }

    public function remove_trainings($index)
    {
        $this->removeModel('trainings',  Training::class , $index, []);
    }

    public function remove_awardings($index)
    {
        $this->removeModel('awards',  Awarding::class , $index, []);
    }

    public function remove_abroads($index)
    {
        $this->removeModel('abroads',  Abroad::class , $index, []);
    }

    public function remove_socials($index)
    {
        $this->removeModel('socials',  SocialActivity::class , $index, []);
    }

    public function remove_staff_languages($index)
    {
        $this->removeModel('staff_languages',  StaffLanguage::class , $index, []);
    }
    public function remove_staff_rewards($index)
    {
        $this->removeModel('staff_rewards',  Reward::class , $index, []);
    }

    public function remove_punishments($index)
    {
        $this->removeModel('punishments',  Punishment::class , $index, []);
    }

    public function submit_staff()
    {
        $_status = $this->staff_status_id;
        if ($_status == 3 || $_status == 4) {
            return $this->commentStaff();
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
            'name' => $this->name == '' ? null : $this->name,
            'nick_name' => $this->nick_name == '' ? null : $this->nick_name,
            'other_name' => $this->other_name == '' ? null : $this->other_name,
            'staff_no' => $this->staff_no == '' ? null : $this->staff_no,
            'attendid' => $this->attendid == '' ? null : $this->attendid,
            'gpms_staff_no' => $this->gpms_staff_no == '' ? null : $this->gpms_staff_no,
            'spouse_name' => $this->spouse_name == '' ? null : $this->spouse_name,
            'dob' => $this->dob == '' ? null : $this->dob,
            'gender_id' => $this->gender_id == '' ? null : $this->gender_id,
            'ethnic_id' => $this->ethnic_id == '' ? null : $this->ethnic_id,
            'religion_id' => $this->religion_id == '' ? null : $this->religion_id,
            'height_feet' => $this->height_feet == '' ? null : $this->height_feet,
            'height_inch' => $this->height_inch == '' ? null : $this->height_inch,
            'hair_color' => $this->hair_color == '' ? null : $this->hair_color,
            'eye_color' => $this->eye_color == '' ? null : $this->eye_color,
            'prominent_mark' => $this->prominent_mark == '' ? null : $this->prominent_mark,
            'skin_color' => $this->skin_color == '' ? null : $this->skin_color,
            'weight' => $this->weight == '' ? null : $this->weight,
            'blood_type_id' => $this->blood_type_id == '' ? null : $this->blood_type_id,
            'military_service_id' => $this->military_service_id == '' ? null : $this->military_service_id,
            'marital_status_id' => $this->marital_status_id == '' ? null : $this->marital_status_id,
            'place_of_birth' => $this->place_of_birth == '' ? null : $this->place_of_birth,
            'nrc_region_id_id' => $this->nrc_region_id == '' ? null : $this->nrc_region_id,
            'nrc_township_code_id' => $this->nrc_township_code_id == '' ? null : $this->nrc_township_code_id,
            'nrc_sign_id' => $this->nrc_sign_id == '' ? null : $this->nrc_sign_id,
            'nrc_code' => $this->nrc_code == '' ? null : $this->nrc_code,
            'nrc_front' => $staff?->nrc_front ?: ($this->nrc_front ? $_nrc_front : null),
            'nrc_back' => $staff?->nrc_back ?: ($this->nrc_back ? $_nrc_back : null),
            'phone' => $this->phone == '' ? null : $this->phone,
            'mobile' => $this->mobile == '' ? null : $this->mobile,
            'email' => $this->email == '' ? null : $this->email,
            'current_address_street' => $this->current_address_street == '' ? null : $this->current_address_street,
            'current_address_ward' => $this->current_address_ward == '' ? null : $this->current_address_ward,
            'current_address_house_no' => $this->current_address_house_no == '' ? null : $this->current_address_house_no,
            'current_address_region_id' => $this->current_address_region_id == '' ? null : $this->current_address_region_id,
            'current_address_township_or_town_id' => $this->current_address_township_or_town_id == '' ? null : $this->current_address_township_or_town_id,
            'permanent_address_street' => $this->permanent_address_street == '' ? null : $this->permanent_address_street,
            'permanent_address_ward' => $this->permanent_address_ward == '' ? null : $this->permanent_address_ward,
            'permanent_address_house_no' => $this->permanent_address_house_no == '' ? null : $this->permanent_address_house_no,
            'permanent_address_region_id' => $this->permanent_address_region_id == '' ? null : $this->permanent_address_region_id,
            'permanent_address_township_or_town_id' => $this->permanent_address_township_or_town_id == '' ? null : $this->permanent_address_township_or_town_id,
            'previous_addresses' => $this->previous_addresses == '' ? null : $this->previous_addresses,
            'military_solider_no' => $this->military_solider_no == '' ? null : $this->military_solider_no,
            'military_join_date' => $this->military_join_date == '' ? null : $this->military_join_date,
            'military_dsa_no' => $this->military_dsa_no == '' ? null : $this->military_dsa_no,
            'military_gazetted_date' => $this->military_gazetted_date == '' ? null : $this->military_gazetted_date,
            'military_leave_date' => $this->military_leave_date == '' ? null : $this->military_leave_date,
            'military_leave_reason' => $this->military_leave_reason == '' ? null : $this->military_leave_reason,
            'military_served_army' => $this->military_served_army == '' ? null : $this->military_served_army,
            'military_brief_history_or_penalty' => $this->military_brief_history_or_penalty == '' ? null : $this->military_brief_history_or_penalty,
            'military_pension' => $this->military_pension == '' ? null : $this->military_pension,
            'military_gazetted_no' => $this->military_gazetted_no == '' ? null : $this->military_gazetted_no,
            'veteran_no' => $this->veteran_no == '' ? null : $this->veteran_no,
            'veteran_date' => $this->veteran_date == '' ? null : $this->veteran_date,
            'last_serve_army' => $this->last_serve_army == '' ? null : $this->last_serve_army,
            'health_condition' => $this->health_condition == '' ? null : $this->health_condition,
            'tax_exception' => $this->tax_exception == '' ? null : $this->tax_exception,
            'life_insurance_proposal' => $this->life_insurance_proposal == '' ? null : $this->life_insurance_proposal,
            'life_insurance_policy_no' => $this->life_insurance_policy_no == '' ? null : $this->life_insurance_policy_no,
            'life_insurance_premium' => $this->life_insurance_premium == '' ? null : $this->life_insurance_premium,
        ];

        $job_info = [
            'is_parents_citizen_when_staff_born' => $this->is_parents_citizen_when_staff_born == '' ? null : $this->is_parents_citizen_when_staff_born,
            'current_rank_id' => $this->current_rank_id == '' ? null : $this->current_rank_id,
            'current_rank_date' => $this->current_rank_date == '' ? null : $this->current_rank_date,
            'current_department_id' => $this->current_department_id == '' ? null : $this->current_department_id,
            'transfer_division_id' => $this->transfer_division_id == '' ? null : $this->transfer_division_id,
            'transfer_remark' => $this->transfer_remark == '' ? null : $this->transfer_remark,
            'government_staff_started_date' => $this->government_staff_started_date == '' ? null : $this->government_staff_started_date,
            'current_division_id' => $this->current_division_id ?? Auth::user()->division_id,
            'side_ministry_id' => $this->side_ministry_id == '' ? null : $this->side_ministry_id,
            'side_department_id' => $this->side_department_id == '' ? null : $this->side_department_id,
            'side_division_id' => $this->side_division_id == '' ? null : $this->side_division_id,
            'salary_paid_by' => $this->salary_paid_by == '' ? null : $this->salary_paid_by,
            'join_date' => $this->join_date == '' ? null : $this->join_date,
            'is_newly_appointed' => $this->is_newly_appointed == '' ? null : $this->is_newly_appointed,
            'is_direct_appointed' => $this->is_direct_appointed == '' ? null : $this->is_direct_appointed,
            'payscale_id' => $this->payscale_id == '' ? null : $this->payscale_id,
            'current_salary' => $this->current_salary == '' ? null : $this->current_salary,
            'current_increment_time' => $this->current_increment_time == '' ? null : $this->current_increment_time,
            'last_increment_date' =>$this->last_increment_date == '' ? null : $this->last_increment_date,
        ];

        $relative = [
            'father_name' => $this->father_name == '' ? null : $this->father_name,
            'father_ethnic_id' => $this->father_ethnic_id == '' ? null : $this->father_ethnic_id,
            'father_religion_id' => $this->father_religion_id == '' ? null : $this->father_religion_id,
            'father_place_of_birth' => $this->father_place_of_birth == '' ? null : $this->father_place_of_birth,
            'father_occupation' => $this->father_occupation == '' ? null : $this->father_occupation,
            'father_address_house_no' => $this->father_address_house_no == '' ? null : $this->father_address_house_no,
            'father_address_street' => $this->father_address_street == '' ? null : $this->father_address_street,
            'father_address_ward' => $this->father_address_ward == '' ? null : $this->father_address_ward,
            'father_address_township_or_town_id' => $this->father_address_township_or_town_id == '' ? null : $this->father_address_township_or_town_id,
            'father_address_region_id' => $this->father_address_region_id == '' ? null : $this->father_address_region_id,
            'mother_name' => $this->mother_name == '' ? null : $this->mother_name,
            'mother_ethnic_id' => $this->mother_ethnic_id == '' ? null : $this->mother_ethnic_id,
            'mother_religion_id' => $this->mother_religion_id == '' ? null : $this->mother_religion_id,
            'mother_place_of_birth' => $this->mother_place_of_birth == '' ? null : $this->mother_place_of_birth,
            'mother_occupation' => $this->mother_occupation == '' ? null : $this->mother_occupation,
            'mother_address_house_no' => $this->mother_address_house_no == '' ? null : $this->mother_address_house_no,
            'mother_address_street' => $this->mother_address_street == '' ? null : $this->mother_address_street,
            'mother_address_ward' => $this->mother_address_ward == '' ? null : $this->mother_address_ward,
            'mother_address_township_or_town_id' => $this->mother_address_township_or_town_id == '' ? null : $this->mother_address_township_or_town_id,
            'mother_address_region_id' => $this->mother_address_region_id == '' ? null : $this->mother_address_region_id,
            'family_in_politics' => $this->family_in_politics == '' ? null : $this->family_in_politics,
            'family_in_politics_text' => $this->family_in_politics_text == '' ? null : $this->family_in_politics_text,

        ];

        $detail_personal_info = [
            'last_school_name' => $this->last_school_name == '' ? null : $this->last_school_name,
            'last_school_subject' => $this->last_school_subject == '' ? null : $this->last_school_subject,
            'last_school_row_no' => $this->last_school_row_no == '' ? null : $this->last_school_row_no,
            'last_school_major' => $this->last_school_major == '' ? null : $this->last_school_major,
            'student_life_political_social' => $this->student_life_political_social == '' ? null : $this->student_life_political_social,
            'habit' => $this->habit == '' ? null : $this->habit,
            'revolution' => $this->revolution == '' ? null : $this->revolution,
            'transfer_reason_salary' => $this->transfer_reason_salary == '' ? null : $this->transfer_reason_salary,
            'during_work_political_social' => $this->during_work_political_social == '' ? null : $this->during_work_political_social,
            'has_military_friend' => $this->has_military_friend == '' ? null : $this->has_military_friend,
            'has_military_friend_text' => $this->has_military_friend_text == '' ? null : $this->has_military_friend_text,
            'foreigner_friend_name' => $this->foreigner_friend_name == '' ? null : $this->foreigner_friend_name,
            'foreigner_friend_occupation' => $this->foreigner_friend_occupation == '' ? null : $this->foreigner_friend_occupation,
            'foreigner_friend_nationality_id' => $this->foreigner_friend_nationality_id == '' ? null : $this->foreigner_friend_nationality_id,
            'foreigner_friend_country_id' => $this->foreigner_friend_country_id == '' ? null : $this->foreigner_friend_country_id,
            'foreigner_friend_how_to_know' => $this->foreigner_friend_how_to_know == '' ? null : $this->foreigner_friend_how_to_know,
            'recommended_by_military_person' => $this->recommended_by_military_person == '' ? null : $this->recommended_by_military_person,
        ];

        $dataMapping = [
            'job_info' => $job_info,
            'relative' => $relative,
            'detail_personal_info' => $detail_personal_info,
            'default' => $personal_info,
        ];

        $staff_create = $dataMapping[$this->tab] ?? $dataMapping['default'];
        if (Auth::user()->role_id != 2) {
            $staff_create['current_division_id'] = Auth::user()->division_id;
        }
        if ($_status != null) {
            if ($_status == 5) {
                $staff_create['comment'] = null;
                $staff_create['request_attach'] = null;
                if ($staff?->request_attach) {
                    Storage::disk('upload')->delete($staff->request_attach);
                }
            }
            $staff_create['status_id'] = $_status;
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
                $this->saveStaffRewards($staff->id);
                $this->saveSchools($staff->id);
                $this->saveAwards($staff->id);
                $this->saveTrainings($staff->id);
                $this->savePunishments($staff->id);
                break;
        }

        $this->reset(['photo', 'nrc_front', 'nrc_back']);
        $this->initializeArrays($this->staff_id);

        $this->loadStaffData($staff->id);
        $this->message = 'Saved Successfully';
        if ($_status != null) {
            if ($_status == 5 || $_status == 3 || $_status == 4 || ($_status == 2 && Auth::user()->role_id != 2)) {
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
    }

    public function commentStaff($rq = false)
    {
        if ($rq == true) {
            $this->staff_status_id = 5;
        }
        $this->displayAlertBox = true;
    }

    public function submitCondition($status = null)
    {
        if (!$this->staff_id) {
            return;
        }

        $staff = Staff::find($this->staff_id);

        $newAttachment = $this->request_attach
            ? Storage::disk('upload')->put('staffs', $this->request_attach)
            : $staff?->request_attach;

        if ($newAttachment && $staff?->request_attach) {
            Storage::disk('upload')->delete($staff->request_attach);
        }

        $staff?->update([
            'status_id' => $status,
            'comment' => $this->comment,
            'request_attach' => $newAttachment,
        ]);

        $this->message = match ($status) {
            3 => 'Staff has been rejected.',
            5 => 'Staff has been requested.',
            default => 'Staff has been sent back.',
        };

        $this->reset('request_attach');
        $this->displayAlertBox = false;
    }

    private function saveAbroads($staffId)
    {
        $_validation = $this->validate_abroads();
        $this->validate($_validation['validate'], $_validation['messages']);
        foreach ($this->abroads as $abroad) {
            $ab = Abroad::updateOrCreate([
                'id' => $abroad['id'],
            ],[
                'staff_id' => $staffId,
                'particular' => $abroad['particular'],
                'training_success_fail' => $abroad['training_success_fail'],
                'training_success_count' => $abroad['training_success_count'],
                'sponser' => $abroad['sponser'],
                'meet_with' => $abroad['meet_with'],
                'from_date' => $abroad['from_date'] == '' ? null : $abroad['from_date'],
                'to_date' => $abroad['to_date'] == '' ? null : $abroad['to_date'],
                'actual_abroad_date' => '2024-12-09',
                'position' => $abroad['position'],
            ]);
            $ab->countries()->attach($abroad['country']);
        }
    }

    public function validate_abroads()
    {
        $validations = [
            'abroads.*.country' => 'required',
            'abroads.*.particular' => 'required',
            'abroads.*.from_date' => 'required',
            'abroads.*.to_date' => 'required',
        ];

        $validation_messages = [
            'abroads.*.country.required' => 'Field is required.',
            'abroads.*.particular.required' => 'Field is required.',
            'abroads.*.from_date.required' => 'Field is required.',
            'abroads.*.to_date.required' => 'Field is required.',
        ];

        return [
            'validate' => $validations,
            'messages' => $validation_messages,
        ];
    }

    private function saveSocials($staffId)
    {
        $_validation = $this->validate_socials();
        $this->validate($_validation['validate'], $_validation['messages']);
        foreach ($this->socials as $social) {
            SocialActivity::updateOrCreate([
                'id' => $social['id'],
            ],[
                'staff_id' => $staffId,
                'particular' => $social['particular'],
                'remark' => $social['remark'],
            ]);
        }
    }

    public function validate_socials()
    {
        $validations = [
            'socials.*.particular' => 'required',
        ];

        $validation_messages = [
            'socials.*.particular.required' => 'Field is required.',
        ];

        return [
            'validate' => $validations,
            'messages' => $validation_messages,
        ];
    }

    private function saveStaffLanguages($staffId)
    {
        $_validation = $this->validate_staff_languages();
        $this->validate($_validation['validate'], $_validation['messages']);
        foreach ($this->staff_languages as $lang) {
            StaffLanguage::updateOrCreate([
                'id' => $lang['id'],
            ],[
                'staff_id' => $staffId,
                'language_id' => $lang['language'] == '' ? null : $lang['language'],
                'rank' => $lang['rank'],
                'writing' => $lang['writing'],
                'reading' => $lang['reading'],
                'speaking' => $lang['speaking'],
                'remark' => $lang['remark'],
            ]);
        }
    }

    public function validate_staff_languages()
    {
        $validations = [
            'staff_languages.*.language' => 'required',
        ];

        $validation_messages = [
            'staff_languages.*.language.required' => 'Field is required.',
        ];

        return [
            'validate' => $validations,
            'messages' => $validation_messages,
        ];
    }

    private function saveStaffRewards($staffId)
    {
        $_validation = $this->validate_rewards();
        $this->validate($_validation['validate'], $_validation['messages']);

        foreach ($this->staff_rewards as $reward) {
            Reward::updateOrCreate([
                'id' => $reward['id'],
            ],[
                'staff_id' => $staffId,
                'name' => $reward['name'],
                'type' => $reward['type'] == '' ? null : $reward['type'],
                'year' => $reward['year'],
                'remark' => $reward['remark'],
            ]);
        }
    }

    public function validate_rewards()
    {
        $validations = [
            'staff_rewards.*.name' => 'required',
            'staff_rewards.*.type' => 'required',
            'staff_rewards.*.year' => 'required',

        ];

        $validation_messages = [
            'staff_rewards.*.name.required' => 'Field is required.',
            'staff_rewards.*.type.required' => 'Field is required.',
            'staff_rewards.*.year.required' => 'Field is required.',
        ];

        return [
            'validate' => $validations,
            'messages' => $validation_messages,
        ];
    }

    private function saveSchools($staffId)
    {
        $_validation = $this->validate_schools();
        $this->validate($_validation['validate'], $_validation['messages']);
        foreach ($this->schools  as $school) {
            School::updateOrCreate([
              'id' => $school['id'],
            ],[
                'staff_id' => $staffId,
                'education_group_id' => $school['education_group'] == '' ? null : $school['education_group'],
                'education_type_id' => $school['education_type'] == '' ? null : $school['education_type'],
                'education' => $school['education'] == '' ? null : $school['education'],
                'school_name' => $school['school_name'],
                'town' => $school['town'],
                'from_date' => $school['from_date'] == '' ? null : $school['from_date'],
                'to_date' => $school['to_date'] == '' ? null : $school['to_date'],
                'remark' => $school['remark'],
            ]);
        }
    }

    public function validate_schools()
    {
        $validations = [
            'schools.*.education_group' => 'required',
            'schools.*.education_type' => 'required',
            'schools.*.school_name' => 'required',
            'schools.*.from_date' => 'required',
            'schools.*.to_date' => 'required',
        ];

        $validation_messages = [
            'schools.*.education_group.required' => 'This field is required.',
            'schools.*.education_type.required' => 'This field is required.',
            'schools.*.school_name.required' => 'This field is required.',
            'schools.*.from_date.required' => 'This field is required.',
            'schools.*.to_date.required' => 'This field is required.',
        ];

        return [
            'validate' => $validations,
            'messages' => $validation_messages,
        ];
    }

    private function saveAwards($staffId)
    {
        $_validation = $this->validate_awards();
        $this->validate($_validation['validate'], $_validation['messages']);
        foreach ($this->awards as $award) {
            Awarding::updateOrCreate([
                'id' => $award['id'],
            ],[
                'staff_id' => $staffId,
                'award_type_id' => $award['award_type'] == '' ? null : $award['award_type'],
                'award_id' => $award['award'] == '' ? null : $award['award'],
                'order_no' => $award['order_no'],
                'remark' => $award['remark'] ?: null,
            ]);
        }
    }

    public function validate_awards()
    {
        $validations = [
            'awards.*.award_type' => 'required',
            'awards.*.award' => 'required',
        ];

        $validation_messages = [
            'awards.*.award_type.required' => 'This field is required.',
            'awards.*.award.required' => 'This field is required.',
        ];

        return [
            'validate' => $validations,
            'messages' => $validation_messages,
        ];
    }

    // validation done
    private function saveTrainings($staffId)
    {
        $_validation = $this->validate_trainings();
        $this->validate($_validation['validate'], $_validation['messages']);
        foreach ($this->trainings as $training) {
            Training::updateOrCreate([
                'id' => $training['id'],
            ],[
                'staff_id' => $staffId,
                'training_type_id' => $training['training_type'] == '' ? null : $training['training_type'],
                'diploma_name' => $training['diploma_name'],
                'batch' => $training['batch'],
                'from_date' => $training['from_date'] == '' ? null : $training['from_date'],
                'to_date' => $training['to_date'] == '' ? null : $training['to_date'],
                'location' => $training['location'],
                'country_id' => $training['country'] == '' ? null : $training['country'],
                'training_location_id' => $training['training_location'] == '' ? null : $training['training_location'],
                'remark' => $training['remark'],
            ]);
        }
    }

    public function validate_trainings(){
        $validations = [
            'trainings.*.training_type' => 'required',
            'trainings.*.from_date' => 'required',
            'trainings.*.to_date' => 'required',
        ];

        $validation_messages = [
            'trainings.*.training_type.required' => 'This Field is required.',
            'trainings.*.from_date.required' => 'This Field is required.',
            'trainings.*.to_date.required' => 'This Field is required.',
        ];

        return [
            'validate' => $validations,
            'messages' => $validation_messages,
        ];
    }

    private function savePunishments($staffId)
    {
        $_validation = $this->validate_punishments();
        $this->validate($_validation['validate'], $_validation['messages']);
        foreach ($this->punishments as $punishment) {
            Punishment::updateOrCreate([
                'id' => $punishment['id'],
            ],[
                'staff_id' => $staffId,
                'penalty_type_id' => $punishment['penalty_type'] == '' ? null : $punishment['penalty_type'],
                'reason' => $punishment['reason'],
                'from_date' => $punishment['from_date'] == '' ? null : $punishment['from_date'],
                'to_date' => $punishment['to_date'] == '' ? null : $punishment['to_date'],
            ]);
        }
    }

    public function validate_punishments(){
        $validations = [
            'punishments.*.penalty_type' => 'required',
            'punishments.*.from_date' => 'required',
            'punishments.*.to_date' => 'required',
        ];

        $validation_messages = [
            'punishments.*.penalty_type.required' => 'This Field is required.',
            'punishments.*.from_date.required' => 'This Field is required.',
            'punishments.*.to_date.required' => 'This Field is required.',
        ];

        return [
            'validate' => $validations,
            'messages' => $validation_messages,
        ];
    }

    private function saveEducations($staffId)
    {
        $_validation = $this->validate_educations();
        $this->validate($_validation['validate'], $_validation['messages']);
        $degree_path = null;

        foreach ($this->educations as $education) {
            (str_starts_with($education['degree_certificate'], 'staffs/') && $education['degree_certificate'])
            ? $degree_path = $education['degree_certificate']
            : $degree_path = Storage::disk('upload')->put('staffs', $education['degree_certificate']);

            StaffEducation::updateOrCreate([
                'id' => $education['id'],
            ], [
                // 'education_group_id' => $education['education_group'] == '' ? null : $education['education_group'],
                // 'education_type_id' => $education['education_type'] == '' ? null : $education['education_type'],
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
        $_validation = $this->validate_recommendations();
        $this->validate($_validation['validate'], $_validation['messages']);
        foreach ($this->recommendations as $recommendation) {
            Recommendation::updateOrCreate([
                'id' => $recommendation['id'],
            ],[
                'recommend_by' => $recommendation['recommend_by'],
                'staff_id' => $staffId,
            ]);
        }
    }

    public function validate_recommendations()
    {
        $validations = [
            'recommendations.*.recommend_by' => 'required',
        ];

        $validation_messages = [
            'recommendations.*.recommend_by.required' => 'Field is required.',
        ];

        return [
            'validate' => $validations,
            'messages' => $validation_messages,
        ];
    }

    private function savePostings($staffId)
    {
        $_validation = $this->validate_postings();
        $this->validate($_validation['validate'], $_validation['messages']);
        foreach ($this->postings as $posting) {
            Posting::updateOrCreate([
                'id' => $posting['id'],
            ],[
                'staff_id' => $staffId,
                'rank_id' => $posting['rank'] == '' ? null : $posting['rank'],
                'from_date' => $posting['from_date'] == '' ? null : $posting['from_date'],
                'to_date' => $posting['to_date'] == '' ? null : $posting['to_date'],
                'department_id' => $posting['department'] != '' ? $posting['department'] : null,
                'sub_department' => $posting['sub_department'] == '' ? null : $posting['sub_department'],
                'location' => $posting['location'],
                'remark' => $posting['remark'],
                'ministry_id' => $posting['ministry'] == '' ? null : $posting['ministry'],
            ]);
        }
    }

    public function validate_postings()
    {
        $validations = [
            'postings.*.rank' => 'required',
            'postings.*.from_date' => 'required',
            'postings.*.ministry' => 'required',
        ];

        $validation_messages = [
            'postings.*.rank.required' => 'Field is required.',
            'postings.*.from_date.required' => 'Field is required.',
            'postings.*.ministry.required' => 'Field is required.',
        ];

        return [
            'validate' => $validations,
            'messages' => $validation_messages,
        ];
    }

    private function relativeFields($staffId, $relative)
    {
        $fields = [
            'staff_id' => $staffId,
            'name' => $relative['name'],
            'ethnic_id' => $relative['ethnic'] == '' ? null : $relative['ethnic'],
            'religion_id' => $relative['religion'] == '' ? null : $relative['religion'] ,
            'place_of_birth' => $relative['place_of_birth'] == '' ? null : $relative['place_of_birth'] ,
            'gender_id' => $relative['gender_id'] == '' ? null : $relative['gender_id'] ,
            'occupation' => $relative['occupation'],
            'address' => $relative['address'],
            'relation_id' => $relative['relation'] == '' ? null : $relative['relation'] ,
        ];

        return $fields;
    }

    private function saveRelatives($staffId)
    {
        foreach ($this->siblings as $relative) {
            $_validation = $this->validate_relatives('siblings');
            $this->validate($_validation['validate'], $_validation['messages']);
            Sibling::updateOrCreate([
                'id' => $relative['id'] == '' ? null : $relative['id'],
            ],
            $this->relativeFields($staffId, $relative));
        }

        foreach ($this->father_siblings as $relative) {
            $_validation = $this->validate_relatives('father_siblings');
            $this->validate($_validation['validate'], $_validation['messages']);
            FatherSibling::updateOrCreate([
                'id' => $relative['id'] == '' ? null : $relative['id'],
            ],
            $this->relativeFields($staffId, $relative));
        }

        foreach ($this->mother_siblings as $relative) {
            $_validation = $this->validate_relatives('mother_siblings');
            $this->validate($_validation['validate'], $_validation['messages']);
            MotherSibling::updateOrCreate([
                'id' => $relative['id'] == '' ? null : $relative['id'],
            ],
            $this->relativeFields($staffId, $relative));
        }

        foreach ($this->spouses as $relative) {
            $_validation = $this->validate_relatives('spouses');
            $this->validate($_validation['validate'], $_validation['messages']);
            Spouse::updateOrCreate([
                'id' => $relative['id'] == '' ? null : $relative['id'],
            ],
            $this->relativeFields($staffId, $relative));
        }

        foreach ($this->children as $relative) {
            $_validation = $this->validate_relatives('children');
            $this->validate($_validation['validate'], $_validation['messages']);
            Children::updateOrCreate([
                'id' => $relative['id'] == '' ? null : $relative['id'],
            ],
            $this->relativeFields($staffId, $relative));
        }

        foreach ($this->spouse_siblings as $relative) {
            $_validation = $this->validate_relatives('spouse_siblings');
            $this->validate($_validation['validate'], $_validation['messages']);
            SpouseSibling::updateOrCreate([
                'id' => $relative['id'] == '' ? null : $relative['id'],
            ],
            $this->relativeFields($staffId, $relative));
        }

        foreach ($this->spouse_father_siblings as $relative) {
            $_validation = $this->validate_relatives('spouse_father_siblings');
            $this->validate($_validation['validate'], $_validation['messages']);
            SpouseFatherSibling::updateOrCreate([
                'id' => $relative['id'] == '' ? null : $relative['id'],
            ],
            $this->relativeFields($staffId, $relative));
        }

        foreach ($this->spouse_mother_siblings as $relative) {
            $_validation = $this->validate_relatives('spouse_mother_siblings');
            $this->validate($_validation['validate'], $_validation['messages']);
            SpouseMotherSibling::updateOrCreate([
                'id' => $relative['id'] == '' ? null : $relative['id'],
            ],
            $this->relativeFields($staffId, $relative));
        }
    }

    public function validate_relatives($relative)
    {
        $validations = [
            "{$relative}.*.name" => 'required',
            "{$relative}.*.ethnic" => 'required',
            "{$relative}.*.religion" => 'required',
            "{$relative}.*.place_of_birth" => 'required',
            "{$relative}.*.gender_id" => 'required',
            "{$relative}.*.address" => 'required',
            "{$relative}.*.relation" => 'required',
        ];

        $validation_messages = [
            "{$relative}.*.name.required" => 'Field is required',
            "{$relative}.*.ethnic.required" => 'Field is required',
            "{$relative}.*.religion.required" => 'Field is required',
            "{$relative}.*.place_of_birth.required" => 'Field is required',
            "{$relative}.*.gender_id.required" => 'Field is required',
            "{$relative}.*.address.required" => 'Field is required',
            "{$relative}.*.relation.required" => 'Field is required',
        ];

        return [
            'validate' => $validations,
            'messages' => $validation_messages,
        ];
    }

    public function updatedCurrentAddressRegionId($value)
    {
        $this->current_address_townships = Township::where('region_id', $value)->get();
    }

    public function updatedPermanentAddressRegionId($value)
    {
        $this->permanent_address_townships = Township::where('region_id', $value)->get();
    }

    public function updatedFatherAddressRegionId($value)
    {
        $this->father_townships = Township::where('region_id', $value)->get();
    }

    public function updatedMotherAddressRegionId($value)
    {
        $this->mother_townships = Township::where('region_id', $value)->get();
    }

    public function setStaffStatus($status)
    {
        $this->staff_status_id = $status;
    }


    public function handleCustomColumnUpdate($array, $index, $field, $arr_ini, $value, $model, $model_related)
    {

    // 'educations', 0, 'education_type', 'eduTypes', $event.target.value, 'education_type', 'education_groups'

        $this->$array[$index][$model] = '';

        if ($model_related) {
            $this->$array[$index][$model_related] = '';
        }

        match ($arr_ini) {
            // 'eduTypes' => $this->$array[$index][$field] = EducationType::where('education_group_id', $value)->get(),
            'eduTypesAndGroups' => $this->handleEduTypesAndGroups($array, $index, $field, $value),
            'edus' => $this->$array[$index][$field] = Education::where('education_type_id', $value)->get(),
            'departments' => $this->$array[$index][$field] = Department::where('ministry_id', $value)->get(),
            default => [],
        };
    }

    private function handleEduTypesAndGroups($array, $index, $field, $value)
{
        $this->$array[$index][$field] = EducationType::whereHas('education', function ($query) use ($value) {
        $query->where('id', $value);
    })->first()->id;
    $this->$array[$index]['education_group'] =
    EducationGroup::whereHas('education', function ($query) use ($value) {
        $query->where('id', $value);
    })->first()->id ;
}




    public function updatedNrcRegionId($value){
        $this->nrc_township_codes = NrcTownshipCode::where('nrc_region_id_id', $value)->get();
    }

    public function updatedSideMinistryId($value){
        $this->side_departments = Department::where('ministry_id', $value)->get();
    }

    public function render()
    {
        if ($this->tab == 'relative') {
            $this->relatives = [
                'siblings' => ['label' => 'ညီကိုမောင်နှမ', 'data' => $this->siblings],
                'father_siblings' => ['label' => 'အဘ၏ ညီအစ်ကို မောင်နှမများ', 'data' => $this->father_siblings],
                'mother_siblings' => ['label' => 'အမိ၏ ညီအစ်ကို မောင်နှမများ', 'data' => $this->mother_siblings],
                'spouses' => ['label' => 'ခင်ပွန်း/ဇနီးသည်', 'data' => $this->spouses],
                'children' => ['label' => 'သားသမီးများ', 'data' => $this->children],
                'spouse_siblings' => ['label' => 'ခင်ပွန်း/ဇနီးသည်၏ ညီအစ်ကို မောင်နှမများ', 'data' => $this->spouse_siblings],
                'spouse_father_siblings' => ['label' => 'ခင်ပွန်း/ဇနီးသည် အဘနှင့် ညီအစ်ကို မောင်နှမများ', 'data' => $this->spouse_father_siblings],
                'spouse_mother_siblings' => ['label' => 'ခင်ပွန်း/ဇနီးသည် အမိနှင့် ညီအစ်ကို မောင်နှမများ', 'data' => $this->spouse_mother_siblings],
            ];
        }
        return view('livewire.staff-detail');
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
    }

    public function add_master($type){

        $this->add_model = $type;
        $this->submit_form = "save_{$type}";
    }


    public function getEdu($id){
        return Education::where('id',$id)->get();

    }
    public function save_edu_group(){
        EducationGroup::create([
            'name' => $this->education_group_name,
        ]);
        $this->reset('education_group_name');
        $this->render();
        $this->message = 'Education Group Created Successfully.';
        $this->add_model = null;
    }

    public function save_edu_type(){
        EducationType::create([
            'name' => $this->education_type_name,
            'education_group_id' => $this->education_group_name
        ]);
        $this->reset(['education_type_name', 'education_group_name']);

        foreach ($this->educations as $index => $edu) {
            $this->educations[$index]['education_group'] = '';
            $this->educations[$index]['education_type'] = '';
            $this->educations[$index]['education'] = '';
            $this->educations[$index]['education_types'] = [];
            $this->educations[$index]['_educations'] = [];
        }

        $this->message = 'Education Type Created successfully.';
        $this->add_model = null;
    }

    public function save_edu(){
        Education::create([
            'name' => $this->education_name,
            'education_type_id' => $this->education_type_name
        ]);

        foreach ($this->educations as $index => $edu) {
            $this->educations[$index]['education_type'] = '';
            $this->educations[$index]['education'] = '';
            $this->educations[$index]['_educations'] = [];
        }

        $this->reset(['education_name', 'education_type_name']);
        $this->message = 'Education Created successfully.';
        $this->add_model = null;
    }

    public function close_master_modal(){
        $this->add_model = null;
    }

    public $results;
    public $selectedValue;
    public $search ;
    public function updatedSearch($value)
    {
        if (strlen($value) >= 3) {
            $this->results = Education::where('name', 'like', '%' . $value . '%')
                                      ->limit(10) // Limit results for performance
                                      ->get();
        } else {
            $this->results = [];
        }
    }
      public function selectValue($value)
    {
        $this->selectedValue = $value;
        $this->search = ''; // Clear search input after selection
        $this->results = []; // Clear results
    }
    #[Reactive]
    public string $searchQuery = '';

    public array $searchResults = [];

    #[On('searchInputUpdated')]
    public function searchOptions($query, $field)
    {
        $this->searchResults = Education::where('name', 'like', "%$query%")->get()->toArray();
        if ($this->searchResults) {
            logger('Dispatching searchResultsUpdated', ['field' => $field, 'results' => $this->searchResults]); // Debug log
            $this->dispatch('searchResultsUpdated', field: $field, results: $this->searchResults);
        }
    }




}
