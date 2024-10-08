<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Payscale;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;


class InvestmentCompanies extends Component
{
    public function go_pdf(){
        $kachin_staffs = Staff::where('current_division_id', 12)->get();
        $kayah_staffs = Staff::where('current_division_id', 13)->get();
        $kayin_staffs = Staff::where('current_division_id', 14)->get();
        $chin_staffs = Staff::where('current_division_id', 15)->get();
        $mon_staffs = Staff::where('current_division_id', 21)->get();
        $rakhine_staffs = Staff::where('current_division_id', 22)->get();
        $shan_staffs = Staff::where('current_division_id', 24)->get();
        $sagaing_staffs = Staff::where('current_division_id', 16)->get();
        $mdy_staffs = Staff::where('current_division_id', 20)->get();
        $npt_staffs = Staff::where('current_division_id', 26)->get();
        $ygn_staffs = Staff::where('current_division_id', 23)->get();
        $head_staffs = Staff::whereHas('current_division', fn ($query) => $query->where('division_type_id', 1))->get();
        $mag_staffs = Staff::where('current_division_id', 19)->get();
        $pagu_staffs = Staff::where('current_division_id', 18)->get();
        $tnty_staffs = Staff::where('current_division_id', 17)->get();
        $aya_staffs = Staff::where('current_division_id', 25)->get();
        $total_staffs = Staff::whereIn('current_division_id', [1, 2, 12, 13, 14, 15, 21, 22, 24, 16, 20, 26, 23, 19, 18, 17, 25])->get();
        $data = [
            'first_payscales' => Payscale::where('staff_type_id', 1)->get(),
            'second_payscales' => Payscale::where('staff_type_id', 2)->get(),
            'kachin_staffs' => $kachin_staffs,
            'kayah_staffs' => $kayah_staffs,
            'kayin_staffs' => $kayin_staffs,
            'chin_staffs' => $chin_staffs,
            'mon_staffs' => $mon_staffs,
            'rakhine_staffs' => $rakhine_staffs,
            'shan_staffs' => $shan_staffs,
            'sagaing_staffs' => $sagaing_staffs,
            'mdy_staffs' => $mdy_staffs,
            'npt_staffs' => $npt_staffs,
            'ygn_staffs' => $ygn_staffs,
            'head_staffs' => $head_staffs,
            'mag_staffs' => $mag_staffs,
            'pagu_staffs' => $pagu_staffs,
            'tnty_staffs' => $tnty_staffs,
            'aya_staffs' => $aya_staffs,
            'total_staffs' => $total_staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf.pdf');
    }

    public function render()
    {
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        $kachin_staffs = Staff::where('current_division_id', 12)->get();
        $kayah_staffs = Staff::where('current_division_id', 13)->get();
        $kayin_staffs = Staff::where('current_division_id', 14)->get();
        $chin_staffs = Staff::where('current_division_id', 15)->get();
        $mon_staffs = Staff::where('current_division_id', 21)->get();
        $rakhine_staffs = Staff::where('current_division_id', 22)->get();
        $shan_staffs = Staff::where('current_division_id', 24)->get();
        $sagaing_staffs = Staff::where('current_division_id', 16)->get();
        $mdy_staffs = Staff::where('current_division_id', 20)->get();
        $npt_staffs = Staff::where('current_division_id', 26)->get();
        $ygn_staffs = Staff::where('current_division_id', 23)->get();
        $head_staffs = Staff::whereHas('current_division', fn ($query) => $query->where('division_type_id', 1))->get();
        $mag_staffs = Staff::where('current_division_id', 19)->get();
        $pagu_staffs = Staff::where('current_division_id', 18)->get();
        $tnty_staffs = Staff::where('current_division_id', 17)->get();
        $aya_staffs = Staff::where('current_division_id', 25)->get();
        $total_staffs = Staff::whereIn('current_division_id', [1, 2, 12, 13, 14, 15, 21, 22, 24, 16, 20, 26, 23, 19, 18, 17, 25])->get();
        return view('livewire.investment-companies.investment-companies',[
            'first_payscales' => $first_payscales,
            'second_payscales' => $second_payscales,
            'kachin_staffs' => $kachin_staffs,
            'kayah_staffs' => $kayah_staffs,
            'kayin_staffs' => $kayin_staffs,
            'chin_staffs' => $chin_staffs,
            'mon_staffs' => $mon_staffs,
            'rakhine_staffs' => $rakhine_staffs,
            'shan_staffs' => $shan_staffs,
            'sagaing_staffs' => $sagaing_staffs,
            'mdy_staffs' => $mdy_staffs,
            'npt_staffs' => $npt_staffs,
            'ygn_staffs' => $ygn_staffs,
            'head_staffs' => $head_staffs,
            'mag_staffs' => $mag_staffs,
            'pagu_staffs' => $pagu_staffs,
            'tnty_staffs' => $tnty_staffs,
            'aya_staffs' => $aya_staffs,
            'total_staffs' => $total_staffs,
        ]);
    }
}
