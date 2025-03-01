<?php

namespace App\Livewire\FTR;
use App\Models\Country;
use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PHPUnit\Framework\Constraint\Count;
use Carbon\Carbon;
class ForeignGoneTotal extends Component
{
    public $age, $ageTwo, $signID, $selectedRankId, $staffs, $ranks;
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
    public function mount()
    {
        $this->ranks = (new Rank() )->isDicaAll();
    }
private function getSignName($signID)
{
    return match ($signID) {
        'all' => 'အားလုံး',
        'between' => 'နှစ်ကြား',
        '>' => 'နှစ်အထက်',
        '=' => 'နှစ်',
        '<' => 'နှစ်အောက်',
        default => '',
    };
}

    public function go_word($age = null, $ageTwo = null, $signID = null, $selectedRankId = null, $selectedRankName = null)
{
    $now = Carbon::now();
    $query = Staff::query();

    if (!empty($this->age) && is_numeric($this->age)) {
        $birthDate = $now->copy()->subYears($this->age);
        if ($this->signID === '>') {
            $query->where('dob', '<=', $birthDate);
        } elseif ($this->signID === '<') {
            $query->where('dob', '>', $birthDate);
        } elseif ($this->signID === '=') {
            $query->whereYear('dob', '=', $birthDate->year);
        } elseif ($this->signID === 'between' && !empty($this->ageTwo) && is_numeric($this->ageTwo)) {
            $birthDateFrom = $now->copy()->subYears($this->age);
            $birthDateTo = $now->copy()->subYears($this->ageTwo);
            $query->whereBetween('dob', [$birthDateTo, $birthDateFrom]);
        }
    }

    if (!empty($this->selectedRankId)) {
        $query->where('current_rank_id', $this->selectedRankId);
    }

    $this->staffs = $query->with('currentRank')->get();
  

    $selectedRankName = Rank::find($this->selectedRankId)?->name ?? '';
    $signText = $this->getSignName($this->signID);
    $ageText = en2mm($this->age ?? '');
    $fullText = "အသက် {$ageText} {$signText} {$selectedRankName} များ၏အမည်စာရင်း";


    $phpWord = new PhpWord();
    $section = $phpWord->addSection([
        'orientation' => 'landscape',
        'pageSizeW'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(11.69), 
        'pageSizeH'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.27),
        'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),
        'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),
        'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),
        'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),
    ]);
    
    $phpWord->setDefaultFontSize(11); 
    $section->addText(
        "ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန",
        ['bold' => true, 'size' => 11],
        ['align' => 'center']
    );
    $section->addText(
        "ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန",
        ['bold' => true, 'size' => 11],
        ['align' => 'center']
    );
$selectedRankText = $selectedRankName ?? 'ရာထူးအားလုံး';
$section->addText(
   $fullText,
    ['bold' => true, 'size' => 11],
    ['align' => 'center']
);
    $section->addText(
        'ရက်စွဲ ' . mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)), 
        [], 
        ['alignment' => 'right']
    );
    
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 8]);
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 350, 'spaceBefore' => 350];
        $pStyle_2 = ['align' => 'center', 'spaceAfter' => 300, 'spaceBefore' => 300];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $pStyle_4 = ['align' => 'left', 'spaceAfter' => 300, 'spaceBefore' => 300];
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(1500)->addText("စဥ်", ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText("အမည်/ရာထူး", ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText("ဌာနခွဲ", ['bold' => true],$pStyle_1);
        $table->addCell(2800)->addText("မွေးသက္ကရာဇ်", ['bold' => true],$pStyle_1);
        $table->addCell(2500)->addText("အလုပ်စတင်\nဝင်ရောက်သည့်\nရက်စွဲ", ['bold' => true],$pStyle_2);
        $table->addCell(2500)->addText("လက်ရှိ\nအဆင့်ရ\nရက်စွဲ", ['bold' => true],$pStyle_2);
        $table->addCell(3000)->addText("နောက်ဆုံး\nသွားရောက်ခဲ့\nသည့်နိုင်ငံ/မြို့", ['bold' => true],$pStyle_2);
        $table->addCell(6000)->addText("နောက်ဆုံးသွား\nရောက်ခဲ့သည့်\nအကြောင်းအရာ\nကာလ (မှ-ထိ)", ['bold' => true],$pStyle_2);
        $table->addCell(2000)->addText("အကြိမ်ရေ", ['bold' => true],$pStyle_1);
        $index = 1;
    foreach ($this->staffs as $staff) {
    $allCountries = $staff->abroads->pluck('country_id')->unique();
    $totalAbroads = $staff->abroads->count();
    $lastAbroad = $staff->abroads->sortByDesc('to_date')->first();
    $dob = \Carbon\Carbon::parse($staff->dob);
    $diff = $dob->diff(\Carbon\Carbon::now());
    $age =  $diff->y . ' နှစ် '  . $diff->m . ' လ';

    $join_date = \Carbon\Carbon::parse($staff->join_date);
    $diff = $join_date->diff(\Carbon\Carbon::now());
    $age =  $diff->y . ' နှစ် '  . $diff->m . ' လ';
    $current_rank_date = \Carbon\Carbon::parse($staff->current_rank_date);
    $diff = $current_rank_date->diff(\Carbon\Carbon::now());
    $age =  $diff->y . ' နှစ် '  . $diff->m . ' လ';
    
    foreach ($allCountries as $countryId) {
        $table->addRow();
        $table->addCell(1500)->addText(en2mm($index++),null,$pStyle_1);
        $table->addCell(4000)->addText($staff->name . "\n" . ($staff->currentRank->name ?? ''),null,$pStyle_1);
        $table->addCell(4000)->addText($staff->current_division->name ?? '',null,$pStyle_1);
      
        $table->addCell(2800)->addText(  en2mm($dob->format('d-m-Y')) . "\n" . en2mm($age),null,$pStyle_1);
        $table->addCell(2500)->addText( formatDMYmm($staff->join_date)."\n".en2mm($age),null,$pStyle_4 );
        $table->addCell(2500)->addText(formatDMYmm($staff->current_rank_date)."\n".en2mm($age),null,$pStyle_4);
        $table->addCell(3000)->addText($lastAbroad?->countries->pluck('name')->unique()->join(', ') ?? '',null,$pStyle_2);
        if ($lastAbroad) {
            $table->addCell(3000)->addText($lastAbroad->particular.formatDMYmm($lastAbroad->from_date) . ' မှ ' . formatDMYmm($lastAbroad->to_date).'ထိ',null,$pStyle_2);
        }
        $table->addCell(3000)->addText(en2mm($totalAbroads).'ကြိမ်',null,$pStyle_1);
    }
}
    $fileName = 'A06.docx';
    $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save($tempFile);
    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}
public function render()
{
    $now = Carbon::now();
    $query = Staff::query();
    if (!empty($this->age) && is_numeric($this->age)) {
        $birthDate = $now->copy()->subYears($this->age);
        if ($this->signID === '>') {
            $query->where('dob', '<=', $birthDate);
        } elseif ($this->signID === '<') {
            $query->where('dob', '>', $birthDate);
        } elseif ($this->signID === '=') {
            $query->whereYear('dob', '=', $birthDate->year);
        } elseif ($this->signID === 'between' && !empty($this->ageTwo) && is_numeric($this->ageTwo)) {
            $birthDateFrom = $now->copy()->subYears($this->age);
            $birthDateTo = $now->copy()->subYears($this->ageTwo);
            $query->whereBetween('dob', [$birthDateTo, $birthDateFrom]);
        }
    }
    if (!empty($this->selectedRankId)) {
        $query->where('current_rank_id', $this->selectedRankId);
    }
    $this->staffs = $query->with('currentRank')->get();
    $selectedRankName = null;
    if (!empty($this->selectedRankId)) {
        $selectedRankName = Rank::find($this->selectedRankId)?->name ?? 'ရာထူးအားလုံး';
    }

    if (!function_exists('getSignName')) {
        function getSignName($signID)
        {
            return match ($signID) {
                'all' => 'အားလုံး',
                'between' => 'နှစ်ကြား',
                '>' => 'နှစ်အထက်',
                '=' => 'နှစ်',
                '<' => 'နှစ်အောက်',
                default => '',
            };
        }
    }
    return view('livewire.f-t-r.foreign-gone-total', [
        'staffs' => $this->staffs,
        'ranks' => $this->ranks,
        'age' => $this->age,
        'signID' => $this->signID,
        'selectedRankName' => $selectedRankName, 
    ]);
}    
}
