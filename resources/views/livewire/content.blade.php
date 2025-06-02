<div class="max-w-4xl mx-auto py-8">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold">Daftar Isi</h1>
        <div class="relative">
            <input
                type="text"
                placeholder="Search..."
                class="border border-black rounded-full px-4 py-1 w-56 focus:outline-none focus:ring-2 focus:ring-teal-400"
                wire:model="search"
            >
            <span class="absolute right-3 top-1.5 text-gray-400">
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                </svg>
            </span>
        </div>
    </div>
    @foreach($kampusList as $kampus)
        <div class="mb-8">
            {{-- Kampus --}}
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
                        {{-- Gedung --}}
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
                                    {{-- Lantai --}}
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
                                                {{-- Ruang --}}
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
