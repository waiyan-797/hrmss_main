<?php

namespace App\Livewire;

use App\Models\Relation;
use App\Models\RetireType;
use App\Models\Staff;
use Livewire\Component;

class Retirement extends Component
{
    public $staff;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $retirementTypes = null;

    public $retire_date;

    public $message = null;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    public
        $retire_type_id,
        $lost_contact_from_date,
        $retire_remark,
        $pension_salary,
        $gratuity,
        $pension_bank,
        $pension_office_order,
        $date_of_death,
        $family_pension_inheritor,
        $family_pension_date,
        $family_pension_inheritor_relation_id,

        $relations;
    public function mount($staff_id)
    {
        $this->submit_form = 'submitForm';
        $this->cancel_action = 'close_modal';

        $this->staff = Staff::find($staff_id);
        $this->retirementTypes = RetireType::all();
        $this->submit_button_text = 'သွင်းရန်';
        $this->relations = Relation::all();
    }
    public function render()
    {
        return view('livewire.retirement');
    }



    public function add_new()
    {


        $this->resetValidation();


        $this->staff->retire_date  = $this->retire_date;
        $this->staff->retire_type_id = $this->retire_type_id;
        $this->staff->lost_contact_from_date = $this->lost_contact_from_date;
        $this->staff->retire_remark = $this->retire_remark;
        $this->staff->pension_salary = $this->pension_salary;
        $this->staff->gratuity = $this->gratuity;
        $this->staff->pension_bank = $this->pension_bank;
        $this->staff->pension_office_order = $this->pension_office_order;
        $this->staff->date_of_death = $this->date_of_death;
        $this->staff->family_pension_inheritor = $this->family_pension_inheritor;
        $this->staff->family_pension_date = $this->family_pension_date;






        $this->staff->update();


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
        $this->staff->retire_date  = $this->retire_date;
        $this->staff->retire_type_id = $this->retire_type_id;
        $this->staff->lost_contact_from_date = $this->lost_contact_from_date;
        $this->staff->retire_remark = $this->retire_remark;
        $this->staff->pension_salary = $this->pension_salary;
        $this->staff->gratuity = $this->gratuity;
        $this->staff->pension_bank = $this->pension_bank;
        $this->staff->pension_office_order = $this->pension_office_order;
        $this->staff->date_of_death = $this->date_of_death;
        $this->staff->family_pension_inheritor = $this->family_pension_inheritor;
        $this->staff->family_pension_date = $this->family_pension_date;
        $this->staff->is_active = false;
        $this->staff->status_changed_at = now();

        $this->staff->update();
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset([]);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }

    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->retire_date = $this->staff->retire_date;
        $this->retire_type_id = $this->staff->retire_type_id;
        $this->lost_contact_from_date = $this->staff->lost_contact_from_date;
        $this->retire_remark = $this->staff->retire_remark;
        $this->pension_salary = $this->staff->pension_salary;
        $this->gratuity = $this->staff->gratuity;
        $this->pension_bank = $this->staff->pension_bank;
        $this->pension_office_order = $this->staff->pension_office_order;
        $this->date_of_death = $this->staff->date_of_death;
        $this->family_pension_inheritor = $this->staff->family_pension_inheritor;
        $this->family_pension_date = $this->staff->family_pension_date;



        $this->confirm_add = false;
        $this->confirm_edit = true;
    }

    public function updateReitre()
    {
        // $this->validate();

        $this->staff->retire_date  = $this->retire_date;
        $this->staff->retire_type_id = $this->retire_type_id;
        $this->staff->lost_contact_from_date = $this->lost_contact_from_date;
        $this->staff->retire_remark = $this->retire_remark;
        $this->staff->pension_salary = $this->pension_salary;
        $this->staff->gratuity = $this->gratuity;
        $this->staff->pension_bank = $this->pension_bank;
        $this->staff->pension_office_order = $this->pension_office_order;
        $this->staff->date_of_death = $this->date_of_death;
        $this->staff->family_pension_inheritor = $this->family_pension_inheritor;
        $this->staff->family_pension_date = $this->family_pension_date;
        $this->staff->is_active = false;
        $this->staff->status_changed_at = now();

        $this->staff->update();
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    public function delete_confirm($id)
    {

        $this->confirm_delete = true;
    }

    public function delete($id)
    {

        $this->staff->retire_date = null;
        $this->staff->retire_type_id = null;
        $this->staff->lost_contact_from_date = null;
        $this->staff->retire_remark = null;
        $this->staff->pension_salary = null;
        $this->staff->gratuity = null;
        $this->staff->pension_bank = null;
        $this->staff->pension_office_order = null;
        $this->staff->date_of_death = null;
        $this->staff->family_pension_inheritor = null;
        $this->staff->family_pension_date = null;
        $this->staff->status_changed_at = now();
        $this->staff->previous_active_status = 0;
        $this->confirm_delete = false;
        $this->staff->update();
    }
}
