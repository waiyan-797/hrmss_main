<?php

namespace App\Livewire;

use App\Models\Division;
use App\Models\LetterType;
use App\Models\Payscale;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class VacancyOverByDivision extends Component
{

    public $letter_types     ;
    public $count = 0 ;

    public $divisions ;
    public $selectedDivisionId ;
    public function mount( ){
        $this->letter_types  = LetterType::all();
        $this->divisions = Division::all();
        
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
    // Retrieve Payscale data for two types of staff
    $first_payscales = Payscale::where('staff_type_id', 1)->get();
    $second_payscales = Payscale::where('staff_type_id', 2)->get();

    // Calculate totals for staff quantities, staff counts, and vacant positions
    $total_allowed_qty = $first_payscales->sum('allowed_qty') + $second_payscales->sum('allowed_qty');
    $total_staff_count = $first_payscales->sum('staff_count') + $second_payscales->sum('staff_count');
    $total_vacant_positions = $first_payscales->sum('vacant_positions') + $second_payscales->sum('vacant_positions');

    // Create Word document
    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    $section = $phpWord->addSection();
    $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000']);

    // Table headers
    $table->addRow();
    $table->addCell(1000)->addText('စဉ်', ['bold' => true]);
    $table->addCell(2000)->addText('ရာထူးအမည်', ['bold' => true]);
    $table->addCell(2000)->addText('ဖွဲ့စည်းပုံ', ['bold' => true]);
    $table->addCell(2000)->addText('ခန့်ထားအင်အား', ['bold' => true]);
    $table->addCell(2000)->addText('လစ်လပ်အင်အား', ['bold' => true]);
    $table->addCell(2000)->addText('မှတ်ချက်', ['bold' => true]);

    // Populate table with payscale data
    $count = 1; // For numbering the rows
    foreach ($first_payscales as $payscale) {
        foreach ($payscale->ranks as $rank) {
            $staff_count = $rank->staffs->filter(fn($staff) => $staff->current_division_id == 1)->count();
            $vacant_positions = $rank->allowed_qty - $staff_count;

            $table->addRow();
            $table->addCell(1000)->addText($count++);
            $table->addCell(2000)->addText($rank->name);
            $table->addCell(2000)->addText(en2mm($rank->allowed_qty));
            $table->addCell(2000)->addText(en2mm($staff_count));
            $table->addCell(2000)->addText(en2mm($vacant_positions));
            $table->addCell(2000)->addText('');
        }
    }

    // Populate second payscales
    foreach ($second_payscales as $payscale) {
        foreach ($payscale->ranks as $rank) {
            $staff_count = $rank->staffs->filter(fn($staff) => $staff->current_division_id == 1)->count();
            $vacant_positions = $rank->allowed_qty - $staff_count;

            $table->addRow();
            $table->addCell(1000)->addText($count++);
            $table->addCell(2000)->addText($rank->name);
            $table->addCell(2000)->addText(en2mm($rank->allowed_qty));
            $table->addCell(2000)->addText(en2mm($staff_count));
            $table->addCell(2000)->addText(en2mm($vacant_positions));
            $table->addCell(2000)->addText('');
        }
    }

    // Add totals row
    $table->addRow();
    $table->addCell(1000)->addText('');
    $table->addCell(2000)->addText('ပေါင်း', ['bold' => true]);
    $table->addCell(2000)->addText(en2mm($total_allowed_qty), ['bold' => true]);
    $table->addCell(2000)->addText(en2mm($total_staff_count), ['bold' => true]);
    $table->addCell(2000)->addText(en2mm($total_vacant_positions), ['bold' => true]);
    $table->addCell(2000)->addText('', ['bold' => true]);

    // Stream the Word document for download
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
