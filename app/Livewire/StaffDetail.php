<?php

namespace App\Livewire;

use App\Livewire\StaffDetail\Siblings;
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
use App\Models\AbroadsTypes;

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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

use function Illuminate\Log\log;
use function Livewire\Volt\rules;

use App\Livewire\Validations\RecommendationValidation;
use App\Livewire\Validations\PostingsValidation;

use App\Livewire\StaffDetail\Postings as ChPostings;
use App\Livewire\StaffDetail\Abroads as ChAbroads;

use App\Livewire\StaffDetail\Schools as ChSchools;
use App\Livewire\StaffDetail\Trainings as ChTrainings;
use App\Livewire\StaffDetail\Awards as ChAwards;
use App\Livewire\StaffDetail\Punishments as ChPunishments;
use App\Livewire\StaffDetail\Socials as ChSocials;
use App\Livewire\StaffDetail\StaffLanguages as ChLanguages;
use App\Livewire\StaffDetail\StaffRewards as ChStaffRewards;
use App\Livewire\StaffDetail\Educations as ChEducations;

use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class StaffDetail extends Component


{
    use WithFileUploads;
    public $educations_all;
    public $saveDraftCheck;
    public $add_model, $submit_button_text;


    public $has_military_friend_text;
    public $comment, $displayAlertBox;

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
    public $abroads_types;


    //education_master
    public $education_group_name, $education_type_name, $education_name;

    public $leave_modal_open  = false;

    public $modal_title;

    public $confirm_delete = false;

    public $educations = [];
    //job_info

    // $table->date('last_increment_date')->nullable();
    public $current_rank_id, $current_rank_date, $current_division_join_date, $current_department_id, $current_division_id, $current_section_id, $side_ministry_id = null, $side_department_id = null, $side_division_id = null, $salary_paid_by, $join_date, $is_direct_appointed = false, $payscale_id, $current_salary, $current_increment_time, $last_increment_date, $is_parents_citizen_when_staff_born = false;
    public $recommendations = [];
    public $recommend_by;
    public $update_index;

    public $postings = [];
    public $side_departments = [];

    //relative
    public $father_townships = [];
    public $mother_townships = [];
    public $father_name, $father_ethnic_id, $father_religion_id, $father_place_of_birth, $father_occupation, $father_address_street, $father_address_house_no, $father_address_ward, $father_address_township_or_town_id, $father_address_region_id, $transfer_remark, $transfer_division_id, $is_newly_appointed = false,
        $mother_name, $mother_ethnic_id, $mother_religion_id, $mother_place_of_birth, $mother_occupation, $mother_address_street, $mother_address_house_no, $mother_address_ward, $mother_address_township_or_town_id, $mother_address_region_id,
        $family_in_politics = false, $family_in_politics_text;

    public $siblings = [];
    public $father_siblings = [];
    public $mother_siblings = [];
    public $spouses = [];
    public $children = [];
    public $spouse_siblings = [];
    public $spouse_father_siblings = [];
    public $spouse_mother_siblings = [];

    //detail_personal_info
    public $last_school_name, $last_school_subject, $last_school_row_no, $last_school_major, $student_life_political_social, $habit, $past_occupation, $revolution, $transfer_reason_salary, $during_work_political_social, $has_military_friend = false, $foreigner_friend_name, $foreigner_friend_occupation, $foreigner_friend_nationality_id, $foreigner_friend_country_id, $foreigner_friend_how_to_know, $recommended_by_military_person;
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
        $award_id,
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
        $degree_certificate,
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
        'current_section_id' => '',
        'side_ministry_id' => '',
        'side_department_id' => '',
        'side_division_id' => '',
        'salary_paid_by' => '',
        'join_date' => 'required|date',
        // 'current_division_join_date' =>'date',
        'is_newly_appointed' => 'required',
        'is_direct_appointed' => '',
        'payscale_id' => 'required',
        'current_salary' => 'required|integer',
        'current_increment_time' => 'integer',
        'last_increment_date' => '',
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
        'past_occupation' => 'nullable|string',
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
        'past_occupation.max' => 'past occupation may not exceed 1000 characters.',
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
        $this->ethnics = Ethnic::get();
        $this->religions = Religion::get();
        $this->regions = Region::get();
        $this->genders = Gender::get();
        $this->leave_types = LeaveType::all();
        $this->withoutScopeRanks = Rank::withoutGlobalScopes()->get();
        $this->educations = [];
        $this->recommendations = [];
        $this->recommend_by;
        $this->update_index;

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
                // $this->ranks = $this->withoutScopeRanks;
                $this->ranks = Rank::all();

                $this->ministrys = Ministry::all();
                $this->departments = Department::all();
                $this->dica_departments = Department::where('id', 129)->get();

                $this->current_department_id = Department::where('id', 129)->first()->id;


                $this->divisions = Division::all();
                $this->payscales = Payscale::all();
                $this->sections = Section::all();
                break;

            case 'detail_personal_info':
                $this->education_groups = EducationGroup::all();
                $this->education_types = EducationType::all();
                $this->_educations = StaffEducation::all();
                $this->_countries = Country::all();
                $this->nationalities = Nationality::all();
                $this->countries = Country::all();
                $this->training_types = TrainingType::all();
                $this->training_locations = TrainingLocation::all();
                $this->award_types = AwardType::all();
                // $this->_awards = Award::all();
                $this->award_id = Award::all();
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



        $this->educations = [];
        $this->recommendations = [];
        $this->recommend_by;
        $this->update_index;
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

        switch ($this->tab) {
            case 'personal_info':

                // $staff_educations = StaffEducation::where('staff_id', $staff_id)->get();

                // foreach ($staff_educations as $edu) {
                //     $education = Education::find($edu->education_id);


                //     $this->educations[] = [
                //         'id' => $edu->id,
                //         'education_group' => $education->education_group_id,
                //         'education_type' => $education->education_type_id,
                //         'education' => $education->id,
                //         'country_id' => $edu->country_id,
                //         // 'education_types' => EducationType::where('education_group_id', $edu->education_group_id)->get(),
                //         // '_educations' => Education::where('education_type_id', $edu->education_type_id)->get(),
                //         'education_types' => EducationType::all(),
                //         '_educations' => Education::all(),
                //         'degree_certificate' => $edu->degree_certificate,
                //     ];
                // }

                break;

            case 'job_info':
                $recommendations  = Recommendation::where('staff_id', $staff_id)->get();
                $postings = Posting::where('staff_id', $staff_id)->get();

                // dd($postings);

                foreach ($recommendations as $rec) {
                    $this->recommendations[] = [
                        'id' => $rec->id,
                        'recommend_by' => $rec->recommend_by,
                    ];
                }



                $totalPostings = count($postings);
                $currentIndex = 0;

                foreach ($postings as $post) {
                    // dd( $post->rank);
                    $this->postings[] = [
                        'id' => $post->id,
                        'rank' => $post->rank->name,
                        'from_date' =>  Carbon::parse($post->from_date)->format('d/m/Y'),
                        'to_date' =>  Carbon::parse($post->to_date)->format('d/m/Y'),

                        'post' => $post->post_id,
                        'ministry' => $post->ministry->name,
                        'department' => $post->department?->name,
                        // 'departments' => Department::where('ministry_id', $post->ministry_id)->get(),
                        'sub_department' => $post->sub_department,

                        // 'to_date' => ++$currentIndex === $totalPostings ? null : $post->to_date,
                        'location' => $post->location,
                        'remark' => $post->remark,
                    ];
                }

                break;

            case 'relative':

                $siblings = Sibling::where('staff_id', $staff_id)->get();
                $father_siblings = FatherSibling::where('staff_id', $staff_id)->get();
                $mother_siblings = MotherSibling::where('staff_id', $staff_id)->get();
                $spouses = Spouse::where('staff_id', $staff_id)->get();
                $children = Children::where('staff_id', $staff_id)->get();
                $spouse_siblings = SpouseSibling::where('staff_id', $staff_id)->get();
                $spouse_father_siblings = SpouseFatherSibling::where('staff_id', $staff_id)->get();
                $spouse_mother_siblings = SpouseMotherSibling::where('staff_id', $staff_id)->get();


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




                break;


            case 'detail_personal_info':

                $this->abroads_types = AbroadsTypes::all();
                $schools = School::where('staff_id', $staff_id)->get();
                // $trainings = Training::where('staff_id', $staff_id)->get();
                $trainings = Training::with('training_type')
                    ->with('training_location')->with('country')
                    ->where('staff_id', $staff_id)->get();
                $awards = Awarding::with(['award_type', 'award'])
                    ->where('staff_id', $staff_id)->get();
                $abroads = Abroad::where('staff_id', $staff_id)->get();
                $punishments = Punishment::with('penalty_type')
                    ->where('staff_id', $staff_id)->get();
                $_educations = Education::with(['education_type', 'education_group'])

                    ->get();
                $educationTypes = EducationType::all();
                $socials = SocialActivity::where('staff_id', $staff_id)->get();
                $staff_languages = StaffLanguage::with('language')
                    ->where('staff_id', $staff_id)->get();
                $staff_rewards = Reward::where('staff_id', $staff_id)->get();

                $staff_educations = StaffEducation::with('country')->where('staff_id', $staff_id)->get();

                // dd($staff_educations);
                foreach ($staff_educations as $edu) {
                    $education = Education::find($edu->education_id);
                    $educationGroup = EducationGroup::find($education->education_group_id);
                    $educationType = EducationType::find($education->education_type_id);
                    $country = Country::find($edu->country_id);
                    $this->educations[] = [
                        'id' => $edu->id,
                        'education_group' => $educationGroup ? $educationGroup->name : null,
                        'education_type' => $educationType ? $educationType->name : null,
                        'education' => $education ? $education->name : null,
                        // 'country_id' => $edu->country_id->name,
                        'country_id' => $country ? $country->name : 'Unknown',
                        'education_types' => EducationType::all(),
                        '_educations' => Education::all(),
                        'degree_certificate' => $edu->degree_certificate,
                    ];
                }
                foreach ($schools as $sch) {
                    $this->schools[] = [
                        'id' => $sch->id,
                        'education_group' => optional($sch->education_group)->name ?? 'Unknown',
                        'education_type' => optional($sch->education_type)->name ?? '-',
                        'education' => $sch->education,
                        'school_name' => $sch->school_name,
                        'town' => $sch->town,
                        'from_date' => $sch->from_date,
                        'to_date' => $sch->to_date,
                        'remark' => $sch->remark,
                        'education_types' => $educationTypes,

                    ];
                }

                foreach ($trainings as $tra) {
                    $this->trainings[] = [
                        'id' => $tra->id,
                        'training_type' => $tra->training_type->name,
                        'batch' => $tra->batch,
                        'diploma_name' => $tra->diploma_name,
                        'from_date' => $tra->from_date,
                        'to_date' => $tra->to_date,
                        'location' => $tra->location,
                        'country' => $tra->country->name,
                        'training_location' => $tra->training_location->name,
                        'remark' => $tra->remark,
                    ];
                }
                // dd($awards);


                foreach ($awards as $awa) {
                    $this->awards[] = [
                        'id' => $awa->id,
                        'award_type' => $awa->award_type->name,
                        'award' => $awa->award->name,
                        'order_no' => $awa->order_no,
                        'remark' => $awa->remark,
                    ];
                }

                foreach ($abroads as $abroad) {
                    // dd($abroad);
                    $this->abroads[] = [
                        'id' => $abroad->id,
                        // 'country' => $abroad->countries()->pluck('country_id')->toArray(),/
                        'country' => $abroad->countries,
                        'particular' => $abroad->particular,
                        // 'training_success_fail' => false,
                        'training_success_fail' => $abroad->training_success_fail == 1 ? 'အောင်' : 'မအောင်',
                        'training_success_count' => $abroad->training_success_count,
                        'sponser' => $abroad->sponser,
                        'meet_with' => $abroad->meet_with,
                        'from_date' => $abroad->from_date,
                        'to_date' => $abroad->to_date,
                        'actual_abroad_date' => $abroad->actual_abroad_date,
                        'position' => $abroad->position,
                        'towns' => $abroad->towns,
                        // 'is_training' => $abroad->is_training == 1 ? 'ဟုတ်' : 'မဟုတ်',
                        'abroad_type_id' => $abroad->abroad_type_id == 1 ? 'ဟုတ်' : 'မဟုတ်'

                    ];
                }
                // dd($abroads);
                foreach ($punishments as $pun) {

                    $this->punishments[] = [
                        'id' => $pun->id,
                        'penalty_type' => $pun->penalty_type->name,
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
                        'language' => $lang->language->name,
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




                break;
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


        $this->current_department_id = $this->current_department_id ??  $staff->current_department_id;
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
        $this->current_division_join_date = $staff->current_division_join_date;

        $this->is_newly_appointed = $staff->is_newly_appointed;
        $this->is_direct_appointed = $staff->is_direct_appointed;
        $this->payscale_id = $staff->payscale_id;
        $this->current_section_id = $staff->current_section_id;
        $this->current_salary = $staff->current_salary;
        $this->current_increment_time = $staff->current_increment_time;
        $this->last_increment_date = $staff->last_increment_date;
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
        $this->past_occupation = $staff->past_occupation;
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

    // public function add_recommendation()
    // {
    //     $this->recommendations[] = ['id' => null, 'recommend_by' => ''];
    // }

    // public function add_posting()
    // {
    //     $this->postings[] = ['id' => null, 'rank' => null, 'post' => '', 'from_date' => null, 'to_date' => null, 'department' => null, 'departments' => [], 'sub_department' => null, 'location' => '', 'remark' => null, 'ministry' => null];
    // }

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

    // public function add_abroads()
    // {
    //     $this->abroads[] = ['id' => null, 'abroad_type_id' => null, 'country' => [], 'towns' => '', 'is_training' => false, 'particular' => '', 'training_success_fail' => false, 'training_success_count' => '', 'sponser' => '', 'meet_with' => '', 'from_date' => '', 'to_date' => '', 'actual_abroad_date' => '', 'position' => ''];
    // }

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
            // $this->js('location.reload()');
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

    public function remove_schools($index)
    {

        $this->removeModel('schools',  School::class, $index, []);
    }

    public function remove_trainings($index)
    {
        $this->removeModel('trainings',  Training::class, $index, []);
    }

    public function remove_awardings($index)
    {
        $this->removeModel('awards',  Awarding::class, $index, []);
    }

    // public function remove_abroads($index)
    // {
    //     // dd($index);
    //     $this->removeModel('abroads',  Abroad::class, $index, []);
    // }

    public function remove_socials($index)
    {
        $this->removeModel('socials',  SocialActivity::class, $index, []);
    }

    public function remove_staff_languages($index)
    {
        $this->removeModel('staff_languages',  StaffLanguage::class, $index, []);
    }
    public function remove_staff_rewards($index)
    {
        $this->removeModel('staff_rewards',  Reward::class, $index, []);
    }

    public function remove_punishments($index)
    {
        $this->removeModel('punishments',  Punishment::class, $index, []);
    }


    public function loadAdnSubmit()
    {

        $this->submit_staff();
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
            'current_division_join_date' => $this->current_division_join_date == '' ? null : $this->current_division_join_date,
            'is_newly_appointed' => $this->is_newly_appointed == '' ? null : $this->is_newly_appointed,
            'is_direct_appointed' => $this->is_direct_appointed == '' ? null : $this->is_direct_appointed,
            'payscale_id' => $this->payscale_id == '' ? null : $this->payscale_id,
            'current_section_id' => $this->current_section_id == '' ? null : $this->current_section_id,
            'current_salary' => $this->current_salary == '' ? null : $this->current_salary,
            'current_increment_time' => $this->current_increment_time == '' ? null : $this->current_increment_time,
            'last_increment_date' => $this->last_increment_date == '' ? null : $this->last_increment_date,
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
            'past_occupation' => $this->past_occupation == '' ? null : $this->past_occupation,
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
        // $staff = Staff::updateOrCreate(['id' => $this->staff_id,'created_by'=>Auth::user()->id,'updated_by'=>Auth::user()->id], $staff_create);
        $staff = Staff::updateOrCreate(
            ['id' => $this->staff_id],
            array_merge($staff_create, [
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id
            ])
        );
        $this->staff_id = $staff->id;
        $this->staff_photo = $staff->staff_photo;
        $this->staff_nrc_front = $staff->nrc_front;
        $this->staff_nrc_back = $staff->nrc_back;


        switch ($this->tab) {
            case 'personal_info':
                $this->saveEducations($staff->id);
                break;

            case 'job_info':
                // $this->saveRecommendations($staff->id);
                // $this->savePostings($staff->id);
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



        if ($this->confirm_add) {

            $this->dispatch('showAlert', ['message' => 'Successfully Created ! ']);
        } else {
            $this->dispatch('showAlert', ['message' => 'Successfully Updated ! ']);
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


    // private function saveSocials($staffId)
    // {
    //     $_validation = $this->validate_socials();
    //     $this->validate($_validation['validate'], $_validation['messages']);
    //     foreach ($this->socials as $social) {
    //         SocialActivity::updateOrCreate([
    //             'id' => $social['id'],
    //         ], [
    //             'staff_id' => $staffId,
    //             'particular' => $social['particular'],
    //             'remark' => $social['remark'],
    //         ]);
    //     }
    // }

    // public function validate_socials()
    // {
    //     $validations = [
    //         'socials.*.particular' => 'required',
    //     ];

    //     $validation_messages = [
    //         'socials.*.particular.required' => 'Field is required.',
    //     ];

    //     return [
    //         'validate' => $validations,
    //         'messages' => $validation_messages,
    //     ];
    // }
    // public $abroads_types;
    // private function saveStaffLanguages($staffId)
    // {
    //     $_validation = $this->validate_staff_languages();
    //     $this->validate($_validation['validate'], $_validation['messages']);
    //     foreach ($this->staff_languages as $lang) {
    //         StaffLanguage::updateOrCreate([
    //             'id' => $lang['id'],
    //         ], [
    //             'staff_id' => $staffId,
    //             'language_id' => $lang['language'] == '' ? null : $lang['language'],
    //             'rank' => $lang['rank'],
    //             'writing' => $lang['writing'],
    //             'reading' => $lang['reading'],
    //             'speaking' => $lang['speaking'],
    //             'remark' => $lang['remark'],
    //         ]);
    //     }
    // }

    // public function validate_staff_languages()
    // {
    //     $validations = [
    //         'staff_languages.*.language' => 'required',
    //     ];

    //     $validation_messages = [
    //         'staff_languages.*.language.required' => 'Field is required.',
    //     ];

    //     return [
    //         'validate' => $validations,
    //         'messages' => $validation_messages,
    //     ];
    // }

    // private function saveStaffRewards($staffId)
    // {
    //     $_validation = $this->validate_rewards();
    //     $this->validate($_validation['validate'], $_validation['messages']);

    //     foreach ($this->staff_rewards as $reward) {
    //         Reward::updateOrCreate([
    //             'id' => $reward['id'],
    //         ], [
    //             'staff_id' => $staffId,
    //             'name' => $reward['name'],
    //             'type' => $reward['type'] == '' ? null : $reward['type'],
    //             'year' => $reward['year'],
    //             'remark' => $reward['remark'],
    //         ]);
    //     }
    // }

    // public function validate_rewards()
    // {
    //     $validations = [
    //         'staff_rewards.*.name' => 'required',
    //         'staff_rewards.*.type' => 'required',
    //         'staff_rewards.*.year' => 'required',

    //     ];

    //     $validation_messages = [
    //         'staff_rewards.*.name.required' => 'Field is required.',
    //         'staff_rewards.*.type.required' => 'Field is required.',
    //         'staff_rewards.*.year.required' => 'Field is required.',
    //     ];

    //     return [
    //         'validate' => $validations,
    //         'messages' => $validation_messages,
    //     ];
    // }

    // private function saveSchools($staffId)
    // {
    //     $_validation = $this->validate_schools();
    //     $this->validate($_validation['validate'], $_validation['messages']);
    //     foreach ($this->schools  as $school) {
    //         School::updateOrCreate([
    //             'id' => $school['id'],
    //         ], [
    //             'staff_id' => $staffId,
    //             'education_group_id' => $school['education_group'] == '' ? null : $school['education_group'],
    //             'education_type_id' => $school['education_type'] == '' ? null : $school['education_type'],
    //             'education' => $school['education'] == '' ? null : $school['education'],
    //             'school_name' => $school['school_name'],
    //             'town' => $school['town'],
    //             'from_date' => $school['from_date'] == '' ? null : $school['from_date'],
    //             'to_date' => $school['to_date'] == '' ? null : $school['to_date'],
    //             'remark' => $school['remark'],
    //         ]);
    //     }
    // }

    // public function validate_schools()
    // {
    //     $validations = [
    //         'schools.*.education_group' => 'required',
    //         'schools.*.education_type' => 'required',
    //         'schools.*.school_name' => 'required',
    //         'schools.*.from_date' => 'required',
    //         'schools.*.to_date' => 'required',
    //     ];

    //     $validation_messages = [
    //         'schools.*.education_group.required' => 'This field is required.',
    //         'schools.*.education_type.required' => 'This field is required.',
    //         'schools.*.school_name.required' => 'This field is required.',
    //         'schools.*.from_date.required' => 'This field is required.',
    //         'schools.*.to_date.required' => 'This field is required.',
    //     ];

    //     return [
    //         'validate' => $validations,
    //         'messages' => $validation_messages,
    //     ];
    // }

    // private function saveAwards($staffId)
    // {
    //     $_validation = $this->validate_awards();
    //     $this->validate($_validation['validate'], $_validation['messages']);
    //     foreach ($this->awards as $award) {
    //         Awarding::updateOrCreate([
    //             'id' => $award['id'],
    //         ], [
    //             'staff_id' => $staffId,
    //             'award_type_id' => $award['award_type'] == '' ? null : $award['award_type'],
    //             'award_id' => $award['award'] == '' ? null : $award['award'],
    //             'order_no' => $award['order_no'],
    //             'remark' => $award['remark'] ?: null,
    //         ]);
    //     }
    // }

    // public function validate_awards()
    // {
    //     $validations = [
    //         'awards.*.award_type' => 'required',
    //         'awards.*.award' => 'required',
    //     ];

    //     $validation_messages = [
    //         'awards.*.award_type.required' => 'This field is required.',
    //         'awards.*.award.required' => 'This field is required.',
    //     ];

    //     return [
    //         'validate' => $validations,
    //         'messages' => $validation_messages,
    //     ];
    // }

    // // validation done
    // private function saveTrainings($staffId)
    // {

    //     $_validation = $this->validate_trainings();
    //     $this->validate($_validation['validate'], $_validation['messages']);
    //     foreach ($this->trainings as $training) {
    //         Training::updateOrCreate([
    //             'id' => $training['id'],
    //         ], [
    //             'staff_id' => $staffId,
    //             'training_type_id' => $training['training_type'] == '' ? null : $training['training_type'],
    //             'diploma_name' => $training['diploma_name'],
    //             'batch' => $training['batch'],
    //             'from_date' => $training['from_date'] == '' ? null : $training['from_date'],
    //             'to_date' => $training['to_date'] == '' ? null : $training['to_date'],
    //             'location' => $training['location'],
    //             'country_id' => $training['country'] == '' ? null : $training['country'],
    //             'training_location_id' => $training['training_location'] == '' ? null : $training['training_location'],
    //             'remark' => $training['remark'],
    //         ]);
    //     }
    // }

    // public function validate_trainings()
    // {
    //     $validations = [
    //         'trainings.*.training_type' => 'required',
    //         'trainings.*.from_date' => 'required',
    //         'trainings.*.to_date' => 'required',
    //     ];

    //     $validation_messages = [
    //         'trainings.*.training_type.required' => 'This Field is required.',
    //         'trainings.*.from_date.required' => 'This Field is required.',
    //         'trainings.*.to_date.required' => 'This Field is required.',
    //     ];

    //     return [
    //         'validate' => $validations,
    //         'messages' => $validation_messages,
    //     ];
    // }

    // private function savePunishments($staffId)
    // {
    //     $_validation = $this->validate_punishments();
    //     $this->validate($_validation['validate'], $_validation['messages']);
    //     foreach ($this->punishments as $punishment) {
    //         Punishment::updateOrCreate([
    //             'id' => $punishment['id'],
    //         ], [
    //             'staff_id' => $staffId,
    //             'penalty_type_id' => $punishment['penalty_type'] == '' ? null : $punishment['penalty_type'],
    //             'reason' => $punishment['reason'],
    //             'from_date' => $punishment['from_date'] == '' ? null : $punishment['from_date'],
    //             'to_date' => $punishment['to_date'] == '' ? null : $punishment['to_date'],
    //         ]);
    //     }
    // }

    // public function validate_punishments()
    // {
    //     $validations = [
    //         'punishments.*.penalty_type' => 'required',
    //         'punishments.*.from_date' => 'required',
    //         'punishments.*.to_date' => 'required',
    //     ];

    //     $validation_messages = [
    //         'punishments.*.penalty_type.required' => 'This Field is required.',
    //         'punishments.*.from_date.required' => 'This Field is required.',
    //         'punishments.*.to_date.required' => 'This Field is required.',
    //     ];

    //     return [
    //         'validate' => $validations,
    //         'messages' => $validation_messages,
    //     ];
    // }

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







    private function relativeFields($staffId, $relative)
    {
        $fields = [
            'staff_id' => $staffId,
            'name' => $relative['name'],
            'ethnic_id' => $relative['ethnic'] == '' ? null : $relative['ethnic'],
            'religion_id' => $relative['religion'] == '' ? null : $relative['religion'],
            'place_of_birth' => $relative['place_of_birth'] == '' ? null : $relative['place_of_birth'],
            'gender_id' => $relative['gender_id'] == '' ? null : $relative['gender_id'],
            'occupation' => $relative['occupation'],
            'address' => $relative['address'],
            'relation_id' => $relative['relation'] == '' ? null : $relative['relation'],
        ];

        return $fields;
    }

    private function saveRelatives($staffId)
    {
        foreach ($this->siblings as $relative) {
            $_validation = $this->validate_relatives('siblings');
            $this->validate($_validation['validate'], $_validation['messages']);
            Sibling::updateOrCreate(
                [
                    'id' => $relative['id'] == '' ? null : $relative['id'],
                ],
                $this->relativeFields($staffId, $relative)
            );
        }

        foreach ($this->father_siblings as $relative) {
            $_validation = $this->validate_relatives('father_siblings');
            $this->validate($_validation['validate'], $_validation['messages']);
            FatherSibling::updateOrCreate(
                [
                    'id' => $relative['id'] == '' ? null : $relative['id'],
                ],
                $this->relativeFields($staffId, $relative)
            );
        }

        foreach ($this->mother_siblings as $relative) {
            $_validation = $this->validate_relatives('mother_siblings');
            $this->validate($_validation['validate'], $_validation['messages']);
            MotherSibling::updateOrCreate(
                [
                    'id' => $relative['id'] == '' ? null : $relative['id'],
                ],
                $this->relativeFields($staffId, $relative)
            );
        }

        foreach ($this->spouses as $relative) {
            $_validation = $this->validate_relatives('spouses');
            $this->validate($_validation['validate'], $_validation['messages']);
            Spouse::updateOrCreate(
                [
                    'id' => $relative['id'] == '' ? null : $relative['id'],
                ],
                $this->relativeFields($staffId, $relative)
            );
        }

        foreach ($this->children as $relative) {
            $_validation = $this->validate_relatives('children');
            $this->validate($_validation['validate'], $_validation['messages']);
            Children::updateOrCreate(
                [
                    'id' => $relative['id'] == '' ? null : $relative['id'],
                ],
                $this->relativeFields($staffId, $relative)
            );
        }

        foreach ($this->spouse_siblings as $relative) {
            $_validation = $this->validate_relatives('spouse_siblings');
            $this->validate($_validation['validate'], $_validation['messages']);
            SpouseSibling::updateOrCreate(
                [
                    'id' => $relative['id'] == '' ? null : $relative['id'],
                ],
                $this->relativeFields($staffId, $relative)
            );
        }

        foreach ($this->spouse_father_siblings as $relative) {
            $_validation = $this->validate_relatives('spouse_father_siblings');
            $this->validate($_validation['validate'], $_validation['messages']);
            SpouseFatherSibling::updateOrCreate(
                [
                    'id' => $relative['id'] == '' ? null : $relative['id'],
                ],
                $this->relativeFields($staffId, $relative)
            );
        }

        foreach ($this->spouse_mother_siblings as $relative) {
            $_validation = $this->validate_relatives('spouse_mother_siblings');
            $this->validate($_validation['validate'], $_validation['messages']);
            SpouseMotherSibling::updateOrCreate(
                [
                    'id' => $relative['id'] == '' ? null : $relative['id'],
                ],
                $this->relativeFields($staffId, $relative)
            );
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
            })->first()->id;
    }




    public function updatedNrcRegionId($value)
    {
        $this->nrc_township_codes = NrcTownshipCode::where('nrc_region_id_id', $value)->get();
    }

    public function updatedSideMinistryId($value)
    {
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

    public function add_master($type)
    {

        $this->add_model = $type;
        $this->submit_form = "save_{$type}";
    }

    public function add_modal($type)
    {
        $this->add_model = $type;
        $this->submit_form = "save_{$type}";
    }


    public function getEdu($id)
    {
        return Education::where('id', $id)->get();
    }
    public function save_edu_group()
    {
        EducationGroup::create([
            'name' => $this->education_group_name,
        ]);
        $this->reset('education_group_name');
        $this->render();
        $this->message = 'Education Group Created Successfully.';
        $this->add_model = null;
    }

    public function save_edu_type()
    {
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

    public function save_edu()
    {
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

    public function close_master_modal()
    {
        $this->add_model = null;
    }

    public $results;
    public $selectedValue;
    public $search;
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

    // #[On('searchInputUpdated')]
    // public function searchOptions($query, $field)
    // {
    //     $this->searchResults = Education::where('name', 'like', "%$query%")->get()->toArray();
    //     if ($this->searchResults) {
    //         logger('Dispatching searchResultsUpdated', ['field' => $field, 'results' => $this->searchResults]); // Debug log
    //         $this->dispatch('searchResultsUpdated', field: $field, results: $this->searchResults);
    //     }
    // }



    #[On('searchInputUpdated')]
    public function searchOptions($query, $field, $index)
    {
        $this->searchResults[$index] = Education::where('name', 'like', "%$query%")->get()->toArray();
        if ($this->searchResults[$index]) {
            logger('Dispatching searchResultsUpdated', ['field' => $field, 'index' => $index, 'results' => $this->searchResults[$index]]);
            $this->dispatch('searchResultsUpdated', field: $field, index: $index, results: $this->searchResults[$index]);
        }
    }


    // ------------------start new---------------

    // // ------------------start အလုပ်အကိုင်အတွက် ထောက်ခံသူများ---------------

    function add_recommendation_modal($type)
    {
        $this->data = [
            'modal_title' => 'အလုပ်အကိုင်အတွက် ထောက်ခံသူများ',
            'old_data' => null,
            'del_method' => 'removeRecommendation',

        ];

        $this->add_model = $type;
        $this->submit_form = "save_{$type}";
    }
    function  edit_recommendation_modal($type, $index)
    {
        $value = $this->recommendations[$index];

        // dd($value['recommend_by']);
        $this->recommend_by = $value['recommend_by'];
        $this->update_index = $index;
        $this->data = [
            'modal_title' => 'အလုပ်အကိုင်အတွက် ထောက်ခံသူများ',
            'old_data' => [$value['recommend_by'], $index, $value['id']],
            'del_method' => 'removeRecommendation',

        ];

        $this->add_model = $type;
        $this->submit_form = "save_{$type}";
    }

    public function save_recommendations_modal()
    {
        if ($this->staff) {
            if ($this->update_index !== null) {
                // Ensure $this->recommendations is an array
                if (!is_array($this->recommendations)) {
                    // Optionally log an error or dispatch an alert
                    // $this->dispatch('alert', ['type' => 'error', 'message' => 'Recommendations data is invalid']);
                    return;
                }

                // Check if the index exists
                if (array_key_exists($this->update_index, $this->recommendations)) {
                    $id = $this->recommendations[$this->update_index]['id'];
                    $this->recommendations[$this->update_index] = ['id' => $id, 'recommend_by' => $this->recommend_by];

                    $rec = Recommendation::findOrFail($id);
                    $rec->recommend_by = $this->recommend_by;
                    $rec->save();


                    $this->dispatch('alert', ['type' => 'success', 'message' => 'Updated successfully!']);
                }
            } else {
                $this->validate(
                    RecommendationValidation::rules(),
                    RecommendationValidation::messages()
                );

                $rec = Recommendation::updateOrCreate([
                    'recommend_by' => $this->recommend_by,
                    'staff_id' => $this->staff->id,
                ]);

                // Ensure $this->recommendations is an array before appending
                if (!is_array($this->recommendations)) {
                    $this->recommendations = [];
                }

                $this->recommendations[] = [
                    'id' => $rec->id,
                    'recommend_by' => $rec->recommend_by,
                ];

                $this->dispatch('alert', ['type' => 'success', 'message' => 'Created successfully!']);
            }

            $this->add_model = null;
        } else {
            return;
        }
    }


    public function confirmRemoveRecommendation($index, $id)
    {
        $this->dispatch('showRemoveConfirmation', index: $index, id: $id);
    }

    #[On('removeRecommendation')]
    public function removeRecommendation($index, $id)
    {

        $recommendation = Recommendation::findOrFail($id);
        $recommendation->delete();
        unset($this->recommendations[$index]);
        $this->recommendations = array_values($this->recommendations);

        $this->dispatch('alert', ['type' => 'success', 'message' => 'Deleted successfully!']);
    }

    // ------------------end အလုပ်အကိုင်အတွက် ထောက်ခံသူများ---------------


    // -----------------လုပ်ကိုင်ခဲ့ဖူးသည့်အလုပ်အကိုင်--------------------
    public $postings_rank, $postings_from_date, $postings_to_date, $postings_ministry, $postings_department, $postings_sub_department, $postings_location, $postings_remark;
    public $schools_education_group, $schools_education_type, $schools_education, $schools_school_name, $schools_town, $schools_from_date, $schools_to_date, $schools_remark;
    public $trainings_training_type, $trainings_from_date, $trainings_location, $trainings_country, $trainings_to_date, $trainings_training_location, $trainings_batch, $trainings_remark;
    public $awards_award_type, $awards_award_id, $awards_order_no, $awards_remark;
    public $punishments_penalty_type, $punishments_reason, $punishments_from_date, $punishments_to_date;
    public $socials_particular, $socials_remark;
    public $staff_languages_language, $staff_languages_rank, $staff_languages_writing, $staff_languages_reading, $staff_languages_speaking, $staff_languages_remark;
    public $staff_rewards_type, $staff_rewards_year, $staff_rewards_remark, $staff_rewards_name;
    public $method = 'create', $editId, $editIndex, $del_method;
    public $data, $alert_messages;

    public function add_postings_modal($type, $index = null)
    {


        if ($index !== null) {
            $this->method = 'edit';
            $this->editIndex = $index;

            // -----------------start လုပ်ကိုင်ခဲ့ဖူးသည့်အလုပ်အကိုင်--------------------

            $id = $this->postings[$index]['id'];

            $oldData = Posting::findOrFail($id);
            $this->postings_rank =  $oldData->rank_id;
            $this->postings_from_date = $oldData->from_date;
            $this->postings_to_date = $oldData->to_date;
            $this->postings_ministry = $oldData->ministry_id;
            $this->postings_department = $oldData->department_id;
            $this->postings_sub_department = $oldData->sub_department;
            $this->postings_location = $oldData->location;
            $this->postings_remark =  $oldData->remark;
            // -----------------end လုပ်ကိုင်ခဲ့ဖူးသည့်အလုပ်အကိုင်--------------------




        } else {
            // -----------------လုပ်ကိုင်ခဲ့ဖူးသည့်အလုပ်အကိုင်--------------------
            $this->postings_rank = null;
            $this->postings_from_date = null;
            $this->postings_to_date = null;
            $this->postings_ministry = null;
            $this->postings_department = null;
            $this->postings_sub_department = null;
            $this->postings_location = null;
            $this->postings_remark = null;


            $this->method = 'create';
        }
        // -----------------လုပ်ကိုင်ခဲ့ဖူးသည့်အလုပ်အကိုင်--------------------
        $this->data = ChPostings::datas($this->ranks, $this->ministrys, $this->departments);

        $this->add_model = $type;
        $this->submit_form = "save_postings_modal";
    }

    //declaring for relatives
    public $siblings_name, $siblings_religion, $siblings_ethnic, $siblings_gender, $siblings_place_of_birth, $siblings_occupation, $siblings_address, $siblings_relation;

    public $fatherSibling_name, $fatherSibling_religion, $fatherSibling_ethnic, $fatherSibling_gender, $fatherSibling_place_of_birth, $fatherSibling_occupation, $fatherSibling_address, $fatherSibling_relation;

    public $motherSibling_name, $motherSibling_religion, $motherSibling_ethnic, $motherSibling_gender, $motherSibling_place_of_birth, $motherSibling_occupation, $motherSibling_address, $motherSibling_relation;

    public $spouses_name, $spouse_religion, $spouse_ethnic, $spouse_gender, $spouse_place_of_birth, $spouse_occupation, $spouse_address, $spouse_relation;

    public $children_name, $children_religion, $children_ethnic, $children_gender, $children_place_of_birth, $children_occupation, $children_address, $children_relation;

    public $spouseSibling_name, $spouseSibling_religion, $spouseSibling_ethnic, $spouseSibling_gender, $spouseSibling_place_of_birth, $spouseSibling_occupation, $spouseSibling_address, $spouseSibling_relation;

    public $spouseFatherSibling_name, $spouseFatherSibling_religion, $spouseFatherSibling_ethnic, $spouseFatherSibling_gender, $spouseFatherSibling_place_of_birth, $spouseFatherSibling_occupation, $spouseFatherSibling_address, $spouseFatherSibling_relation;

    public $spouseMotherSibling_name, $spouseMotherSibling_religion, $spouseMotherSibling_ethnic, $spouseMotherSibling_gender, $spouseMotherSibling_place_of_birth, $spouseMotherSibling_occupation, $spouseMotherSibling_address, $spouseMotherSibling_relation;

    //for siblings
    public function add_siblings_modal($type, $index = null)
    {

        if ($index !== null) {
            $this->method = 'edit';
            $this->editIndex = $index;

            $id = $this->siblings[$index]['id'];
            $this->editId = $id;
            $oldData = Sibling::findOrFail($id);

            $this->siblings_name = $oldData->name;
            $this->siblings_ethnic = $oldData->ethnic_id;
            $this->siblings_religion = $oldData->religion_id;
            $this->siblings_place_of_birth = $oldData->place_of_birth;
            $this->siblings_gender = $oldData->gender_id;
            $this->siblings_occupation = $oldData->occupation;
            $this->siblings_address = $oldData->address;
            $this->siblings_relation = $oldData->relation_id;
        } else {

            $this->siblings_name = null;
            $this->siblings_ethnic = null;
            $this->siblings_religion = null;
            $this->siblings_place_of_birth = null;
            $this->siblings_gender = null;
            $this->siblings_occupation = null;
            $this->siblings_address = null;
            $this->siblings_relation = null;
            $this->method = 'create';
        }

        $this->data = StaffDetail\Siblings::datas($this->religions, $this->ethnics, $this->genders, $this->relations);

        $this->add_model = $type;
        $this->submit_form = "save_siblings_modal";
    }

    public function save_siblings_modal()
    {

        try {

            $this->validate(
                Siblings::rules(),
                Siblings::messages()
            );
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            $this->dispatch('validation', [
                'type' => 'Validation Error',
                'message' => $errors[0],
            ]);
            return;
        }

        $siblings = new Siblings;

        if ($this->editIndex === null) {
            $this->editId = null;
        }

        $sibling = $siblings->siblingsCreate($this->editId, $this->staff->id, $this->siblings_name, $this->siblings_ethnic, $this->siblings_religion, $this->siblings_gender, $this->siblings_place_of_birth, $this->siblings_occupation, $this->siblings_address, $this->siblings_relation);

        if ($sibling) {

            $display = [
                'id' => $sibling->id,
                'name' => $sibling->name,
                'ethnic' => $sibling->ethnic->name,
                'religion' => $sibling->religion->name,
                'place_of_birth' => $sibling->place_of_birth,
                'gender_id' => $sibling->gender->name,
                'occupation' => $sibling->occupation,
                'address' => $sibling->address,
                'relation' => $sibling->relation->name,
            ];

            if ($this->editIndex === null) {
                $this->siblings[] = $display;
                $this->alert_messages = 'Created Successfully!';
            } else {
                $this->siblings[$this->editIndex] = $display;
                $this->alert_messages = 'Updated successfully!';
            }
        }
        $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);
        $this->add_model = null;
    }

    //for father siblings
    public function add_father_siblings_modal($type, $index = null)
    {

        if ($index !== null) {
            $this->method = 'edit';
            $this->editIndex = $index;

            $id = $this->father_siblings[$index]['id'];
            $this->editId = $id;
            $oldData = FatherSibling::findOrFail($id);

            $this->fatherSibling_name = $oldData->name;
            $this->fatherSibling_ethnic = $oldData->ethnic_id;
            $this->fatherSibling_religion = $oldData->religion_id;
            $this->fatherSibling_place_of_birth = $oldData->place_of_birth;
            $this->fatherSibling_gender = $oldData->gender_id;
            $this->fatherSibling_occupation = $oldData->occupation;
            $this->fatherSibling_address = $oldData->address;
            $this->fatherSibling_relation = $oldData->relation_id;
        } else {

            $this->fatherSibling_name = null;
            $this->fatherSibling_ethnic = null;
            $this->fatherSibling_religion = null;
            $this->fatherSibling_place_of_birth = null;
            $this->fatherSibling_gender = null;
            $this->fatherSibling_occupation = null;
            $this->fatherSibling_address = null;
            $this->fatherSibling_relation = null;

            $this->method = 'create';
        }

        $this->data = StaffDetail\FatherSibling::datas($this->religions, $this->ethnics, $this->genders, $this->relations);

        $this->add_model = $type;
        $this->submit_form = "save_father_siblings_modal";
    }

    public function save_father_siblings_modal()
    {
        try {

            $this->validate(
                \App\Livewire\StaffDetail\FatherSibling::rules(),
                \App\Livewire\StaffDetail\FatherSibling::messages()
            );
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            $this->dispatch('validation', [
                'type' => 'Validation Error',
                'message' => $errors[0],
            ]);
            return;
        }

        $fatherSiblings = new \App\Livewire\StaffDetail\FatherSibling;

        if ($this->editIndex === null) {
            $this->editId = null;
        }

        $fatherSibling = $fatherSiblings->fatherSiblingsCreate($this->editId, $this->staff->id, $this->fatherSibling_name, $this->fatherSibling_ethnic, $this->fatherSibling_religion, $this->fatherSibling_gender, $this->fatherSibling_place_of_birth, $this->fatherSibling_occupation, $this->fatherSibling_address, $this->fatherSibling_relation);

        if ($fatherSibling) {

            $display = [
                'id' => $fatherSibling->id,
                'name' => $fatherSibling->name,
                'ethnic' => $fatherSibling->ethnic->name,
                'religion' => $fatherSibling->religion->name,
                'place_of_birth' => $fatherSibling->place_of_birth,
                'gender_id' => $fatherSibling->gender->name,
                'occupation' => $fatherSibling->occupation,
                'address' => $fatherSibling->address,
                'relation' => $fatherSibling->relation->name,
            ];
            if ($this->editIndex === null) {
                $this->father_siblings[] = $display;
                $this->alert_messages = 'Created Successfully!';
            } else {
                $this->father_siblings[$this->editIndex] = $display;
                $this->alert_messages = 'Updated successfully!';
            }
        }
        $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);

        $this->add_model = null;
    }
    //for mother siblings
    public function add_mother_siblings_modal($type, $index = null)
    {

        if ($index !== null) {
            $this->method = 'edit';
            $this->editIndex = $index;

            $id = $this->mother_siblings[$index]['id'];
            $this->editId = $id;
            $oldData = MotherSibling::findOrFail($id);

            $this->motherSibling_name = $oldData->name;
            $this->motherSibling_ethnic = $oldData->ethnic_id;
            $this->motherSibling_religion = $oldData->religion_id;
            $this->motherSibling_place_of_birth = $oldData->place_of_birth;
            $this->motherSibling_gender = $oldData->gender_id;
            $this->motherSibling_occupation = $oldData->occupation;
            $this->motherSibling_address = $oldData->address;
            $this->motherSibling_relation = $oldData->relation_id;
        } else {

            $this->motherSibling_name = null;
            $this->motherSibling_ethnic = null;
            $this->motherSibling_religion = null;
            $this->motherSibling_place_of_birth = null;
            $this->motherSibling_gender = null;
            $this->motherSibling_occupation = null;
            $this->motherSibling_address = null;
            $this->motherSibling_relation = null;

            $this->method = 'create';
        }

        $this->data = StaffDetail\MotherSibling::datas($this->religions, $this->ethnics, $this->genders, $this->relations);

        $this->add_model = $type;
        $this->submit_form = "save_mother_siblings_modal";
    }

    public function save_mother_siblings_modal()
    {
        try {

            $this->validate(
                \App\Livewire\StaffDetail\MotherSibling::rules(),
                \App\Livewire\StaffDetail\MotherSibling::messages()
            );
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            $this->dispatch('validation', [
                'type' => 'Validation Error',
                'message' => $errors[0],
            ]);
            return;
        }

        $motherSiblings = new \App\Livewire\StaffDetail\MotherSibling;

        if ($this->editIndex === null) {
            $this->editId = null;
        }

        $motherSibling = $motherSiblings->motherSiblingsCreate($this->editId, $this->staff->id, $this->motherSibling_name, $this->motherSibling_ethnic, $this->motherSibling_religion, $this->motherSibling_gender, $this->motherSibling_place_of_birth, $this->motherSibling_occupation, $this->motherSibling_address, $this->motherSibling_relation);

        if ($motherSibling) {

            $display = [
                'id' => $motherSibling->id,
                'name' => $motherSibling->name,
                'ethnic' => $motherSibling->ethnic->name,
                'religion' => $motherSibling->religion->name,
                'place_of_birth' => $motherSibling->place_of_birth,
                'gender_id' => $motherSibling->gender->name,
                'occupation' => $motherSibling->occupation,
                'address' => $motherSibling->address,
                'relation' => $motherSibling->relation->name,
            ];
            if ($this->editIndex === null) {
                $this->mother_siblings[] = $display;
                $this->alert_messages = 'Created Successfully!';
            } else {
                $this->mother_siblings[$this->editIndex] = $display;
                $this->alert_messages = 'Updated successfully!';
            }
        }
        $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);

        $this->add_model = null;
    }

    //for spouse
    public function add_spouses_modal($type, $index = null)
    {

        if ($index !== null) {
            $this->method = 'edit';
            $this->editIndex = $index;

            $id = $this->spouses[$index]['id'];
            $this->editId = $id;
            $oldData = Spouse::findOrFail($id);

            $this->spouses_name = $oldData->name;
            $this->spouse_ethnic = $oldData->ethnic_id;
            $this->spouse_religion = $oldData->religion_id;
            $this->spouse_place_of_birth = $oldData->place_of_birth;
            $this->spouse_gender = $oldData->gender_id;
            $this->spouse_occupation = $oldData->occupation;
            $this->spouse_address = $oldData->address;
            $this->spouse_relation = $oldData->relation_id;
        } else {

            $this->spouses_name = null;
            $this->spouse_ethnic = null;
            $this->spouse_religion = null;
            $this->spouse_place_of_birth = null;
            $this->spouse_gender = null;
            $this->spouse_occupation = null;
            $this->spouse_address = null;
            $this->spouse_relation = null;

            $this->method = 'create';
        }

        $this->data = StaffDetail\spouse::datas($this->religions, $this->ethnics, $this->genders, $this->relations);

        $this->add_model = $type;
        $this->submit_form = "save_spouses_modal";
    }

    public function save_spouses_modal()
    {
        try {

            $this->validate(
                \App\Livewire\StaffDetail\spouse::rules(),
                \App\Livewire\StaffDetail\spouse::messages()
            );
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            $this->dispatch('validation', [
                'type' => 'Validation Error',
                'message' => $errors[0],
            ]);
            return;
        }

        $spouses = new \App\Livewire\StaffDetail\spouse;

        if ($this->editIndex === null) {
            $this->editId = null;
        }

        $spouse = $spouses->spouseCreate($this->editId, $this->staff->id, $this->spouses_name, $this->spouse_ethnic, $this->spouse_religion, $this->spouse_gender, $this->spouse_place_of_birth, $this->spouse_occupation, $this->spouse_address, $this->spouse_relation);

        if ($spouse) {

            $display = [
                'id' => $spouse->id,
                'name' => $spouse->name,
                'ethnic' => $spouse->ethnic->name,
                'religion' => $spouse->religion->name,
                'place_of_birth' => $spouse->place_of_birth,
                'gender_id' => $spouse->gender->name,
                'occupation' => $spouse->occupation,
                'address' => $spouse->address,
                'relation' => $spouse->relation->name,
            ];
            if ($this->editIndex === null) {
                $this->spouses[] = $display;
                $this->alert_messages = 'Created Successfully!';
            } else {
                $this->spouses[$this->editIndex] = $display;
                $this->alert_messages = 'Updated successfully!';
            }
        }
        $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);

        $this->add_model = null;
    }

    //for children
    public function add_children_modal($type, $index = null)
    {

        if ($index !== null) {
            $this->method = 'edit';
            $this->editIndex = $index;

            $id = $this->children[$index]['id'];
            $this->editId = $id;
            $oldData = Children::findOrFail($id);

            $this->children_name = $oldData->name;
            $this->children_ethnic = $oldData->ethnic_id;
            $this->children_religion = $oldData->religion_id;
            $this->children_place_of_birth = $oldData->place_of_birth;
            $this->children_gender = $oldData->gender_id;
            $this->children_occupation = $oldData->occupation;
            $this->children_address = $oldData->address;
            $this->children_relation = $oldData->relation_id;
        } else {

            $this->children_name = null;
            $this->children_ethnic = null;
            $this->children_religion = null;
            $this->children_place_of_birth = null;
            $this->children_gender = null;
            $this->children_occupation = null;
            $this->children_address = null;
            $this->fatherSibling_relation = null;

            $this->method = 'create';
        }

        $this->data = StaffDetail\Children::datas($this->religions, $this->ethnics, $this->genders, $this->relations);

        $this->add_model = $type;
        $this->submit_form = "save_children_modal";
    }

    public function save_children_modal()
    {
        try {

            $this->validate(
                \App\Livewire\StaffDetail\Children::rules(),
                \App\Livewire\StaffDetail\Children::messages()
            );
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            $this->dispatch('validation', [
                'type' => 'Validation Error',
                'message' => $errors[0],
            ]);
            return;
        }

        $children = new \App\Livewire\StaffDetail\Children;

        if ($this->editIndex === null) {
            $this->editId = null;
        }

        $child = $children->childrenCreate($this->editId, $this->staff->id, $this->children_name, $this->children_ethnic, $this->children_religion, $this->children_gender, $this->children_place_of_birth, $this->children_occupation, $this->children_address, $this->children_relation);

        if ($child) {

            $display = [
                'id' => $child->id,
                'name' => $child->name,
                'ethnic' => $child->ethnic->name,
                'religion' => $child->religion->name,
                'place_of_birth' => $child->place_of_birth,
                'gender_id' => $child->gender->name,
                'occupation' => $child->occupation,
                'address' => $child->address,
                'relation' => $child->relation->name,
            ];
            if ($this->editIndex === null) {
                $this->children[] = $display;
                $this->alert_messages = 'Created Successfully!';
            } else {
                $this->children[$this->editIndex] = $display;
                $this->alert_messages = 'Updated successfully!';
            }
        }
        $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);

        $this->add_model = null;
    }

    //for spouse siblings

    public function add_spouse_siblings_modal($type, $index = null)
    {

        if ($index !== null) {
            $this->method = 'edit';
            $this->editIndex = $index;

            $id = $this->spouse_siblings[$index]['id'];
            $this->editId = $id;
            $oldData = SpouseSibling::findOrFail($id);

            $this->spouseSibling_name = $oldData->name;
            $this->spouseSibling_ethnic = $oldData->ethnic_id;
            $this->spouseSibling_religion = $oldData->religion_id;
            $this->spouseSibling_place_of_birth = $oldData->place_of_birth;
            $this->spouseSibling_gender = $oldData->gender_id;
            $this->spouseSibling_occupation = $oldData->occupation;
            $this->spouseSibling_address = $oldData->address;
            $this->spouseSibling_relation = $oldData->relation_id;
        } else {

            $this->spouseSibling_name = null;
            $this->spouseSibling_ethnic = null;
            $this->spouseSibling_religion = null;
            $this->spouseSibling_place_of_birth = null;
            $this->spouseSibling_gender = null;
            $this->spouseSibling_occupation = null;
            $this->spouseSibling_address = null;
            $this->spouseSibling_relation = null;

            $this->method = 'create';
        }

        $this->data = StaffDetail\SpouseSibling::datas($this->religions, $this->ethnics, $this->genders, $this->relations);

        $this->add_model = $type;
        $this->submit_form = "save_spouse_siblings_modal";
    }

    public function save_spouse_siblings_modal()
    {
        try {

            $this->validate(
                \App\Livewire\StaffDetail\SpouseSibling::rules(),
                \App\Livewire\StaffDetail\SpouseSibling::messages()
            );
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            $this->dispatch('validation', [
                'type' => 'Validation Error',
                'message' => $errors[0],
            ]);
            return;
        }

        $spouseSiblings = new \App\Livewire\StaffDetail\SpouseSibling;

        if ($this->editIndex === null) {
            $this->editId = null;
        }

        $spouseSibling = $spouseSiblings->spouseSiblingsCreate($this->editId, $this->staff->id, $this->spouseSibling_name, $this->spouseSibling_ethnic, $this->spouseSibling_religion, $this->spouseSibling_gender, $this->spouseSibling_place_of_birth, $this->spouseSibling_occupation, $this->spouseSibling_address, $this->spouseSibling_relation);

        if ($spouseSibling) {

            $display = [
                'id' => $spouseSibling->id,
                'name' => $spouseSibling->name,
                'ethnic' => $spouseSibling->ethnic->name,
                'religion' => $spouseSibling->religion->name,
                'place_of_birth' => $spouseSibling->place_of_birth,
                'gender_id' => $spouseSibling->gender->name,
                'occupation' => $spouseSibling->occupation,
                'address' => $spouseSibling->address,
                'relation' => $spouseSibling->relation->name,
            ];
            if ($this->editIndex === null) {
                $this->spouse_siblings[] = $display;
                $this->alert_messages = 'Created Successfully!';
            } else {
                $this->spouse_siblings[$this->editIndex] = $display;
                $this->alert_messages = 'Updated successfully!';
            }
        }
        $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);

        $this->add_model = null;
    }

    //for spouse father siblings
    public function add_spouse_father_siblings_modal($type, $index = null)
    {

        if ($index !== null) {
            $this->method = 'edit';
            $this->editIndex = $index;

            $id = $this->spouse_father_siblings[$index]['id'];
            $this->editId = $id;
            $oldData = SpouseFatherSibling::findOrFail($id);

            $this->spouseFatherSibling_name = $oldData->name;
            $this->spouseFatherSibling_ethnic = $oldData->ethnic_id;
            $this->spouseFatherSibling_religion = $oldData->religion_id;
            $this->spouseFatherSibling_place_of_birth = $oldData->place_of_birth;
            $this->spouseFatherSibling_gender = $oldData->gender_id;
            $this->spouseFatherSibling_occupation = $oldData->occupation;
            $this->spouseFatherSibling_address = $oldData->address;
            $this->spouseFatherSibling_relation = $oldData->relation_id;
        } else {

            $this->spouseFatherSibling_name = null;
            $this->spouseFatherSibling_ethnic = null;
            $this->spouseFatherSibling_religion = null;
            $this->spouseFatherSibling_place_of_birth = null;
            $this->spouseFatherSibling_gender = null;
            $this->spouseFatherSibling_occupation = null;
            $this->spouseFatherSibling_address = null;
            $this->spouseFatherSibling_relation = null;

            $this->method = 'create';
        }

        $this->data = StaffDetail\SpouseFatherSibling::datas($this->religions, $this->ethnics, $this->genders, $this->relations);

        $this->add_model = $type;
        $this->submit_form = "save_spouse_father_siblings_modal";
    }

    public function save_spouse_father_siblings_modal()
    {
        try {

            $this->validate(
                \App\Livewire\StaffDetail\SpouseFatherSibling::rules(),
                \App\Livewire\StaffDetail\SpouseFatherSibling::messages()
            );
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            $this->dispatch('validation', [
                'type' => 'Validation Error',
                'message' => $errors[0],
            ]);
            return;
        }

        $spouseFatherSiblings = new \App\Livewire\StaffDetail\SpouseFatherSibling;

        if ($this->editIndex === null) {
            $this->editId = null;
        }

        $spouseFatherSibling = $spouseFatherSiblings->spouseFatherSiblingsCreate($this->editId, $this->staff->id, $this->spouseFatherSibling_name, $this->spouseFatherSibling_ethnic, $this->spouseFatherSibling_religion, $this->spouseFatherSibling_gender, $this->spouseFatherSibling_place_of_birth, $this->spouseFatherSibling_occupation, $this->spouseFatherSibling_address, $this->spouseFatherSibling_relation);

        if ($spouseFatherSibling) {

            $display = [
                'id' => $spouseFatherSibling->id,
                'name' => $spouseFatherSibling->name,
                'ethnic' => $spouseFatherSibling->ethnic->name,
                'religion' => $spouseFatherSibling->religion->name,
                'place_of_birth' => $spouseFatherSibling->place_of_birth,
                'gender_id' => $spouseFatherSibling->gender->name,
                'occupation' => $spouseFatherSibling->occupation,
                'address' => $spouseFatherSibling->address,
                'relation' => $spouseFatherSibling->relation->name,
            ];
            if ($this->editIndex === null) {
                $this->spouse_father_siblings[] = $display;
                $this->alert_messages = 'Created Successfully!';
            } else {
                $this->spouse_father_siblings[$this->editIndex] = $display;
                $this->alert_messages = 'Updated successfully!';
            }
        }
        $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);

        $this->add_model = null;
    }

    //for spouse mother siblings
    public function add_spouse_mother_siblings_modal($type, $index = null)
    {

        if ($index !== null) {
            $this->method = 'edit';
            $this->editIndex = $index;

            $id = $this->spouse_mother_siblings[$index]['id'];
            $this->editId = $id;
            $oldData = SpouseMotherSibling::findOrFail($id);

            $this->spouseMotherSibling_name = $oldData->name;
            $this->spouseMotherSibling_ethnic = $oldData->ethnic_id;
            $this->spouseMotherSibling_religion = $oldData->religion_id;
            $this->spouseMotherSibling_place_of_birth = $oldData->place_of_birth;
            $this->spouseMotherSibling_gender = $oldData->gender_id;
            $this->spouseMotherSibling_occupation = $oldData->occupation;
            $this->spouseMotherSibling_address = $oldData->address;
            $this->spouseMotherSibling_relation = $oldData->relation_id;
        } else {

            $this->spouseMotherSibling_name = null;
            $this->spouseMotherSibling_ethnic = null;
            $this->spouseMotherSibling_religion = null;
            $this->spouseMotherSibling_place_of_birth = null;
            $this->spouseMotherSibling_gender = null;
            $this->spouseMotherSibling_occupation = null;
            $this->spouseMotherSibling_address = null;
            $this->spouseMotherSibling_relation = null;

            $this->method = 'create';
        }

        $this->data = StaffDetail\SpouseMotherSibling::datas($this->religions, $this->ethnics, $this->genders, $this->relations);
        $this->add_model = $type;
        $this->submit_form = "save_spouse_mother_siblings_modal";
    }

    public function save_spouse_mother_siblings_modal()
    {
        try {

            $this->validate(
                \App\Livewire\StaffDetail\SpouseMotherSibling::rules(),
                \App\Livewire\StaffDetail\SpouseMotherSibling::messages()
            );
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            $this->dispatch('validation', [
                'type' => 'Validation Error',
                'message' => $errors[0],
            ]);
            return;
        }

        $spouseMotherSibling = new \App\Livewire\StaffDetail\SpouseMotherSibling;

        if ($this->editIndex === null) {
            $this->editId = null;
        }

        $spouseMotherSibling = $spouseMotherSibling->spouseMotherSiblingsCreate($this->editId, $this->staff->id, $this->spouseMotherSibling_name, $this->spouseMotherSibling_ethnic, $this->spouseMotherSibling_religion, $this->spouseMotherSibling_gender, $this->spouseMotherSibling_place_of_birth, $this->spouseMotherSibling_occupation, $this->spouseMotherSibling_address, $this->spouseMotherSibling_relation);

        if ($spouseMotherSibling) {

            $display = [
                'id' => $spouseMotherSibling->id,
                'name' => $spouseMotherSibling->name,
                'ethnic' => $spouseMotherSibling->ethnic->name,
                'religion' => $spouseMotherSibling->religion->name,
                'place_of_birth' => $spouseMotherSibling->place_of_birth,
                'gender_id' => $spouseMotherSibling->gender->name,
                'occupation' => $spouseMotherSibling->occupation,
                'address' => $spouseMotherSibling->address,
                'relation' => $spouseMotherSibling->relation->name,
            ];
            if ($this->editIndex === null) {
                $this->spouse_mother_siblings[] = $display;
                $this->alert_messages = 'Created Successfully!';
            } else {
                $this->spouse_mother_siblings[$this->editIndex] = $display;
                $this->alert_messages = 'Updated successfully!';
            }
        }
        $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);

        $this->add_model = null;
    }



    // ---------------------------------start detail personal info-----------------------------
            // ----------start educations------------

            public $educations_education,$educations_education_type,$educations_education_group,$educations_country_id,$educations_degree_certificate,
            $educations_education_type_text,$educations_education_group_text;
            public $abroads_towns,$abroads_particular,$abroads_abroad_type_id,
            $abroads_training_success_fail,$abroads_training_success_count,
            $abroads_sponser,$abroads_meet_with,$abroads_from_date,$abroads_to_date,
            $abroads_actual_abroad_date,$abroads_position;
            public $abroads_country = [];
    
            public function handleCustomColumnUpdateEducation($index){
                $edu= Education::findOrFail($index);
                $eduG= $edu->education_group;
                $eduT =  $edu->education_type;
                // $educations_education_type_text,$educations_education_group_text;
                $this->educations_education_type_text = $eduT->name;
                $this->educations_education_group_text = $eduG->name;
                $this->educations_education_type = $eduT->id;
                $this->educations_education_group = $eduG->particular;
        
                        // dd($edu->education_group);
        
            }
            public function add_edu_modal($type,$index=null){
                if ($index !== null) {
                    $this->method = 'edit';
                    $this->editIndex = $index;
                    $id = $this->educations[$index]['id'];
                    
                    $oldData = StaffEducation::findOrFail($id);
                    $edu = $oldData->education;
                    $eduG= $edu->education_group;
                    $eduT =  $edu->education_type;
                    // dd($edu);

                    $this->educations_education_type_text = $eduT->name;
                    $this->educations_education_group_text = $eduG->name;

                    $this->educations_education = $oldData->id;
                    $this->educations_education_type = $oldData->particular;
                    $this->educations_education_group = $eduG->id;
                    $this->educations_country_id = $eduT->id;
                    // $this->educations_degree_certificate = $oldData->training_success_fail;
                    $this->educations_degree_certificate = $oldData->degree_certificate;

                    

                } else {
                    $this->educations_education = null;
                    $this->educations_education_type = null;
                    $this->educations_education_group = null;
                    $this->educations_country_id = null;
                    $this->educations_degree_certificate = null;
                

                    $this->method = 'create';
                }
                // dd($this->educations_all); 
                $this->data = ChEducations::datas($this->educations, $this->educations_all, $this->education_types,$this->education_groups,$this->_countries, $this->degree_certificate);

                $this->add_model = $type;
                $this->submit_form = "save_edu_modal";
            }

            public function save_edu_modal()
            {
                try {
                    $this->validate(
                        ChEducations::rules(),
                        ChEducations::messages()
                    );
                } catch (ValidationException $e) {
                    $errors = $e->validator->errors()->all();
                    $this->dispatch('validation', [
                        'type' => 'Validation Error',
                        'message' => $errors[0],
                    ]);
            
                    return;
                }
                if($this->editIndex === null){
                    $this->editId =null;
                }
            
                $chtrainings = new ChEducations;
        
                     $education = $chtrainings->setCreate(
                        $this->editId,
                        $this->staff->id, 
                        $this->educations_education, 
                        $this->educations_education_type, 
                        $this->educations_education_group, 
                        $this->educations_country_id, 
                        $this->educations_degree_certificate, 
                       
                    );
                    
                    if ($education) {
                        $edu = $education->education;
                        $eduG= $edu->education_group;
                        $eduT =  $edu->education_type;
                        $display = [
        
                        'id' => $education->id,
                        'education_group' => $eduG ? $eduG->name : null,
                        'education_type' => $eduT ? $eduT->name : null,
                        'education' => $edu ? $edu->name : null,
                        'country_id' => $education ? $education->country->name : 'Unknown',
                        'degree_certificate' => $education->degree_certificate,
                        ];
        
                        if($this->editIndex === null){
                            $this->educations[] = $display;
                            $this->alert_messages = 'Created Successfully!';
                        }else{
                            $this->educations[$this->editIndex] = $display;
                            $this->alert_messages = 'Updated Successfully!';
        
        
                        }
                    }
            
                
                    $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);
        
                $this->add_model = null;
            }
           
            public function add_schools_modal($type, $index = null)
            {
                if ($index !== null) {
                    $this->method = 'edit';
                    $this->editIndex = $index;
        
                    $id = $this->schools[$index]['id'];
                    $this->editId = $id;
                    $oldData = School::findOrFail($id);
        
                    $this->schools_education_group =  $oldData->education_group_id;
                    $this->schools_education_type =  $oldData->education_type_id;
                    $this->schools_education = $oldData->education;
                    $this->schools_school_name = $oldData->school_name;
                    $this->schools_town = $oldData->town;
                    $this->schools_from_date = $oldData->from_date;
                    $this->schools_to_date = $oldData->to_date;
                    $this->schools_remark =  $oldData->remark;
                } else {
                    $this->schools_education_group = null;
                    $this->schools_education_type = null;
                    $this->schools_education = null;
                    $this->schools_school_name = null;
                    $this->schools_town = null;
                    $this->schools_from_date = null;
                    $this->schools_to_date = null;
                    $this->schools_remark = null;
        
                    $this->method = 'create';
                }
        
                $this->data = ChSchools::datas($this->education_groups, $this->education_types);
                $this->add_model = $type;
                $this->submit_form = "save_schools_modal";
            }

            public function save_schools_modal()
            {
                try {
                    $this->validate(
                        ChSchools::rules(),
                        ChSchools::messages()
                    );
                } catch (ValidationException $e) {
                    $errors = $e->validator->errors()->all();
                    $this->dispatch('validation', [
                        'type' => 'Validation Error',
                        'message' => $errors[0],
                    ]);
                    return;
                }

                $chschools = new ChSchools;

                if ($this->editIndex === null) {
                    $this->editId = null;
                }
                $school = $chschools->schoolCreate(
                    $this->editId,
                    $this->staff->id,
                    $this->schools_education_group,
                    $this->schools_education_type,
                    $this->schools_education,
                    $this->schools_school_name,
                    $this->schools_town,
                    $this->schools_from_date,
                    $this->schools_to_date,
                    $this->schools_remark
                );

                if ($school) {
                    $display = [
                        'id' => $school->id,
                        'education_group' => $school->education_group->name,
                        'education_type' => $school->education_type->name,
                        'education' => $school->education,
                        'school_name' => $school->school_name,
                        'town' => $school->town,
                        'from_date' => $school->from_date,
                        'to_date' => $school->to_date,
                        'remark' => $school->remark,
                    ];

                    if ($this->editIndex === null) {
                        $this->schools[] = $display;
                        $this->alert_messages = 'Created Successfully!';
                    } else {
                        $this->schools[$this->editIndex] = $display;
                        $this->alert_messages = 'Updated successfully!';
                    }
                }


                $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);

                $this->add_model = null;
            }

            #[On('removeSchool')]
            public function removeSchools($index, $id)
            {

                $schools = School::findOrFail($id);

                $schools->delete();
                $this->removeModel('schools', School::class, $index, []);

                $this->dispatch('alert', ['type' => 'success', 'message' => 'Deleted successfully!']);
            }
            // ----------emd schools------------

            // ----------start trainings------------

            public function add_trainings_modal($type, $index = null)
            {
                if ($index !== null) {
                    $this->method = 'edit';
                    $this->editIndex = $index;

                    // -----------------start သင်တန်းအချက်အလက်များ--------------------

                    $id = $this->trainings[$index]['id'];

                    $oldData = Training::findOrFail($id);
                    $this->trainings_training_type = $oldData->training_type_id;
                    $this->trainings_from_date = Carbon::parse($oldData->from_date)->format('Y-m-d');
                    $this->trainings_to_date = Carbon::parse($oldData->to_date)->format('Y-m-d');
                    $this->trainings_location = $oldData->location;
                    $this->trainings_country = $oldData->country_id;
                    $this->trainings_training_location = $oldData->training_location_id;
                    $this->trainings_batch = $oldData->batch;
                    $this->trainings_remark = $oldData->remark;

                    // -----------------end သင်တန်းအချက်အလက်များ--------------------
                } else {
                    // -----------------သင်တန်းအချက်အလက်များ--------------------
                    $this->trainings_training_type = null;
                    $this->trainings_from_date = null;
                    $this->trainings_to_date = null;
                    $this->trainings_location = null;
                    $this->trainings_country = null;
                    $this->trainings_training_location = null;
                    $this->trainings_batch = null;
                    $this->trainings_remark = null;

                    $this->method = 'create';
                }
                // -----------------သင်တန်းအချက်အလက်များ--------------------
                $this->data = ChTrainings::datas($this->training_types, $this->countries, $this->training_locations);

                $this->add_model = $type;
                $this->submit_form = "save_trainings_modal";
            }
            public function save_trainings_modal()
            {
                try {
                    $this->validate(
                        ChTrainings::rules(),
                        ChTrainings::messages()
                    );
                } catch (ValidationException $e) {
                    $errors = $e->validator->errors()->all();
                    $this->dispatch('validation', [
                        'type' => 'Validation Error',
                        'message' => $errors[0],
                    ]);

                    return;
                }
                if ($this->editIndex === null) {
                    $this->editId = null;
                }

                $chtrainings = new ChTrainings;

                $training = $chtrainings->setCreate(
                    $this->editId,
                    $this->staff->id,
                    $this->trainings_training_type,
                    $this->trainings_from_date,
                    $this->trainings_to_date,
                    $this->trainings_location,
                    $this->trainings_country,
                    $this->trainings_training_location,
                    $this->trainings_batch,
                    $this->trainings_remark
                );
                // dd($training);
                // Training::with('training_type')
                // ->with('training_location')->with('country')
                // ->where('staff_id', $staff_id)->get();
                if ($training) {
                    $display = [

                        'id' => $training->id,
                        'training_type' => $training->training_type->name,
                        'batch' => $training->batch,
                        'from_date' => Carbon::parse($training->from_date)->format('d/m/Y'),
                        'to_date' => Carbon::parse($training->to_date)->format('d/m/Y'),
                        'location' => $training->location,
                        'country' => $training->country->name,
                        'training_location' => $training->training_location->name,
                        'remark' => $training->remark,
                    ];

                    if ($this->editIndex === null) {
                        $this->trainings[] = $display;
                        $this->alert_messages = 'Created Successfully!';
                    } else {
                        $this->trainings[$this->editIndex] = $display;
                        $this->alert_messages = 'Updated Successfully!';
                    }
                }

                $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);

                $this->add_model = null;
            }
            // ----------end trainings------------
            // ----------start awards------------

            public function add_awards_modal($type, $index = null)
            {
                if ($index !== null) {
                    $this->method = 'edit';
                    $this->editIndex = $index;
        
                    // -----------------ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်--------------------
                    $id = $this->awards[$index]['id'];
                    $this->editId = $id;
                    $oldData = Awarding::findOrFail($id);
                    $this->awards_award_type = $oldData->award_type_id;
                    $this->awards_award_id = $oldData->award_id;
                    $this->awards_order_no = $oldData->order_no;
                    $this->awards_remark = $oldData->remark;
                    // -----------------ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်--------------------
        
                } else {
                    // -----------------ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်--------------------
                    $this->awards_award_type = null;
                    $this->awards_award_id = null;
                    $this->awards_order_no = null;
                    $this->awards_remark = null;
        
                    $this->method = 'create';
                }
        
        
                // -----------------ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်--------------------
                $this->data = ChAwards::datas($this->award_types, $this->award_id);
        
                $this->add_model = $type;
                $this->submit_form = "save_awards_modal";
            }
        
            public function save_awards_modal()
            {
                try {
                    $this->validate(
                        ChAwards::rules(),
                        ChAwards::messages()
                    );
                } catch (ValidationException $e) {
                    $errors = $e->validator->errors()->all();
                    $this->dispatch('validation', [
                        'type' => 'Validation Error',
                        'message' => $errors[0],
                    ]);
                    return;
                }
        
                $chawards = new ChAwards;
        
                if ($this->editIndex === null) {
                    $this->editId = null;
                }
                $award = $chawards->awardCreate(
                    $this->editId,
                    $this->staff->id,
                    $this->awards_award_type,
                    $this->awards_award_id,
                    $this->awards_order_no,
                    $this->awards_remark
                );
        
                if ($award) {
                    $display = [
                        'id' => $award->id,
                        'award_type' => $award->award_type->name,
                        'award' => $award->award->name,
                        'order_no' => $award->order_no,
                        'remark' => $award->remark,
                    ];
        
                    if ($this->editIndex === null) {
                        $this->awards[] = $display;
                        $this->alert_messages = 'Created Successfully!';
                    } else {
                        $this->awards[$this->editIndex] = $display;
                        $this->alert_messages = 'Updated successfully!';
                    }
                }
        
        
                $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);
        
                $this->add_model = null;
            }
            // ----------end awards------------
            // ----------start abroads------------
            public function add_abroads_modal($type,$index=null){
                if ($index !== null) {
                    $this->method = 'edit';
                    $this->editIndex = $index;
                    $id = $this->abroads[$index]['id'];
        
                    $oldData = Abroad::findOrFail($id);
                    $this->abroads_country = $oldData->countries()->pluck('country_id')->toArray();
                    $this->abroads_towns = $oldData->particular;
                    $this->abroads_particular = $oldData->training_success_fail;
                    $this->abroads_abroad_type_id = $oldData->abroad_type_id;
                    $this->abroads_training_success_fail = $oldData->training_success_fail;
                    $this->abroads_training_success_count = $oldData->training_success_count;
                    $this->abroads_sponser = $oldData->sponser;
                    $this->abroads_meet_with =  $oldData->meet_with;
                    $this->abroads_from_date = $oldData->from_date;
                    $this->abroads_to_date = $oldData->to_date;
                    $this->abroads_actual_abroad_date = $oldData->actual_abroad_date;
                    $this->abroads_position =  $oldData->position;
        
                } else {
                    $this->abroads_country = [];
                    $this->abroads_towns = null;
                    $this->abroads_particular = null;
                    $this->abroads_abroad_type_id = null;
                    $this->abroads_training_success_fail = null;
                    $this->abroads_training_success_count = null;
                    $this->abroads_sponser = null;
                    $this->abroads_meet_with = null;
                    $this->abroads_from_date = null;
                    $this->abroads_to_date = null;
                    $this->abroads_actual_abroad_date = null;
                    $this->abroads_position = null;
        
                    $this->method = 'create';
                }
                // dd($this->abroads_types);
                $this->data = ChAbroads::datas($this->abroads, $this->countries, $this->abroads_types);
        
                $this->add_model = $type;
                $this->submit_form = "save_abroads_modal";
            }
            public function save_abroads_modal(){
                try {
                    $this->validate(
                        ChAbroads::rules(),
                        ChAbroads::messages()
                    );
                } catch (ValidationException $e) {
                    $errors = $e->validator->errors()->all();
                    $this->dispatch('validation', [
                        'type' => 'Validation Error',
                        'message' => $errors[0],
                    ]);
                    return;
                }
            
                $abroads = new ChAbroads;
                
                if($this->editIndex === null){
                    $this->editId = null;
                }
                 $abroad =$abroads->setCreate(
                                $this->editId,
                                $this->staff->id,
                                $this->abroads_country,
                                $this->abroads_towns,
                                $this->abroads_particular,
                                $this->abroads_abroad_type_id,
                                $this->abroads_training_success_fail,
                                $this->abroads_training_success_count,
                                $this->abroads_sponser,
                                $this->abroads_meet_with,
                                $this->abroads_from_date,
                                $this->abroads_to_date,
                                $this->abroads_actual_abroad_date,
                                $this->abroads_position,
                            );
        
                    if($abroad){
                            $display = [
                                'id' => $abroad->id,
                                'country' => $abroad->countries,
                                'particular' => $abroad->particular,
                                'training_success_fail' => $abroad->training_success_fail == 1 ? 'အောင်' : 'မအောင်',
                                'training_success_count' => $abroad->training_success_count,
                                'sponser' => $abroad->sponser,
                                'meet_with' => $abroad->meet_with,
                                'from_date' => $abroad->from_date,
                                'to_date' => $abroad->to_date,
                                'actual_abroad_date' => $abroad->actual_abroad_date,
                                'position' => $abroad->position,
                                'towns' => $abroad->towns,
                                'abroad_type_id' => $abroad->abroad_type_id == 1 ? 'ဟုတ်' : 'မဟုတ်'
                        ];
        
                        if($this->editIndex === null){
                            $this->abroads[] = $display;
                            $this->alert_messages = 'Cerated Successfully!';
                        }else{
                            $this->abroads[$this->editIndex] = $display;
                            $this->alert_messages = 'Updated successfully!';
                        }
                    }
            
               
                $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);
        
                $this->add_model = null;
            }

        
            public function add_punishments_modal($type, $index = null)
            {
                if ($index !== null) {
                    $this->method = 'edit';
                    $this->editIndex = $index;
        
                    // ----------------- Punishments -----------------
                    $id = $this->punishments[$index]['id'];
                    $this->editId = $id;
                    $oldData = Punishment::findOrFail($id);
                    $this->punishments_penalty_type = $oldData->penalty_type_id;
                    $this->punishments_reason = $oldData->reason;
                    $this->punishments_from_date = $oldData->from_date;
                    $this->punishments_to_date = $oldData->to_date;
                    // ----------------- Punishments -----------------
        
                } else {
                    // ----------------- Punishments -----------------
                    $this->punishments_penalty_type = null;
                    $this->punishments_reason = null;
                    $this->punishments_from_date = null;
                    $this->punishments_to_date = null;
        
                    $this->method = 'create';
                }
        
                // ----------------- Punishments -----------------
                $this->data = ChPunishments::datas($this->penalty_types);
        
                $this->add_model = $type;
                $this->submit_form = "save_punishments_modal";
            }
        
        
            public function save_punishments_modal()
            {
                try {
                    $this->validate(
                        ChPunishments::rules(),
                        ChPunishments::messages()
                    );
                } catch (ValidationException $e) {
                    $errors = $e->validator->errors()->all();
                    $this->dispatch('validation', [
                        'type' => 'Validation Error',
                        'message' => $errors[0],
                    ]);
                    return;
                }
        
                $chpunishments = new ChPunishments;
        
                if ($this->editIndex === null) {
                    $this->editId = null;
                }
                $punishment = $chpunishments->punishmentCreate(
                    $this->editId,
                    $this->staff->id,
                    $this->punishments_penalty_type,
                    $this->punishments_reason,
                    $this->punishments_from_date,
                    $this->punishments_to_date
                );
        
                if ($punishment) {
                    $display = [
                        'id' => $punishment->id,
                        'penalty_type' => $punishment->penalty_type->name,
                        'reason' => $punishment->reason,
                        'from_date' => Carbon::parse($punishment->from_date)->format('d/m/Y'),
                        'to_date' => Carbon::parse($punishment->to_date)->format('d/m/Y'),
                    ];
        
                    if ($this->editIndex === null) {
                        $this->punishments[] = $display;
                        $this->alert_messages = 'Created Successfully!';
                    } else {
                        $this->punishments[$this->editIndex] = $display;
                        $this->alert_messages = 'Updated successfully!';
                    }
                }
        
        
                $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);
        
                $this->add_model = null;
            }
            // ----------end punishments------------



    // ---------------------------------end detail personal info-----------------------------


   
    


    
    //-----------------end မတန်း --------------------

   
    
    public function add_socials_modal($type, $index = null)
    {
        if ($index !== null) {

            // dd($index);
            $this->method = 'edit';
            $this->editIndex = $index;

            // ----------------- Socials -----------------
            $id = $this->socials[$index]['id'];
            $this->editId = $id;
            $oldData = SocialActivity::findOrFail($id);
            $this->socials_particular = $oldData->particular;
            $this->socials_remark = $oldData->remark;
            // ----------------- Socials -----------------

        } else {
            // ----------------- Socials -----------------
            $this->socials_particular = null;
            $this->socials_remark = null;

            $this->method = 'create';
        }

        // ----------------- Socials -----------------
        $this->data = ChSocials::datas();

        $this->add_model = $type;
        $this->submit_form = "save_socials_modal";
    }


    public function add_languages_modal($type, $index = null)
    {
        if ($index !== null) {
            $this->method = 'edit';
            $this->editId = $index;
            // ----------------- Languages -----------------
            $id = $this->staff_languages[$index]['id'];

            $oldData = StaffLanguage::findOrFail($id);
            $this->staff_languages_language = $oldData->language_id;
            $this->staff_languages_rank = $oldData->rank;
            $this->staff_languages_writing = $oldData->writing;
            $this->staff_languages_reading = $oldData->reading;
            $this->staff_languages_speaking = $oldData->speaking;
            $this->staff_languages_remark = $oldData->remark;
        } else {
            $this->staff_languages_language = null;
            $this->staff_languages_rank = null;
            $this->staff_languages_writing = null;
            $this->staff_languages_reading = null;
            $this->staff_languages_speaking = null;
            $this->staff_languages_remark = null;

            $this->method = 'create';
        }

        // ----------------- Languages -----------------
        $this->data = ChLanguages::datas($this->languages);

        $this->add_model = $type;
        $this->submit_form = "save_languages_modal";
    }


    // ----------------- start save -----------------
    public function save_socials_modal()
    {
        try {
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            $this->dispatch('validation', [
                'type' => 'Validation Error',
                'message' => $errors[0],
            ]);
            return;
        }

        $chsocials = new ChSocials;

        if ($this->editIndex === null) {
            $this->editId = null;
        }
        $social = $chsocials->socialCreate(
            $this->editId,
            $this->staff->id,
            $this->socials_particular,
            $this->socials_remark
        );

        if ($social) {
            $display = [
                'id' => $social->id,
                'particular' => $social->particular,
                'remark' => $social->remark,
            ];

            if ($this->editIndex === null) {
                $this->socials[] = $display;
                $this->alert_messages = 'Created Successfully!';
            } else {
                $this->socials[$this->editIndex] = $display;
                $this->alert_messages = 'Updated successfully!';
            }
        }


        $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);

        $this->add_model = null;
    }
    public function save_languages_modal()
    {
        try {
            $this->validate(
                ChLanguages::rules(),
                ChLanguages::messages()
            );
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            $this->dispatch('validation', [
                'type' => 'Validation Error',
                'message' => $errors[0],
            ]);

            return;
        }

        $chlanguages = new ChLanguages;

        if ($this->method == 'create') {


            $language = $chlanguages->setCreate(
                $this->staff->id,
                $this->staff_languages_language,
                $this->staff_languages_rank,
                $this->staff_languages_writing,
                $this->staff_languages_reading,
                $this->staff_languages_speaking,
                $this->staff_languages_remark
            );

            if ($language) {
                $this->staff_languages[] = [
                    'id' => $language->id,
                    'language' => $language->language->name,
                    'rank' => $language->rank,
                    'writing' => $language->writing,
                    'reading' => $language->reading,
                    'speaking' => $language->speaking,
                    'remark' => $language->remark,
                ];
            }


            $this->dispatch('alert', ['type' => 'success', 'message' => 'Created successfully!']);
        } else if ($this->method == 'edit') {


            if (array_key_exists($this->editId, $this->staff_languages)) {
                $id = $this->staff_languages[$this->editId]['id'];

                $language = $chlanguages->setEditData(
                    $id,
                    $this->staff->id,
                    $this->staff_languages_language,
                    $this->staff_languages_rank,
                    $this->staff_languages_writing,
                    $this->staff_languages_reading,
                    $this->staff_languages_speaking,
                    $this->staff_languages_remark
                );

                $this->staff_languages[$this->editId] = [
                    'id' => $language->id,
                    'language' => $language->language->name,
                    'rank' => $language->rank,
                    'writing' => $language->writing,
                    'reading' => $language->reading,
                    'speaking' => $language->speaking,
                    'remark' => $language->remark,
                ];
            }


            $this->dispatch('alert', ['type' => 'success', 'message' => 'Updated successfully!']);
        }

        $this->add_model = null;
    }
    public function add_staff_rewards_modal($type, $index = null)
    {
        if ($index !== null) {
            $this->method = 'edit';
            $this->editIndex = $index;

            // ----------------- Rewards -----------------
            $id = $this->staff_rewards[$index]['id'];
            $this->editId = $id;
            $oldData = Reward::findOrFail($id);
            $this->staff_rewards_name = $oldData->name;
            $this->staff_rewards_type = $oldData->type;
            $this->staff_rewards_year = $oldData->year;
            $this->staff_rewards_remark = $oldData->remark;
        } else {
            $this->staff_rewards_name = null;
            $this->staff_rewards_type = null;
            $this->staff_rewards_year = null;
            $this->staff_rewards_remark = null;

            $this->method = 'create';
        }

        // ----------------- Rewards -----------------
        $this->data = ChStaffRewards::datas();

        $this->add_model = $type;
        $this->submit_form = "save_staff_rewards_modal";
    }

    public function save_staff_rewards_modal()
    {
        try {
            $this->validate(
                ChStaffRewards::rules(),
                ChStaffRewards::messages()
            );
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            $this->dispatch('validation', [
                'type' => 'Validation Error',
                'message' => $errors[0],
            ]);
            return;
        }

        $chstaffRewards = new ChStaffRewards;

        if ($this->editIndex === null) {
            $this->editId = null;
        }
        $reward = $chstaffRewards->rewardCeate(
            $this->editId,
            $this->staff->id,
            $this->staff_rewards_name,
            $this->staff_rewards_type,
            $this->staff_rewards_year,
            $this->staff_rewards_remark
        );

        if ($reward) {
            $display = [
                'id' => $reward->id,
                'name' => $reward->name,
                'type' => $reward->type,
                'year' => $reward->year,
                'remark' => $reward->remark,
            ];

            if ($this->editIndex === null) {
                $this->rewards[] = $display;
                $this->alert_messages = 'Created Successfully!';
            } else {
                $this->rewards[$this->editIndex] = $display;
                $this->alert_messages = 'Updated successfully!';
            }
        }


        $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);

        $this->add_model = null;
    }

    public function save_postings_modal()
    {

        try {

            $this->validate(
                ChPostings::rules(),
                ChPostings::messages()
            );
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            $this->dispatch('validation', [
                'type' => 'Validation Error',
                'message' => $errors[0],
            ]);


            return;
        }

        $chpostings = new ChPostings;

        if ($this->method == 'create') {


            $post = $chpostings->setCreate($this->staff->id, $this->postings_rank, $this->postings_from_date, $this->postings_to_date, $this->postings_department, $this->postings_sub_department, $this->postings_location, $this->postings_remark, $this->postings_ministry);

            if ($post) {

                $this->postings[] = [
                    'id' => $post->id,
                    'rank' => $post->rank->name,
                    'from_date' =>  Carbon::parse($post->from_date)->format('d/m/Y'),
                    'to_date' =>  Carbon::parse($post->to_date)->format('d/m/Y'),

                    'post' => $post->post_id,
                    'ministry' => $post->ministry->name,
                    'department' => $post->department->name,
                    'sub_department' => $post->sub_department,

                    'location' => $post->location,
                    'remark' => $post->remark,
                ];
            }


            $this->dispatch('alert', ['type' => 'success', 'message' => 'Created successfully!']);
        } else if ('edit') {

            if (array_key_exists($this->editIndex, $this->postings)) {
                $id = $this->postings[$this->editIndex]['id'];

                $post = $chpostings->setEditData($id, $this->staff->id, $this->postings_rank, $this->postings_from_date, $this->postings_to_date, $this->postings_department, $this->postings_sub_department, $this->postings_location, $this->postings_remark, $this->postings_ministry);

                $this->postings[$this->editId] = [
                    'id' => $post->id,
                    'rank' => $post->rank->name,
                    'from_date' =>  Carbon::parse($post->from_date)->format('d/m/Y'),
                    'to_date' =>  Carbon::parse($post->to_date)->format('d/m/Y'),
                    'post' => $post->post_id,
                    'ministry' => $post->ministry->name,
                    'department' => $post->department->name,
                    'sub_department' => $post->sub_department,
                    'location' => $post->location,
                    'remark' => $post->remark,
                ];
            }


            $this->dispatch('alert', ['type' => 'success', 'message' => 'Updated successfully!']);
        }

        $this->add_model = null;
    }


    // ----------------- end save -----------------


    // ---------------------------start remove  ------
    public function showConfirmRemove($index, $id, $del_method)
    {
        $this->dispatch('showConfirmRemove', index: $index, id: $id, del_method: $del_method);
    }


    #[on('removeMethods')]

    public function siblingShowConfirmRemove($index, $id)
    {

        $this->dispatch('siblingShowConfirmRemove', $index, $id);
    }
    public function fatherSiblingShowConfirmRemove($index, $id)
    {
        $this->dispatch('fatherSiblingShowConfirmRemove', $index, $id);
    }
    public function motherSiblingShowConfirmRemove($index, $id)
    {
        $this->dispatch('motherSiblingShowConfirmRemove', $index, $id);
    }
    public function spouseShowConfirmRemove($index, $id)
    {
        $this->dispatch('spouseShowConfirmRemove', $index, $id);
    }
    public function childrenShowConfirmRemove($index, $id)
    {
        $this->dispatch('childrenShowConfirmRemove', $index, $id);
    }
    public function spouseSiblingShowConfirmRemove($index, $id)
    {
        $this->dispatch('spouseSiblingShowConfirmRemove', $index, $id);
    }
    public function spouseFatherSiblingShowConfirmRemove($index, $id)
    {
        $this->dispatch('spouseFatherSiblingShowConfirmRemove', $index, $id);
    }
    public function spouseMotherSiblingShowConfirmRemove($index, $id)
    {
        $this->dispatch('spouseMotherSiblingShowConfirmRemove', $index, $id);
    }


    #[on('removeMethods')]
    public function removeMethod($index, $id, $del_method)
    {



        if ($del_method == 'removePostings') {
            $postings = Posting::findOrFail($id);
            $postings->delete();
            $this->removeModel('postings', Posting::class, $index, []);
            $this->alert_messages = 'Postings delete successfully!';
        } elseif ($del_method == 'removeSchool') {

            $schools = School::findOrFail($id);
            $schools->delete();
            $this->removeModel('schools', School::class, $index, []);
            $this->alert_messages = 'Schools delete successfully!';
        } elseif ($del_method == 'removeTrainings') {

            $trainings = Training::findOrFail($id);
            $trainings->delete();
            $this->removeModel('trainings', Training::class, $index, []);
            $this->alert_messages = 'Trainings delete successfully!';
        } elseif ($del_method == 'removeAwards') {
            $awards = Awarding::findOrFail($id);
            $awards->delete();
            $this->removeModel('awards', Awarding::class, $index, []);
            $this->alert_messages = 'Awards delete successfully!';
        } elseif ($del_method == 'remove_abroads') {
            $abroad = Abroad::findOrFail($id);
            $abroad->delete();
            $this->removeModel('abroads',  Abroad::class, $index, []);
            $this->alert_messages = 'Abroad delete successfully!';
        } elseif ($del_method == 'removePunishments') {
            $punishments = Punishment::findOrFail($id);
            $punishments->delete();
            $this->removeModel('punishments', Punishment::class, $index, []);
            $this->alert_messages = 'Punishments delete successfully!';
        } elseif ($del_method == 'removeSocials') {
            $socials = SocialActivity::findOrFail($id);
            $socials->delete();
            $this->removeModel('socials', SocialActivity::class, $index, []);
            $this->alert_messages = 'Socials delete successfully!';
        } elseif($del_method == 'removeEdu'){
            $educations = StaffEducation::findOrFail($id);
            if ($educations->degree_certificate) {
                Storage::disk('upload')->delete($educations->degree_certificate);
            }
            $educations->delete();
            $this->removeModel('educations', StaffLanguage::class, $index, []);
            $this->alert_messages = 'Educations deleted successfully!';
            
        }
        
        elseif ($del_method == 'removeLanuages') {
            $languages = StaffLanguage::findOrFail($id);
            $languages->delete();
            $this->removeModel('staff_languages', StaffLanguage::class, $index, []);
            $this->alert_messages = 'Languages delete successfully!';
        } elseif ($del_method == 'removeRewards') {
            $reward = Reward::findOrFail($id);
            $reward->delete();
            $this->removeModel('staff_rewards', Reward::class, $index, []); // Fix model name
            $this->alert_messages = 'Rewards delete successfully!';
        } elseif ($del_method == 'remove_siblings') {
            $sibling = Sibling::findOrFail($id);
            $sibling->delete();
            $this->removeModel('siblings',  Sibling::class, $index, []);
            $this->alert_messages = 'Sibling delete successfully!';
        } elseif ($del_method == 'remove_father_siblings') {
            $fatherSibling = FatherSibling::findOrFail($id);
            $fatherSibling->delete();
            $this->removeModel('father_siblings',  FatherSibling::class, $index, []);
            $this->alert_messages = 'Father Sibling delete successfully!';
        } elseif ($del_method == 'remove_mother_siblings') {
            $motherSibling = MotherSibling::findOrFail($id);
            $motherSibling->delete();
            $this->removeModel('mother_siblings',  MotherSibling::class, $index, []);
            $this->alert_messages = 'Mother Sibling delete successfully!';
        } elseif ($del_method == 'remove_spouses') {
            $spouse = Spouse::findOrFail($id);
            $spouse->delete();
            $this->removeModel('spouses',  Spouse::class, $index, []);
            $this->alert_messages = 'Spouse delete successfully!';
        } elseif ($del_method == 'remove_children') {
            $children = Children::findOrFail($id);
            $children->delete();
            $this->removeModel('children',  Children::class, $index, []);
            $this->alert_messages = 'Children delete successfully!';
        } elseif ($del_method == 'remove_spouse_siblings') {
            $spouseSibling = SpouseSibling::findOrFail($id);
            $spouseSibling->delete();
            $this->removeModel('spouse_siblings',  SpouseSibling::class, $index, []);
            $this->alert_messages = 'Spouse Sibling delete successfully!';
        } elseif ($del_method == 'remove_spouse_father_siblings') {
            $spouseFatherSibling = SpouseFatherSibling::findOrFail($id);
            $spouseFatherSibling->delete();
            $this->removeModel('spouse_father_siblings',  SpouseFatherSibling::class, $index, []);
            $this->alert_messages = 'Spouse Father Sibling delete successfully!';
        } elseif ($del_method == 'remove_spouse_mother_siblings') {
            $spouseMotherSibling = SpouseMotherSibling::findOrFail($id);
            $spouseMotherSibling->delete();
            $this->removeModel('spouse_mother_siblings',  SpouseMotherSibling::class, $index, []);
            $this->alert_messages = 'Spouse Mother Sibling delete successfully!';
        }

        $this->dispatch('alert', ['type' => 'success', 'message' => $this->alert_messages]);
    }

    // ---------------------------start remove  ------


}//end
