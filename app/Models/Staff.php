<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Staff extends Model
{
    use HasFactory;

    protected $casts = [
        'increment_date' => 'date',  // Or 'datetime' if you need time as well
    ];

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

    public function mother_ethnic(){
        return $this->belongsTo(Ethnic::class);
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

    public function currentDeptJoinDAate()
    {
        return $this->postings->sortByDesc('from_date')->first()?->from_date;
    }

    public function pension_type()
    {
        return $this->hasOne(PensionType::class, 'id', 'pension_type_id');
    }

    // public function PaidForthisMonth()
    // {
    //     $totalSalary = $this->current_salary;
    //     $OverAllTotalSalary = 0;
    //     $staffLastIncrement = $this->staff->increments->last();
    //     $ActualsalaryForBeforePromotion = 0;
    //     $endOfCurrentMonth = Carbon::now()->endOfMonth(); // End of the current month
    //     $currentDate  = Carbon::now();
    //     $currentPayScale = $this->payscale->min_salary; // just need to use once after the promotion 
    //     $yearsPassed = $endOfCurrentMonth->diffInYears($staffLastIncrement->increment_date);
    //     $isSameMonth = $staffLastIncrement->increment_date->month == $currentDate->month;

    //     $previousRankId = $this->promotion?->last?->previous_rank_id;

    //     $previousBasicPayScale = Rank::find($previousRankId)->first()->payscale->increment;
    //     $lastestIncrement = Increment::where('staff_id', $this->id)->max('increments');

    //     // ရာထူးတိုး 

    //     if ($this->promotion && $this->promotion->isNotEmpty()) {

    //         $PromotionDate = Carbon::parse($this->promotion->last()->promotion_date);
    //         $isInCurrentMonth = $PromotionDate->isSameMonth($currentDate);
    //         $daysBeforePromotion = 0;
    //         $lastActualSalary = 0;


    //         //promotion is in the current month 
    //         if ($isSameMonth && $yearsPassed >= 1) {

    //             $daysBeforePromotion = $PromotionDate->day - 1;

    //             $daysAfterPromotion = $currentDate->endOfMonth()->day - $PromotionDate->day;
    //             $lastActualSalary = $this->salaries->last()?->actual_salary;

    //             $comingIncrement = $lastestIncrement++;

    //             // think about increment 
    //             if ($comingIncrement > 0 && $comingIncrement < 6) {
    //                 $salaryForBeforePromotion =   $lastActualSalary    + $previousBasicPayScale;
    //                 $ActualsalaryForBeforePromotion = ($daysBeforePromotion / 30) * $salaryForBeforePromotion;
    //                 $OverAllTotalSalary += $ActualsalaryForBeforePromotion;
    //                 // $ActualSalaryAfterPromotion =   $daysAfterPromotion


    //                 //after 
    //             }
    //             // think about increment 

    //             //salary after promotion 

    //         }
    //     } else {
    //         $lastActualSalary = $this->salaries->last()?->actual_salary;

    //         $lastestIncrement = Increment::where('staff_id', $this->id)->max('increments');
    //         $comingIncrement = $lastestIncrement++;

    //         if ($comingIncrement > 0 && $comingIncrement < 6) {

    //             $OverAllTotalSalary += $lastActualSalary + $this->payscale->increment;
    //         } else {
    //             $OverAllTotalSalary += $lastActualSalary + ($this->payscale->increment * 5);
    //         }
    //     }


    //     // နှစ်တိုး 




    //     // နှစ်တိုး 

    //     return $OverAllTotalSalary;
    // }



    public function paidForThisMonth($date)
    {
        $totalSalary = $this->current_salary;
        $OverAllTotalSalary = 0;
        $staffLastIncrement = Increment::where('staff_id', $this->id)
            ->orderBy('id', 'desc') // Assuming 'id' or 'created_at' is the column for latest entry
            ->first();
        $ActualsalaryForBeforePromotion = 0;

        // Dates
        $endOfCurrentMonth = Carbon::parse($date)->endOfMonth();
        $currentDate  = Carbon::parse($date);
        $yearsPassed = $endOfCurrentMonth->diffInYears($staffLastIncrement?->increment_date);

        $isSameMonth = Carbon::parse($staffLastIncrement?->increment_date)->month == $currentDate->month;

        // Pay scale values
        $currentPayScale = $this->payscale->min_salary;
        $previousRankId = $this->promotion?->last()?->previous_rank_id;

        $previousBasicPayScale = Rank::where('id', $previousRankId)->first()?->payscale->increment;

        // Check if there is a promotion
        if ($this->promotion && $this->promotion->isNotEmpty()) {
            $PromotionDate = Carbon::parse($this->promotion->last()->promotion_date);
            $isInCurrentMonth = $PromotionDate->isSameMonth($currentDate);
            $daysBeforePromotion = 0;
            $lastActualSalary = 0;

            // Promotion happens in this month
            if ($isSameMonth && $yearsPassed >= 1) {
                $daysBeforePromotion = $PromotionDate->day - 1;
                $daysAfterPromotion = $currentDate->endOfMonth()->day - $PromotionDate->day;
                $lastActualSalary = $this->salaries->last()?->actual_salary;

                $lastestIncrement = Increment::where('staff_id', $this->id)

                    ->max('increments');

                $comingIncrement = $lastestIncrement + 1;

                // Apply increment logic
                if ($comingIncrement > 0 && $comingIncrement <= 5) {
                    $salaryForBeforePromotion = $lastActualSalary + $previousBasicPayScale;
                    $ActualsalaryForBeforePromotion = ($daysBeforePromotion / 30) * $salaryForBeforePromotion;
                    $OverAllTotalSalary += $ActualsalaryForBeforePromotion;

                    // Salary after promotion (apply the same increment logic after promotion)
                    $ActualSalaryAfterPromotion = ($daysAfterPromotion / 30) * ($this->payscale->min_salary + $this->payscale->increment);
                    $OverAllTotalSalary += $ActualSalaryAfterPromotion;
                }
            }
        } else {
            // No promotion in this month
            $lastActualSalary = $this->salaries->last()?->actual_salary;

            $lastestIncrement = Increment::where('staff_id', $this->id)->max('increment_time');
            $comingIncrement = $lastestIncrement + 1;

            if ($comingIncrement > 0 && $comingIncrement <= 5) {
                // Apply increment if it's within the 1-5 range
                $OverAllTotalSalary += $lastActualSalary + $this->payscale->increment;
            } else {
                // Cap increment at 5
                $OverAllTotalSalary += $lastActualSalary + ($this->payscale->increment * 5);
            }
        }

        // Return the final calculated salary for this month
        return $OverAllTotalSalary;
    }


    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function isPromotionThisMonth($date)
    {
        $currentDate  = Carbon::parse($date);

        if ($this->promotion && $this->promotion->isNotEmpty()) {
            $PromotionDate = Carbon::parse($this->promotion->last()->promotion_date);
            $isInCurrentMonth = $PromotionDate->isSameMonth($currentDate);
            $isInCurrentYear = $PromotionDate->isSameYear($currentDate);
            // dd('dd');
            // if ($isSameMonth && $yearsPassed >= 1) {
            return $isInCurrentMonth && $isInCurrentYear;


            // if ($isInCurrentMonth && $isInCurrentYear) {
            //     $PromotionDate = Carbon::parse($this->promotion->last()->promotion_date);

            //     $daysBeforePromotion = $PromotionDate->day - 1;
            //     $daysAfterPromotion = $currentDate->endOfMonth()->day - $PromotionDate->day;
            //     $lastActualSalary = $this->salaries->last()?->actual_salary;

            //     $lastestIncrement = Increment::where('staff_id', $this->id)

            //         ->max('increments');

            //     $comingIncrement = $lastestIncrement + 1;

            //     // Apply increment logic
            //     if ($comingIncrement > 0 && $comingIncrement <= 5) {
            //         $salaryForBeforePromotion = $lastActualSalary + $previousBasicPayScale;
            //         $ActualsalaryForBeforePromotion = ($daysBeforePromotion / 30) * $salaryForBeforePromotion;
            //         $OverAllTotalSalary += $ActualsalaryForBeforePromotion;

            //         // Salary after promotion (apply the same increment logic after promotion)
            //         $ActualSalaryAfterPromotion = ($daysAfterPromotion / 30) * ($this->payscale->min_salary + $this->payscale->increment);
            //         $OverAllTotalSalary += $ActualSalaryAfterPromotion;
            //     }
            // }
        }
    }


    public function isIncrementInThisMonth($date)
    {
        $filterDate = Carbon::parse($date)->format('Y-m-d');
        $endOfCurrentMonth = Carbon::parse($date)->endOfMonth();
        $staffLastIncrement = Increment::where('staff_id', $this->id);

        $yearsPassed = $endOfCurrentMonth->diffInYears($staffLastIncrement?->increment_date);

        $isSameMonth = Carbon::parse($staffLastIncrement?->increment_date)->month == $currentDate->month;
        // if ($isSameMonth && $yearsPassed >= 1) { 
        $daysBeforePromotion = $PromotionDate->day - 1;
        $daysAfterPromotion = $currentDate->endOfMonth()->day - $PromotionDate->day;
        $lastActualSalary = $this->salaries->last()?->actual_salary;

        $lastestIncrement = Increment::where('staff_id', $this->id)

            ->max('increments');

        $comingIncrement = $lastestIncrement + 1;

        // Apply increment logic
        if ($comingIncrement > 0 && $comingIncrement <= 5) {
            // $salaryForBeforePromotion = $lastActualSalary + $previousBasicPayScale;
            $ActualsalaryForBeforePromotion = ($daysBeforePromotion / 30) * $salaryForBeforePromotion;
            $OverAllTotalSalary += $ActualsalaryForBeforePromotion;

            // Salary after promotion (apply the same increment logic after promotion)
            $ActualSalaryAfterPromotion = ($daysAfterPromotion / 30) * ($this->payscale->min_salary + $this->payscale->increment);
            $OverAllTotalSalary += $ActualSalaryAfterPromotion;
        }
    }


    public function stuffSalaryYear($year)
    {
        $year = Carbon::parse($year);
        $list = Salary::whereMonth('created_at', $year->isCurrentYear())->whereYear('creaed_at'->get());
    }
}
