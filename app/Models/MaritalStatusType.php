<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaritalStatusType extends Model
{
    use HasFactory;
    public function marital_statuses()
    {
        return $this->hasMany(MaritalStatus::class, 'marital_status_type_id');
    }

}
