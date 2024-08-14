<?php

namespace App\Livewire\Post;

use App\Models\Post as ModelsPost;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Post extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $post_type_search, $post_type_name, $post_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'post_type_name' => 'required|string|max:255',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset('post_type_name');
        $this->confirm_add = true;
        $this->confirm_edit = false;
    }
    public function submitForm()
    {
        if ($this->confirm_add == true) {
            $this->createPosition();
        } else {
            $this->updatePosition();
        }
    }
    //create
    public function createPosition()
    {
        $this->validate();
        ModelsPost::create([
            'name' => $this->post_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset('post_type_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->post_type_id = $id;
        $post_type = ModelsPost::findOrFail($id);
        $this->post_type_name = $post_type->name;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsPost::findOrFail($this->post_type_id)->update([
            'name' => $this->post_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->post_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsPost::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_post_type')]
    public function render_post_type()
    {
        $this->render();
    }
    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'Add post Type' : 'Edit post Type';
        $this->submit_button_text = $this->confirm_add ? 'Add' : 'Update';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $postTypeSearch = '%' . $this->post_type_search . '%';
        $postTypeQuery = ModelsPost::query();
        if ($this->post_type_search) {
            $this->resetPage();
            $postTypeQuery->where('name', 'LIKE', $postTypeSearch);
            $post_types = $postTypeQuery->paginate($postTypeQuery->count() > 10 ? $postTypeQuery->count() : 10);
        } else {
            $post_types = $postTypeQuery->paginate(10);
        }

        return view('livewire.post.post', [
            'post_types' => $post_types,
        ]);
    }
}
