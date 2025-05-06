<div class="max-w-4xl mx-auto py-8">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold">Daftar Isi</h1>
        <div class="relative">
            <input
                type="text"
                placeholder="Cari..."
                class="border border-black rounded-full px-4 py-1 w-56 focus:outline-none focus:ring-2 focus:ring-teal-400"
                wire:model="search"
            >
            <span class="absolute right-3 top-1.5 text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
            </span>
        </div>
    </div>
    @foreach($kampusList as $kampus)
        <div class="mb-8">
            <!-- Kampus -->
            <button
                wire:click="toggleKampus({{ $kampus['id'] }})"
                class="w-full flex items-center justify-between font-bold text-xl bg-white border border-black px-4 py-2 rounded focus:outline-none"
>
                <span>{{ $kampus['nama'] }}</span>
                <svg class="w-5 h-5 ml-2 transition-transform duration-200 {{ ($openKampus[$kampus['id']] ?? false) ? 'rotate-90' : '' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            @if($openKampus[$kampus['id']] ?? false)
                @foreach($kampus['gedung'] as $gedung)
                    <div class="ml-8 mt-2">
                        <!-- Gedung -->
                        <button
                            wire:click="toggleGedung({{ $gedung['id'] }})"
                            class="w-full text-left font-semibold bg-white border border-black px-4 py-2 rounded focus:outline-none flex items-center"
                        >
                            <span class="flex-1">{{ $gedung['nama'] }}</span>
                            <svg class="w-4 h-4 ml-2 transition-transform {{ ($openGedung[$gedung['id']] ?? false) ? 'rotate-90' : '' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                        @if($openGedung[$gedung['id']] ?? false)
                            @foreach($gedung['lantai'] as $lantai)
                                <div class="ml-8 mt-2">
                                    <!-- Lantai -->
                                    <button
                                        wire:click="toggleLantai({{ $lantai['id'] }})"
                                        class="w-full text-left font-medium bg-white border border-black px-4 py-2 rounded focus:outline-none flex items-center"
                                    >
                                        <span class="flex-1">{{ $lantai['nama'] }}</span>
                                        <svg class="w-4 h-4 ml-2 transition-transform {{ ($openLantai[$lantai['id']] ?? false) ? 'rotate-90' : '' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                    @if($openLantai[$lantai['id']] ?? false)
                                        <ul class="ml-8 mt-2 space-y-2">
                                            @foreach($lantai['ruangan'] as $ruangan)
                                                <li class="flex items-center bg-white border border-black rounded px-4 py-2">
                                                    <span class="flex-1">{{ $ruangan['nama'] }}</span>
                                                    <button class="bg-teal-700 text-white px-6 py-1 rounded hover:bg-teal-800 text-sm">Details</button>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    @endforeach
</div>
