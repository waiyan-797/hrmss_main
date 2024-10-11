<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    public function staff_educations()
    {
        return $this->hasMany(StaffEducation::class);
    }

    public function ethnic()
    {
        return $this->belongsTo(Ethnic::class);
    }
    public function currentRank()
    {
        return $this->belongsTo(Rank::class, 'current_rank_id');
    }
    public function educationGroup()
    {
        return $this->belongsTo(EducationGroup::class, 'education_group_id'); //
    }
    public function educationType()
    {
        return $this->belongsTo(EducationType::class, 'education_type_id');
    }
    public function education()
    {
        return $this->belongsTo(Education::class, 'education_id');
    }
    public function pension_types()
    {
        return $this->hasMany(pensionType::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function siblings()
    {
        return $this->hasMany(Sibling::class);
    }
    public function fatherSiblings()
    {
        return $this->hasMany(FatherSibling::class);
    }
    public function motherSiblings()
    {
        return $this->hasMany(MotherSibling::class);
    }


    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function blood_type()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function promotion()
    {
        return $this->hasMany(Promotion::class);
    }




    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
    public function increments()
    {
        return $this->hasMany(Increment::class);
    }
    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
    public function ministry()
    {
        return $this->belongsTo(Ministry::class);
    }
    public function payscale()
    {
        return $this->belongsTo(Payscale::class);
    }



    public function nrc_region_id()
    {
        return $this->belongsTo(NrcRegionId::class);
    }

    public function nrc_township_code()
    {
        return $this->belongsTo(NrcTownshipCode::class);
    }

    public function nrc_sign()
    {
        return $this->belongsTo(NrcSign::class);
    }

    public function spouses()
    {
        return $this->hasMany(Spouse::class);
    }
    public function spouseSiblings()
    {
        return $this->hasMany(SpouseSibling::class);
    }
    public function spouseFatherSiblings()
    {
        return $this->hasMany(SpouseFatherSibling::class);
    }
    public function spouseMotherSiblings()
    {
        return $this->hasMany(SpouseMotherSibling::class);
    }

    public function children()
    {
        return $this->hasMany(Children::class);
    }

    public function current_address_region()
    {
        return $this->belongsTo(Region::class);
    }
    public function postings()
    {
        return $this->hasMany(Posting::class);
    }

    public function current_address_district()
    {
        return $this->belongsTo(District::class);
    }

    public function current_address_township_or_town()
    {
        return $this->belongsTo(Township::class);
    }

    public function permanent_address_region()
    {
        return $this->belongsTo(Region::class);
    }

    public function permanent_address_district()
    {
        return $this->belongsTo(District::class);
    }

    public function permanent_address_township_or_town()
    {
        return $this->belongsTo(Township::class);
    }

    public function current_rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function current_department()
    {
        return $this->belongsTo(Department::class);
    }

    public function past_occupations()
    {
        return $this->hasMany(PastOccupation::class);
    }

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    public function punishments()
    {
        return $this->hasMany(Punishment::class);
    }

    public function awardings()
    {
        return $this->hasMany(Awarding::class);
    }
    public function awards()
    {
        return $this->hasMany(Award::class);
    }

    public function abroads()
    {
        return $this->hasMany(Abroad::class);
    }

    public function schools()
    {
        return $this->hasMany(School::class);
    }

    public function staff_languages()
    {
        return $this->hasMany(StaffLanguage::class);
    }

    public function side_department()
    {
        return $this->belongsTo(Department::class);
    }

    public function current_division()
    {
        return $this->belongsTo(Division::class);
    }
    public function marital_statuses()
    {
        return $this->belongsTo(MaritalStatus::class);
    }
    public function socialActivities()
    {
        return $this->hasMany(SocialActivity::class);
    }


    // Retire 
    public function retire()
    {
        return $this->belongsTo(RetireType::class, 'retire_type_id');
    }

    public function familyPensionInheritor()
    {
        return $this->belongsTo(Relation::class, 'family_pension_inheritor_relation_id');
    }
}
