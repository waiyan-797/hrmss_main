<?php

namespace App\Livewire\ReligionReport;

use App\Models\Religion;
use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;

class ReligionReport extends Component
{
    use WithPagination;
    public $selectedReligion = null;
    public $selectedGender = null;
    
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.religion_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'religion_report_pdf.pdf');
    }
    public function go_word() {
    $query = Staff::query();
    if ($this->selectedReligion) {
        $query->where('religion_id', $this->selectedReligion);
    }

    $staffs = $query->get(); 
        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'pageSizeW'    => Converter::inchToTwip(11),  // Letter width in landscape (11 inches)
            'pageSizeH'    => Converter::inchToTwip(8.5), // Letter height in landscape (8.5 inches)
            'orientation'  => 'landscape',
            'marginTop'    => Converter::inchToTwip(0.7),
            'marginBottom' => Converter::inchToTwip(0.7),
            'marginLeft'   => Converter::inchToTwip(1),
            'marginRight'  => Converter::inchToTwip(1),
        ]);
        
        // $section->addTitle('Religion Report', 1);
        $phpWord->setDefaultFontSize(12); 
        $section->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', ['bold' => true, 'size' => 11], ['align' => 'center']);
        $religionName = $this->selectedReligion ? Religion::find($this->selectedReligion)->name : 'All Religions';


        $section->addText('Religion Report'.'('.$religionName.')', ['bold' => true, 'size' => 11], ['align' => 'center']);
        $tableStyle = [
            'borderColor' => '000000',
            'borderSize' => 6,
            'cellMargin' => 8,
        ];
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 350, 'spaceBefore' => 350];
        $pStyle_2 = ['align' => 'center', 'spaceAfter' => 300, 'spaceBefore' => 300];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $phpWord->addTableStyle('Staff Table', $tableStyle);
        $table = $section->addTable('Staff Table');
        // $table->addRow();
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(1500, ['vMerge' => 'restart'])->addText('စဥ်',['bold' => true], $pStyle_1);
        $table->addCell(5000, ['vMerge' => 'restart'])->addText('အမည်',['bold' => true], $pStyle_1);
        $table->addCell(5000, ['vMerge' => 'restart'])->addText('ရာထူး',['bold' => true], $pStyle_1);
        $table->addCell(4000, ['gridSpan' => 2])->addText('ဗုဒ္ဓဘာသာ',['bold'=>true],$pStyle_2);
        $table->addCell(4000, ['gridSpan' => 2])->addText("ခရစ်ယာန်\nဘာသာ",['bold'=>true],$pStyle_2);
        $table->addCell(4000, ['gridSpan' => 2])->addText("ဟိန္ဒူ\nဘာသာ",['bold'=>true],$pStyle_2);
        $table->addCell(4000, ['gridSpan' => 2])->addText("အစ္စလာမ်\nဘာသာ",['bold'=>true],$pStyle_2);
        $table->addCell(4000, ['gridSpan' => 2])->addText('အခြား',['bold'=>true],$pStyle_1);
        $table->addCell(3000, ['vMerge' => 'restart'])->addText('မှတ်ချက်',['bold'=>true],$pStyle_1);
        // $table->addRow();
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(3000, ['vMerge' => 'continue']);
        $table->addCell(3000, ['vMerge' => 'continue']);
        $table->addCell(5000, ['vMerge' => 'continue']);
        for ($i = 0; $i < 5; $i++) {
            $table->addCell(2000)->addText('ကျား', ['bold'=>true],$pStyle_3);
            $table->addCell(2000)->addText('မ',['bold'=>true],$pStyle_3);
        }
        $table->addCell(3000, ['vMerge' => 'continue']);
        foreach ($staffs as $index => $staff) {
            $table->addRow();
            $table->addCell(1500)->addText(en2mm($index + 1),null,$pStyle_1); 
            $table->addCell(3000)->addText($staff->name,null,$pStyle_1); 
            $table->addCell(5000)->addText($staff->current_rank->name,null,$pStyle_1); 
            $religions = [
                'Buddhist' => 1,
                'Christian' => 2,
                'Hindu' => 3,
                'Islam' => 4,
                'Other' => 5,
            ];
    
            foreach ($religions as $religion => $religionId) {
                if ($staff->religion_id == $religionId) {
                    if ($staff->gender_id == 1) {
                        $table->addCell(2000)->addText('✓',['bold'=>true],$pStyle_3); 
                        $table->addCell(2000)->addText('',null,$pStyle_3);   
                    } else {
                        $table->addCell(2000)->addText('',null,$pStyle_3);   
                        $table->addCell(2000)->addText('✓',['bold'=>true],$pStyle_3); 
                    }
                } else {
                  
                    $table->addCell(2000)->addText('',null,$pStyle_3);
                    $table->addCell(2000)->addText('',null,$pStyle_3);
                }
            }
            $table->addCell(3000)->addText('',null,$pStyle_1); 
        }
       
        $fileName = 'religion_report.docx';
        $filePath = storage_path($fileName);
        $phpWord->save($filePath, 'Word2007');
    
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
   
public function updatedSelectedReligion()
{
    $this->resetPage(); 
}

public function render()
{
    $query = Staff::query();

    if ($this->selectedReligion) {
        $query->where('religion_id', $this->selectedReligion);
    }

    $staffs = $query->paginate(20);
    $currentPage = $staffs->currentPage();
    $perPage = $staffs->perPage();
    $start = ($currentPage - 1) * $perPage + 1;

    return view('livewire.religion-report.religion-report', [
        'staffs' => $staffs,
        'start' => $start,
        'religions' => [
            ['id' => 1, 'name' => 'ဗုဒ္ဓ'],
            ['id' => 2, 'name' => 'ခရစ်ယာန်'],
            ['id' => 3, 'name' => 'ဟိန္ဒူ'],
            ['id' => 4, 'name' => 'အစ္စလာမ်'],
            ['id' => 5, 'name' => 'အခြား']
        ]
    ]);
}


}
