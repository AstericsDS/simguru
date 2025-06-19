<div class="w-full px-5 lg:px-40">
    {{-- Breadcrumbs --}}
    <div class="flex flex-col mt-5">
        <a href="/" class="size-5"><img src="{{ asset('logos/back-svgrepo-com.svg') }}" alt=""></a>
        <div class="breadcrumbs text-sm text-[#006569] py-5">
            <ul>
                <li><a class="">Kampus A</a></li>
            </ul>
        </div>
    </div>
    {{-- Building Details --}}
    <div class="grid grid-flow-col-dense grid-rows-3 gap-4 text-[#006569]">
        <div class="row-span-3 flex mr-15">
            <div class="carousel w-full w-max-full">
                <div id="slide1" class="carousel-item relative w-full w-max-full">
                    <img src="{{ asset('images/unj_bersih.jpeg') }}" class="w-full h-64 object-cover rounded-lg"/>
                    <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                        <a href="#slide4" class="btn btn-circle not-lg:hidden">❮</a>
                        <a href="#slide2" class="btn btn-circle not-lg:hidden">❯</a>
                    </div>
                </div>
                <div id="slide2" class="carousel-item relative w-full w-max-full">
                    <img src="{{ asset('images/unj_bersih.jpeg') }}" class="w-full h-64 object-cover rounded-lg"/>
                    <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                        <a href="#slide1" class="btn btn-circle not-lg:hidden">❮</a>
                        <a href="#slide3" class="btn btn-circle not-lg:hidden">❯</a>
                    </div>
                </div>
                <div id="slide3" class="carousel-item relative w-full w-max-full">
                    <img src="{{ asset('images/unj_bersih.jpeg') }}" class="w-full h-64 object-cover rounded-lg"/>
                    <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                        <a href="#slide2" class="btn btn-circle not-lg:hidden">❮</a>
                        <a href="#slide4" class="btn btn-circle not-lg:hidden">❯</a>
                    </div>
                </div>
                <div id="slide4" class="carousel-item relative w-full w-max-full">
                    <img src="{{ asset('images/unj_bersih.jpeg') }}" class="w-full h-64 object-cover rounded-lg"/>
                    <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                        <a href="#slide3" class="btn btn-circle not-lg:hidden">❮</a>
                        <a href="#slide1" class="btn btn-circle not-lg:hidden">❯</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-span-3 not-lg:hidden">
            <div class="font-bold text-4xl mb-7">KAMPUS A</div>
            <div class="grid grid-flow-row gap-3 font-semibold">
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Alamat</div>
                    <div>:</div>
                    <div>Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Jumlah Gedung</div>
                    <div>:</div>
                    <div>10</div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Luas</div>
                    <div>:</div>
                    <div>1.000 hektar</div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Fakultas</div>
                    <div>:</div>
                    <div>FMIPA, FT, FBS, FE, FIP, FISH</div>
                </div>
                {{-- <div>Alamat</div> <div>:</div> <div>Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</div>
          <div>Jumlah gedung</div> <div>:</div> <div>200</div> --}}
            </div>
        </div>
    </div>
    {{-- Mobile View --}}
    <div class="lg:hidden text-xs text-[#006569]">
        <div class="font-bold text-2xl lg:text-4xl my-5">KAMPUS A</div>
        <div class="row-span-2">
            <div class="grid grid-flow-row gap-3 font-semibold">
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Alamat</div>
                    <div>:</div>
                    <div>Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Jumlah Gedung</div>
                    <div>:</div>
                    <div>10</div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Luas</div>
                    <div>:</div>
                    <div>1.000 hektar</div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Fakultas</div>
                    <div>:</div>
                    <div>FMIPA, FT, FBS, FE, FIP, FISH, </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-between items-center mb-3 mt-10 border-t border-gray-300 pt-3">
        <div class="relative w-64">
            <input 
                type="text" 
                class="border border-gray-300 rounded-full px-3 py-2 w-full pr-10 focus:outline-none focus:ring-2 focus:ring-teal-700" 
                placeholder="Search...">
            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                </svg>
            </span>
        </div>
        <a href="/tambahgedung" 
        class="bg-teal-700 text-white btn px-4 py-2 rounded-full flex items-center gap-2 hover:bg-teal-800">
            + Tambah
        </a>
    </div>

    {{-- Gedung Box --}}
    <div class="grid lg:grid-cols-4 gap-3 mt-12">
        <div class="card bg-base-100 shadow-sm">
            <figure>
                <img src="images/unj_bersih.jpeg" alt="Kampus_A_UNJ" />
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Gedung Dewi Sartika</h2>
                <p class="text-xs not-lg:hidden">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
                <div class="card-actions">
                    <a href="/gedung" class="btn bg-white text-black w-full hover:bg-gray-200 rounded-lg outline-none">Details</a>
                </div>
            </div>
        </div>

        {{-- Secondary Design Card View --}}

        {{-- <a href="/kampus">
      <div class="card group bg-[url(/public/backgrounds/unj_bersih.jpeg)] bg-cover h-53 ">
        <div class="card-body rounded-box backdrop-brightness-75 group-hover:backdrop-brightness-50 group-hover:backdrop-blur-xs transition-all duration-400">
          <h2 class="card-title text-3xl group-hover:text-2xl transition-all duration-400">Gedung Dewi Sartika</h2>
          <p class="hidden group-hover:inline transition-all duration-400">Kampus utama UNJ</p>
          <p class="hidden text-xs group-hover:inline transition-all duration-400">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
        </div>
      </div>
    </a> --}}
        {{-- <a href="/tambahgedung">
            <div class="card group h-53 outline-3 outline-dashed outline-[#006569] transition-all duration-400">
                <div class="card-body">
                    <p class="font-bold text-[#006569] text-2xl text-center group-hover:text-3xl transition-all duration-400">Tambah Gedung</p>
                    <p class="font-extrabold text-[#006569] text-6xl text-center group-hover:text-7xl transition-all duration-400">+</p>
                </div>
            </div>
        </a> --}}
    </div>
</div>
