<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use App\Models\Campus;
use App\Models\Update;
use Livewire\Component;
use App\Models\Building;
use App\Services\UpdateService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('components.layouts.admin.dashboard')]
class PerubahanData extends Component
{
    public Update $selectedUpdate;
    public $parsed_new_data = [];
    public $images_path_old = [];
    public $images_path_new = [];
    public $new_data = [];
    public $old_data = [];

    public $filter = 'all';
    public $sort = 'asc';
    public function setFilter($status)
    {
        $this->filter = $status;
    }
    public function sortDate()
    {
        $this->sort = $this->sort === 'asc' ? 'desc' : 'asc';
    }
    public function view($id)
    {
        $this->selectedUpdate = Update::with('admin', 'approver')->find($id);
        $this->selectedUpdate = UpdateService::transform($this->selectedUpdate);

        $this->new_data = $this->selectedUpdate->new_data;
        $this->old_data = $this->selectedUpdate->old_data;

        $this->dispatch('view');
    }

    public function render()
    {
        $updates = Update::query();
        if ($this->filter !== 'all') {
            $updates->where('status', $this->filter);
        }
        $updates = $updates->with('admin')->orderBy('created_at', $this->sort)->paginate(10);
        $updates->getCollection()->transform(function ($update) {
            return UpdateService::transform($update);
        });

        return view('livewire.admin.perubahan-data', [
            'updates' => $updates,
        ]);
    }
}
