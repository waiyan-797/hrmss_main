<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastPayCertificate extends Model
{
    use HasFactory;

    public function staff(){
        return $this->belongsTo(Staff::class);
    }

    public function FromDivision(){
        return $this->belongsTo(Division::class , 'from_division_id' , 'id');
    }


    public function ToDivision(){
        return $this->belongsTo(Division::class , 'to_division_id' , 'id');
    }


    

    

}
