<?php

namespace App\Exports;

use App\Models\PA05;
use Maatwebsite\Excel\Concerns\FromCollection;

class PAExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PA05::all();
    }
}
