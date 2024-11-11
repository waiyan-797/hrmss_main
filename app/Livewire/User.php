<?php

namespace App\Livewire;

use App\Models\Division;
use App\Models\Role;
use App\Models\User as ModelsUser;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{

    use WithPagination;
    public $division_id;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $user_id;
    public $user_name;
    public $user_search;
    public $role_id;
    public $password;
    public $email;
    public $roles;
    public $status;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;
public $divisions;
    public function rules()
    {
        return [
            'user_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user_id,
            'role_id' => 'required|exists:roles,id',
        ];
    }

    public function mount(){
        $this->divisions = Division::all();
    }

    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'User အသစ်ထည့်ရန်' : 'User ပြင်ရန်';
        $users  = ModelsUser::paginate(5);
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

            
        $userSearch = '%' . $this->user_search . '%';
        $userQuery = ModelsUser::query();
        if ($this->user_search) {
            $this->resetPage();
            $userQuery->where('name', 'LIKE', $userSearch)->orWhere('email', 'like', $userSearch);
            $users = $userQuery->paginate($userQuery->count() > 10 ? $userQuery->count() : 10);
        } else {
            $users = $userQuery->paginate(10);
        }

        return view('livewire.user', [
            'users' => $users,

        ]);
    }

    public function updateStatus($id)
    {
        $user = ModelsUser::find($id);
        $user->status = !$user->status;
        $user->update();
    }

    //add new
    public function add_new()
    {
        $this->roles = Role::all();
        $this->resetValidation();
        $this->reset('user_name');
        $this->reset('role_id');
        $this->confirm_add = true;
        $this->confirm_edit = false;
    }


    public function submitForm()
    {
        if ($this->confirm_add == true) {
            $this->createUser();
        } else {
            $this->updateUser();
        }
    }


    public function createUser()
    {

        $this->validate($this->rules());

        ModelsUser::create([
            'name' => $this->user_name,
            'role_id' => $this->role_id,
            'password' => $this->password,
            'email' => $this->email ,
            'division_id' => $this->division_id
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }

    public function User() {}


    public function edit_modal($id)
    {
        $this->resetValidation($this->rules());
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->user_id = $id;
        $relation = ModelsUser::findOrFail($id);
        $this->roles = Role::all();
        $this->user_name = $relation->name;
        $this->role_id = $relation->role_id;
        $this->status = $relation->status;
        $this->division_id = $relation->division_id;
        $this->email = $relation->email;
    }


    public function  updateUser()
    {
        $this->validate($this->rules());

        ModelsUser::findOrFail($this->user_id)->update([
            'name' => $this->user_name,
            'role_id' => $this->role_id,
            'email' => $this->email,
            'password' => $this->password,
            'status' => $this->status ,
            'division_id' => $this->division_id


        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //close modal
    public function close_modal()
    {
        $this->resetValidation($this->rules());
        $this->reset('user_name');
        $this->reset('role_id');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
}
