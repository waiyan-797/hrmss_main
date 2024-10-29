<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    /**
     * Get the rank associated with the salary.
     */
    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }
}
