<div>
    {{-- Detail Kampus --}}
    <div class="flex gap-8">

        {{-- Slider --}}
        <div class="viewUnit w-lg relative rounded-md overflow-hidden">
            <div class="swiper-wrapper">
                @foreach ($room->images_path ?? $pending->new_data['images_path'] as $image)
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
            <h1 class="text-4xl">{{ $room->name ?? $pending->new_data['name'] }}</h1>
            <div class="mt-4 flex flex-col gap-3">
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Nama</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->name ?? $pending->new_data['name'] }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Kampus</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->campus->name ?? $pending->new_data['campus'] }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Gedung</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->building->name ?? $pending->new_data['building'] }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Lantai</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->floor ?? $pending->new_data['floor'] }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Kapasitas</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->capacity ?? $pending->new_data['capacity'] }}
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Luas</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->area ?? $pending->new_data['area'] }}m<sup>2</sup></span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Jenis Ruang</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        @if (($room->category ?? $pending->new_data['category']) === 'class')
                            <span>Kelas</span>
                        @else
                            <span>Bukan Kelas</span>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Deskripsi</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->description ?? $pending->new_data['description'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
