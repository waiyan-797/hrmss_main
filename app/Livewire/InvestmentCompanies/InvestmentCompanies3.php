<?php

namespace App\Livewire\InvestmentCompanies;

use App\Exports\PA03;
use App\Models\Rank;
use App\Models\Staff;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;



class InvestmentCompanies3 extends Component
{

    // public $selected

    public $year, $month, $filterRange;
    public $previousYear, $previousMonthDate, $previousMonth;
     public $count=0;
    public function go_pdf(){
        $count=0;
        $data = [
            'count'=>$count,
            'first_ranks' => Rank::where('staff_type_id', 1)->get(),
            'second_ranks' => Rank::where('staff_type_id', 2)->get(),
           
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_3', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_3.pdf');
    }
    public function go_excel() 
    {
        return Excel::download(new PA03($this->year,$this->month,$this->filterRange,$this->previousMonthDate,$this->previousMonth
    ),'PA03.xlsx');
    }
  
    public function go_word()
{
    $first_ranks = Rank::where('staff_type_id', 1)->get();
    $second_ranks = Rank::where('staff_type_id', 2)->get();
    $phpWord = new PhpWord();
    $section = $phpWord->addSection();
    $section->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', ['bold' => true], ['align' => 'center']);
    $tableStyle = ['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80];
    $phpWord->addTableStyle('RanksTable', $tableStyle);
    $table = $section->addTable('RanksTable');
    $table->addRow();
    $table->addCell(2000)->addText('စဥ်');
    $table->addCell(4000)->addText('ရာထူးအမည်');
    $table->addCell(3000)->addText('လစာနှုန်း (ကျပ်)');
    $table->addCell(3000)->addText('ခွင့်ပြုအင်အား');
    $table->addCell(3000)->addText('ခန့်ပြီးအင်အား');
    $table->addCell(3000)->addText('လစ်လပ်အင်အား');

    
    foreach ($first_ranks as $index => $rank) {
        $table->addRow();
        $table->addCell(2000)->addText($index + 1);
        $table->addCell(4000)->addText($rank->name);
        $table->addCell(3000)->addText($rank->payscale->name);
        $table->addCell(3000)->addText(en2mm($rank->allowed_qty));
        $table->addCell(3000)->addText(en2mm($rank->staffs->count()));
        $table->addCell(3000)->addText(en2mm($rank->allowed_qty - $rank->staffs->count()));
    }

   
    $table->addRow();
    $table->addCell(2000, ['gridSpan' => 3])->addText($first_ranks[0]->staff_type->name . 'စုစုပေါင်း', ['bold' => true],['align'=>'center']);
    $table->addCell(3000)->addText(en2mm($first_ranks->sum('allowed_qty')), ['bold' => true]);
    $table->addCell(3000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->count())), ['bold' => true]);
    $table->addCell(3000)->addText(en2mm($first_ranks->sum('allowed_qty') - $first_ranks->sum(fn($rank) => $rank->staffs->count())), ['bold' => true]);
    foreach ($second_ranks as $index => $rank) {
        $table->addRow();
        $table->addCell(2000)->addText($index + 1);
        $table->addCell(4000)->addText($rank->name);
        $table->addCell(3000)->addText($rank->payscale->name);
        $table->addCell(3000)->addText(en2mm($rank->allowed_qty));
        $table->addCell(3000)->addText(en2mm($rank->staffs->count()));
        $table->addCell(3000)->addText(en2mm($rank->allowed_qty - $rank->staffs->count()));
    }
    $table->addRow();
    $table->addCell(2000, ['gridSpan' => 3])->addText($second_ranks[0]->staff_type->name . 'စုစုပေါင်း', ['bold' => true],['align'=>'center']);
    $table->addCell(3000)->addText(en2mm($second_ranks->sum('allowed_qty')), ['bold' => true]);
    $table->addCell(3000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->count())), ['bold' => true]);
    $table->addCell(3000)->addText(en2mm($second_ranks->sum('allowed_qty') - $second_ranks->sum(fn($rank) => $rank->staffs->count())), ['bold' => true]);
    $tempFile = tempnam(sys_get_temp_dir(), 'investment_companies_') . '.docx';
    $phpWord->save($tempFile, 'Word2007');
    return response()->download($tempFile, 'investment_companies_report.docx')->deleteFileAfterSend(true);
}

    public function mount()
    {
        $this->filterRange = Carbon::now()->format('Y-m'); // Format: 'YYYY-MM'
    }
    public function render()
    {
        [$year, $month] = explode('-', $this->filterRange);
        $this->year = $year;
        $this->month = $month;
        $previousMonthDate = Carbon::createFromDate($this->year, $this->month)->subMonth();
        $this->previousYear = $previousMonthDate->year;
        $this->previousMonth = $previousMonthDate->month;

        $first_ranks = Rank::where('staff_type_id', 1)->get();
        $second_ranks = Rank::where('staff_type_id', 2)->get();
        
        

        
        return view('livewire.investment-companies.investment-companies3',[
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks
        ]);
    }
}
