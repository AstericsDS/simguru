<div>
    {{-- Detail Kampus --}}
    <div class="flex gap-8">

        {{-- Slider --}}
        <div class="viewUnit w-lg relative rounded-md overflow-hidden">
            <div class="swiper-wrapper">
                @foreach ($room->images_path as $image)
                    <div class="swiper-slide"><img src="{{ asset('storage/' . $image) }}" class="h-full"></div>
                @endforeach

            </div>

            {{-- Navigation --}}
            <div class="swiper-pagination absolute bottom-1"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        {{-- Data Kampus --}}
        <div class="flex-1">
            <h1 class="text-4xl">{{ $room->name }}</h1>
            <div class="mt-4 flex flex-col gap-3">
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Nama</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->name }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Lantai</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->floor }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Kapasitas</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->area }}m<sup>2</sup></span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Deskripsi</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->description }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
