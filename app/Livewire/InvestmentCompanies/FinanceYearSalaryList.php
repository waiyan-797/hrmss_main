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

        // Create a new section
        $section = $phpWord->addSection();

        // Add title
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        $section->addText("{$this->startYr} - {$this->endYr} ခု ဘဏ္ဍာရေးနှစ်လစာ", ['size' => 14]);

        // Add table
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);

        // Define table header
        $table->addRow();
        $headers = ['စဥ်', 'GivenName', 'ရာထူး', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Total'];
        foreach ($headers as $header) {
            $table->addCell(2000)->addText($header, ['bold' => true, 'align' => 'center']);
        }

        $staffs = Staff::get();
        $Ranks = Rank::all();
        foreach ($Ranks as $rank) {
            foreach ($rank->staffs as $key => $staff) {
                $table->addRow();
                $table->addCell(2000)->addText($key + 1);
                $table->addCell(2000)->addText($staff->gener_id ? 'U' : 'Daw');
                $table->addCell(2000)->addText($staff->currentRank->name);

                $totalSalary = 0;
                for ($i = 1; $i <= 12; $i++) {
                    $salary = $staff->salaries()->whereMonth('salary_month', $i)->whereYear('salary_month', $this->endYr)->first()?->actual_salary ?? 0;
                    $table->addCell(2000)->addText($salary);
                    $totalSalary += $salary; // Accumulate total salary
                }

                // Add total salary in the last cell of the row
                $table->addCell(2000)->addText($totalSalary);
            }

            // Add empty row if the rank has staff
            if ($rank->staffs->isNotEmpty()) {
                $table->addRow();
                $table->addCell(2000)->addText('');
                $table->addCell(2000)->addText('');
                $table->addCell(2000)->addText('Total for Rank:');
                $rankTotal = $rank->staffs->sum(function ($staff) {
                    return $staff->salaries()->whereYear('salary_month', $this->endYr)->sum('actual_salary');
                });
                $table->addCell(2000)->addText($rankTotal);
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
