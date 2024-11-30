<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model
{
    use HasFactory;
    public function marital_status_type()
    {
        return $this->belongsTo(MaritalStatusType::class, 'marital_status_type_id');
    }

}
