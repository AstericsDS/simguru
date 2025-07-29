<div>
    @if (session()->has('message'))
        <div class="p-2 bg-green-200 text-green-800">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label>Name</label>
            <input type="text" wire:model.defer="name" class="input">
            @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Floor</label>
            <input type="number" wire:model.defer="floor" class="input">
            @error('floor') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Description</label>
            <textarea wire:model.defer="description" class="input"></textarea>
            @error('description') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Image Path</label>
            <input type="text" wire:model.defer="images_path" class="input">
            @error('images_path') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Status</label>
            <input type="text" wire:model.defer="status" class="input">
            @error('status') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn">Submit</button>
    </form>
</div>
