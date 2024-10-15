<?php

namespace App\Livewire\FTR;

use App\Models\Country;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PHPUnit\Framework\Constraint\Count;

class ForeignGoneTotal extends Component
{


    public function go_pdf()
    {
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.foreign_gone_total_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'foreign_gone_total_report_pdf.pdf');
    }
    // public function go_word()
    // {
    //     $staffs = Staff::get();
    //     $phpWord = new PhpWord();
    //     $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
    //     $section->addText(
    //         'ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန' . PHP_EOL .
    //             'နိုင်ငံခြားသွားရောက်ခဲ့သောအကြိမ်ရေစုစုပေါင်းနှင့်အကြောင်းအရာ',
    //         ['bold' => true, 'size' => 14],
    //         ['align' => 'center']
    //     );

    //     $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
    //     $table->addRow();
    //     $table->addCell(2000)->addText("စဥ်", ['bold' => true]);
    //     $table->addCell(3000)->addText("အမည်", ['bold' => true]);
    //     $table->addCell(3000)->addText("ရာထူး", ['bold' => true]);
    //     $table->addCell(3000)->addText("သွားရောက်သည့်နိုင်ငံ", ['bold' => true]);
    //     $table->addCell(2000)->addText("သင်တန်း", ['bold' => true]);
    //     $table->addCell(2000)->addText("အခြား", ['bold' => true]);
    //     $table->addCell(2000)->addText("စုစုပေါင်း", ['bold' => true]);

    //     // Add data to the table
    //     foreach ($staffs as $index => $staff) {
    //         $table->addRow();
    //         $table->addCell(2000)->addText($index + 1);
    //         $table->addCell(3000)->addText($staff->name);
    //         $table->addCell(3000)->addText($staff->current_rank->name);

    //         // List countries visited
    //         $countries = implode(', ', $staff->abroads->pluck('country.name')->toArray());
    //         $table->addCell(3000)->addText($countries);

    //         // Count trainings and abroads
    //         $trainingsCount = $staff->trainings->count();
    //         $abroadsCount = $staff->abroads->count();
    //         $table->addCell(2000)->addText($trainingsCount);
    //         $table->addCell(2000)->addText($abroadsCount);
    //         $table->addCell(2000)->addText($trainingsCount + $abroadsCount);
    //     }

    //     // Generate Word document
    //     $fileName = 'foreign_gone_total_report_word.docx';
    //     $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    //     $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    //     $objWriter->save($tempFile);

    //     return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    // }

    public function go_word()
    {
        // Retrieve all staff data
        $staffs = Staff::with(['current_rank', 'trainings.country', 'abroads.country'])->get();

        // Create the Word document
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $section->addText(
            'ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန' . PHP_EOL .
                'နိုင်ငံခြားသွားရောက်ခဲ့သောအကြိမ်ရေစုစုပေါင်းနှင့်အကြောင်းအရာ',
            ['bold' => true, 'size' => 14],
            ['align' => 'center']
        );

        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(1500)->addText("စဥ်", ['bold' => true]);
        $table->addCell(3000)->addText("အမည်", ['bold' => true]);
        $table->addCell(3000)->addText("ရာထူး", ['bold' => true]);
        $table->addCell(3000)->addText("သွားရောက်သည့်နိုင်ငံ", ['bold' => true]);
        $table->addCell(1500)->addText("သင်တန်း", ['bold' => true]);
        $table->addCell(1500)->addText("အခြား", ['bold' => true]);
        $table->addCell(1500)->addText("စုစုပေါင်း", ['bold' => true]);

        // Add data to the table
        foreach ($staffs as $index => $staff) {
            // Get unique countries from both trainings and abroads
            $allCountries = $staff->abroads->pluck('country_id')
                ->merge($staff->trainings->pluck('country_id'))
                ->unique();

            // Calculate total counts
            $totalTrainings = $staff->trainings->count();
            $totalAbroads = $staff->abroads->count();
            $totalOverall = $totalTrainings + $totalAbroads;

            $totalOverall = $totalTrainings + $totalAbroads;
            $firstIteration = true;

            foreach ($allCountries as $countryId) {
                $table->addRow();

                if ($firstIteration) {
                    // Merge the first three columns for each staff
                    $table->addCell(1500)->addText(en2mm($index + 1));
                    $table->addCell(3000)->addText($staff->name);
                    $table->addCell(3000)->addText($staff->current_rank->name);
                } else {
                    // Empty cells for merged rows
                    $table->addCell(1500);
                    $table->addCell(3000);
                    $table->addCell(3000);
                }

                // Display country name
                $countryName = getCountryNameById($countryId);
                $table->addCell(3000)->addText($countryName);

                // Count for trainings in this country
                $trainingsCount = $staff->trainings->where('country_id', $countryId)->count();
                $table->addCell(1500)->addText(en2mm($trainingsCount));

                // Count for abroads in this country
                $abroadsCount = $staff->abroads->where('country_id', $countryId)->count();
                $table->addCell(1500)->addText(en2mm($abroadsCount));

                // Add total if it's the first coun try


                if ($firstIteration) {
                    $firstIteration = false; // Set to false after the first iteration

                    $table->addCell(1500)->addText(en2mm($totalOverall));
                } else {
                    $table->addCell(1500)->addText();
                }
            }
        }

        // Generate Word document
        $fileName = 'foreign_gone_total_report_word.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }


    public function render()
    {

        $staffs = Staff::get();
        return view('livewire.f-t-r.foreign-gone-total', [
            'staffs' => $staffs,
        ]);
    }
}
