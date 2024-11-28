<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;
    public function payscale()
    {
        return $this->belongsTo(Payscale::class);
    }

    public function staff_type()
    {
        return $this->belongsTo(StaffType::class);
    }

    public function staffs()
    {
        return $this->hasMany(Staff::class, 'current_rank_id', 'id');
    }
    public function increments()
    {
        return $this->hasMany(Increment::class, 'increment_rank_id');
    }
    public function postings()
    {
        return $this->hasMany(Posting::class);
    }
    // public function depromotions()
    // {
    //     return $this->hasMany(Depromotion::class, 'previous_rank_id');
    // }
    public function depromotions()
{
    return $this->hasMany(Depromotion::class, 'depromoted_rank_id');
}


public function promotions(){
    return $this->hasMany(Promotion::class);
}


public function StaffCountInRankByYear($selectedYear = null) {
    $year = $selectedYear ? $selectedYear : Carbon::now()->year;
$staffs = Staff::query();
    
    $currentInThatYear = $this->staffs()
    ->where(function ($query) use ($year) {
 
        $query->whereHas('promotion', function ($subQuery) use ($year) {
            $subQuery->whereYear('promotion_date', $year)
                ->orWhere(function ($subSubQuery) use ($year) {
                    $subSubQuery->where('promotion_date', '<', Carbon::create($year, 1, 1)->endOfYear()) 
                        ->where('rank_id', $this->id); 
                });
        });

        $query->orWhere(function ($q) use ($year) {
            $q->doesntHave('promotion')
                ->where('current_rank_date', '<=', Carbon::create($year, 12, 31))
                ->where('current_rank_id', $this->id); 
        })
        
        ;
    })
    ->count();




        return $currentInThatYear;
  
}


}
