<div class="w-full px-40">
    <div class="flex flex-col my-5">
        <a href="/" class="size-5"><img src="{{ asset('logos/back-svgrepo-com.svg') }}" alt=""></a>
        <h4 class="text-[#006569] font-bold text-4xl mt-2 text-center">EDIT KAMPUS</h4>
    </div>
    <div class="group grid grid-flow-col-dense grid-rows-3 gap-4 lg:justify-items-start text-[#006569] md:justify-items-center">
        <div class="font-bold text-4xl sm:hidden md:hidden lg:inline ">
            <input type="text" class="input bg-gray-400" placeholder="KAMPUS A">
        </div>
        <div class="row-span-2 sm:hidden md:hidden lg:inline">
            <div class="grid grid-flow-row gap-3 font-semibold">
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Alamat</div>
                    <div>:</div>
                    <div>
                        <input type="text" class="input bg-gray-400">
                    </div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Jumlah Gedung</div>
                    <div>:</div>
                    <div>
                        <input type="text" class="input bg-gray-400">
                    </div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Luas</div>
                    <div>:</div>
                    <div>
                        <input type="text" class="input bg-gray-400">
                    </div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Fakultas</div>
                    <div>:</div>
                    <div>
                        <input type="text" class="input bg-gray-400">
                    </div>
                </div>
                <div class="flex justify-center">
                    <a href="" class="btn bg-green-500">Save</a>
                </div>
                {{-- <div>Alamat</div> <div>:</div> <div>Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</div>
          <div>Jumlah gedung</div> <div>:</div> <div>200</div> --}}
            </div>
        </div>
    </div>
    <div class="lg:hidden text-[#006569]">
        <div class="font-bold text-4xl  sm:hidden md:hidden lg:inline">KAMPUS A</div>
        <div class="row-span-2  sm:hidden md:hidden lg:inline">
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
                <div class="grid grid-cols-2 gap-2">
                    <a href="/edit" class="btn bg-yellow-500">Edit</a>
                    <a href="" class="btn bg-red-500">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-3 mt-12">
        <div class="card bg-base-100 shadow-sm">
            <figure>
                <img src="backgrounds/unj_bersih.jpeg" alt="Kampus_A_UNJ" />
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Gedung Dewi Sartika</h2>
                <p class="text-xs md:hidden lg:inline">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
                <div class="card-actions">
                    <a href="/gedung" class="btn bg-white text-black">Details</a>
                </div>
            </div>
        </div>
        <div class="card bg-base-100 shadow-sm">
            <figure>
                <img src="backgrounds/unj_bersih.jpeg" alt="Kampus_A_UNJ" />
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Gedung Dewi Sartika</h2>
                <p class="text-xs md:hidden lg:inline">Jl. Rawamangun Muka, RT.11/RW14, Rawamangun, Pulo Gadung, Jakarta Timur, Daerah Khusus Jakarta, 13320</p>
                <div class="card-actions">
                    <a href="" class="btn bg-white text-black">Details</a>
                </div>
            </div>
        </div>
        <div class="card bg-base-100 shadow-sm">
            <figure>
                <img src="backgrounds/unj_bersih.jpeg" alt="Kampus_A_UNJ" />
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Gedung Dewi Sartika</h2>
                <p class="text-xs md:hidden lg:inline">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
                <div class="card-actions">
                    <a href="" class="btn bg-white text-black">Details</a>
                </div>
            </div>
        </div>
        <div class="card bg-base-100 shadow-sm">
            <figure>
                <img src="backgrounds/unj_bersih.jpeg" alt="Kampus_A_UNJ" />
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Gedung Dewi Sartika</h2>
                <p class="text-xs md:hidden lg:inline">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
                <div class="card-actions">
                    <a href="" class="btn bg-white text-black">Details</a>
                </div>
            </div>
        </div>
        {{-- <a href="/kampus">
      <div class="card group bg-[url(/public/backgrounds/unj_bersih.jpeg)] bg-cover h-53 ">
        <div class="card-body rounded-box backdrop-brightness-75 group-hover:backdrop-brightness-50 group-hover:backdrop-blur-xs transition-all duration-400">
          <h2 class="card-title text-3xl group-hover:text-2xl transition-all duration-400">Gedung Dewi Sartika</h2>
          <p class="hidden group-hover:inline transition-all duration-400">Kampus utama UNJ</p>
          <p class="hidden text-xs group-hover:inline transition-all duration-400">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
        </div>
      </div>
    </a> --}}
        <a href="/tambahgedung">
            <div class="card group h-53 outline-3 outline-dashed outline-[#006569] transition-all duration-400">
                <div class="card-body">
                    <p class="font-bold text-[#006569] text-2xl text-center group-hover:text-3xl transition-all duration-400">Tambah Gedung</p>
                    <p class="font-extrabold text-[#006569] text-6xl text-center group-hover:text-7xl transition-all duration-400">+</p>
                </div>
            </div>
        </a>
    </div>
</div>
