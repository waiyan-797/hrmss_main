<?php

namespace App\Livewire;

use App\Models\Division;
use App\Models\LetterType;
use App\Models\Payscale;
use Illuminate\Http\Request;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\SimpleType\Jc;

class VacancyOverByDivision extends Component
{
    public $letter_types;
    public $count = 0 ;
    public $divisionName;
    public $divisions ;
    public $selectedDivisionId ;
    public function mount($divisionName = null ){
        $this->letter_types  = LetterType::all();
        $this->divisions = Division::all();
        $this->divisionName = $divisionName;
        
    }
    public function go_pdf() {
       
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        $total_allowed_qty = $first_payscales->sum('allowed_qty') + $second_payscales->sum('allowed_qty');
        $total_staff_count = $first_payscales->sum('staff_count') + $second_payscales->sum('staff_count');
        $total_vacant_positions = $first_payscales->sum('vacant_positions') + $second_payscales->sum('vacant_positions');
        $data = [
            'first_payscales' => $first_payscales,
            'second_payscales' => $second_payscales,
            'selectedDivisionId' => $this->selectedDivisionId,
            'total_allowed_qty' => $total_allowed_qty,
            'total_staff_count' => $total_staff_count,
            'total_vacant_positions' => $total_vacant_positions,
        ];
        $pdf = PDF::loadView('pdf_reports.vacancy_over_by_division', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'vacancy_over_by_division.pdf');
    }
public function go_word()
{

    $first_payscales = Payscale::where('staff_type_id', 1)->get();
    $second_payscales = Payscale::where('staff_type_id', 2)->get();
    $total_allowed_qty = $first_payscales->sum('allowed_qty') + $second_payscales->sum('allowed_qty');
    $total_staff_count = $first_payscales->sum('staff_count') + $second_payscales->sum('staff_count');
    $total_vacant_positions = $first_payscales->sum('vacant_positions') + $second_payscales->sum('vacant_positions');
    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    $section = $phpWord->addSection([
    'orientation' => 'portrait', 
    'paperSize' => 'A4',        
    'marginTop' => 0.5 * 1440,   
    'marginLeft' => 1 * 1440,
    'marginBottom' => 0.7 * 1440,
    'marginRight' => 0.65 * 1440,

    ]);
    if (!is_null($this->selectedDivisionId)) {
        $divisionName = getDivisionBy($this->selectedDivisionId)->name;
        $section->addText($divisionName, ['bold' => true, 'size' => 14], ['align' => 'center']);
    } else {
        $section->addText('', ['bold' => true, 'size' => 14], ['align' => 'center']);
    }
    $section->addText(
        'ဖွဲ့စည်းပုံ ၊ ခွင့်ပြု ၊ လစ်လပ်အင်အားစာရင်း', 
        ['bold' => true, 'size' => 14], 
        ['align' => 'center']
    );
    $tableStyle = [
        'alignment' => Jc::END,
    ];
    $table = $section->addTable($tableStyle);
    $table->addRow();
    $table->addCell(12000)->addText();
    $table->addCell(3000)->addText();
    $table->addCell(5000)->addText( en2mm(getTdyDateInMyanmarYearMonthDay(2)),null,['align'=>'right']);
    $pStyle_1 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
    $pStyle_2 = ['align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 30];
    $pStyle_3 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
    $section->addTextBreak();
    $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000']);
    // $table->addRow();
    $table->addRow(50, ['tblHeader' => true]);
    $table->addCell(1500)->addText('စဉ်', ['bold' => true],['align' => 'center']);
    $table->addCell(6000)->addText('ရာထူးအမည်', ['bold' => true],['align' => 'center']);
    $table->addCell(4000)->addText('ဖွဲ့စည်းပုံ', ['bold' => true] ,['align' => 'center']);
    $table->addCell(4000)->addText('ခန့်ထားအင်အား', ['bold' => true],['align' => 'center']);
    $table->addCell(4000)->addText('လစ်လပ်အင်အား', ['bold' => true],['align' => 'center']);
    $table->addCell(4000)->addText('မှတ်ချက်', ['bold' => true],['align' => 'center']);
    $count = 1; 
    foreach ($first_payscales as $payscale) {
        foreach ($payscale->ranks as $rank) {
            $staff_count = $rank->staffs->filter(fn($staff) => $staff->current_division_id == 1)->count();
            $vacant_positions = $rank->allowed_qty - $staff_count;

            $table->addRow();
            $table->addCell(1500)->addText(en2mm($count++),null,$pStyle_3);
            $table->addCell(6000)->addText($rank->name,null,$pStyle_2);
            $table->addCell(4000)->addText(en2mm($rank->allowed_qty),null,$pStyle_1);
            $table->addCell(4000)->addText(en2mm($staff_count),null,$pStyle_1);
            $table->addCell(4000)->addText(en2mm($vacant_positions),null,$pStyle_2);
            $table->addCell(4000)->addText('');
        }
    }
    foreach ($second_payscales as $payscale) {
        foreach ($payscale->ranks as $rank) {
            $staff_count = $rank->staffs->filter(fn($staff) => $staff->current_division_id == 1)->count();
            $vacant_positions = $rank->allowed_qty - $staff_count;

            $table->addRow();
            $table->addCell(1500)->addText(en2mm($count++),null,$pStyle_3);
            $table->addCell(6000)->addText($rank->name,null,$pStyle_2);
            $table->addCell(4000)->addText(en2mm($rank->allowed_qty),null,$pStyle_1);
            $table->addCell(4000)->addText(en2mm($staff_count),null,$pStyle_1);
            $table->addCell(4000)->addText(en2mm($vacant_positions),null,$pStyle_2);
            $table->addCell(4000)->addText('');
        }
    }

    // Add totals row
    $table->addRow();
    $table->addCell(1500)->addText('');
    $table->addCell(5000)->addText('ပေါင်း',null,$pStyle_3, ['bold' => true],['align' => 'center']);
    $table->addCell(4000)->addText(en2mm($total_allowed_qty), ['bold' => true],['align' => 'center']);
    $table->addCell(4000)->addText(en2mm($total_staff_count), ['bold' => true],['align' => 'center']);
    $table->addCell(4000)->addText(en2mm($total_vacant_positions), ['bold' => true],['align' => 'center']);
    $table->addCell(4000)->addText('', ['bold' => true]);

  
    $writer = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    return response()->streamDownload(function () use ($writer) {
        $writer->save('php://output');
    }, 'vacancy_over_by_division_report.docx');
}
    public function render()
    {

        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        return view('livewire.vacancy-over-by-division' ,
    [
        'first_payscales' => $first_payscales,
             'second_payscales' => $second_payscales,
    ]
    );
    }
}
