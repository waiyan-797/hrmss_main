<?php

namespace App\Exports;

use App\Models\PA05;
use App\Models\Payscale;
use Illuminate\Contracts\View\View as ViewView;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class PA05Export implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Payscale::all();  // Or any query for the data
    // }

    // public function headings(): array
    // {
    //     return [
    //         'စဥ်',
    //         'ရာထူးအမည်',
    //         'ခွင့်ပြုအင်အား',
    //         'ခန့်ပြီးအင်အား',
    //         'လစ်လပ်အင်အား',
    //     ];
    // }
    public function view(): View
    {
        
        $payscales = Payscale::all();
        return view('exports.payscale', compact('payscales'));
    }


}
