<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Division;
use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class InvestmentCompanies14 extends Component
{
    public function go_pdf(){
        $yinn_1 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 1);
        });

        $yinn_2 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 2);
        });

        $yinn_3 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 3);
        });

        $yinn_4 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 4);
        });

        $si_man =  Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 11);
        });

        $mu_warda =  Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 8);
        });

        $yinn_mhyint_tin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 7);
        });

        $yinn_kyee_kyat = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 5);
        });

        $si_man_kaine = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 6);
        });

        $company = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 9);
        });

        $hr = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 10);
        });

        $total = Rank::whereHas('staffs', function($query){
            return $query->whereIn('current_division_id', [1, 2, 3, 4, 11, 8, 7, 5, 6, 9, 10]);
        });

        $ranks = Rank::get();
        $data = [
            'ranks' => $ranks,
            'si_man' => $si_man,
            'yinn_1' => $yinn_1,
            'yinn_2' => $yinn_2,
            'yinn_3' => $yinn_3,
            'yinn_4' => $yinn_4,
            'mu_warda' => $mu_warda,
            'yinn_mhyint_tin' => $yinn_mhyint_tin,
            'yinn_kyee_kyat' => $yinn_kyee_kyat,
            'si_man_kaine' => $si_man_kaine,
            'company' => $company,
            'hr' => $hr,
            'total' => $total,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_14', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_14.pdf');
    }
    public function go_word()
{
    $ranks = Rank::get();
   $phpWord = new PhpWord();
   $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]); 
   $section->addText('Investment Companies Report', ['bold' => true, 'size' => 16]);
   $table = $section->addTable(['borderSize' => 16, 'borderColor' => '000000', 'cellMargin' => 80]);
   $table->addRow();
   $table->addCell(1000)->addText("စဥ်", ['bold' => true]);
   $table->addCell(4000)->addText("ရာထူး", ['bold' => true]);
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('စီမံ');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ရင်းနှီး(၁)');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ရင်းနှီး(၂)');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ရင်းနှီး(၃)');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ရင်းနှီး(၄)');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('မူဝါဒ');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ရင်းနှီးမြှင့်တင်');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ရင်းနှီးကြီးကြပ်');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('စီမံကိန်း');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ကုမ္ပဏီ');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('HR');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('စုစုပေါင်း');

   $table->addRow();
    $table->addCell(2000, ['vMerge' => 'continue']);
    $table->addCell(2000, ['vMerge' => 'continue']);
    $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
    $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
                       
    $yinn_1 = Rank::whereHas('staffs', function($query){
        return $query->where('current_division_id', 1);
    });

    $yinn_2 = Rank::whereHas('staffs', function($query){
        return $query->where('current_division_id', 2);
    });

    $yinn_3 = Rank::whereHas('staffs', function($query){
        return $query->where('current_division_id', 3);
    });

    $yinn_4 = Rank::whereHas('staffs', function($query){
        return $query->where('current_division_id', 4);
    });

    $si_man =  Rank::whereHas('staffs', function($query){
        return $query->where('current_division_id', 11);
    });

    $mu_warda =  Rank::whereHas('staffs', function($query){
        return $query->where('current_division_id', 8);
    });

    $yinn_mhyint_tin = Rank::whereHas('staffs', function($query){
        return $query->where('current_division_id', 7);
    });

    $yinn_kyee_kyat = Rank::whereHas('staffs', function($query){
        return $query->where('current_division_id', 5);
    });

    $si_man_kaine = Rank::whereHas('staffs', function($query){
        return $query->where('current_division_id', 6);
    });

    $company = Rank::whereHas('staffs', function($query){
        return $query->where('current_division_id', 9);
    });

    $hr = Rank::whereHas('staffs', function($query){
        return $query->where('current_division_id', 10);
    });

    $total = Rank::whereHas('staffs', function($query){
        return $query->whereIn('current_division_id', [1, 2, 3, 4, 11, 8, 7, 5, 6, 9, 10]);
    });

    $ranks = Rank::get();
    foreach ($ranks as $index => $rank) {
        
    $count_si_man = $si_man->where('id', $rank->id)->count();
    $count_yinn_1 = $yinn_1->where('id', $rank->id)->count();
    $count_yinn_2 = $yinn_2->where('id', $rank->id)->count();
    $count_yinn_3 = $yinn_3->where('id', $rank->id)->count();
    $count_yinn_4 = $yinn_4->where('id', $rank->id)->count();
    $count_mu_warda = $mu_warda->where('id', $rank->id)->count();
    $count_yinn_mhyint_tin = $yinn_mhyint_tin->where('id', $rank->id)->count();
    $count_yinn_kyee_kyat = $yinn_kyee_kyat->where('id', $rank->id)->count();
    $count_si_man_kaine = $si_man_kaine->where('id', $rank->id)->count();
    $count_company = $company->where('id', $rank->id)->count();
    $count_hr = $hr->where('id', $rank->id)->count();
    $count_total = $total->where('id', $rank->id)->count();

        $table->addRow();
        $table->addCell(1000)->addText($index + 1);  
        $table->addCell(4000)->addText($rank->name);  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
        $table->addCell(1000)->addText(en2mm($count_si_man));  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $rank->count_si_man)); 
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
        $table->addCell(1000)->addText(en2mm($count_yinn_1) ); 
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_yinn_1)); 
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
        $table->addCell(1000)->addText(en2mm($count_yinn_2));  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_yinn_2));  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty)); 
        $table->addCell(1000)->addText(en2mm($count_yinn_3));  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_yinn_3));  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty)); 
        $table->addCell(1000)->addText(en2mm($count_yinn_4));  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_yinn_4));  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
        $table->addCell(1000)->addText(en2mm($count_mu_warda));  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_mu_warda) );  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
        $table->addCell(1000)->addText(en2mm($count_yinn_mhyint_tin));  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_yinn_mhyint_tin));  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
        $table->addCell(1000)->addText(en2mm($count_yinn_kyee_kyat) );  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_yinn_kyee_kyat));  
        $table->addCell(1000)->addText( en2mm($rank->allowed_qty)); 
        $table->addCell(1000)->addText(en2mm($count_si_man_kaine)); 
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_si_man_kaine)); 
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
        $table->addCell(1000)->addText(en2mm($count_company));  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_company));  
        $table->addCell(1000)->addText( en2mm($rank->allowed_qty));  
        $table->addCell(1000)->addText(en2mm($count_hr));  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_hr));  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
        $table->addCell(1000)->addText(en2mm($count_total));  
        $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_total));  
        
    }
   
    $divisions = [
        'yinn_1' => 1, 
        'yinn_2' => 2, 
        'yinn_3' => 3, 
        'yinn_4' => 4, 
        'si_man' => 11, 
        'mu_warda' => 8, 
        'yinn_mhyint_tin' => 7, 
        'yinn_kyee_kyat' => 5, 
        'si_man_kaine' => 6, 
        'company' => 9, 
        'hr' => 10,
        'total'=>11
    ];
    
    $divisionData = [];
    
    foreach ($divisions as $key => $divisionId) {
        $divisionData[$key] = Rank::whereHas('staffs', function($query) use ($divisionId) {
            return $query->where('current_division_id', $divisionId);
        })->get();
    }
    
    $totalDivision = array_fill_keys(array_keys($divisions), ['allowed' => 0, 'count' => 0]);

foreach ($ranks as $rank) {
    foreach ($divisions as $divisionName => $divisionId) {
        $totalDivision[$divisionName]['allowed'] += $rank->allowed_qty;
        $totalDivision[$divisionName]['count'] += $rank->{'count_' . $divisionName};
    }
}
$table->addRow();
$table->addCell(1000)->addText();
$table->addCell(4000)->addText('စုစုပေါင်း');
foreach ($divisions as $divisionName => $divisionId) {
    $table->addCell(1000)->addText(en2mm($totalDivision[$divisionName]['allowed']));
    $table->addCell(1000)->addText(en2mm($totalDivision[$divisionName]['count']));
    $table->addCell(1000)->addText(en2mm($totalDivision[$divisionName]['allowed'] - $totalDivision[$divisionName]['count']));
   
}
    $temp_file = storage_path('investment_companies_report.docx');
    $writer = IOFactory::createWriter($phpWord, 'Word2007');
    $writer->save($temp_file);

    return response()->download($temp_file)->deleteFileAfterSend(true);
}
    public function render()
    {
        $yinn_1 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 1);
        });

        $yinn_2 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 2);
        });

        $yinn_3 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 3);
        });

        $yinn_4 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 4);
        });

        $si_man =  Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 11);
        });

        $mu_warda =  Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 8);
        });

        $yinn_mhyint_tin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 7);
        });

        $yinn_kyee_kyat = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 5);
        });

        $si_man_kaine = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 6);
        });

        $company = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 9);
        });

        $hr = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 10);
        });

        $total = Rank::whereHas('staffs', function($query){
            return $query->whereIn('current_division_id', [1, 2, 3, 4, 11, 8, 7, 5, 6, 9, 10]);
        });

        $ranks = Rank::get();

        return view('livewire.investment-companies.investment-companies14',[
            'ranks' => $ranks,
            'si_man' => $si_man,
            'yinn_1' => $yinn_1,
            'yinn_2' => $yinn_2,
            'yinn_3' => $yinn_3,
            'yinn_4' => $yinn_4,
            'mu_warda' => $mu_warda,
            'yinn_mhyint_tin' => $yinn_mhyint_tin,
            'yinn_kyee_kyat' => $yinn_kyee_kyat,
            'si_man_kaine' => $si_man_kaine,
            'company' => $company,
            'hr' => $hr,
            'total' => $total,
        ]);
    }
}
