<?php

namespace App\Livewire\User;

use App\Models\Users;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\Fluent\Concerns\Has;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AddUserModal extends Component
{
    use WithFileUploads;

    public $user_id;
    public $name;
    public $email;
    public $password;
    public $phone_number;
    public $status;
    public $role;
    public $avatar;
    public $saved_avatar;
    public $profile_photo_path;

    public $edit_mode = false;

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'role' => 'required|string',
        'phone_number' => 'required|digits:10|unique:users,phone_number',
        'status' => 'required',
        'avatar' => 'nullable|sometimes|image|max:5120',
    ];

    protected $listeners = [
        'delete_user' => 'deleteUser',
        'update_user' => 'updateUser',
    ];

    public function render()
    {
        $roles = Role::where('name', 'Property Admin')->get();
        if (Auth::user()->isPropertyAdmin()) {
            $roles = Role::where('name', 'Property Agent')->get();
        }

        return view('livewire.user.add-user-modal', compact('roles'));
    }

    public function submit()
    {
        // Validate the form input data
        $this->validate();
        try {
            DB::transaction(function () {
                // Prepare the data for creating a new user
                $data = [
                    'name' => $this->name,
                    'phone_number' => $this->phone_number,
                    'status' => $this->status,
                    'updated_by' => Auth::user()->user_id,
                ];

                if (!empty($this->password)) {
                    $data['password'] = Hash::make($this->password);
                }

                if ($this->avatar) {
                    $filename = uniqid() . '.' . $this->avatar->getClientOriginalExtension();
                    Storage::disk('public_avatars')->put('avatars/' . $filename, file_get_contents($this->avatar->getPathname()));
                    $data['profile_photo_path'] = 'avatars/' . $filename;
                } else {
                    $data['profile_photo_path'] = null;
                }

                if (!$this->edit_mode) {
                    $data['created_by'] = Auth::user()->user_id;
                }

                // Update or Create a new user record in the database
                $data['email'] = $this->email;
                $user = Users::find($this->user_id) ?? Users::create($data);

                if ($this->edit_mode) {
                    foreach ($data as $k => $v) {
                        $user->$k = $v;
                    }
                    $user->save();
                }

                if ($this->edit_mode) {
                    // Assign selected role for user
                    $user->syncRoles($this->role);

                    // Emit a success event with a message
                    $this->dispatch('success', __('User updated'));
                } else {
                    // Assign selected role for user
                    $user->assignRole($this->role);

                    // Send a password reset link to the user's email
                    //Password::sendResetLink($user->only('email'));

                    // Emit a success event with a message
                    $this->dispatch('success', __('New user created'));
                }
            });

            // Reset the form fields after successful submission
            $this->reset();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            $this->dispatch('error', __('Something went wrong'));
        }
    }

    public function deleteUser($id)
    {
        // Prevent deletion of current user
        if ($id == Auth::id()) {
            $this->dispatch('error', 'User cannot be deleted');
            return;
        }

        // Delete the user record with the specified ID
        Users::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'User successfully deleted');
    }

    public function updateUser($id)
    {
        $this->edit_mode = true;

        $user = Users::find($id);

        $this->user_id = $user->user_id;
        $this->saved_avatar = $user->profile_photo_url;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '';
        $this->phone_number = $user->phone_number;
        $this->status = $user->status;
        $this->role = $user->roles?->first()->name ?? '';
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function dismiss()
    {
        $this->reset();
        $this->edit_mode = false;
    }
}
