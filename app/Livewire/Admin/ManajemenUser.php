<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin.dashboard')]
class ManajemenUser extends Component
{
    public User $selectedUser;
    public $email;
    public $role;
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->whereNull('deleted_at'),
            ],
            'role' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Harus berupa email yang valid',
            'email.unique' => 'Email sudah ada di database',
            'role.required' => 'Role harus dipilih'
        ];
    }
    public function deleteModal($id)
    {
        $this->selectedUser = User::find($id);
        $this->dispatch('confirm-delete');
    }
    public function deleteUser()
    {
        if ($this->selectedUser->delete()) {
            $this->dispatch('confirm-delete');
            $this->dispatch('toast', status: 'success', message: 'User berhasil dihapus!');
            return;
        } else {
            $this->dispatch('confirm-delete');
            $this->dispatch('toast', status: 'fail', message: 'Gagal menghapus user!');
            return;
        }
    }
    public function mount()
    {
        $this->role = 2;
    }
    public function save()
    {
        $validated = $this->validate();
        $user = User::withTrashed()->updateOrCreate(['email' => $this->email], ['email' => $validated['email'], 'role' => $validated['role']]);
        if ($user->trashed()) {
            $user->restore(); // bring it back
        }

        if ($user) {
            $this->dispatch('add-modal');
            $this->dispatch('toast', status: 'success', message: 'User berhasil ditambahkan!');
            return;
        } else {
            $this->dispatch('add-modal');
            $this->dispatch('toast', status: 'fail', message: 'Gagal menambahkan user!');
            return;
        }
        // $user = User::onlyTrashed()->where('email', $this->email)->first();
        // dd($user->toArray());
        // if ($user) {
        //     $userUpdate = User::update(
        //         [
        //             'email' => $this->email,
        //             'deleted_at' => null
        //         ]
        //     );
        //     if ($userUpdate) {
        //         $this->dispatch('toast', status: 'success', message: 'User berhasil ditambahkan!');
        //         $this->dispatch('add-modal');
        //         return;
        //     } else {
        //         $this->dispatch('toast', status: 'fail', message: 'Gagal menambahkan user!');
        //         $this->dispatch('add-modal');
        //         return;
        //     };
        // } else {
        //     if (User::create($validated)) {
        //         $this->dispatch('toast', status: 'success', message: 'User berhasil ditambahkan!');
        //         $this->dispatch('add-modal');
        //         return;
        //     } else {
        //         $this->dispatch('toast', status: 'fail', message: 'Gagal menambahkan user!');
        //         $this->dispatch('add-modal');
        //         return;
        //     };
        // }
    }
    public function render()
    {
        return view('livewire.admin.manajemen-user', [
            'users' => User::all()
        ]);
    }
}
