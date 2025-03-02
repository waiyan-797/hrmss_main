<?php

namespace App\Livewire\InvestmentCompanies;

use App\Exports\PA13;
use App\Models\Education;
use App\Models\EducationGroup;
use App\Models\EducationType;
use App\Models\Staff;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class InvestmentCompanies13 extends Component
{
    public $education_id , $education_type_id , $education_group_id ;
    public $education_types , $education_groups , $educations;
    public function mount(){
    $this->education_types = EducationType::all();
    $this->education_groups = EducationGroup::all();
    $this->educations = Education::all();
    }

    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_13', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_report_pdf_13.pdf');
    }
    public function go_excel()
    {
        return Excel::download(new PA13(
    ), 'PA13.xlsx');
    }
    public function go_word()
{
    // $staffs = Staff::get();
    $staffs = Staff::where('current_rank_id', '!=', 23)->whereNull('retire_type_id')
->whereNull('retire_date')
->whereHas('staff_educations')

// Main filters
->when($this->education_group_id, fn($query) =>
    $query->whereHas('staff_educations.education', fn($q) =>
        $q->where('education_group_id', $this->education_group_id)
    )
)
->when($this->education_type_id, fn($query) =>
    $query->whereHas('staff_educations.education', fn($q) =>
        $q->where('education_type_id', $this->education_type_id)
    )
)
->when($this->education_id, fn($query) =>
    $query->whereHas('staff_educations', fn($q) =>
        $q->where('education_id', $this->education_id)
    )
)->with(['staff_educations' => function ($q) {
    $q->with(['education' => function ($query) {
        if ($this->education_group_id) {
            $query->where('education_group_id', $this->education_group_id);
        }
        if ($this->education_type_id) {
            $query->where('education_type_id', $this->education_type_id);
        }
        if ($this->education_id) {
            $query->where('id', $this->education_id);
        }
    }]);
}])->distinct()->get();
    $phpWord = new PhpWord();
    //
    $section = $phpWord->addSection([
        'orientation' => 'portrait',
        'pageSizeW'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.5), // Legal width in inches
        'pageSizeH'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(14),  // Legal height in inches
        'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.3),     // 1 inch
        'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.3),   // 0.5 inch
        'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
    ]);
    $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center','spaceBefore' => 200]);
    $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
    $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
    $section->addTitle('ဘွဲ့ရရှိသူများစာရင်း', 2);
    $table = $section->addTable(['borderSize' => 8, 'cellMargin' => 60]);
    $table->addRow();
    $table->addCell(700)->addText('စဥ်', ['bold' => true],['alignment'=>'center','spaceBefore'=>100]);
    $table->addCell(3500)->addText('အမည်', ['bold' => true],['alignment'=>'center','spaceBefore'=>100]);
    $table->addCell(3500)->addText('ရာထူး', ['bold' => true],['alignment'=>'center','spaceBefore'=>100]);
    $table->addCell(2800)->addText('ပညာအရည်အချင်း', ['bold' => true],['alignment'=>'center','spaceBefore'=>100]);
    $table->addCell(2000)->addText('နိုင်ငံ', ['bold' => true],['alignment'=>'center','spaceBefore'=>100]);
    $table->addCell(1500)->addText('မှတ်ချက်', ['bold' => true],['alignment'=>'center','spaceBefore'=>100]);
    $serialNumber = 1; // Initialize serial number


    foreach ($staffs as $staff) {
        $table->addRow();

        // Add Serial Number
        $table->addCell(700)->addText(en2mm($serialNumber++));

        // Add Staff Name
        $table->addCell(3500)->addText($staff->name);

        // Add Current Rank
        $table->addCell(3500)->addText($staff->current_rank ? $staff->current_rank->name : null);

        // Add Education and Major
        $table->addCell(2800)->addText($staff->staff_educations->isNotEmpty()
        ? $staff->staff_educations->pluck('education.name')->filter()->implode(', ')
        : null);

        // Add Country
        $table->addCell(2000)->addText($staff->staff_educations->isNotEmpty()
        ? $staff->staff_educations->pluck('country.name')->filter()->implode('၊ ')
        : null );

        // Add Year
        // $table->addCell(1500)->addText(
        //     en2mm($school?->year),
        //     null,

        // );

        // Add Remark
        $table->addCell(1500)->addText('');
    }



    //   $table->addRow();
    //         $table->addCell(500)->addText((en2mm($index + 1)), null, $cellStyle);


    //         $table->addCell(2000)->addText($staff?->name . ' / ' . $staff->current_rank?->name . ' / ' . $staff->side_department?->name, null, $cellStyle);
    //         $table->addCell(2000)->addText($school?->education?->name . '၊ ' . $school?->major, null, $cellStyle);
    //         $table->addCell(2000)->addText($school?->name, null, $cellStyle);
    //         $table->addCell(1500)->addText($school?->country?->name, null, $cellStyle);
    //         $table->addCell(1500)->addText(en2mm($school?->year), null, $cellStyle);
    //         $table->addCell(1500)->addText($school?->remark, null, $cellStyle);
    $writer = IOFactory::createWriter($phpWord, 'Word2007');
    return response()->streamDownload(function() use ($writer) {
        $writer->save('php://output');
    }, 'investment_companies_report_13.docx');
}
    public function render()
{
    $staffs = Staff::where('current_rank_id', '!=', 23)
    ->whereNull('retire_type_id')
    ->whereNull('retire_date')
    ->whereHas('staff_educations')

    // Main filters
    ->when($this->education_group_id, fn($query) =>
        $query->whereHas('staff_educations.education', fn($q) =>
            $q->where('education_group_id', $this->education_group_id)
        )
    )
    ->when($this->education_type_id, fn($query) =>
        $query->whereHas('staff_educations.education', fn($q) =>
            $q->where('education_type_id', $this->education_type_id)
        )
    )
    ->when($this->education_id, fn($query) =>
        $query->whereHas('staff_educations', fn($q) =>
            $q->where('education_id', $this->education_id)
        )
    )->with(['staff_educations' => function ($q) {
        $q->with(['education' => function ($query) {
            if ($this->education_group_id) {
                $query->where('education_group_id', $this->education_group_id);
            }
            if ($this->education_type_id) {
                $query->where('education_type_id', $this->education_type_id);
            }
            if ($this->education_id) {
                $query->where('id', $this->education_id);
            }

        }]);
    }])->distinct()->paginate(20);
    $currentPage = $staffs->currentPage();
    $perPage = $staffs->perPage();
    $startIndex = ($currentPage - 1) * $perPage + 1;
    return view('livewire.reports.education-report',[
        'staffs' => $staffs,
        'startIndex'=>$startIndex,
    ]);
}
}
