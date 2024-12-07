<?php

namespace App\Livewire\PensionFamily;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

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
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]); 
        $section->addTitle('မိသားစုပင်စင်ခံစားခဲ့သူများစာရင်း', 1,);

        // Add table
        $table = $section->addTable([
            'borderSize' => 6,
            'cellMargin' => 80
        ]);

        // Add table header
        $table->addRow();
        $headerTitles = [
            'စဥ်',
            'ကွယ်လွန်ဝန်ထမ်းအမည်',
            'တာဝန်ထမ်းဆောင်ခဲ့သည့်ရာထူး',
            'စတင်အမှုထမ်းသောနေ့',
            'အမှုထမ်းသက်ဆုံးခန်းတိုင်သည့်နေ့',
            'လုပ်သက်',
            'ကွယ်လွန်သည့်နေ့',
            'မိသားစုပင်စင်ခံစားမည့်အမည်',
            'ကွယ်လွန်သူသည်ပင်စင်စားဖြစ်လျှင်ပင်စင်ယူသောနေ့',
            'ကွယ်လွန်သူနှင့်တော်စပ်ပုံ',
            'မိသားစုပင်စင်ခံစားသည့်နေ့',
            'ထုတ်ယူလိုသည့်ဘဏ်',
            'ရရှိမည့်ပင်စင်လစာ/ဆုငွေ',
            'ဆက်သွယ်ရန်လိပ်စာ/တယ်လီဖုန်းနံပါတ်'
        ];

        foreach ($headerTitles as $title) {
            $table->addCell(2000)->addText($title, ['bold' => true]);
        }

        // Add table rows
        foreach ($staffs as $index => $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($staff->name);
            $table->addCell(2000)->addText(implode(', ', $staff->postings->pluck('rank.name')->toArray()));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->retire_date)->format('d-m-y')));
            $table->addCell(2000)->addText($this->calculateExperience($staff)); // Define this method as needed
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->date_of_death)->format('d-m-y')));
            $table->addCell(2000)->addText($staff->family_pension_inheritor);
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->family_pension_date)->format('d-m-y')));
            $table->addCell(2000)->addText($staff->family_pension_inheritor_relation?->name);
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->family_pension_date)->format('d-m-y')));
            $table->addCell(2000)->addText($staff->pension_bank);
            $table->addCell(2000)->addText($staff->pension_salary . '၊ ' . $staff->gratuity);
            $table->addCell(2000)->addText($this->getContactInfo($staff));
        }

        // Save the file
        $filePath = 'pension_family_report.docx';
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


        $staffQuery = Staff::query();

        if ($this->searchName) {
            $staffQuery->where('name', 'like', '%' . $this->searchName . '%');
        }
        $staffQuery->whereHas('pension_type');
        $this->staffs = $staffQuery->get();
        return view('livewire.pension-family.pension-family', [
            'staffs' => $this->staffs,
        ]);
    }
}
