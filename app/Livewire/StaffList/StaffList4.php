<?php

namespace App\Livewire\StaffList;
use App\Exports\SSL03;
use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;

class StaffList4 extends Component
{
    use WithPagination;
    public $ranks;
    public $posting;
    public $selectedRankId;
    public function mount()
    {
        $this->ranks = (new Rank())->isDicaAll();
    }
    public function go_pdf()
    {
        $staffs = Staff::with('postings', 'currentRank')->get();
        $data = ['staffs' => $staffs];
        $pdf = PDF::loadView('pdf_reports.staff_list_report_4', $data);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_list_report_pdf_4.pdf');
    }
    public function go_excel()
    {
        return Excel::download(new SSL03(), 'SSL03.xlsx');
    }
    public function go_word()
    {
        $staffs = Staff::with(['postings.department', 'postings.division', 'currentRank'])
            ->when($this->selectedRankId, function ($query) {
                $query->where('current_rank_id', $this->selectedRankId);
            })
            ->get();
    
        $phpWord = new PhpWord();
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $pStyle_2 = ['align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 30];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        
        // Define a font style with size 12
        $fontStyle = ['size' => 12];
    
        $section = $phpWord->addSection([
            'orientation' => 'landscape',
            'pageSizeW' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(11.69), // A4 Landscape width (11.69 inches)
            'pageSizeH' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.27), // A4 Landscape height (8.27 inches)
            'marginLeft' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5), // 0.5 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.51), // 0.51 inch
            'marginTop' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.23), // 0.23 inch
            'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5), // 0.5 inch
        ]);
<<<<<<< HEAD

        $section->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', ['bold' => true, 'size' => 12], ['align' => 'center']);
        if (!is_null($this->selectedRankId)) {
            $rankName = getRankById($this->selectedRankId)->name;
           
=======
    
        $section->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', ['bold' => true, 'size' => 12], ['align' => 'center']);
        if (!is_null($this->selectedRankId)) {
            $rankName = getRankById($this->selectedRankId)->name;
    
>>>>>>> hrmsrp/main
            $section->addText($rankName, ['bold' => true, 'size' => 12], ['align' => 'center']);
        } else {
            $section->addText('ဝန်ထမ်းများစာရင်း', ['bold' => true, 'size' => 12], ['align' => 'center']);
        }
        $pStyle_right = ['align' => 'right'];
        $tableStyle = [
            'alignment' => Jc::END,
        ];
<<<<<<< HEAD
        $table = $section->addTable($tableStyle);
        $table->addRow();
        $table->addCell(14000)->addText('', $pStyle_right);
        $table->addCell(6000)->addText('ရက်စွဲ-' . getTdyDateInMyanmarYearMonthDay(1), $pStyle_right);

        
=======
    
        $section->addText(
            'ရက်စွဲ ' . mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)),
            [],
            ['alignment' => 'right']
        );
    
>>>>>>> hrmsrp/main
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, ['tblHeader' => true]); // Set
        $table->addCell(1000)->addText('စဥ်', ['bold' => true, 'size' => 12], ['align' => 'center']);
        $table->addCell(4000)->addText('အမည်/ရာထူး', ['bold' => true, 'size' => 12], ['align' => 'center']);
        $table->addCell(3000)->addText('မူလဌာန', ['bold' => true, 'size' => 12], ['align' => 'center']);
        $table->addCell(3000)->addText("ခုနှစ်\nမှ-ထိ", ['bold' => true, 'size' => 12], ['align' => 'center']);
        $table->addCell(4000)->addText('ပြောင်းရွေ့ဌာန', ['bold' => true, 'size' => 12], ['align' => 'center']);
        $table->addCell(3000)->addText("ခုနှစ်\nမှ-ထိ", ['bold' => true, 'size' => 12], ['align' => 'center']);
        $table->addCell(3000)->addText("လက်ရှိဌာန\nရောက်ရှိရက်စွဲ", ['bold' => true, 'size' => 12], ['align' => 'center']);
        $table->addCell(2000)->addText('မှတ်ချက်', ['bold' => true, 'size' => 12], ['align' => 'center']);
    
        foreach ($staffs as $index => $staff) {
<<<<<<< HEAD
            $table->addRow();
            $table->addCell(1000)->addText(en2mm($index + 1), null, $pStyle_2);
            $table->addCell(4000)->addText($staff->name . " \n " . ($staff->currentRank?->name ?? ''), null, ['align' => 'left', 'indent' => 0.2]);
            $table->addCell(3000)->addText(($staff->postings->first()?->department->name ?? '') . ($staff->postings->first()?->division?->nick_name ?? ''), null, $pStyle_2);
            $table->addCell(3000)->addText(en2mm($staff->postings->first()?->from_date ? \Carbon\Carbon::parse($staff->postings->first()->from_date)->format('d-m-Y') : ''), null, $pStyle_1);
            $table->addCell(4000)->addText(($staff->postings->last()?->department->name ?? '') . ($staff->postings->last()?->division?->nick_name ?? ''), null, $pStyle_2);
            $table->addCell(3000)->addText(en2mm($staff->postings->last()?->from_date ? \Carbon\Carbon::parse($staff->postings->last()->from_date)->format('d-m-Y') : ''), $pStyle_2);
            $table->addCell(3000)->addText(en2mm($staff->postings->last()?->from_date ? \Carbon\Carbon::parse($staff->postings->last()->from_date)->format('d-m-Y') : ''));
            $table->addCell(2000)->addText('');
=======
            $table->addRow(50);
            $table->addCell(1000)->addText(en2mm($index + 1), $fontStyle, $pStyle_2);
            $table->addCell(4000)->addText($staff->name . " \n " . ($staff->currentRank?->name ?? ''), $fontStyle, ['align' => 'left', 'indent' => 0.2]);
            $table->addCell(3000)->addText(($staff->postings->first()?->department->name ?? '') . ($staff->postings->first()?->division?->nick_name ?? ''), $fontStyle, $pStyle_2);
            $table->addCell(3000)->addText(en2mm($staff->postings->first()?->from_date ? \Carbon\Carbon::parse($staff->postings->first()->from_date)->format('d-m-Y') : ''), $fontStyle, $pStyle_1);
            $table->addCell(4000)->addText(($staff->postings->last()?->department->name ?? '') . ($staff->postings->last()?->division?->nick_name ?? ''), $fontStyle, $pStyle_2);
            $table->addCell(3000)->addText(en2mm($staff->postings->last()?->from_date ? \Carbon\Carbon::parse($staff->postings->last()->from_date)->format('d-m-Y') : ''), $fontStyle, $pStyle_2);
            $table->addCell(3000)->addText(en2mm($staff->postings->last()?->from_date ? \Carbon\Carbon::parse($staff->postings->last()->from_date)->format('d-m-Y') : ''), $fontStyle);
            $table->addCell(2000)->addText('', $fontStyle);
>>>>>>> hrmsrp/main
        }
    
        $fileName = 'staff_list_report_4.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $phpWord->save($tempFile, 'Word2007');
    
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    public function render()
    {
        $staffs = Staff::when($this->selectedRankId, function ($q) {
            return $q->where('current_rank_id', $this->selectedRankId);
        })->paginate(20);

        $currentPage = $staffs->currentPage();
        $perPage = $staffs->perPage();
        $start = ($currentPage - 1) * $perPage + 1;
        return view('livewire.staff-list.staff-list4', [
            'staffs' => $staffs,
            'start' => $start,
        ]);
    }
}
