<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    use HasFactory;
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
    public function postings()
{
    return $this->hasMany(Posting::class);
}


}
