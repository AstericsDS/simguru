<div class="w-full px-5 lg:px-40">
    {{-- Breadcrumbs --}}
    <div class="flex flex-col mt-5">
        <a href="/" class="size-5"><img src="{{ asset('logos/back-svgrepo-com.svg') }}" alt=""></a>
        <div class="breadcrumbs text-sm text-[#006569] py-5">
            <ul>
                <li><a href="/kampus/{{ $campus->slug }}">{{ $campus->name }}</a></li>
            </ul>
        </div>
    </div>
    {{-- Building Details --}}
    <div class="grid grid-flow-col-dense grid-rows-3 gap-4 text-[#006569] justify-items-center">
        <div class="row-span-3 flex items-center justify-center lg:mr-10">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach ($campus->images_path as $image)

                    <div class="swiper-slide"><img src="{{ $image }}" alt="Kampus A"></div>

                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
        <div class="row-span-3 not-lg:hidden">
            <div class="font-bold text-4xl mb-7">{{ $campus->name }}</div>
            <div class="grid grid-flow-row gap-3 font-semibold">
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Alamat</div>
                    <div>:</div>
                    <div>{{ $campus->address }}</div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Jumlah Gedung</div>
                    <div>:</div>
                    <div>null</div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Luas</div>
                    <div>:</div>
                    <div>null</div>
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
        <div class="font-bold text-2xl lg:text-4xl my-5">{{ $campus->name }}</div>
        <div class="row-span-2">
            <div class="grid grid-flow-row gap-3 font-semibold">
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Alamat</div>
                    <div>:</div>
                    <div>{{ $campus->address }}</div>
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
    {{-- Gedung Box --}}
    <div class="grid lg:grid-cols-4 gap-3 mt-12">
        <div class="card bg-base-100 shadow-sm">
            <figure>
                <img src="backgrounds/unj_bersih.jpeg" alt="Kampus_A_UNJ" />
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Gedung Dewi Sartika</h2>
                <p class="text-xs not-lg:hidden">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota
                    Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
                <div class="card-actions">
                    <a href="/gedung"
                        class="btn bg-white text-black w-full hover:bg-gray-200 rounded-lg outline-none">Details</a>
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
