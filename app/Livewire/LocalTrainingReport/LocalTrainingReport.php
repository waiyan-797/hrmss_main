<?php

namespace App\Livewire\LocalTrainingReport;

use App\Models\Staff;
use App\Models\Training;
use App\Models\TrainingType;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;


class LocalTrainingReport extends Component
{
    public $trainingLocation;

    public $nameSearch, $staffs;
    public function go_pdf()
    {

        $data = [
            'staffs' => $this->staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.local_training_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'local_training_report_pdf.pdf');
    }
    public function go_word()
    {

        $staffs = Staff::get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $tableStyle = [
            'borderSize' => 6,
            'borderColor' => '000000',
            'cellMargin' => 50,
        ];
        $firstRowStyle = ['bgColor' => 'f2f2f2'];
        // $cellStyle = ['valign' => 'center'];
        $phpWord->addTableStyle('TrainingTable', $tableStyle, $firstRowStyle);









        $table = $section->addTable('TrainingTable');


        $table->addRow();
        $table->addCell(1000)->addText('စဥ်');
        $table->addCell(2000)->addText('အမည်');
        $table->addCell(2000)->addText('ရာထူး');
        $table->addCell(2000)->addText('သင်တန်းအမည်');
        $table->addCell(2000)->addText('သင်တန်းကာလ(မှ)');
        $table->addCell(2000)->addText('သင်တန်းကာလ(အထိ)');
        $table->addCell(2000)->addText('သင်တန်းနေရာ/ဒေသ');
        $table->addCell(2000)->addText('သင်တန်းအမျိုးအစား');


        foreach ($staffs as $index => $staff) {
            foreach ($staff->trainings as $index=> $training) {

                $table->addRow();
                $table->addCell(1000,['vMerge' => 'restart'])->addText($index + 1);
                $table->addCell(2000,['vMerge' => 'restart'])->addText($staff->name);
                $table->addCell(2000,['vMerge' => 'restart'])->addText($staff->current_rank->name);
                $table->addCell(2000,['vMerge' => 'restart'])->addText($training->training_type->name);
                $table->addCell(2000,['vMerge' => 'restart'])->addText($training->from_date);
                $table->addCell(2000,['vMerge' => 'restart'])->addText($training->to_date);
                $table->addCell(2000,['vMerge' => 'restart'])->addText($training->location);
                $table->addCell(2000,['vMerge' => 'restart'])->addText($training->training_location?->name);
                $table->addRow();
                $table->addCell(1000, ['vMerge' => 'continue']);
                $table->addCell(2000, ['vMerge' => 'continue']);
                $table->addCell(2000, ['vMerge' => 'continue']);
                $table->addCell(2000)->addText($training->training_type->name);
                $table->addCell(2000,['vMerge' => 'continue'])->addText();
                $table->addCell(2000,['vMerge' => 'continue'])->addText();
                $table->addCell(2000, ['vMerge' => 'continue'])->addText();
                $table->addCell(2000, ['vMerge' => 'continue'])->addText();
            }
          
        }
       
        $fileName = 'local_training_report.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);


        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempFile);


        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    public function render()
    {

        $staffQuery  = Staff::query();
        if ($this->nameSearch) {
            $staffQuery->where('name', 'like', '%' . $this->nameSearch . '%');
        }

        $this->staffs = $staffQuery->get();
        return view('livewire.local-training-report.local-training-report', [
            'staffs' => $this->staffs,
        ]);
    }
}
