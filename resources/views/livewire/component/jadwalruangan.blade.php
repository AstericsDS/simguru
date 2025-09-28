<div id="jadwaleu" class="text-base-content mx-auto w-19 lg:w-1/2" onfocus="">
    <fieldset class="fieldset">
        <select name="selectedCampus" wire:model.live="selectedCampus" class="select bg-base-300 border border-unj">
            <option value="" selected>Pilih Kampus</option>
            @foreach ($campuses as $campus)
                <option value="{{ $campus->id }}">{{ $campus->name }}</option>
            @endforeach
        </select>
        @if (count($campusbuildings) > 0)
            <select class="select bg-base-300 border border-unj" wire:model.live="selectedBuilding"
                name="selectedBuilding">
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

    <div {{-- x-data
        @events-loaded.window="console.log('Events data received!', event.detail.Events);
                        event.detail.Events.forEach(function(event, index){});" --}} wire:ignore id='jadwalhome'></div>

    <div id="tooltip"
        class="absolute tooltip-hidden border border-base-100 bg-base-200 shadow p-5 text-base-content z-10 transition-normal rounded-box">
    </div>

</div>

<script></script>
