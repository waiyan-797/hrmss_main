<?php

namespace App\Livewire\Reports;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;


class Report1 extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.report_1', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'report_1.pdf');
    }
    public function go_word()
    {
        $staffs = Staff::with(['current_rank', 'staff_educations.education_group', 'staff_educations.education_type', 'staff_educations.education', 'ethnic', 'religion', 'current_address_region', 'current_address_district', 'current_address_township_or_town', 'permanent_address_region', 'permanent_address_district', 'permanent_address_township_or_town', 'gender', 'children'])->get();

       
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
        $section->addText('Report - 1', ['bold' => true, 'size' => 16], ['alignment' => 'center']);
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => 'black', 'cellMargin' => 50]);

        
        $table->addRow();
        $table->addCell(500,['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true],['alignment' => 'center']);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('အမည်', ['bold' => true],['alignment' => 'center']);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('ရာထူး', ['bold' => true],['alignment' => 'center']);
        $table->addCell(3000,['vMerge' => 'restart'])->addText('ပညာအရည်အချင်း', ['bold' => true],['alignment' => 'center']);
        $table->addCell(1000,['vMerge' => 'restart'])->addText('အသက်', ['bold' => true],['alignment' => 'center']);
        $table->addCell(1500,['vMerge' => 'restart'])->addText('လူမျိုး', ['bold' => true],['alignment' => 'center']);
        $table->addCell(1500,['vMerge' => 'restart'])->addText('ကိုးကွယ်သည့်ဘာသာ', ['bold' => true],['alignment' => 'center']);
        $table->addCell(3000,['vMerge' => 'restart'])->addText('ယခုနေထိုင်သည့်နေရပ်လိပ်စာ', ['bold' => true],['alignment' => 'center']);
        $table->addCell(3000,['vMerge' => 'restart'])->addText('အမြဲတမ်းဆက်သွယ်နိုင်သောနေရပ်လိပ်စာ', ['bold' => true]);
        $table->addCell(1000,['vMerge' => 'restart'])->addText('ကျား/မ', ['bold' => true],['alignment' => 'center']);
        $table->addCell(6000, ['gridSpan' => 2, 'valign' => 'center'],['alignment' => 'center'])->addText('သားသမီးအရေအတွက်');
        $table->addCell(6000, ['gridSpan' => 2, 'valign' => 'center'],['alignment' => 'center'])->addText('အိမ်ထောင်');
        
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
                    $table->addCell(3000)->addText('ကျား', ['alignment' => 'center']);
                    $table->addCell(3000)->addText('မ', ['alignment' => 'center']);


       
        foreach ($staffs as $index=> $staff) {
            $table->addRow();
            $table->addCell(500)->addText($index + 1);
            $table->addCell(2000)->addText($staff->name);
            $table->addCell(2000)->addText($staff->current_rank->name);
            
            $educationDetails = '';
            foreach ($staff->staff_educations as $edu) {
                $educationDetails .= $edu->education_group->name . ' - ' . $edu->education_type->name . ', ' . $edu->education->name . "\n";
            }
            $table->addCell(3000)->addText($educationDetails);
            
            $table->addCell(1000)->addText(\Carbon\Carbon::parse($staff->dob)->age . 'နှစ်');
            $table->addCell(1500)->addText($staff->ethnic->name);
            $table->addCell(1500)->addText($staff->religion->name);
            $table->addCell(3000)->addText($staff->current_address_street . '/' . $staff->current_address_ward . '/' . $staff->current_address_region->name . '/' . $staff->current_address_district->name . '/' . $staff->current_address_township_or_town->name);
            $table->addCell(3000)->addText($staff->permanent_address_street . '/' . $staff->permanent_address_ward . '/' . $staff->permanent_address_region->name . '/' . $staff->permanent_address_district->name . '/' . $staff->permanent_address_township_or_town->name);
            $table->addCell(1000)->addText($staff->gender->name);
            $table->addCell(1000)->addText($staff->children->where('gender_id', 1)->count());
            $table->addCell(1000)->addText($staff->children->where('gender_id', 2)->count());
            $table->addCell(1000)->addText($staff->spouse_name ? '✓' : '-');
            $table->addCell(1000)->addText($staff->spouse_name ? '-' : '✓');
        }

       
        $fileName = 'report_1.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $wordWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $wordWriter->save($tempFile);

       
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }



    public function render()
    {
        $staffs = Staff::get();
        return view('livewire.reports.report1', [
            'staffs' => $staffs,
        ]);
    }
}


