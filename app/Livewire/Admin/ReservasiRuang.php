<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use App\Models\Event;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.admin.dashboard')]
class ReservasiRuang extends Component
{
    public Room $room;
    public int $room_id;
    #[Validate('required', message: 'Masukkan nama acara')]
    public $event;
    public $startRaw, $endRaw, $startDate, $startTime, $endTime;

    #[On('saveDate')]
    public function saveDate($payload)
    {
        $this->validate();
        $this->startRaw = $payload[0];
        $this->endRaw = $payload[1];
        $this->startDate = $payload[2];
        $this->startTime = $payload[3];
        $this->endTime = $payload[4];
        $this->dispatch('event-modal');
        $this->dispatch('toggle-calendar');
    }
    public function save()
    {
        $createEvent = Event::create([
            'room_id' => $this->room->id,
            'admin' => Auth::id(),
            'event_name' => $this->event,
            'start' => $this->startRaw,
            'end' => $this->endRaw,
            'verified' => 'pending',
        ]);

        $this->reset(['event', 'startRaw', 'endRaw', 'startDate', 'startTime', 'endTime']);

        if($createEvent) {
            $this->dispatch('confirm-modal');
            $this->dispatch('toast', status: 'success', message: 'Jadwal berhasil dibuat, menunggu verifikasi admin.');
        } else {
            $this->dispatch('confirm-modal');
            $this->dispatch('toast', status: 'fail', message: 'Maaf, jadwal gagal dibuat. Mohon coba lagi.');
        }
    }
    public function mount(Room $room)
    {
        $this->room = $room;
        $this->room_id = $room->id;
    }
    public function render()
    {
        return view('livewire.admin.reservasi-ruang');
    }
}
