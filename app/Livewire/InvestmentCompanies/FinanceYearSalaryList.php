<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Rank;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class FinanceYearSalaryList extends Component
{




    public $startYr, $endYr;

    public function go_word()
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        // Define styles for better formatting
        $phpWord->addTableStyle('Salary Table', [
            'borderSize' => 6,
            'cellMargin' => 80
        ]);

        // Create a new section
        $section = $phpWord->addSection();

        // Add title with formatting
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        $section->addText("{$this->startYr} - {$this->endYr} ခု ဘဏ္ဍာရေးနှစ်လစာ", ['size' => 14]);

        // Define table and cell styles
        $table = $section->addTable('Salary Table');
        $cellStyle = ['valign' => 'center'];
        $headerStyle = ['bold' => true, 'align' => 'center'];

        // Add table headers
        $headers = [
            'စဥ်',
            'GivenName',
            'ရာထူး',
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
            'Total'
        ];

        // Add headers row
        $table->addRow();
        foreach ($headers as $header) {
            $table->addCell(2000, $cellStyle)->addText($header, $headerStyle);
        }

        // Loop through the Ranks and Staff to populate table
        $Ranks = Rank::all();
        foreach ($Ranks as $rank) {
            foreach ($rank->staffs as $key => $staff) {
                $table->addRow();
                $table->addCell(500, $cellStyle)->addText($key + 1); // Serial number
                $table->addCell(1500, $cellStyle)->addText($staff->gener_id ? 'U' : 'Daw'); // Given name
                $table->addCell(2000, $cellStyle)->addText($staff->currentRank->name); // Rank

                $totalSalary = 0;

                // Loop for monthly salaries
                for ($i = 1; $i <= 12; $i++) {
                    $salary = $staff->salaries()
                        ->whereMonth('salary_month', $i)
                        ->whereYear('salary_month', $this->endYr)
                        ->first()?->actual_salary ?? 0;
                    $table->addCell(1200, $cellStyle)->addText($salary); // Adjust cell width here
                    $totalSalary += $salary;
                }

                // Total salary for the year
                $table->addCell(1200, $cellStyle)->addText($totalSalary);
            }

            // Total for rank
            if ($rank->staffs->isNotEmpty()) {
                $table->addRow();
                $table->addCell(3000, ['gridSpan' => 15])->addText('Total for Rank:', ['bold' => true]);
                $rankTotal = $rank->staffs->sum(function ($staff) {
                    return $staff->salaries()->whereYear('salary_month', $this->endYr)->sum('actual_salary');
                });
                $table->addCell(1200, $cellStyle)->addText($rankTotal);
            }
        }

        // Save the Word document
        $fileName = 'finance_year_salary_list_report.docx';
        $filePath = storage_path("app/public/{$fileName}");
        $phpWord->save($filePath, 'Word2007');

        // Return the file as a response
        return response()->download($filePath)->deleteFileAfterSend(true);
    }



    public function go_pdf()
    {
        $staffs = Staff::get();
        $Ranks = Rank::all();
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
            'startYr' => $this->startYr,
            'endYr' => $this->endYr,
            'Ranks' => $Ranks
        ];
        $pdf = PDF::loadView('pdf_reports.finance_year_salary_list_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'finance_year_salary_list_report_pdf.pdf');
    }

    public function mount()
    {
        $this->endYr   = Carbon::now()->year;
    }
    public function render()
    {

        $this->startYr = $this->endYr - 1;
        $staffs = Staff::get();
        $Ranks = Rank::all();

        return view('livewire.investment-companies.finance-year-salary-list', [
            'staffs' => $staffs,
            'Ranks' => $Ranks
        ]);
    }
}
