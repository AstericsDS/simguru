<div class="w-full p-5 lg:px-40">
    {{-- Breadcrumbs --}}
    <div class="flex flex-col my-5">
        <a href="/" class="text-primary flex gap-2"><img class="size-5" src="{{ asset('logos/back-svgrepo-com.svg') }}"
                alt="">ke beranda</a>
        <div class="breadcrumbs text-sm text-[#006569]">
            <ul>
                <li><a href="/kampus/{{ $room->campus->slug }}">{{ $room->campus->name }}</a></li>
                <li><a href="/gedung/{{ $room->building->slug }}">{{ $room->building->name }}</a></li>
                <li><a href="/ruang/{{ $room->slug }}">{{ $room->name }}</a></li>
            </ul>
        </div>
    </div>
    {{-- Building Details --}}
    <div class="flex gap-4 text-primary justify-items-center">
        <div class="flex items-center justify-center lg:mr-10">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @if (isset($room->images_path))
                        @foreach ($room->images_path as $image)
                            <img class="swiper-slide object-contain" src="{{ asset('storage/' . $image) }}"
                                alt="{{ $room->name }}">
                        @endforeach
                    @else
                        <img class="swiper-slide object-contain" src="{{ asset('backgrounds/DUMMY.png') }}"
                            alt="{{ $room->name }}">
                    @endif
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
        <div class="row-span-3 not-lg:hidden">
            <div class="font-bold text-4xl mb-7">{{ $room->name }}</div>
            <div class="grid grid-flow-row gap-3 font-semibold">
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Kategori</div>
                    <div>:</div>
                    <div>{{ $room->category }}</div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Kapasitas</div>
                    <div>:</div>
                    <div>{{ $room->capacity }} orang</div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Deskripsi</div>
                    <div>:</div>
                    <div>{{ $room->description }}</div>
                </div>
            </div>
        </div>
    </div>
    {{-- Mobile View --}}
    <div class="lg:hidden text-xs text-[#006569]">
        <div class="col-span-2 font-bold text-2xl lg:text-4xl my-5">{{ $room->name }}</div>
        <div class="col-span-2 row-span-2">
            <div class="grid grid-flow-row gap-3 font-semibold">
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Kategori</div>
                    <div>:</div>
                    <div>{{ $room->category }}</div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Kapasitas</div>
                    <div>:</div>
                    <div>{{ $room->capacity }} orang</div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Deskripsi</div>
                    <div>:</div>
                    <div>{{ $room->description }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-black text-center flex flex-col gap-3 pt-30" id="kampus">
        <h1 class="text-4xl font-semibold">Jadwal Ruangan {{ $room->name }}</h1>
        <hr class="w-15 font-bold mx-auto border-gray-500 border">
        {{-- <p class="text-gray-500">Kampus-Kampus UNJ</p> --}}
    </div>
    <div class="text-black mx-50" id='calendar'></div>
</div>
