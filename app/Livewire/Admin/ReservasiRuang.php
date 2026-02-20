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
    public $event_name, $lecturer, $major, $class_of, $description, $dtstart, $dtend, $day;
    public $startRaw, $endRaw, $startDate, $startTime, $endTime, $reserved_by;

    #[On('saveDate')]
    public function saveDate($payload)
    {
        $this->startRaw = $payload[0];
        $this->endRaw = $payload[1];
        $this->startDate = $payload[2];
        $this->startTime = $payload[3];
        $this->endTime = $payload[4];
        $this->day = mb_strtolower(mb_substr(date('l', strtotime($this->startDate)), 0, 2));

        if ($payload[5] === 'kuliah') {
            $this->validate([
                'event_name' => 'required',
                'reserved_by' => 'required',
                'lecturer' => 'required',
                'major' => 'required',
                'dtstart' => 'required|date',
                'dtend' => 'required|date',
            ]);
        } else {
            $this->validate([
                'event_name' => 'required',
                'description' => 'required',
            ]);
        }

        $this->dispatch('event-modal');
        $this->dispatch('toggle-calendar');
    }

    public function save()
    {
        $createEvent = Event::create([
            'room_id' => $this->room->id,
            'admin' => Auth::id(),
            'event_name' => $this->event_name,
            'reserved_by' => $this->reserved_by ?? 'Umum',
            'start' => $this->startRaw,
            'end' => $this->endRaw,
            'lecturer' => $this->lecturer,
            'major' => $this->major,
            'description' => $this->description,
            'dtend' => $this->dtend,
            'day' => $this->day,
            'status' => 'pending',
        ]);

        $this->reset(['event_name', 'reserved_by','startRaw', 'endRaw', 'startDate', 'startTime', 'endTime', 'lecturer', 'major', 'description', 'dtend', 'day']);

        if ($createEvent) {
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
        $this->dispatch('events-loaded', Event: Event::where('room_id', $this->room->id)->where('status', 'approved')->get());
        // dd(Event::where('room_id', $this->room->id)->where('status', 'approved')->get());
    }
    public function render()
    {
        return view('livewire.admin.reservasi-ruang');
    }
}
