<?php
namespace App\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class StaffOrder implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        // $builder->orderBy(
        //     function ($query) {
        //         $query->select('sort_no')
        //             ->from('ranks') // Replace 'ranks' with the name of the related table
        //             ->whereColumn('ranks.id', 'staff.current_rank_id') // Match the keys between tables
        //             ->limit(1); // Ensure it returns one value
        //     },
        //     'desc' 
        // );
       
        $builder->orderBy(
            function ($query) {
                $query->select('sort_no')
                    ->from('ranks') 
                    ->whereColumn('ranks.id', 'staff.current_rank_id') 
                    ->limit(1); 
            },
            'asc' 
        )
        ->orderBy('sort_no', 'asc'); 

    }
}
