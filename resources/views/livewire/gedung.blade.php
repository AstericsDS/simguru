<div class="w-full px-5 lg:px-40">
    {{-- Breadcrumbs --}}
    <div class="flex flex-col mt-5">
        <a href="/" class="size-5"><img src="{{ asset('logos/back-svgrepo-com.svg') }}" alt=""></a>
        <div class="breadcrumbs text-sm text-[#006569] py-5">
            <ul>
                <li><a href="/kampus" class="">Kampus A</a></li>
                <li><a class="">Gedung Dewi Sartika</a></li>
            </ul>
        </div>
    </div>
    {{-- Building Details --}}
    <div class="group grid grid-flow-col-dense grid-rows-3 gap-4 text-[#006569]">
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
            <div class="font-bold text-4xl mb-7">Gedung Dewi Sartika</div>
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
    {{-- Mobile View --}}
    <div class="lg:hidden text-xs text-[#006569]">
        <div class="col-span-2 font-bold text-2xl lg:text-4xl my-5">Gedung Dewi Sartika</div>
        <div class="col-span-2 row-span-2">
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
                <svg class="w-5 h-5 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                </svg>
            </span>
        </div>
        <button
        class="bg-teal-700 text-white btn px-4 py-2 rounded-full flex items-center gap-2 hover:bg-teal-800">
            + Tambah
        </button>
    </div>

    {{-- Lantai Box --}}
    <div class="grid  grid-cols-1 gap-3 mt-12 text-white">
        <div class="bg-[#006569]  collapse collapse-arrow border border-gray-300">
            <input type="checkbox" class="peer" />
            <div class="collapse-title bg-[#006569] text-xl font-bold">
              Lantai 1
            </div>
            <div class="collapse-content grid gap-2 bg-white peer-checked:pt-5">
                <div class="card card-sm bg-[#006569] shadow-xl h-max">
                    <div class="flex items-center justify-between p-3">
                        <div class="flex flex-wrap gap-2">
                            <div>Ruangan 101</div>
                            <div class="badge badge-sm badge-soft badge-success self-center">
                                Tersedia
                            </div>
                        </div>
                        <div >
                            <a href="" class="btn btn-md place-content-end bg-white text-black border-none hover:bg-gray-200">Details</a>
                        </div>
                    </div>
                </div>
                <div class="card card-sm bg-[#006569] shadow-xl h-max">
                    <div class="flex items-center justify-between p-3">
                        <div class="flex flex-wrap gap-2">
                            <div>Ruangan 102</div>
                            <div class="badge badge-sm badge-soft badge-error self-center">
                                Digunakan
                            </div>
                        </div>
                        <div >
                            <a href="/ruang" class="btn btn-md place-content-end bg-white text-black border-none hover:bg-gray-200">Details</a>
                        </div>
                    </div>
                </div>
                <div class="card card-sm bg-[#006569] shadow-xl h-max">
                    <div class="flex items-center justify-between p-3">
                        <div class="flex flex-wrap gap-2">
                            <div>Ruangan 103</div>
                            <div class="badge badge-sm badge-soft badge-warning self-center">
                                Perbaikan
                            </div>
                        </div>
                        <div >
                            <a href="" class="btn btn-md place-content-end bg-white text-black border-none hover:bg-gray-200">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-[#006569] collapse collapse-arrow border border-gray-300">
            <input type="checkbox" class="peer" />
            <div class="collapse-title bg-[#006569] text-xl font-bold">
              Lantai 2
            </div>
            <div class="collapse-content grid gap-2 bg-white peer-checked:pt-5">
            <div class="card card-sm bg-[#006569] shadow-xl h-max">
                <div class="flex justify-between p-2">
                    <h2 class="self-center">Ruangan 201</h2>
                    <a href="" class="btn bg-white text-black border-none hover:bg-gray-200">Details</a>
                </div>
            </div>
            <div class="card card-sm bg-[#006569] shadow-xl h-max">
                <div class="flex justify-between p-2">
                    <h2 class="self-center">Ruangan 202</h2>
                    <a href="" class="btn bg-white text-black border-none hover:bg-gray-200">Details</a>
                </div>
            </div>
            <div class="card card-sm bg-[#006569] shadow-xl h-max">
                <div class="flex justify-between p-2">
                    <h2 class="self-center">Ruangan 203</h2>
                    <a href="" class="btn bg-white text-black border-none hover:bg-gray-200">Details</a>
                </div>
            </div>
            </div>
        </div>
        {{-- <a href="/kampus">
      <div class="card group bg-[url(/public/backgrounds/unj_bersih.jpeg)] bg-cover h-53 ">
        <div class="card-body rounded-box backdrop-brightness-75 group-hover:backdrop-brightness-50 group-hover:backdrop-blur-xs transition-all duration-400">
          <h2 class="card-title text-3xl group-hover:text-2xl transition-all duration-400">Gedung Dewi Sartono</h2>
          <p class="hidden group-hover:inline transition-all duration-400">Kampus utama UNJ</p>
          <p class="hidden text-xs group-hover:inline transition-all duration-400">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
        </div>
      </div>
    </a> --}}
    </div>
</div>