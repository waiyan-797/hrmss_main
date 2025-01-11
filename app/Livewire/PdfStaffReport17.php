<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;

class PdfStaffReport17 extends Component
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

        // $pdf = PDF::loadView('pdf_reports.staff_report_17', $data);
        $pdf = PDF::loadView(
            'pdf_reports.staff_report_17',
            $data,
            [],
            [
                'default_font_size' => 13, // Optional, set default font size
                'default_font' => 'Pyidaungsu', // Optional, set default font
                'format' => 'A4', // Set paper size
                'orientation' => 'P', // Portrait orientation
                'margin_left' => 25.4, // 1 inch = 25.4 mm
                'margin_right' => 12.7, // 0.5 inches = 12.7 mm
                'margin_top' => 12.7, // 0.5 inches = 12.7 mm
                'margin_bottom' => 12.7, // 0.5 inches = 12.7 mm
            ],
        );
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_17.pdf');
    }

    public function go_word($staff_id)
    {
        $staff = Staff::find($staff_id);

        $phpWord = new PhpWord();
        $phpWord->addFontStyle('pyidaungsu Numbers Font', ['name' => 'Pyidaungsu Numbers', 'size' => 13]);
        $section = $phpWord->addSection([
            'headerHeight' => 350,
            'orientation' => 'portrait',
            'marginLeft' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1), // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5), // 0.5 inch
            'marginTop' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5), // 0.5 inch
            'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5), // 0.5
        ]);
        $header_page_1 = $section->addHeader();
        $header_page_1->firstPage();
        $header_page_1->addText('လျှို့ဝှက်', null, [
            'align' => 'center',
            'spaceBefore' => 0, 
            'spaceAfter' => 0, 
            'lineHeight' => 1, 
        ]);

        $header_subseq = $section->addHeader();
        $header_subseq->addText('လျှို့ဝှက်', null, [
            'align' => 'center',
            'spaceBefore' => 0,
            'spaceAfter' => 0,
            'lineHeight' => 1,
        ]);

        $header_subseq->addPreserveText('{PAGE}', ['name' => 'Pyidaungsu Numbers', 'size' => 13], ['alignment' => 'center', 'spaceBefore' => 0, 'spaceAfter' => 0]);

        $footer = $section->addFooter();
        $footer->addText('လျှို့ဝှက်', null, ['align' => 'center', 'spaceBefore' => 200]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        $section->addTitle('ကိုယ်‌ရေးမှတ်တမ်း', 1);

        $textBoxStyle = [
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(2),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(2),
            // 'borderColor' => 'FFFFFF', // Set to white for no visible border
            'borderSize' => 0,    
            'positioning' => 'relative', // Relative positioning
            'posHorizontal' => 'right', // Align next to inline content
            'posHorizontalRel' => 'margin', // Relative to margin (inline context)
            'marginLeft' => 0, // Small spacing from the left
            
        ];
        $imagePath = $staff->staff_photo ? storage_path('app/upload/' . $staff->staff_photo) : null;
            if ($imagePath && file_exists($imagePath)) {
                $textBox = $section->addTextBox($textBoxStyle);
                $textBox->addImage($imagePath, ['width' => 62, 'height' => 69, 'align' => 'right']);
            } else {
            $defaultImagePath = public_path('img/user.png');
            $textBox = $section->addTextBox($textBoxStyle);
    
            $textBox->addImage($defaultImagePath, ['width' =>62, 'height' => 65, 'align' => 'center', 'padding'=>0 ]);
           }

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText('၁။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အမည်', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->name, null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၂။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အသက်(မွေးနေ့သက္ကရာဇ်)', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText(formatDMYmm($staff->dob), null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၃။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText(($staff->ethnic_id ? $staff->ethnic->name : '-') . '/' . ($staff->religion_id ? $staff->religion->name : '-'), null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၄။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အမျိုးသားမှတ်ပုံတင်အမှတ်', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . $staff->nrc_sign->name . $staff->nrc_code, null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၅။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('ရာထူး/ ဌာန', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->current_rank->name . '/' . $staff->current_department->name, null, ['alignment' => 'both']);

        $joinDate = \Carbon\Carbon::parse(en2mm($staff->join_date));
        $joinDateDuration = $joinDate->diff(\Carbon\Carbon::now());
        $table->addRow();
        $table->addCell(2000)->addText('၆။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အမှုထမ်းလုပ်သက်၊ ဝင်ရောက်သည့်ရက်စွဲ', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['align' => 'center']);
        $table->addCell(16000)->addText(formatPeriodMM($joinDateDuration->y, $joinDateDuration->m, $joinDateDuration->d) . ', ' . en2mm($joinDate->format('d-m-y')), null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၇။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('လက်ရှိနေရပ်လိပ်စာ', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->current_address_street . '၊' . $staff->current_address_ward . '၊' . $staff->current_address_township_or_town->name . '၊' . $staff->current_address_region->name, null, ['alignment' => 'center']);
        $table->addRow();
        $table->addCell(2000)->addText('၈။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('ပညာအရည်အချင်း', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText('', null, ['alignment' => 'both']);

        // foreach ($staff->staff_educations as $education) {
        //     $table->addRow();
        //     $table->addCell(2000)->addText('', null, ['alignment' => 'center']);
        //     $table->addCell(15000)->addText('', null, ['alignment' => 'both']);
        //     $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        //     $table->addCell(16000)->addText($education->education->name . '၊', null, ['alignment' => 'both']);
        // }
        $table->addRow();
        $table->addCell(2000)->addText('၉။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အဘအမည် ', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->father_name, null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၀။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အလုပ်အကိုင်', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->father_occupation, null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၁။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အမိအမည် ', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->mother_name, null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၂။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အလုပ်အကိုင် ', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->mother_occupation, null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၃။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('နိုင်ငံခြားသွားရောက်ဖူးခြင်းရှိ/မရှိ(အကြိမ်အရေအတွက်)', null, ['alignment' => 'both']);
        $table->addCell(2000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText(en2mm($staff->abroads->count() ? 'ရှိ' : 'မရှိ'), null, ['alignment' => 'both']);
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $pStyle_2 = ['align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 30];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $pStyle_4 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $section->addPageBreak();
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(12000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ကာလ', ['bold' => true], $pStyle_2);
        $textContent = "နောက်ဆုံးသွား\nရောက်ခဲ့သည့်\n(၅)နိုင်ငံ";
        $table->addCell(8000, ['vMerge' => 'restart'])->addText($textContent, ['bold' => true], $pStyle_3);
        $table->addCell(6000, ['vMerge' => 'restart'])->addText("သွားရောက်\nသည့်ကိစ္စ", ['bold' => true], $pStyle_4);
        $textContent = "သင်တန်းတတ်\nခြင်းဖြစ်လျှင်\nအောင်မအောင်နှင့် \nအကြိမ်မည်မျှဖြင့်\nအောင်မြင်သည်";
        $table->addCell(8000, ['vMerge' => 'restart'])->addText($textContent, ['bold' => true], $pStyle_1);

        $textContent = "မည်သည့်\nအစိုးရ\nအဖွဲ့အစည်း\nအထောက်အပံ့ဖြင့်\nသွားရောက်သည်";
        $table->addCell(8000, ['vMerge' => 'restart'])->addText($textContent, ['bold' => true], $pStyle_1);

        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(6000)->addText('မှ', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(6000)->addText('ထိ', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(8000, ['vMerge' => 'continue']);
        $table->addCell(6000, ['vMerge' => 'continue']);
        $table->addCell(8000, ['vMerge' => 'continue']);
        $table->addCell(8000, ['vMerge' => 'continue']);
        $latestAbroads = $staff->abroads->sortByDesc('to_date')->take(5);
        if ($latestAbroads->isNotEmpty()) {
            foreach ($latestAbroads as $abroad) {
                $table->addRow();
                $table->addCell(6000)->addText(formatDMYmm($abroad?->from_date), null, $pStyle_2);
                $table->addCell(6000)->addText(formatDMYmm($abroad?->to_date), null, $pStyle_2);
                $table->addCell(8000)->addText($abroad->country?->name, null, $pStyle_3);
                $table->addCell(6000)->addText($abroad->particular, null, $pStyle_4);
                $table->addCell(8000)->addText($abroad->training_success_count, null, $pStyle_4);
                $table->addCell(8000)->addText($abroad->position, null, $pStyle_1);
            }
        } else {
            $table->addRow();
            $table->addCell(6000)->addText();
            $table->addCell(6000)->addText();
            $table->addCell(8000)->addText();
            $table->addCell(6000)->addText();
            $table->addCell(8000)->addText();
            $table->addCell(8000)->addText();
        }
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $pStyle_2 = ['align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 30];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $section->addPageBreak();
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $section->addText('၁၄။' . 'ဇနီး/ခင်ပွန်း', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $pStyle_2 = ['align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 30];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $pStyle_4 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $table->addRow();
        $textContent_1 = "အမည်\n(အခြားအမည်များ\nရှိလျှင်လည်း\nဖော်ပြရန်)";
        $table->addCell(8000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $table->addCell(4000)->addText('တော်စပ်ပုံ', ['bold' => true], $pStyle_3);
        $table->addCell(4000)->addText('ကျား/မ', ['bold' => true], $pStyle_3);
        $table->addCell(4000)->addText('လူမျိုး/ဘာသာ', ['bold' => true], $pStyle_3);
        $table->addCell(4000)->addText('ဇာတိ', ['bold' => true], $pStyle_3);
        $table->addCell(4000)->addText('အလုပ်အကိုင်', ['bold' => true], $pStyle_3);
        $table->addCell(5000)->addText('နေရပ်', ['bold' => true], $pStyle_3);
        $table->addCell(4000)->addText('မှတ်ချက်', ['bold' => true], $pStyle_3);
        //  asdf
        foreach ($staff->spouses as $spouse) {
            $table->addRow();
            $table->addCell(4000)->addText($spouse->name, null, $pStyle_3);
            $table->addCell(4000)->addText($spouse->relation?->name, null, $pStyle_3);
            $table->addCell(4000)->addText($spouse->gender?->name, null, $pStyle_3);
            $table->addCell(4000)->addText($spouse->ethnic->name . '/' . $spouse->religion->name, null, $pStyle_3);
            $table->addCell(4000)->addText($spouse->place_of_birth, null, $pStyle_3);
            $table->addCell(4000)->addText($spouse->occupation, null, $pStyle_3);
            $table->addCell(5000)->addText($spouse->address, null, $pStyle_3);
            $table->addCell(4000)->addText();
        }
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $pStyle_2 = ['align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 30];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $section->addPageBreak();
        $section->addText('၁၅။' . 'နိုင်ငံခြားသွားရောက်မည့်ကိစ္စ');
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, ['tblHeader' => true]);
        $textContent_1 = "သွားရောက်\nသည့်ကိစ္စ";
        $table->addCell(6000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_1);
        $textContent_1 = "စေလွှတ်\nသည့်နိုင်ငံ";
        $table->addCell(6000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $textContent_1 = 'အချိန်ကာလ';
        $table->addCell(12000, ['gridSpan' => 2, 'valign' => 'center'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $textContent_1 = "နိုင်ငံခြားသို့\nသွားရောက်မည့်နေ့";
        $table->addCell(6000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $textContent_1 = "ထောက်ပံ့သည့်\nအဖွဲ့အစည်း";
        $table->addCell(8000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $textContent_1 = "ပြန်ရောက်လျှင်\nအမှုထမ်းမည့်\n ဌာန/ရာထူး";
        $table->addCell(8000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(6000, ['vMerge' => 'continue']);
        $table->addCell(6000, ['vMerge' => 'continue']);
        $table->addCell(6000)->addText('မှ', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(6000)->addText('ထိ', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(8000, ['vMerge' => 'continue']);
        $table->addCell(8000, ['vMerge' => 'continue']);
        $table->addCell(8000, ['vMerge' => 'continue']);

        foreach ($staff->abroads as $abroad) {
            $table->addRow();
            $table->addCell(6000)->addText($abroad->particular, null, $pStyle_1);
            $table->addCell(6000)->addText($abroad->country?->name, null, $pStyle_3);
            $table->addCell(6000)->addText(formatDMYmm($abroad?->from_date), null, $pStyle_3);
            $table->addCell(6000)->addText(formatDMYmm($abroad?->to_date), null, $pStyle_3);
            $table->addCell(6000)->addText(formatDMYmm($abroad->actual_abroad_date), null, $pStyle_3);
            $table->addCell(8000)->addText($abroad->sponser, null, $pStyle_3);
            $table->addCell(8000)->addText($abroad->position, null, $pStyle_3);
        }
        $section->addText('၁၆။' . 'အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။', ['bold' => false]);
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
        $table->addCell()->addText('ရာထူး', ['alignment' => 'right']);
        $table->addCell(500)->addText('-', ['alignment' => 'right']);
        $table->addCell(3000)->addText($staff->currentRank->name, ['alignment' => 'right']);

        $table->addRow();
        $table->addCell()->addText('ဌာန', ['alignment' => 'right']);
        $table->addCell(500)->addText('-', ['alignment' => 'right']);
        $table->addCell(3000)->addText($staff->current_department->name, ['alignment' => 'right']);

        $section->addText('ရက်စွဲ ' . mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)), ['align' => 'center']);
        $section->addText('၁၇။' . 'နိုင်ငံခြားသို့ သွားရောက်မည့်ပုဂ္ဂိုလ်၏လုပ်ရည်ကိုင်ရည်နှင့် အကျင့်စာရိတ္တ ကောင်းမွန်ကြောင်းထပ်ဆင့် လက်မှတ်ရေးထိုးပါသည်။', ['bold' => false]);
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
        $table->addCell()->addText('ရာထူး', ['alignment' => 'right']);
        $table->addCell(500)->addText('-', ['alignment' => 'right']);
        $table->addCell(3000)->addText($staff->currentRank->name, ['alignment' => 'right']);

        $table->addRow();
        $table->addCell()->addText('ဌာန', ['alignment' => 'right']);
        $table->addCell(500)->addText('-', ['alignment' => 'right']);
        $table->addCell(3000)->addText($staff->current_department->name, ['alignment' => 'right']);

        $section->addText('ရက်စွဲ ' . formatPeriodMM(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, \Carbon\Carbon::now()->day), ['align' => 'center']);

        $fileName = 'staff_report_' . $staff->id . '.docx';
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
        return view('livewire.pdf-staff-report17', [
            'staff' => $staff,
        ]);
    }
}
