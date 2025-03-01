<?php

namespace App\Livewire;

use App\Models\PensionType;
use App\Models\Relation;
use App\Models\RetireType;
use App\Models\Staff;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Retirement extends Component
{
    use WithFileUploads;
    public $staff;
    public $staff_id;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $retirementTypes = null;
    public $pensionTypes = null;

    public $message = null;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    public
        $retire_remark_attach,
        $retire_type_id,
        $pension_type_id,
        $retire_remark,
        $pension_salary,
        $gratuity,
        $pension_bank,
        $pension_office_order,
        $family_pension_inheritor,
        $family_pension_date,
        $family_pension_inheritor_relation_id,
        $retire_date,

        $relations;
    public function mount($staff_id)
    {
        $this->submit_form = 'submitForm';
        $this->cancel_action = 'close_modal';
        $this->staff = Staff::whereNotNull('retire_type_id')->find($staff_id);
        $this->staff_id = $staff_id;
        $this->retirementTypes = RetireType::all();
        $this->submit_button_text = 'သွင်းရန်';
        $this->relations = Relation::all();
    }

    public function add_new()
    {
        $this->confirm_add = true;
        $this->confirm_edit = false;
    }

    public function submitForm()
    {
        if ($this->confirm_add) {
            $this->createRetire();
        } else {
            $this->updateReitre();
        }
    }

    public function createRetire()
    {
        $this->staff = Staff::find($this->staff_id);
        $newAttachment = $this->retire_remark_attach
            ? Storage::disk('upload')->put('staffs', $this->retire_remark_attach)
            : $this->staff->retire_remark_attach;


        if ($newAttachment && $this->staff->retire_remark_attach) {
            Storage::disk('upload')->delete($this->staff->retire_remark_attach);
        }
        $this->staff->update([
            'retire_date' => $this->retire_date,
            'retire_type_id' => $this->retire_type_id,
            'pension_type_id' => $this->pension_type_id,
            'retire_remark' => $this->retire_remark,
            'retire_remark_attach' => $newAttachment,
            'pension_salary' => $this->pension_salary,
            'gratuity' => $this->gratuity,
            'pension_bank' => $this->pension_bank,
            'pension_office_order' => $this->pension_office_order,
            'family_pension_inheritor' => $this->family_pension_inheritor,
            'family_pension_date' => $this->family_pension_date,
            'is_active' => false,
            'status_changed_at' => now(),
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }

    public function close_modal()
    {
        $this->reset( [
            'retire_type_id',
            'pension_type_id',
            'retire_remark',
            'retire_remark_attach',
            'pension_salary',
            'gratuity',
            'pension_bank',
            'pension_office_order',
            'family_pension_inheritor',
            'family_pension_date',
            'family_pension_inheritor_relation_id',
            'retire_date'
        ]);
        $this->staff = Staff::whereNotNull('retire_type_id')->find($this->staff_id);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }

    public function edit_modal($id)
    {
        $this->pensionTypes = PensionType::where('retire_type_id', 5)->get();

        $this->retire_type_id = $this->staff->retire_type_id;
        $this->pension_type_id = $this->staff->pension_type_id;
        $this->retire_date = $this->staff->retire_date;
        $this->retire_remark = $this->staff->retire_remark;
        $this->pension_salary = $this->staff->pension_salary;
        $this->gratuity = $this->staff->gratuity;
        $this->pension_bank = $this->staff->pension_bank;
        $this->pension_office_order = $this->staff->pension_office_order;
        $this->family_pension_inheritor = $this->staff->family_pension_inheritor;
        $this->family_pension_date = $this->staff->family_pension_date;
        $this->retire_remark_attach = $this->staff->retire_remark_attach;
        $this->confirm_add = false;
        $this->confirm_edit = true;
    }

    public function updateReitre()
    {
        $this->staff = Staff::find($this->staff_id);

        $newAttachment = $this->retire_remark_attach
            ? Storage::disk('upload')->put('staffs', $this->retire_remark_attach)
            : $this->staff->retire_remark_attach;

        if ($newAttachment && $this->staff->retire_remark_attach) {
            Storage::disk('upload')->delete($this->staff->retire_remark_attach);
        }

        $this->staff->update([
            'retire_date' => $this->retire_date,
            'retire_type_id' => $this->retire_type_id,
            'pension_type_id' => $this->pension_type_id,
            'retire_remark' => $this->retire_remark,
            'retire_remark_attach' => $newAttachment,
            'pension_salary' => $this->pension_salary,
            'gratuity' => $this->gratuity,
            'pension_bank' => $this->pension_bank,
            'pension_office_order' => $this->pension_office_order,
            'family_pension_inheritor' => $this->family_pension_inheritor,
            'family_pension_date' => $this->family_pension_date,
            'is_active' => false,
            'status_changed_at' => now(),
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    public function delete_confirm($id)
    {
        $this->confirm_delete = true;
    }

    public function delete($id)
    {
        $this->staff = Staff::whereNotNull('retire_type_id')->find($this->staff_id);
        if ($this->staff->retire_remark_attach) {
            Storage::disk('upload')->delete($this->staff->retire_remark_attach);
        }
        $this->staff->update([
            'retire_date' => null,
            'retire_type_id' => null,
            'pension_type_id' => null,
            'retire_remark' => null,
            'retire_remark_attach' => null,
            'pension_salary' => null,
            'gratuity' => null,
            'pension_bank' => null,
            'pension_office_order' => null,
            'family_pension_inheritor' => null,
            'family_pension_date' => null,
            'status_changed_at' => now(),
            'previous_active_status' => 0,
        ]);

        $this->reset( [
            'retire_type_id',
            'pension_type_id',
            'retire_remark',
            'retire_remark_attach',
            'pension_salary',
            'gratuity',
            'pension_bank',
            'pension_office_order',
            'family_pension_inheritor',
            'family_pension_date',
            'family_pension_inheritor_relation_id',
            'retire_date'
        ]);
        $this->staff = Staff::whereNotNull('retire_type_id')->find($this->staff_id);
        $this->confirm_delete = false;
    }

    public function updatedRetireTypeId($value){

        $this->pensionTypes = PensionType::where('retire_type_id', $value)->get();
    }

    public function render()
    {
        return view('livewire.retirement');
    }
}
