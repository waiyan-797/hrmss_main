<?php

namespace App\Livewire;

use App\Models\LabourAttendance;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Support\Collection;

use Livewire\Component;
use Omnia\LivewireCalendar\LivewireCalendar ;

use function Livewire\Volt\js;

class AppointmentsCalendar extends LivewireCalendar
{
    

//date filter 

public $SelectedMonth ;
//date filter 

    // vendor/livewire-calender/after-calender
public $staff  , 
$id ; 
public $totalLeaves;
public $isExit;
public $initialMonth,
 $initialYear,
$weekStartsAt,
$calendarView,
$dayView,
$eventView,
$dayOfWeekView,
$dragAndDropClasses,
$beforeCalendarView,
$afterCalendarView,
$pollMillis,
$pollAction ;

public $currentDate ;



public function mount(
    
    $initialYear = null,
$initialMonth = null,
$weekStartsAt = null,
$calendarView = null,
$dayView = null,
$eventView = null,
$dayOfWeekView = null,
$dragAndDropClasses = null,
$beforeCalendarView = null,
$afterCalendarView = null,
$pollMillis = null,
$pollAction = null,
$dragAndDropEnabled = true,
$dayClickEnabled = true,
$eventClickEnabled = true,

$extras = [])
{
    
    
    $this->id  = request()->id;
    $this->SelectedMonth  = Carbon::now()->format('Y-m');


$this->weekStartsAt = $weekStartsAt ?? Carbon::SUNDAY;
$this->weekEndsAt = $this->weekStartsAt == Carbon::SUNDAY
? Carbon::SATURDAY
: collect([0,1,2,3,4,5,6])->get($this->weekStartsAt + 6 - 7)
;

$initialYear = $initialYear ?? Carbon::today()->year;
$initialMonth = $initialMonth ?? Carbon::today()->month;

$this->startsAt = Carbon::createFromDate($initialYear, $initialMonth, 1)->startOfDay();
$this->endsAt = $this->startsAt->clone()->endOfMonth()->startOfDay();

$this->calculateGridStartsEnds();




//my code 

$this->calendarView = 'vendor.livewire-calendar.calendar';
$this->beforeCalendarView  = 'vendor.livewire-calendar.before-calendar';
$this-> afterCalendarView= 'vendor.livewire-calendar.after-calendar';


//
$this->setupViews($calendarView, $dayView, $eventView, $dayOfWeekView, $this->beforeCalendarView, $this->afterCalendarView);

$this->setupPoll($pollMillis, $pollAction);

$this->dragAndDropEnabled = $dragAndDropEnabled;
$this->dragAndDropClasses = $dragAndDropClasses ?? 'border border-blue-400 border-4';

$this->dayClickEnabled = $dayClickEnabled;
$this->eventClickEnabled = $eventClickEnabled;

$this->afterMount($extras);
}






    public function events() : Collection
{
    
    
     
 


    $this->staff = Staff::find($this->id);
    $decodedAttDate   = json_decode($this->staff->labourAttdence?->att_date ) ;
    
    $data = [];
    // @dd($decodedAttDate);
    if($decodedAttDate){
        foreach ($decodedAttDate as $key => $value) {
            
        
            $data[]=[
                'id' => $key ,
  
                'date' => Carbon::parse("$value[0]-$value[1]-$value[2]") ,
                'Noleave' => true
            ];
        }
    
    }
 
    


   
    
    return collect($data);
    return collect([
        [
            'id' => 1,
            'title' => 'Breakfast',
            'description' => 'Pancakes! 🥞',
            'date' => Carbon::tomorrow(),
            'leave' => true ,

            
        ],
        [
            'id' => 2,
            'title' => 'Meeting with Pamela',
            'description' => 'Work stuff',
            'date' => Carbon::today(),
            'leave' => true ,


        ],
    ]);
}

public function onDayClick($year, $month, $day)
{
    
 
    $addDate =json_encode([[$year , $month , $day ]]);
    $DecodeAddDate = [$year , $month , $day ];
    
    if(LabourAttendance::find($this->staff->labourAttdence?->id)){

        $JsonAtt_date = LabourAttendance::findOrFail($this->staff->labourAttdence->id)->att_date ;

        
        
        $newAndOld = [ ...json_decode($JsonAtt_date )  ];

        $this->isExit = false  ;         
         $result = array_filter($newAndOld , function($current) use ( $DecodeAddDate ){
            
            $count =0;
                for ($i=0; $i < 3 ; $i++) { 
                    
                    if(  $current[$i] == $DecodeAddDate[$i] ){
                        ++$count;
                    }
                }

                if($count == 3 ){
                    
                    $this->isExit = true ;
                }
                
                return $count != 3 ;
        });
        
       if($this->isExit){
        
            $addDate = json_encode([...$result]);
       }
       else{
        $addDate =  json_encode( [ ...json_decode($JsonAtt_date )  , [$year , $month , $day ] ])  ; 

       }

    }
    LabourAttendance::updateOrcreate(

        ['id' => $this->staff->labourAttdence?->id] ,
        [
             'staff_id' => $this->staff->id ,
             'att_date'  => $addDate 
        ]
        );
      


}
public function render()
{
    
    $events = $this->events();
    
    $initialYear = explode('-',$this->SelectedMonth)[0];
    $initialMonth = explode('-',$this->SelectedMonth)[1];
    $this->initialMonth = $initialMonth;
    $this->initialYear = $initialYear;
    

        $this->startsAt = Carbon::createFromDate($initialYear, $initialMonth, 1)->startOfDay();
    $this->endsAt = $this->startsAt->clone()->endOfMonth()->startOfDay();
    $this->calculateGridStartsEnds();

    $this->totalLeaves =  $this->staff->labourLeave($this->initialYear , $this->initialMonth);

    
    return view($this->calendarView)
        ->with([
            'componentId' => $this->getId(),
            'monthGrid' => $this->monthGrid(),
            'events' => $events,
            'getEventsForDay' => function ($day) use ($events) {
                return $this->getEventsForDay($day, $events);
            }
        ]);
}
   
}
