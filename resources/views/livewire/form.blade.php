
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (session()->has('message'))
        <h1 class="text-lg font-bold">
            {{ session('message') }}
        </h1>
    @endif
    <div>
        <form wire:submit='save'>
            <label for="name">Name</label>
            <input type="text" name="name" wire:model="name">
            <label for="name">Floor</label>
            <input type="number" name="floor" wire:model="floor">
            <label for="name">Description</label>
            <input type="text" name="description" wire:model="description">
            <label for="name">Images Path</label>
            <input type="text" name="images_path" wire:model="images_path">
            <label for="name">Status</label>
            <input type="number" name="status" wire:model="status">
            <button type="submit" class="bg-white text-black cursor-pointer">
                Submit
            </button>
        </form>
    </div>
</body>
</html>