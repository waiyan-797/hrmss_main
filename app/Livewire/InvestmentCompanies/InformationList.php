<?php

namespace App\Livewire\InvestmentCompanies;
use App\Exports\F17;
use App\Models\Payscale;
use App\Models\Staff;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class InformationList extends Component
{
    public function go_pdf()
    {
        $staffs = Staff::get();
        $payscales = Payscale::get();
        $data = [
            'staffs' => $staffs,
            'payscales' => $payscales,
        ];
        $pdf = PDF::loadView('pdf_reports.information_list_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'information_list_report_pdf.pdf');
    }
    public function go_excel() 
    {
        return Excel::download(new F17(
    ), 'F17.xlsx');
    }
  
    public function go_word()
    {
        $payscales = Payscale::with('ranks', 'staff')->get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $section->addTitle('Information List Report', 1);
        $table = $section->addTable([
            'borderSize' => 6,
            'borderColor' => '000000',
            'cellMargin' => 80,
        ]);
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'restart', 'valign' => 'center'])->addText('Indicator(s)', ['bold' => true]);
        $table->addCell(12000, ['gridSpan' => 12, 'valign' => 'center'])->addText('1.4.A Women holding senior positions in the Civil Service (Director Level or equivalent and Above Posts)...', ['bold' => true]);

        $table->addRow();
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['gridSpan' => 12, 'valign' => 'center'])->addText('1.4.B Proportion of Positions by (a) Sex, (b) Age, (c) Persons with disabilities...', ['bold' => true]);

        // Additional headers
        $table->addRow();
        $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('Name of Ministries/Organizations', ['bold' => true]);
        $table->addCell(10000, ['gridSpan' => 11, 'valign' => 'center'])->addText('');

        // Define data headers
        $table->addRow();
        $table->addCell(500, ['vMerge' => 'restart', 'valign' => 'center'])->addText('Sr No.', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart', 'valign' => 'center'])->addText('Level of Position and Same Level', ['bold' => true]);
        $table->addCell(1000, ['vMerge' => 'restart', 'valign' => 'center'])->addText('Total Number', ['bold' => true]);
        $table->addCell(1000, ['gridSpan' => 2, 'valign' => 'center'])->addText('Gender', ['bold' => true]);
        $table->addCell(5000, ['gridSpan' => 5, 'valign' => 'center'])->addText('Age Group', ['bold' => true]);
        $table->addCell(2000, ['gridSpan' => 2, 'valign' => 'center'])->addText('Person with disabilities', ['bold' => true]);

        // Sub-headers for gender, age, and disability
        $table->addRow();
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(1000)->addText('Male', ['bold' => true]);
        $table->addCell(1000)->addText('Female', ['bold' => true]);
        $table->addCell(1000)->addText('18 - 30', ['bold' => true]);
        $table->addCell(1000)->addText('31 - 40', ['bold' => true]);
        $table->addCell(1000)->addText('41 - 50', ['bold' => true]);
        $table->addCell(1000)->addText('51 - 60', ['bold' => true]);
        $table->addCell(1000)->addText('61 Above', ['bold' => true]);
        $table->addCell(1000)->addText('Male', ['bold' => true]);
        $table->addCell(1000)->addText('Female', ['bold' => true]);

        foreach ($payscales as $index => $payscale) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(3000)->addText(en2mm($payscale->ranks[0]->name . 'နှင့်အဆင့်တူ'));
            $table->addCell(2000)->addText(en2mm($payscale->staff->count()));

            $maleCount = $payscale->staff->where('gender_id', 1)->count();
            $femaleCount = $payscale->staff->where('gender_id', 2)->count();

            $table->addCell(1500)->addText(en2mm($maleCount));
            $table->addCell(1500)->addText(en2mm($femaleCount));

            $ageGroups = [
                '18 - 30' => $payscale->staff->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->age >= 18 && \Carbon\Carbon::parse($staff->dob)->age <= 30)->count(),
                '31 - 40' => $payscale->staff->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->age >= 31 && \Carbon\Carbon::parse($staff->dob)->age <= 40)->count(),
                '41 - 50' => $payscale->staff->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->age >= 41 && \Carbon\Carbon::parse($staff->dob)->age <= 50)->count(),
                '51 - 60' => $payscale->staff->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->age >= 51 && \Carbon\Carbon::parse($staff->dob)->age <= 60)->count(),
                '61 Above' => $payscale->staff->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->age >= 61)->count(),
            ];

            // Add age group data to the table
            foreach ($ageGroups as $ageGroupCount) {
                $table->addCell(1500)->addText(en2mm($ageGroupCount));
            }
            $table->addCell(1500)->addText('');
            $table->addCell(1500)->addText('');
        }
        $table->addRow();
        $table->addCell(5000, ['gridSpan' => 2])->addText('စုစုပေါင်း');
        $table->addCell(2000)->addText(en2mm($payscales->sum(fn($payscale) => $payscale->staff->count())));
        $table->addCell(1500)->addText(en2mm($payscales->sum(fn($payscale) => $payscale->staff->where('gender_id', 1)->count())));
        $table->addCell(1500)->addText(en2mm($payscales->sum(fn($payscale) => $payscale->staff->where('gender_id', 2)->count())));
        foreach (['18 - 30', '31 - 40', '41 - 50', '51 - 60', '61 Above'] as $ageGroup) {
            $ageTotal = $payscales->sum(fn($payscale) => $payscale->staff->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->age >= explode(' - ', $ageGroup)[0] && \Carbon\Carbon::parse($staff->dob)->age <= (explode(' - ', $ageGroup)[1] ?? PHP_INT_MAX))->count());
            $table->addCell(1500)->addText(en2mm($ageTotal));
        }
        $table->addCell(1500)->addText('');
        $table->addCell(1500)->addText('');
        $fileName = 'information_list_report.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempFile);
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    public function render()
    {
        $staffs = Staff::get();
        $payscales = Payscale::get();
        return view('livewire.investment-companies.information-list', [
            'staffs' => $staffs,
            'payscales' => $payscales,
        ]);
    }
}
