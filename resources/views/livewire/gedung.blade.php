<div class="w-full p-5 lg:px-40">
    {{-- Breadcrumbs --}}
    <div class="flex flex-col my-5">
        <a href="/kampus" class="size-5"><img src="{{ asset('logos/back-svgrepo-com.svg') }}" alt=""></a>
        <div class="breadcrumbs text-sm text-[#006569]">
            <ul>
                <li><a class="">Kampus A</a></li>
                <li><a class="">Gedung Dewi Sartika</a></li>
            </ul>
        </div>
    </div>
    {{-- Building Details --}}
    <div class="grid grid-flow-col-dense grid-rows-3 gap-4 text-[#006569] justify-items-center">
        <div class="row-span-3 flex lg:mr-15">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/backgrounds/unj_bersih.jpeg" alt=""></div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
        <div class="row-span-3 not-lg:hidden">
            <div class="font-bold text-4xl mb-7">Gedung Dewi Sartika</div>
            <div class="grid grid-flow-row gap-3 font-semibold">
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Alamat</div>
                    <div>:</div>
                    <div>Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah
                        Khusus Ibukota Jakarta 13220</div>
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
                    <div>Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah
                        Khusus Ibukota Jakarta 13220</div>
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
    <div class="grid  grid-cols-1 gap-3 mt-12 text-white">
        <div class="bg-unj-500  collapse collapse-arrow border border-gray-300">
            <input type="checkbox" class="peer" />
            <div class="collapse-title bg-unj-500 text-xl font-bold">
                Lantai 1
            </div>
            <div class="collapse-content grid gap-2 bg-white peer-checked:pt-5">
                <div class="card card-sm bg-unj-500 shadow-xl h-max">
                    <div class="flex items-center justify-between p-3">
                        <div class="flex flex-wrap gap-2">
                            <div>Ruangan 101</div>
                            <div class="badge badge-sm badge-soft badge-success self-center">
                                Tersedia
                            </div>
                        </div>
                        <div>
                            <a href=""
                                class="btn btn-md place-content-end bg-white text-black border-none hover:bg-gray-200">Details</a>
                        </div>
                    </div>
                </div>
                <div class="card card-sm bg-unj-500 shadow-xl h-max">
                    <div class="flex items-center justify-between p-3">
                        <div class="flex flex-wrap gap-2">
                            <div>Ruangan 101</div>
                            <div class="badge badge-sm badge-soft badge-error self-center">
                                Digunakan
                            </div>
                        </div>
                        <div>
                            <a href="/ruang"
                                class="btn btn-md place-content-end bg-white text-black border-none hover:bg-gray-200">Details</a>
                        </div>
                    </div>
                </div>
                <div class="card card-sm bg-unj-500 shadow-xl h-max">
                    <div class="flex items-center justify-between p-3">
                        <div class="flex flex-wrap gap-2">
                            <div>Ruangan 101</div>
                            <div class="badge badge-sm badge-soft badge-warning self-center">
                                Perbaikan
                            </div>
                        </div>
                        <div>
                            <a href=""
                                class="btn btn-md place-content-end bg-white text-black border-none hover:bg-gray-200">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-unj-500 collapse collapse-arrow border border-gray-300">
            <input type="checkbox" class="peer" />
            <div class="collapse-title bg-unj-500 text-xl font-bold">
                Lantai 2
            </div>
            <div class="collapse-content grid gap-2 bg-white peer-checked:pt-5">
                <div class="card card-sm bg-unj-500 shadow-xl h-max">
                    <div class="flex justify-between p-2">
                        <h2 class="self-center">Ruangan 201</h2>
                        <a href="" class="btn bg-white text-black border-none hover:bg-gray-200">Details</a>
                    </div>
                </div>
                <div class="card card-sm bg-unj-500 shadow-xl h-max">
                    <div class="flex justify-between p-2">
                        <h2 class="self-center">Ruangan 202</h2>
                        <a href="" class="btn bg-white text-black border-none hover:bg-gray-200">Details</a>
                    </div>
                </div>
                <div class="card card-sm bg-unj-500 shadow-xl h-max">
                    <div class="flex justify-between p-2">
                        <h2 class="self-center">Ruangan 203</h2>
                        <a href="" class="btn bg-white text-black border-none hover:bg-gray-200">Details</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <a href="/kampus">
            <div class="card group bg-[url(/public/backgrounds/unj_bersih.jpeg)] bg-cover h-53 ">
                <div
                    class="card-body rounded-box backdrop-brightness-75 group-hover:backdrop-brightness-50 group-hover:backdrop-blur-xs transition-all duration-400">
                    <h2 class="card-title text-3xl group-hover:text-2xl transition-all duration-400">Gedung Dewi Sartono
                    </h2>
                    <p class="hidden group-hover:inline transition-all duration-400">Kampus utama UNJ</p>
                    <p class="hidden text-xs group-hover:inline transition-all duration-400">Jl. R.Mangun Muka Raya,
                        RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta
                        13220</p>
                </div>
            </div>
        </a> --}}
    </div>
</div>
