<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function relationShipType(){
        return $this->belongsTo(RelationShipType::class);
    }

}
