<div class="w-full px-5 lg:px-40">
    <h1 class="mt-10 mb-2 text-black text-3xl text-center font-bold">List SEMUA Gedung di Universitas Negeri Jakarta</h1>
    <hr class="w-15 font-bold mx-auto border-gray-500 border">

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
