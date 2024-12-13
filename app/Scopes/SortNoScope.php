<?php 

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SortNoScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        // $builder->orderBy('sort_no');
        $builder->where('is_dica',true)->orderBy('sort_no');
    }
}
