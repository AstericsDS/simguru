<div class="container w-4xl mx-auto bg-white rounded-sm flex flex-col items-center pb-8 text-black relative">
    <img src="{{ asset('logos/unj.png') }}" alt="Logo UNJ" class="absolute w-30 -top-20">
    <div class="pt-20 pb-4 px-28 w-full">
        @error('login')
            <div class="p-3 rounded-md bg-red-200 text-red-500 my-4 w-1/3 mx-auto text-center">
                <span>{{ $message }}</span>
            </div>
        @enderror
        <h1 class="text-center font-semibold text-xl">
            Sistem Informasi Manajemen Gedung dan Ruang
        </h1>
        <hr class="border-2 border-gray-200 mt-4 mb-6">
        <form wire:submit.prevent="login" class="flex flex-col mt-4 gap-4" wire:submit="login">
            <input wire:model="name" type="text" placeholder="Nama" class="bg-gray rounded-sm py-2 px-3">
            <input wire:model="password" type="password" placeholder="Password" class="bg-gray rounded-sm py-2 px-3">
            <button type="submit" class="transition-all btn bg-teal-700 text-white font-semibold rounded-md py-2 hover:bg-[#00554b] cursor-pointer text-center border-0">
                LOGIN
            </button>
        </form>
        <a href="{{ route('sso.login') }}">
            <div class="px-4 mt-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 w-full flex space-x-2 items-center transition-all justify-center shadow-lg">
                <img src="{{asset('logos/microsoft-svgrepo-com.svg')}}" alt="Microsoft" class="w-8">
                <span>Login dengan SSO</span>
            </div>
        </a>
    </div>

</div>
