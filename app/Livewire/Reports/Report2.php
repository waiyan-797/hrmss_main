<?php

namespace App\Livewire\Reports;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class Report2 extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.report_2', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'report_2.pdf');
    }
    public function go_word()
    {
        $staffs = Staff::get();

       
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
        $section->addText('Report - 2', ['bold' => true, 'size' => 14], ['alignment' => 'center']);

        
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);

        // Add header row
        $table->addRow();
        $table->addCell(2000,['vMerge' => 'restart'])->addText('စဥ်');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('အမည်');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('ရာထူး');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('အသက်');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('လက်ရှိရာထူးရသောလုပ်သက်');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('လူမျိုး');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('ကိုးကွယ်သည့်ဘာသာ');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('ယခုနေထိုင်သည့်နေရပ်လိပ်စာ');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('အမြဲတမ်းဆက်သွယ်နိုင်သောနေရပ်လိပ်စာ');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('ကျား/မ');
        $table->addCell(6000, ['gridSpan' => 2, 'valign' => 'center'])->addText('သားသမီးအရေအတွက်');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('အိမ်ထောင် (ရှိ/မရှိ)');

        $table->addRow();
            $table->addCell(2000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(3000)->addText('ကျား', ['alignment' => 'center']);
            $table->addCell(3000)->addText('မ', ['alignment' => 'center']);
            $table->addCell(4000, ['vMerge' => 'continue']);

       
        foreach ($staffs as $index => $staff) {
            $table->addRow();
            $table->addCell()->addText($index + 1);
            $table->addCell()->addText($staff->name);
            $table->addCell()->addText($staff->current_rank->name);
            $table->addCell()->addText(\Carbon\Carbon::parse($staff->dob)->age . ' years');
            $table->addCell()->addText(\Carbon\Carbon::parse($staff->current_rank_date)->age . ' years');
            $table->addCell()->addText($staff->ethnic->name);
            $table->addCell()->addText($staff->religion->name);
            $table->addCell()->addText($staff->current_address_street . '/' . $staff->current_address_ward . '/' . $staff->current_address_region->name . '/' . $staff->current_address_district->name . '/' . $staff->current_address_township_or_town->name);
            $table->addCell()->addText($staff->permanent_address_street . '/' . $staff->permanent_address_ward . '/' . $staff->permanent_address_region->name . '/' . $staff->permanent_address_district->name . '/' . $staff->permanent_address_township_or_town->name);
            $table->addCell()->addText($staff->gender->name);
            $table->addCell()->addText($staff->children->where('gender_id', 1)->count());
            $table->addCell()->addText($staff->children->where('gender_id', 2)->count());
            $table->addCell()->addText($staff->spouse_name ? 'ရှိ' : 'မရှိ');
        }

        
        $fileName = 'report_2.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);

        
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);

        
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }


    public function render()
    {
        $staffs = Staff::get();
        return view('livewire.reports.report2', [
            'staffs' => $staffs,
        ]);
    }
}

