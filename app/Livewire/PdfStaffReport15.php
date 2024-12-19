<?php

namespace App\Livewire;

use App\Models\Staff;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Tab;

class PdfStaffReport15 extends Component
{
    public $staff_id;
    public function mount($staff_id = 0)
    {
        $this->staff_id = $staff_id;
    }
    public function go_pdf($staff_id)
    {
        $staff = Staff::find($staff_id);
        $data = [
            'staff' => $staff,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_report_15', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_15.pdf');
    }
    public function go_word($staff_id)
    {
        $staff = Staff::find($staff_id);
        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'orientation' => 'portrait',
            'marginLeft' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1), // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5), // 0.5 inch
            'marginTop' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5), // 0.5 inch
            'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5), // 0.5 inch
        ]);

        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        $section->addTitle('ကိုယ်‌ရေးမှတ်တမ်း', 1);
        // $imagePath = $staff->staff_photo ? storage_path('app/upload/' . $staff->staff_photo) : 'img/user.png';
        // $section->addImage($imagePath, ['width' => 80, 'height' => 80, 'align' => 'right']);
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText('၁။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အမည်', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->name, null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၂။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အသက်(မွေးနေ့သက္ကရာဇ်)', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['align' => 'center']);
        $table->addCell(16000)->addText(formatDMYmm($staff->dob), null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၃။', null, ['align' => 'center']);
        $table->addCell(15000)->addText('လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['align' => 'center']);
        $table->addCell(16000)->addText(($staff->ethnic_id ? $staff->ethnic->name : '-') . '၊' . ($staff->religion_id ? $staff->religion->name : '-'), null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၄။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အမျိုးသားမှတ်ပုံတင်အမှတ်', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . '၊' . $staff->nrc_sign->name . '/' . $staff->nrc_code, null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၅။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အလုပ်အကိုင်နှင့် ဌာန', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->current_rank->name . '၊' . $staff->current_department->name, null, ['alignment' => 'both']);

        $joinDate = \Carbon\Carbon::parse($staff->join_date);
        $joinDateDuration = $joinDate->diff(\Carbon\Carbon::now());
        $table->addRow();
        $table->addCell(2000)->addText('၆။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အမှုထမ်းလုပ်သက်၊ဝင်ရောက်သည့်ရက်စွဲ', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText(formatPeriodMM($joinDateDuration->y, $joinDateDuration->m, $joinDateDuration->d) . ', ' . formatDMYmm($joinDate), null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၇။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText(' လက်ရှိနေရပ်', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['align' => 'center']);
        $table->addCell(16000)->addText($staff->current_address_street . '/' . $staff->current_address_ward . '/' . $staff->current_address_region->name . '/' . $staff->current_address_township_or_town->name, null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၈။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('ပညာအရည်အချင်း', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText('', null, ['alignment' => 'both']);

        foreach ($staff->staff_educations as $education) {
            $table->addRow();
            $table->addCell(2000)->addText();
            $table->addCell(15000)->addText('', ['alignment' => 'center']);
            $table->addCell(1000)->addText();
            $table->addCell(16000)->addText($education->education_group->name . ',' . $education->education_type->name . ',' . $education->education->name . '၊', ['alignment' => 'both']);
        }
        $table->addRow();
        $table->addCell(2000)->addText('၉။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အဖအမည်', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->father_name, null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၁၀။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အလုပ်အကိုင်', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->father_occupation, null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၁။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အမိအမည်', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->mother_name, null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၂။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အလုပ်အကိုင်', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->mother_occupation, null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၃။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('နိုင်ငံခြားသွားရောက်ဖူးခြင်းရှိ/မရှိ(အကြိမ်အရေအတွက်)', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['align' => 'center']);
        $table->addCell(16000)->addText(en2mm($staff->abroads->count()), null, ['alignment' => 'both']);
       
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 30];
        $pStyle_2 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 500];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 500];
        $pStyle_4 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $pStyle_5 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $section->addPageBreak();
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);

        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(9000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ကာလ', ['bold' => true], $pStyle_1);
        // $table->addCell(8000, [ 'vMerge' => 'restart'])->addText('နောက်ဆုံးသွားရောက်ခဲ့သည့်(၅)နှိင်ငံ');

        // $textRun=$table->addCell(8000, ['vMerge' => 'restart'])->addTextRun($pStyle_2);
        // $textRun->addText('နောက်ဆုံးသွား',['bold'=>true]);
        // $textRun->addTextBreak();
        // $textRun->addText('ရောက်ခဲ့သည့်',['bold'=>true]);
        // $textRun->addTextBreak();
        // $textRun->addText('(၅)နိုင်ငံ',['bold'=>true]);

        $textContent_1 = 'နောက်ဆုံးသွားရောက်ခဲ့သည့်(၅)နိုင်ငံ';
        $table->addCell(8000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_2);

        $table->addCell(8000, ['vMerge' => 'restart'])->addText('သွားရောက်သည့်ကိစ္စ', ['bold' => true], $pStyle_3);

        // $table->addCell(8000, ['vMerge' => 'restart'])->addText("သင်တန်းတက်ခြင်းဖြစ်လျှင် အကြိမ်မည်မျှဖြင့်အောင်မြင်သည်",['bold'=>true]);

        // $textRun=$table->addCell(8000, ['vMerge' => 'restart'])->addTextRun($pStyle_4);
        // $textRun->addText('သင်တန်းတက်',['bold'=>true]);
        // $textRun->addTextBreak();
        // $textRun->addText('ခြင်းဖြစ်လျှင် ',['bold'=>true]);
        // $textRun->addTextBreak();
        // $textRun->addText('အကြိမ်မည်မျှဖြင့်',['bold'=>true]);
        // $textRun->addTextBreak();
        // $textRun->addText('အောင်မြင်သည်',['bold'=>true]);

        $textContent_2 = 'သင်တန်းတက်\nခြင်းဖြစ်လျှင် \nအကြိမ်မည်မျှဖြင့်\nအောင်မြင်သည်';
        $table->addCell(8000, ['vMerge' => 'restart'])->addText($textContent_2, ['bold' => true], $pStyle_4);
        // $table->addCell(8000, ['vMerge' => 'restart'])->addText('မည်သည့်အစိုးရအဖွဲ့အစည်းအထောက်အပံ့ဖြင့်သွားရောက်သည်',['bold'=>true]);
        // $textRun=$table->addCell(8000, ['vMerge' => 'restart'])->addTextRun($pStyle_5);
        // $textRun->addText('မည်သည့်',['bold'=>true]);
        // $textRun->addTextBreak();
        // $textRun->addText('အစိုးရ',['bold'=>true]);
        // $textRun->addTextBreak();
        // $textRun->addText('အဖွဲ့အစည်း',['bold'=>true]);
        // $textRun->addTextBreak();
        // $textRun->addText('အထောက်အပံ့ဖြင့်',['bold'=>true]);
        // $textRun->addTextBreak();
        // $textRun->addText('သွားရောက်သည်',['bold'=>true]);

        $textContent_3 = 'မည်သည့်အစိုးရအဖွဲ့အစည်းအထောက်အပံ့ဖြင့်သွားရောက်သည်';
        $table->addCell(8000, ['vMerge' => 'restart'])->addText($textContent_3, ['bold' => true], $pStyle_5);

        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(4500)->addText('မှ', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(4500)->addText('ထိ', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(8000, ['vMerge' => 'continue']);
        $table->addCell(8000, ['vMerge' => 'continue']);
        $table->addCell(8000, ['vMerge' => 'continue']);
        $table->addCell(8000, ['vMerge' => 'continue']);
        if ($staff->abroads->isNotEmpty()) {
            foreach ($staff->abroads as $abroad) {
                $table->addRow();
                $table->addCell(4500)->addText(formatDMYmm($abroad->from_date));
                $table->addCell(4500)->addText(formatDMYmm($abroad->to_date));
                $table->addCell(8000)->addText($abroad->country->name);
                $table->addCell(8000)->addText($abroad->particular);
                $table->addCell(8000)->addText($abroad->training_success_count);
                $table->addCell(8000)->addText($abroad->sponser);
            }
        } else {
            $table->addRow();
            $table->addCell(4500)->addText();
            $table->addCell(4500)->addText();
            $table->addCell(8000)->addText();
            $table->addCell(8000)->addText();
            $table->addCell(8000)->addText();
            $table->addCell(8000)->addText();
        }
        $section->addText('၁၄။' . 'ဇနီး/ခင်ပွန်း');
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $table->addRow();
        $textContent_1= 'အမည်(အခြားအမည်များရှိလျှင်လည်းဖော်ပြရန်)';
        $table->addCell(8000, ['vMerge' => 'restart'])->addText($textContent_3, ['bold' => true], $pStyle_1);
        // $table->addCell(4000)->addText('အမည်(အခြားအမည်များရှိလျှင်လည်း ဖော်ပြရန်)', ['bold' => true], $pStyle_1);
        $table->addCell(6000)->addText('လူမျိုး/နိုင်ငံသား', ['bold' => true], $pStyle_1);
        $table->addCell(5000)->addText('အလုပ်အကိုင်နှင့်ဌာန', ['bold' => true], $pStyle_1);
        $table->addCell(4000)->addText('နေရပ်', ['bold' => true], $pStyle_1);

        if ($staff->spouses->isNotEmpty()) {
            foreach ($staff->spouses as $spouse) {
                $table->addRow();
                $table->addCell(4000)->addText($spouse->name);
                $table->addCell(6000)->addText($spouse->ethnic->name . '/' . $spouse->religion->name);
                $table->addCell(5000)->addText($spouse->occupation);
                $table->addCell(4000)->addText($spouse->address);
            }
        } else {
            $table->addRow();
            $table->addCell(2500)->addText();
            $table->addCell(4000)->addText();
            $table->addCell(6000)->addText();
            $table->addCell(5000)->addText();
            $table->addCell(4000)->addText();
        }
        $section->addText('၁၅။ အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။');
        $tableStyle = [
            'alignment' => Jc::END,
        ];

        $table = $section->addTable($tableStyle);

        // Adding rows and cells
        $table->addRow();
        $table->addCell()->addText('လက်မှတ်', ['alignment' => 'right']);
        $table->addCell(500)->addText('-', ['alignment' => 'right']);
        $table->addCell(3000)->addText('', ['alignment' => 'right']);

        $table->addRow();
        $table->addCell()->addText('အမည်', ['alignment' => 'right']);
        $table->addCell(500)->addText('-', ['alignment' => 'right']);
        $table->addCell(3000)->addText($staff->name, ['alignment' => 'right']);

        $table->addRow();
        $table->addCell()->addText('အဆင့်', ['alignment' => 'right']);
        $table->addCell(500)->addText('-', ['alignment' => 'right']);
        $table->addCell(3000)->addText($staff->currentRank->name, ['alignment' => 'right']);

        $table->addRow();
        $table->addCell()->addText('တပ်/ဌာန', ['alignment' => 'right']);
        $table->addCell(500)->addText('-', ['alignment' => 'right']);
        $table->addCell(3000)->addText($staff->current_department->name, ['alignment' => 'right']);

        $section->addText('ရက်စွဲ: ' . formatPeriodMM(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, \Carbon\Carbon::now()->day), ['align' => 'center']);
        $fileName = 'staff_report_15_' . $staff->id . '.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        return response()->stream(
            function () use ($objWriter) {
                $objWriter->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            ],
        );
    }
    public function render()
    {
        $staff = Staff::where('id', $this->staff_id)->first();
        return view('livewire.pdf-staff-report15', [
            'staff' => $staff,
        ]);
    }
}
