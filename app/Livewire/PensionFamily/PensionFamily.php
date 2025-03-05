<?php

namespace App\Livewire\PensionFamily;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;

class PensionFamily extends Component
{

    public $searchName;
    public $staffs;

    public function go_pdf()
    {
        $staffsQuery = Staff::query();
        if ($this->searchName) {
            $staffsQuery->where('name', 'like', '%' . $this->searchName . '%');
        }
        $staffsQuery->whereHas('pension_type');
        $staffs =  $staffsQuery->get();

        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.pension_family_report',$data) ;
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'pension_family_report_pdf.pdf');
    }
   

    public function go_word()
    {
        $staffsQuery = Staff::query();
        if ($this->searchName) {
            $staffsQuery->where('name', 'like', '%' . $this->searchName . '%');
        }
        $staffsQuery->whereHas('pension_type');
        $staffs =  $staffsQuery->get();
        
        $phpWord = new PhpWord(); 
        
        $section = $phpWord->addSection([
            'pageSizeW'    => Converter::inchToTwip(14),  
            'pageSizeH'    => Converter::inchToTwip(8.5), 
            'orientation'  => 'landscape',
            'marginTop'    => Converter::inchToTwip(0.5),
            'marginBottom' => Converter::inchToTwip(0.5),
            'marginLeft'   => Converter::inchToTwip(1),
            'marginRight'  => Converter::inchToTwip(0.5),
        ]);
        $phpWord->setDefaultFontSize(11); 
        $section->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', ['bold' => true, 'size' => 11], ['align' => 'center']);
        $section->addText('မိသားစုပင်စင်ခံစားခဲ့သည့်စာရင်း', ['bold' => true, 'size' => 11], ['align' => 'center']);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 350, 'spaceBefore' => 350];
        $pStyle_2 = ['align' => 'center', 'spaceAfter' => 300, 'spaceBefore' => 300];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(1000)->addText('စဉ်',['bold' => true], $pStyle_1);
        $table->addCell(2000)->addText('အမည်', ['bold' => true],$pStyle_1);
        $table->addCell(3000)->addText("တာဝန်ထမ်း\nဆောင်ခဲ့သည့်\nရာထူး", ['bold' => true],$pStyle_2);
        $table->addCell(3000)->addText("စတင်\nအမှုထမ်း\nသောနေ့", ['bold' => true],$pStyle_2);
        $table->addCell(3000)->addText("အမှုထမ်း\nသက်ဆုံးခန်း\nတိုင်သည့်နေ့", ['bold' => true],$pStyle_2);
        $table->addCell(2000)->addText("လုပ်သက်", ['bold' => true],$pStyle_2);
        $textContent_1 = "အိမ်ထောင်\nသားစု\nပင်စင်အကျိုး\nခံစားခွင့်ရှိ\nသည့်အမည်";
        $table->addCell(3000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_2);
       
        $textContent_2 = "ဝန်ထမ်း/\nပင်စင်စား\nကွယ်လွန်\nသည့်နေ့";
        $table->addCell(3000, ['vMerge' => 'restart'])->addText($textContent_2, ['bold' => true], $pStyle_2);
        $textContent_3 = "ကွယ်လွန်သူ\nသည်\nပင်စင်စားဖြစ်လျှင်\nပင်စင်ယူ\nသောနေ့";
        $table->addCell(3000, ['vMerge' => 'restart'])->addText($textContent_3, ['bold' => true], $pStyle_2);
        // $table->addCell(3000)->addText('ကွယ်လွန်သူသည်ပင်စင်စား ဖြစ်လျှင်ပင်စင်ယူသောနေ့', ['bold' => true],$pStyle_2);
        $table->addCell(3000)->addText("ကွယ်လွန်သူနှင့်\nတော်စပ်ပုံ", ['bold' => true],$pStyle_2);
        $table->addCell(3000)->addText("မိသားစု\nပင်စင်\nခံစားသည့်နေ့", ['bold' => true],$pStyle_2);
        $table->addCell(3000)->addText("ထုတ်ယူလို\nသည့်ဘဏ်", ['bold' => true],$pStyle_2);
        $table->addCell(3000)->addText("ရရှိမည့်\nပင်စင်လစာ/\nဆုငွေ", ['bold' => true],$pStyle_3);
        $table->addCell(4000)->addText("ဆက်သွယ်ရန်\nလိပ်စာ/\nတယ်လီဖုန်းနံပါတ်", ['bold' => true],$pStyle_3);
        // Add table rows
        foreach ($staffs as $index => $staff) {
            $table->addRow();
            $table->addCell(2000)->addText(en2mm($index + 1),null,$pStyle_1);
            $table->addCell(2000)->addText($staff->name,null,$pStyle_1);
            $table->addCell(3000)->addText($staff->postings->sortByDesc('to_date')->first()?->rank?->name,null,$pStyle_2);
            $table->addCell(3000)->addText(formatDMYmm($staff->join_date),null,$pStyle_2);
            $table->addCell(3000)->addText(formatDMYmm($staff->retire_date),null,$pStyle_2);
            $table->addCell(2000)->addText($this->calculateExperience($staff),null,$pStyle_2); 
            $table->addCell(3000)->addText(formatDMYmm($staff->date_of_death),null,$pStyle_2);
            $table->addCell(3000)->addText(formatDMYmm($staff->family_pension_date),null,$pStyle_2);
            $table->addCell(3000)->addText($staff->family_pension_inheritor,null,$pStyle_2);
            $table->addCell(3000)->addText($staff->family_pension_inheritor_relation?->name,null,$pStyle_2);
            $table->addCell(3000)->addText(formatDMYmm($staff->family_pension_date),null,$pStyle_2);
            $table->addCell(3000)->addText($staff->pension_bank,null,$pStyle_2);
            $table->addCell(3000)->addText($staff->pension_salary . "\n" . $staff->gratuity,null,$pStyle_2);
            $table->addCell(4000)->addText($this->getContactInfo($staff),null,$pStyle_2);
        }
        $filePath = 'P04.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    private function calculateExperience($staff)
    {
        $currentDate = \Carbon\Carbon::now();
        $rankDate = \Carbon\Carbon::parse($staff->current_rank_date);
        $diff = $rankDate->diff($currentDate);
        return ($diff->y == 0 ? '' : en2mm($diff->y) . ' နှစ်') .
            ($diff->m == 0 ? '' : en2mm($diff->m) . ' လ') .
            ($diff->d == 0 ? '' : en2mm($diff->d) . ' ရက်');
    }
    private function getContactInfo($staff)
    {
        return $staff->permanent_address_ward . '၊ ' .
            $staff->permanent_address_street . '၊ ' .
            $staff->permanent_address_township_or_town->name . '၊ ' .
            $staff->permanent_address_region->name . '၊ ' .
            $staff->phone;
    }
    public function render()
{
    $staffQuery = Staff::query()
        ->where('pension_type_id', 6); 

    if ($this->searchName) {
        $staffQuery->where('name', 'like', '%' . $this->searchName . '%');
    }

    $this->staffs = $staffQuery->get();

    return view('livewire.pension-family.pension-family', [
        'staffs' => $this->staffs,
    ]);
}

}
