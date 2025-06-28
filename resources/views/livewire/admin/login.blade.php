<div class="container w-2xl mx-auto bg-white rounded-xl border border-gray-200 flex flex-col items-center pb-16 text-black">
    <img src="logos/unj.png" alt="Logo UNJ" class="w-32 mx-auto mt-1">
    <div class="pt-3 pb-3 px-10 w-full max-w-md">
        <h1 class="text-center font-semibold text-xl">
            Sistem Informasi Manajemen Gedung dan Ruang
        </h1>
        <hr class="border-2 border-gray-200 mt-4 mb-6">
        <form wire:submit.prevent="login" class="flex flex-col mt-4 gap-4" wire:submit="login">
            <input wire:model="name" type="text" placeholder="Nama" class="bg-gray rounded-sm py-2 px-3">
            <input wire:model="password" type="password" placeholder="Password" class="bg-gray rounded-sm py-2 px-3">
            <button type="submit" class="btn bg-teal-700 text-white font-semibold rounded-md py-2 hover:brightness-90 cursor-pointer text-center">
                LOGIN
            </button>
        </form>
    </div>
</div>