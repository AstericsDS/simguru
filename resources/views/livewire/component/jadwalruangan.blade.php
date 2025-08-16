<div class="text-black mx-19 lg:mx-60">
    <fieldset class="fieldset">
        <select name="selectedCampus" wire:model.live="selectedCampus" class="select bg-white border border-unj">
            <option disabled selected>Pilih Kampus</option>
            @foreach ($campuses as $campus)
                <option value="{{ $campus->id }}">{{ $campus->name }}</option>
            @endforeach
        </select>
        {{-- <span class="label">Optional</span> --}}
        @if (count($campusbuildings) > 0)
            <select class="select bg-white border border-unj" wire:model.live="selectedBuilding">
                <option disabled selected>Pilih Gedung</option>
                @foreach ($campusbuildings as $building)
                    <option value="{{ $building->id }}">{{ $building->name }}</option>
                @endforeach
            </select>
        @endif
        @if (count($buildingrooms) > 0)
            {{-- <span class="label">Optional</span> --}}
            <select class="select bg-white border border-unj" wire:model.live="selectedRoom">
                <option disabled selected>Pilih Ruang</option>
                @foreach ($buildingrooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
            {{-- <span class="label">Optional</span> --}}
        @endif
    </fieldset>


</div>
