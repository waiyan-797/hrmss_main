<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    public function staff_educations(){
        return $this->hasMany(StaffEducation::class);
    }

    public function ethnic(){
        return $this->belongsTo(Ethnic::class);
    }

    public function religion(){
        return $this->belongsTo(Religion::class);
    }

    public function blood_type(){
        return $this->belongsTo(BloodType::class);
    }

    public function rank(){
        return $this->belongsTo(Rank::class);
    }

    public function gender() {
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



    public function nrc_region_id(){
        return $this->belongsTo(NrcRegionId::class);
    }

    public function nrc_township_code(){
        return $this->belongsTo(NrcTownshipCode::class);
    }

    public function nrc_sign(){
        return $this->belongsTo(NrcSign::class);
    }

    public function spouses(){
        return $this->hasMany(Spouse::class);
    }

    public function children(){
        return $this->hasMany(Children::class);
    }

    public function current_address_region(){
        return $this->belongsTo(Region::class);
    }

    public function current_address_district(){
        return $this->belongsTo(District::class);
    }

    public function current_address_township_or_town(){
        return $this->belongsTo(Township::class);
    }

    public function permanent_address_region(){
        return $this->belongsTo(Region::class);
    }

    public function permanent_address_district(){
        return $this->belongsTo(District::class);
    }

    public function permanent_address_township_or_town(){
        return $this->belongsTo(Township::class);
    }

    public function current_rank(){
        return $this->belongsTo(Rank::class);
    }

    public function current_department(){
        return $this->belongsTo(Department::class);
    }

    public function past_occupations(){
        return $this->hasMany(PastOccupation::class);
    }

    public function trainings(){
        return $this->hasMany(Training::class);
    }

    public function punishments(){
        return $this->hasMany(Punishment::class);
    }

    public function awardings(){
        return $this->hasMany(Awarding::class);
    }

    public function abroads(){
        return $this->hasMany(Abroad::class);
    }

    public function schools(){
        return $this->hasMany(School::class);
    }

    public function staff_languages(){
        return $this->hasMany(StaffLanguage::class);
    }
}
