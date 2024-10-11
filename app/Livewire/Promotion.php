<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Promotion as ModelsPromotion;
use App\Models\Staff;
use App\Models\Rank;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use PhpParser\Node\Stmt\Return_;

class Promotion extends Component
{

    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $promotion_search, $staff_name, $rank_name, $promotion_id, $previous_rank_name, $promotion_date, $order_no;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;
    public $staff_id, $staff;
    protected $rules = [

        'rank_name' => 'required',
        'previous_rank_name' => 'required',
        'promotion_date' => 'required|date',
        'order_no' => 'required'

    ];



    public function add_new()
    {

        $this->resetValidation();
        $this->reset([

            'rank_name',
            'previous_rank_name',
            'promotion_date',
            'order_no'
        ]);

        $this->previous_rank_name = $this->staff->current_rank_id;
        $this->confirm_add = true;
        $this->confirm_edit = false;
    }

    public function submitForm()
    {
        if ($this->confirm_add) {
            $this->createpromotion();
        } else {
            $this->updatepromotion();
        }
    }

    public function createpromotion()
    {
        // $this->validate();

        ModelsPromotion::create([
            'staff_id' => $this->staff->id,
            'rank_id' => $this->rank_name,
            'previous_rank_id' => $this->previous_rank_name,
            'promotion_date' => $this->promotion_date,
            'order_no' => $this->order_no,

        ]);
        $this->staff->current_rank_id = $this->rank_name;
        $this->staff->update();
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset([
            'staff_name',
            'rank_name',
            'previous_rank_name',
            'promotion_date',
            'order_no'
        ]);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }

    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->promotion_id = $id;
        $promotion = ModelsPromotion::findOrFail($id);
        $this->staff_name = $promotion->staff_id;
        $this->rank_name = $promotion->rank_id;
        $this->previous_rank_name = $promotion->previous_rank_id;
        $this->promotion_date = $promotion->promotion_date;
        $this->order_no = $promotion->order_no;
    }

    public function updatepromotion()
    {
        $this->validate();
        $promotion = ModelsPromotion::findOrFail($this->promotion_id);
        $promotion->update([
            'staff_id' => $this->staff_name,
            'rank_id' => $this->rank_name,
            'previous_rank_id' =>   $this->previous_rank_name,
            'promotion_date' => $this->promotion_date,
            'order_no' => $this->order_no,

        ]);
        $this->staff->current_rank_id = $this->rank_name;
        $this->staff->update();
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    public function delete_confirm($id)
    {
        $this->promotion_id = $id;
        $this->confirm_delete = true;
    }

    public function delete($id)
    {
        ModelsPromotion::findOrFail($id)->delete();
        $this->confirm_delete = false;
    }

    public function mount($staff_id)
    {
        $this->staff_id = $staff_id;
        $this->staff = Staff::find($staff_id);
        $this->rank_name = $this->staff->current_rank_id;
    }


    #[On('render_promotion')]
    public function render_promotion()
    {
        $this->render();
    }

    public function render()
    {

        $staffs = Staff::all();
        $ranks = Rank::all();
        $this->modal_title = $this->confirm_add ? 'ရာထူးတိုးသိမ်းရန်' : 'ရာထူးတိုးပြင်ရန်';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'ပြင်ရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';
        $promotionSearch = '%' . $this->promotion_search . '%';
        $promotionQuery = ModelsPromotion::query();
        if ($this->promotion_search) {
            $this->resetPage();
            $promotionQuery->where(function ($q) use ($promotionSearch) {
                $q->where('order_no', 'LIKE', $promotionSearch)->orWhereHas('staff', function ($query) use ($promotionSearch) {
                    $query->where('name', 'LIKE', $promotionSearch);
                });
            });
        }

        $promotions = $promotionQuery->with(['staff', 'rank'])
            ->paginate($promotionQuery->count() > 10 ? $promotionQuery->count() : 10);
        return view('livewire.promotion', [
            'promotions' => $promotions,
            'staffs' => $staffs,
            'ranks' => $ranks,
        ]);
    }
}
