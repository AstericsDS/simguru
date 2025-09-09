<div class="w-full p-5 lg:px-60">
    {{-- Breadcrumbs --}}
    <div class="flex flex-col my-5">
        <a href="/" class="text-unj flex gap-2"><img class="size-5" src="{{ asset('logos/back-svgrepo-com.svg') }}"
                alt="">ke beranda</a>
        <div class="breadcrumbs text-sm text-[#006569]">
            <ul>
                <li><a href="/kampus/{{ $building->campus->slug }}">{{ $building->campus->name }}</a></li>
                <li><a href="/gedung/{{ $building->slug }}">Gedung Dewi Sartika</a></li>
            </ul>
        </div>
    </div>
    {{-- Building Details --}}
    <div class="flex gap-4 text-[#006569] justify-items-center">
        <div class="flex lg:mr-15">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @if (isset($building->images_path))
                        @foreach ($building->images_path as $image)
                            <img class="swiper-slide object-contain" src="{{ asset('storage/' . $image) }}" alt="{{ $building->name }}">
                        @endforeach
                    @else
                        <img class="swiper-slide object-contain" src="{{ asset('backgrounds/DUMMY.png') }}" alt="{{ $building->name }}">
                    @endif
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
        <div class="row-span-3 not-lg:hidden">
            <div class="font-bold text-4xl mb-7">{{ $building->name }}</div>
            <div class="grid grid-flow-row gap-3 font-semibold">
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Alamat</div>
                    <div>:</div>
                    <div>{{ $building->address }}</div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Luas</div>
                    <div>:</div>
                    <div>{{ $building->area }}</div>
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

    <div class="grid grid-cols-1 gap-3 mt-12 text-white">
        @for ($i = 1; $i <= $building->floor; $i++)
            <div class="bg-unj  collapse collapse-arrow border border-gray-300">
                <input type="checkbox" class="peer" />
                <div class="collapse-title bg-unj text-xl font-bold">
                    Lantai {{ $i }}
                </div>
                <div class="collapse-content grid gap-2 bg-white peer-checked:pt-5">
                    @foreach ($rooms as $room)
                        @if ($room->floor == $i)
                            <div class="card card-sm bg-unj shadow-xl h-max">
                                <div class="flex items-center justify-between p-3">
                                    <div class="flex flex-wrap gap-2">
                                        <div>{{ $room->name }}</div>
                                        <div class="badge badge-sm badge-soft badge-success self-center">
                                            Tersedia
                                        </div>
                                    </div>
                                    <div>
                                        <a href="/ruang/{{ $room->slug }}"
                                            class="btn btn-md place-content-end bg-white text-black border-none hover:bg-gray-200">Details</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endfor
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
