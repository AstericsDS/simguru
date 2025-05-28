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
                    <img src="{{ asset('images/gedung.png') }}" class="w-full w-max-full bg-contain" />
                    <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                        <a href="#slide4" class="btn btn-circle not-lg:hidden">❮</a>
                        <a href="#slide2" class="btn btn-circle not-lg:hidden">❯</a>
                    </div>
                </div>
                <div id="slide2" class="carousel-item relative w-full w-max-full">
                    <img src="https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.webp" class="w-full w-max-full" />
                    <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                        <a href="#slide1" class="btn btn-circle not-lg:hidden">❮</a>
                        <a href="#slide3" class="btn btn-circle not-lg:hidden">❯</a>
                    </div>
                </div>
                <div id="slide3" class="carousel-item relative w-full w-max-full">
                    <img src="https://img.daisyui.com/images/stock/photo-1414694762283-acccc27bca85.webp" class="w-full w-max-full" />
                    <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                        <a href="#slide2" class="btn btn-circle not-lg:hidden">❮</a>
                        <a href="#slide4" class="btn btn-circle not-lg:hidden">❯</a>
                    </div>
                </div>
                <div id="slide4" class="carousel-item relative w-full w-max-full">
                    <img src="https://img.daisyui.com/images/stock/photo-1665553365602-b2fb8e5d1707.webp" class="w-full w-max-full" />
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
    {{-- Lantai Box --}}
    <div class="grid grid-cols-1 gap-3 mt-12">
        <div class="card card-sm bg-[#006569] shadow-sm h-max">
            <div class="card-body">
                <h2 class="card-title text-2xl text-white">Lantai 1</h2>
                <div class="card-actions justify-end">
                    <a href="" class="btn bg-white text-black">Details</a>
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
