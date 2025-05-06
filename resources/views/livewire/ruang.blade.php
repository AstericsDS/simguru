<div class="w-full p-5 lg:px-40">
    {{-- Breadcrumbs --}}
    <div class="flex flex-col my-5">
        <a href="/gedung" class="size-5"><img src="{{ asset('logos/back-svgrepo-com.svg') }}" alt=""></a>
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
</div>