<?php

namespace App\Livewire;

use App\Models\Promotion;
use App\Models\Rank;
use App\Models\RetireType;
use App\Models\Staff as ModelsStaff;
use App\Models\Division;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Staff extends Component
{
    use WithPagination;
        public $status;
        public $confirm_delete = false;
        public $confirm_edit = false;
        public $confirm_add = false;
        public $open_staff_report = false;
        public $message = null;
        public $staff_search, $staff_name, $staff_id = 0;
        public $selectedRank,$selectedDivision,$selectedRetireType;
        // public $retire_type_filter = null;
        public $retire_type_filter = false;

        public $retire_type;
        public $modal_title;
        public $selectedComment = null;
        public function mount($status){
        $this->status = $status;
        $this->retire_type = RetireType::pluck('name', 'id');

    }
   
    //add new
    public function add_new()
    {
        $this->confirm_add = 1;
        $this->confirm_edit = 0;
        $this->reset('staff_id');
        $this->redirect(route('staff_detail', [
            'confirm_add' => $this->confirm_add,
            'confirm_edit' => $this->confirm_edit,
            'staff_id' => $this->staff_id,
            'tab' => 'personal_info',
        ]), navigate: true);
    }

    //edit
    public function edit_modal($id)
    {
        $this->confirm_add = 0;
        $this->confirm_edit = 1;
        $this->staff_id = $id;
        $this->redirect(route('staff_detail', [
            'confirm_add' => $this->confirm_add,
            'confirm_edit' => $this->confirm_edit,
            'staff_id' => $this->staff_id,
            'tab' => 'personal_info',
        ]), navigate: true);
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->staff_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        $staff = ModelsStaff::find($id);
        Storage::disk('upload')->delete($staff->staff_photo);
        $staff->delete();
        $this->confirm_delete = false;
    }

    #[On('render_staff')] //emitting event
    public function render_staff()
    {
        $this->render();
    }

    public function open_report($staff_id)
    {
        $this->open_staff_report = true;
        $this->staff_id = $staff_id;
    }

    public function go_report($staff_id, $report_id)
    {
        $routeName = "pdf_staff_report{$report_id}";
        $this->redirect(route($routeName, [
            'staff_id' => $staff_id,
        ]), navigate: true);
    }

    // public function render()
    // {
    //     $staffSearch = '%' . $this->staff_search . '%';
    //     $this->modal_title = 'Choose Report Type';
    //     $staffQuery = ModelsStaff::where('status_id' , $this->status)->when(Auth::user()->role_id != 2, function($q){
    //         return $q->where('current_division_id', Auth::user()->division_id);
    //     });
    //     if ($this->staff_search) {
    //         $this->resetPage();
    //         $staffQuery->where(function ($q) use ($staffSearch) {
    //             $q->where('name', 'LIKE', $staffSearch)->orWhere('staff_no', 'LIKE', $staffSearch);
    //         });
    //         $staffs = $staffQuery->paginate($staffQuery->count() > 1 ? $staffQuery->count() : 1);
    //     } else {
    //         $staffs = $staffQuery->paginate(10);
    //     }


    //     return view('livewire.staff', [
    //         'staffs' => $staffs,
    //     ]);
    // }
    public function render()
    {
       
        $saveDraftCount = ModelsStaff::where('status_id', 1)->count();
        $submitCount = ModelsStaff::where('status_id', 2)->count();
        $rejectCount = ModelsStaff::where('status_id', 3)->count();
        $resubmitCount = ModelsStaff::where('status_id', 4)->count();
        $approveCount = ModelsStaff::where('status_id', 5)->count();
    $staffQuery = ModelsStaff::with(['currentRank', 'current_department', 'current_division'])
        ->where('status_id', $this->status)
        ->when(Auth::user()->role_id != 2 && Auth::user()->role_id != 3, function ($q) {
            return $q->where('current_division_id', Auth::user()->division_id);
        });



    // $staffQuery = ModelsStaff::with(['currentRank', 'current_department', 'current_division'])
    // ->where('status_id', $this->status)
    // ->where('created_by', Auth::id())
    // ->when(Auth::user()->role_id != 2, function ($q) {
    //     return $q->where('current_division_id', Auth::user()->division_id);
    // });
        $staffSearch = '%' . $this->staff_search . '%';
        $this->modal_title = 'Choose Report Type';

        // Base query for staff
        $staffQuery = ModelsStaff::with(['currentRank', 'current_department', 'current_division'])
            ->where('status_id', $this->status)
            ->when(Auth::user()->role_id != 2, function ($q) {
                return $q->where('current_division_id', Auth::user()->division_id);
            });

            
        if ($this->selectedDivision) {
            $staffQuery->where('current_division_id', $this->selectedDivision);
        }

        // Apply rank filter if selected
        if ($this->selectedRank) {
            $staffQuery->whereHas('currentRank', function ($query) {
                $query->where('id', $this->selectedRank);
            });
        }
        if ($this->retire_type_filter) {
            $staffQuery->whereNotNull('retire_type_id');
        }
        if ($this->selectedRetireType) {
            $staffQuery->where('retire_type_id', $this->selectedRetireType);
        }

        // Apply search filter if search query is present
        if ($this->staff_search) {
            $this->resetPage(); // Reset pagination when searching
            $staffQuery->where(function ($q) use ($staffSearch) {
                $q->where('name', 'LIKE', $staffSearch)
                  ->orWhere('staff_no', 'LIKE', $staffSearch);
            });
        }

        // Paginate the results
        $staffs = $staffQuery->paginate(10); // Use a fixed number for pagination

        return view('livewire.staff', [
            'staffs' => $staffs,
            'ranks' => Rank::where('is_dica',1)->get(),
            'divisions' => Division::all(),
            'retire_type' => RetireType::all(),
'retire_type_filter' => ModelsStaff::whereNotNull('retire_type_id')->get(),
'saveDraftCount'=>$saveDraftCount,
'submitCount'=>$submitCount,
'rejectCount' => $rejectCount,
'resubmitCount' => $resubmitCount,
'approveCount'=>$approveCount,
        ]);
    }

    public function check($id){
        return Promotion::where('staff_id', $id)->get()->isEmpty()  ;
    }

    public function showComment($comment = null)
    {
        $this->selectedComment = $comment;
    }

    public function closeModal()
    {
        $this->selectedComment = null;
    }

    public function request_approve($staff_id){
        ModelsStaff::where('id', $staff_id)->update([
            'status_id' => 4, //sent back to user resubmit status
        ]);

        $this->selectedComment = null;
        $this->message = 'Request Approved Successfully!';
    }

}
