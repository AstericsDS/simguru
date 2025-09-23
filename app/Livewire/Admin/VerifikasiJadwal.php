<?php

namespace App\Livewire\Admin;

use App\Models\Event;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin.dashboard')]
class VerifikasiJadwal extends Component
{
    public function save($id, $action)
    {
        $event = Event::find($id);

        if (!$event) {
            return;
        }

        if ($action === 'accept') {
            $event->verified = "approved";
            $event->save();
            $this->dispatch('confirm-modal');
            $this->dispatch('toast', status: 'success', message: 'Jadwal berhasil diterima.');
            return;
        } elseif ($action === 'reject') {
            $event->verified = "rejected";
            $event->save();
            $this->dispatch('confirm-modal');
            $this->dispatch('toast', status: 'success', message: 'Jadwal berhasil ditolak.');
            return;
        }
    }
    public function render()
    {
        return view('livewire.admin.verifikasi-jadwal', [
            'events' => Event::all()
        ]);
    }
}
