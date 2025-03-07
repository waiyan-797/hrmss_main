<?php

namespace App\Livewire;

use App\Models\Staff;
use Carbon\Carbon;
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
            'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),     // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 8
        ]);
        $pStyle_1 = array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 0);
        $pStyle_2 = array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 200);
        $pStyle_3 = array('align' => 'left', 'spaceAfter' => 30, 'spaceBefore' => 70, 'indentation' => ['left' => 100]);
        $pStyle_6 = array('align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 70);
        $pStyle_7 = array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 350);
        $pStyle_4 = array('align' => 'both', 'spaceAfter' => 10, 'spaceBefore' => 20, 'indentation' => ['left' => 100]);
        $pStyle_5 = array('align' => 'center', 'spaceAfter' => 15, 'spaceBefore' => 20);
        $pStyle_8 = array('align' => 'left', 'spaceAfter' => 10, 'spaceBefore' => 20, 'indentation' => ['left' => 100]);
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

            $textBox->addImage($defaultImagePath, ['width' => 62, 'height' => 65, 'align' => 'center', 'padding' => 0]);
        }
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
        // $footer = $section->addFooter();
        // $footer->addText('လျှို့ဝှက်', null, ['align' => 'center', 'spaceBefore' => 200]);
        // $footer = $section->addFooter();
        // $footer->addText('လျှို့ဝှက်', null, ['alignment' => 'center', 'spaceBefore' => 200]);
        $footerFirstPage = $section->addFooter();
        $footerFirstPage->firstPage();
        $footerFirstPage->addText('လျှို့ဝှက်', null, ['alignment' => 'center', 'spaceBefore' => 200]);
        $footer = $section->addFooter();
        $footer->addText('လျှို့ဝှက်', null, ['align' => 'center', 'spaceBefore' => 200]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        $section->addTitle('ကိုယ်‌ရေးမှတ်တမ်း', 1);

        $table = $section->addTable();
        $table->addRow(50);
        $table->addCell(1300)->addText('၁။', null, $pStyle_5);
        $table->addCell(13000)->addText('အမည်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->name, null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၂။', null, $pStyle_5);
        $table->addCell(13000)->addText('အသက်(မွေးသက္ကရာဇ်)', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(formatDMYmm($staff->dob), null, $pStyle_8);
        $table->addRow(50);
        $table->addCell(1300)->addText('၃။', null, $pStyle_5);
        $table->addCell(13000)->addText('လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(($staff->ethnic_id ? $staff->ethnic->name : '-') . '/' . ($staff->religion_id ? $staff->religion->name : '-'), null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၄။', null, $pStyle_5);
        $table->addCell(13000)->addText('နိုင်ငံသားစိစစ်ရေးအမှတ်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . $staff->nrc_sign->name . $staff->nrc_code, null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၅။', null, $pStyle_5);
        $table->addCell(13000)->addText('ရာထူး/ ဌာန', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->current_rank->name . "\n" . $staff->current_department->name .'၊'. 'ရင်နှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်‌ရေးဝန်ကြီးဌာန။', null, $pStyle_8);

        $joinDate = \Carbon\Carbon::parse($staff->government_staff_started_date);
        $joinDateDuration = $joinDate->diff(\Carbon\Carbon::now());
        $table->addRow(50);
        $table->addCell(1300)->addText('၆။', null, $pStyle_5);
        $table->addCell(13000)->addText('အမှုထမ်းသက်၊ဝင်ရောက်သည့်ရက်စွဲ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(formatPeriodMM($joinDateDuration->y.'၊',          $joinDateDuration->m) . '၊ ' . formatDMYmm($joinDate), null, $pStyle_8);



        $table->addRow(50);
        $table->addCell(1300)->addText('၇။', null, $pStyle_5);
        $table->addCell(13000)->addText('လက်ရှိနေရပ်လိပ်စာ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->current_address_house_no . $staff->current_address_street . $staff->current_address_ward . $staff->current_address_township_or_town->name . 'မြို့နယ်' . '၊' . $staff->current_address_region->name . 'ဒေသကြီး။', null, $pStyle_8);
        $table->addRow(50);
        $table->addCell(1300)->addText('၈။', null, $pStyle_5);
        $table->addCell(13000)->addText('ပညာအရည်အချင်း', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $educationNames = $staff->staff_educations->map(fn($edu) => $edu->education?->name)->implode(', ');
        $table->addCell(13000)->addText($educationNames, null, $pStyle_8);
        $table->addRow(50);
        $table->addCell(1300)->addText('၉။', null, $pStyle_5);
        $table->addCell(13000)->addText('အဘအမည် ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->father_name, null, $pStyle_8);
        $table->addRow(50);
        $table->addCell(1300)->addText('၁၀။', null, $pStyle_5);
        $table->addCell(13000)->addText('အလုပ်အကိုင်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->father_occupation, null, $pStyle_8);
        $table->addRow(50);
        $table->addCell(1300)->addText('၁၁။', null, $pStyle_5);
        $table->addCell(13000)->addText('အမိအမည် ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->mother_name, null, $pStyle_8);
        $table->addRow(50);
        $table->addCell(1300)->addText('၁၂။', null, $pStyle_5);
        $table->addCell(13000)->addText('အလုပ်အကိုင် ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->mother_occupation, null, $pStyle_8);
        $table->addRow(50);
        $table->addCell(1300)->addText('၁၃။', null, $pStyle_5);
        $table->addCell(13000)->addText("နိုင်ငံခြားသွားရောက်ဖူးခြင်းရှိ/မရှိ \n(အကြိမ်အရေအတွက်)", null, $pStyle_8);
        $table->addCell(1300)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(
            $staff->abroads->count() > 0 ? en2mm($staff->abroads->count() . 'ကြိမ်') : 'မရှိပါ',
            null,
            $pStyle_8
        );
        $section->addText('');
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, array('tblHeader' => true));
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ကာလ', ['bold' => true], $pStyle_2);
        $table->addCell(1600, ['vMerge' => 'restart'])->addText("နောက်ဆုံး\nသွားရောက်\nခဲ့သည့်\n(၅)နိုင်ငံ", ['bold' => true], $pStyle_2);
        $table->addCell(4000, ['vMerge' => 'restart'])->addText("သွားရောက်သည့်ကိစ္စ", ['bold' => true], $pStyle_2);
        $table->addCell(1800, ['vMerge' => 'restart'])->addText("သင်တန်း\nတတ်ခြင်း\nဖြစ်လျှင်\nအောင်\nမအောင်", ['bold' => true], $pStyle_2);
        $table->addCell(1800, ['vMerge' => 'restart'])->addText("မည်သည့်\nအစိုးရ\nအဖွဲ့အစည်း\nအထောက်\nအပံ့", ['bold' => true], $pStyle_2);
        $table->addRow(50, array('tblHeader' => true));
        $table->addCell(2000)->addText('မှ', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(2000)->addText('ထိ', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(1600, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(1800, ['vMerge' => 'continue']);
        $table->addCell(1800, ['vMerge' => 'continue']);
        if ($staff->abroads->isNotEmpty()) {
            $latestAbroads = $staff->abroads
                ? $staff->abroads->sortByDesc('to_date')->take(5)
                : collect();
            foreach ($latestAbroads as $abroad) {
                $table->addRow();
                $table->addCell(2000)->addText(formatDMYmm($abroad->from_date), null, $pStyle_6);
                $table->addCell(2000)->addText(formatDMYmm($abroad->to_date), null, $pStyle_6);
                $table->addCell(1600)->addText($abroad->countries->pluck('name')->unique()->join(', '), null, $pStyle_3);
                $table->addCell(4000)->addText($abroad->particular, null, $pStyle_3);
                $table->addCell(1800)->addText($abroad->training_success_count, null, $pStyle_3);
                $table->addCell(1800)->addText($abroad->sponser, null, $pStyle_3);
            }
        } else {
            $table->addRow();
            $cell = $table->addCell(13200, ['gridSpan' => 6]);
            $cell->addText(
                'မရှိပါ',
                null,
                ['alignment' => 'center']
            );
        }
        $section->addText('၁၄။ ' . ' ခင်ပွန်း၊ ဇနီးသည်', null, array('spaceBefore' => 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, array('tblHeader' => true));
        $table->addCell(3000)->addText("အမည်", ['bold' => true], $pStyle_7);
        // $table->addCell(1500)->addText('တော်စပ်ပုံ', ['bold' => true], $pStyle_7);
        // $table->addCell(1300)->addText("ကျား/မ", ['bold' => true], $pStyle_7);
        $table->addCell(800)->addText("လူမျိုး/ဘာသာ", ['bold' => true], $pStyle_2);
        $table->addCell(1300)->addText('ဇာတိ', ['bold' => true], $pStyle_7);
        $table->addCell(1500)->addText("အလုပ်အကိုင်", ['bold' => true], $pStyle_7);
        $table->addCell(3000)->addText('နေရပ်', ['bold' => true], $pStyle_7);
        // $table->addCell(1500)->addText('မှတ်ချက်', ['bold' => true], $pStyle_7);

        if ($staff->spouses->isNotEmpty()) {
            foreach ($staff->spouses as $spouse) {
                $table->addRow();
                $table->addCell(3000)->addText($spouse->name, null, $pStyle_3);
                // $table->addCell(1500)->addText($spouse->relation?->name, null, $pStyle_6);
                // $table->addCell(1300)->addText($spouse->gender?->name, null, $pStyle_6);
                $table->addCell(800)->addText($spouse->ethnic->name  . "/\n" . $spouse->religion->name, null, $pStyle_6);
                $table->addCell(1300)->addText($spouse->place_of_birth, null, $pStyle_6);
                $table->addCell(1500)->addText($spouse->occupation, null, $pStyle_3);
                $table->addCell(3200)->addText($spouse->address, null, $pStyle_3);
                // $table->addCell(1500)->addText();
            }
        } else {
            $table->addRow(50);
            $cell = $table->addCell(9800, ['gridSpan' => 5]);
            $cell->addText(
                'မရှိပါ',
                null,
                ['alignment' => 'center']
            );
        }

        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $pStyle_2 = ['align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 30];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $section->addTextBreak();
        $section->addText('၁၅။ ' . ' နိုင်ငံခြားသွားရောက်မည့်ကိစ္စ', null, array('spaceBefore' => 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, ['tblHeader' => true]);
        $textContent_1 = "သွားရောက်\nမည့်ကိစ္စ";
        $table->addCell(4000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_1);
        $textContent_1 = "စေလွှတ်\nသည့်နိုင်ငံ";
        $table->addCell(4000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $textContent_1 = 'အချိန်ကာလ';
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $textContent_1 = "နိုင်ငံခြားသို့\nသွားရောက်မည့်နေ့";
        $table->addCell(4000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $textContent_1 = "ထောက်ပံ့သည့်\nအဖွဲ့အစည်း";
        $table->addCell(4000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $textContent_1 = "ပြန်ရောက်လျှင်\nအမှုထမ်းမည့်\n ဌာန/ရာထူး";
        $table->addCell(4000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(2000)->addText('မှ', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(2000)->addText('ထိ', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addRow();
        $table->addCell(4000);
        $table->addCell(4000);
        $table->addCell(2000);
        $table->addCell(2000);
        $table->addCell(4000);
        $table->addCell(4000);
        $table->addCell(4000);
        $section->addText('');
        $section->addText('၁၆။ ' . ' အထက်ပါအချက်အလက်များကို မှန်ကန်သည့်အတိုင်း ဖြည့်သွင်းရေးသားထားပါကြောင်း ကိုယ်တိုင်လက်မှတ်ရေးထိုးပါသည်', null, array('spaceBefore' => 200));
        $tableStyle = [
            'alignment' => Jc::END,
        ];
        $table = $section->addTable($tableStyle);
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

        $section->addText('ရက်စွဲ၊ ' . mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)), ['align' => 'center']);

        $section->addText('၁၇။ ' . "နိုင်ငံခြားသို့သွားရောက်မည့်ပုဂ္ဂိုလ်၏လုပ်ရည်ကိုင်ရည်နှင့်အကျင့်စာရိတ္တကောင်းမွန်ကြောင်း\nထပ်ဆင့် လက်မှတ်ရေးထိုးပါသည်။", null, array('spaceBefore' => 200));


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
        $table->addCell(3000)->addText('ဦးသန့်စင်လွင်', ['alignment' => 'right']);
        $table->addRow();
        $table->addCell()->addText('ရာထူး', ['alignment' => 'right']);
        $table->addCell(500)->addText('-', ['alignment' => 'right']);
        $table->addCell(3000)->addText('ညွှန်ကြားရေးမှုးချုပ်', ['alignment' => 'right']);
        $table->addRow();
        $table->addCell()->addText('ဌာန', ['alignment' => 'right']);
        $table->addCell(500)->addText('-', ['alignment' => 'right']);
        $table->addCell(3000)->addText('ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', ['alignment' => 'right']);
        $section->addText('ရက်စွဲ၊ ' . mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)), ['align' => 'center']);

        $fileName = 'staff_report_17_' . $staff->id . '.docx';
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
