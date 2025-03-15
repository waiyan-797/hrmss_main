<?php

namespace App\Livewire;

use Livewire\Component;
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
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;


class StaffDetailController extends Component
{

    public $message, $confirm_add, $confirm_edit, $staff_id, $tab;
    public $staff;
    //model 
    public  $add_model;

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

    //personal_info
    public $nrc_township_codes = [];
    public $current_address_townships = [];
    public $permanent_address_townships = [];
    public $staff_photo, $staff_nrc_front, $staff_nrc_back, $photo, $name, $nick_name, $other_name, $staff_no, $dob, $attendid, $gpms_staff_no, $spouse_name, $gender_id,
        $ethnic_id, $religion_id, $height_feet, $height_inch, $hair_color, $eye_color,
        $government_staff_started_date, $prominent_mark, $skin_color, $weight, $blood_type_id,
        $marital_status_id, $place_of_birth, $nrc_region_id, $nrc_township_code_id, $nrc_sign_id, $nrc_code, $nrc_front, $nrc_back, $phone, $mobile, $email, $current_address_street, $current_address_ward, $current_address_house_no, $current_address_region_id,  $current_address_township_or_town_id, $permanent_address_street, $permanent_address_ward, $permanent_address_house_no, $permanent_address_region_id, $permanent_address_township_or_town_id, $previous_addresses, $life_insurance_proposal, $life_insurance_policy_no, $life_insurance_premium, $military_solider_no, $military_join_date, $military_dsa_no, $military_gazetted_date, $military_leave_date, $military_leave_reason, $military_served_army, $military_brief_history_or_penalty, $military_pension, $military_gazetted_no, $veteran_no, $veteran_date, $last_serve_army, $health_condition, $tax_exception, $military_service_id;
    public $leave_search, $leave_name, $leave_type_name, $leave_id, $staff_name, $from_date, $to_date, $qty, $order_no, $remark;
    public $cancel_action, $submit_form, $leave_types;



    public function render()
    {


        return view('livewire.staff-detail');
    }
}
