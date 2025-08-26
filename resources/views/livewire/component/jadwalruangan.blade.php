<div class="text-black mx-19 lg:mx-50">
    <fieldset class="fieldset">
        <select name="selectedCampus" wire:model.live="selectedCampus" class="select bg-white border border-unj">
            <option value="" disabled selected>Pilih Kampus</option>
            @foreach ($campuses as $campus)
                <option value="{{ $campus->id }}">{{ $campus->name }}</option>
            @endforeach
        </select>
        {{-- <span class="label">Optional</span> --}}
        <select class="select bg-white border border-unj" wire:model.live="selectedBuilding" name="selectedBuilding">
            <option value="" disabled selected>Pilih Gedung</option>
            @if (count($campusbuildings) > 0)
                @foreach ($campusbuildings as $building)
                    <option value="{{ $building->id }}">{{ $building->name }}</option>
                @endforeach
            @endif
        </select>
        {{-- <span class="label">Optional</span> --}}
        <select class="select bg-white border border-unj" wire:model.live="selectedRoom" name="selectedRoom">
            <option value="" disabled selected>Pilih Ruang</option>
            @if (count($buildingrooms) > 0)
                @foreach ($buildingrooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            @endif
        </select>
        {{-- <span class="label">Optional</span> --}}
    </fieldset>


</div>
