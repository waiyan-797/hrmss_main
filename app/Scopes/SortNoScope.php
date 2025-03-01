<?php 

namespace App\Scopes;

use App\Livewire\Rank\Rank;
use App\Models\Division;
use App\Models\Rank as ModelsRank;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use PhpParser\Node\Stmt\If_;

class SortNoScope implements Scope
{   
    public function apply(Builder $builder, Model $model)
    {
        if($model instanceof  ModelsRank){
            $builder->where('is_dica',true) ;
           
        }


        $builder->orderBy('sort_no');
        
        
       
       
    }
}
