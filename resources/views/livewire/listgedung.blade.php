<div class="w-full px-5 lg:px-40">
    <h1 class="mt-10 mb-2 text-black text-3xl text-center font-bold">List SEMUA Gedung di Universitas Negeri Jakarta
    </h1>
    <hr class="w-15 font-bold mx-auto border-gray-500 border">

    <div class="flex gap-3 items-center">
        {{-- Search --}}
        <div x-data @keyup.window="if ($event.ctrlKey && $event.key === '/') {$refs.searchInput.focus()}"
            class="relative w-96">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer">
                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
            </span>

            <input wire:model.live="search" x-ref="searchInput" @keydown.escape="$refs.searchInput.blur()"
                type="text"
                class="border border-gray-300 rounded-lg px-3 py-2 w-full pl-12 pr-[88px] focus:outline-none focus:ring-primary text-black transition-all"
                placeholder="Cari gedung">

            <div class="absolute right-4 text-gray-500 top-1/2 -translate-y-1/2 flex gap-1">
                <div class="border px-2 py-1 border-gray-500 rounded-md flex items-center justify-center">
                    <span class="text-xs">CTRL</span>
                </div>
                <div class="border p-2 py-1 border-gray-500 rounded-md flex items-center justify-center">
                    <span class="text-xs">/</span>
                </div>
            </div>
        </div>
    </div>


    {{-- card box --}}
    <div class="grid lg:grid-cols-4 gap-3 mt-12">
        @foreach ($buildings as $building)
            <div class="card bg-primary shadow-lg">
                <figure>
                    <img src="backgrounds/unj_bersih.jpeg" alt="Kampus_A_UNJ" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">{{ $building->name }}</h2>
                    <p class="text-xs text-center mb-3 not-lg:hidden">{{ $building->address }}</p>
                    <a href="/kampus/{{ $building->slug }}"
                        class="btn border-none bg-white text-black outline-none hover:bg-gray-200 rounded-lg w-full">Details</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- <a href="/kampus">
<div class="card group bg-[url(/public/backgrounds/unj_bersih.jpeg)] bg-cover h-53 ">
<div class="card-body rounded-box backdrop-brightness-75 group-hover:backdrop-brightness-50 group-hover:backdrop-blur-xs transition-all duration-400">
  <h2 class="card-title text-3xl group-hover:text-2xl transition-all duration-400">Kampus A</h2>
  <p class="hidden group-hover:inline transition-all duration-400">Kampus utama UNJ</p>
  <p class="hidden text-xs group-hover:inline transition-all duration-400">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
</div>
</div>
</a> --}}
{{-- <a href=" 0">
<div class="card group h-53 outline-3 outline-dashed outline-[#006569] transition-all duration-400">
<div class="card-body">
  <p class="font-bold text-[#006569] text-2xl text-center group-hover:text-3xl transition-all duration-400">Tambah Kampus</p>
  <p class="font-extrabold text-[#006569] text-4xl text-center group-hover:text-6xl transition-all duration-400">+</p>
</div>
</div>
</a> --}}
