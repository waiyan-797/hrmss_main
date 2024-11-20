<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class NotLabourScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->whereHas('payscale', function ($subQuery) {
            $subQuery->where('staff_type_id', '!=', 3);
        });
    }
}
