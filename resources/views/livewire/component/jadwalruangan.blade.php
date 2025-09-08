<div id="jadwaleu" class="text-base-content mx-auto w-19 lg:w-1/2" onfocus="">
    <fieldset class="fieldset">
        <select name="selectedCampus" wire:model.live="selectedCampus" class="select bg-base-300 border border-unj">
            <option value="" selected>Pilih Kampus</option>
            @foreach ($campuses as $campus)
                <option value="{{ $campus->id }}">{{ $campus->name }}</option>
            @endforeach
        </select>
        @if (count($campusbuildings) > 0)
            <select class="select bg-base-300 border border-unj" wire:model.live="selectedBuilding" name="selectedBuilding">
                <option value="" selected>Pilih Gedung</option>
                @foreach ($campusbuildings as $building)
                    <option value="{{ $building->id }}">{{ $building->name }}</option>
                @endforeach
            </select>
        @endif
        @if (count($buildingrooms) > 0)
            <select class="select bg-base-300 border border-unj" wire:model.live="selectedRoom" name="selectedRoom">
                <option value="" selected>Pilih Ruang</option>
                @foreach ($buildingrooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
        @endif
    </fieldset>

    <div wire:ignore id='calendar'></div>

</div>

<script>
    window.matchMedia("(orientation: portrait)").addEventListener("change", e => {
        const potrait = e.matches;
        const jadwal = document.getElementById('jadwaleu');
        const alerta = document.getElementById('alert');

        if (potrait) {
            jadwal.classList.add('hidden');
            alerta.classList.remove('hidden');
        } else {
            jadwal.classList.remove('hidden');
            alerta.classList.add('hidden');

        }
    });
    // if (window.innerHeight > window.innerWidth) {
    //     alert("Gunakan Landscape Untuk Melihat Jadwal Ruangan");
    //     jadwal.classList.add('hidden');
    //     alerta.classList.remove('hidden');
    // } else {
    //     jadwal.classList.remove('hidden');
    //     alerta.classList.remove('hidden');
    // }
    var calendar = Calendar(calendarEl, {
        events: [{
                title: 'Event 1',
                start: '2025-08-17',
                end: '2025-08-18'
            },
            {
                title: 'Event 2',
                start: '2025-08-18',
                end: '2025-08-19'
            }
        ]
    })
</script>
