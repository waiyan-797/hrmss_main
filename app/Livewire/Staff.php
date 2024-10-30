<?php

namespace App\Livewire;

use App\Models\Staff as ModelsStaff;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Staff extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $open_staff_report = false;
    public $message = null;
    public $staff_search, $staff_name, $staff_id = 0;
    public $modal_title;

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

    public function render()
    {
        $staffSearch = '%' . $this->staff_search . '%';
        $this->modal_title = 'Choose Report Type';
        $staffQuery = ModelsStaff::query();
        if ($this->staff_search) {
            $this->resetPage();
            $staffQuery->where(function ($q) use ($staffSearch) {
                $q->where('name', 'LIKE', $staffSearch)->orWhere('staff_no', 'LIKE', $staffSearch);
            });
            $staffs = $staffQuery->paginate($staffQuery->count() > 10 ? $staffQuery->count() : 10);
        } else {
            $staffs = $staffQuery->paginate(10);
        }


        return view('livewire.staff', [
            'staffs' => $staffs,
        ]);
    }
}
