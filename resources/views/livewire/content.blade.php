<div class="max-w-4xl mx-auto py-8 text-white">
    <h1 class="text-3xl font-bold mb-8 text-black">Daftar Isi</h1>

    @foreach($kampusList as $kampus)
    <div class="bg-teal-700 collapse collapse-arrow border border-gray-300 rounded mb-4">
        <input type="checkbox" id="kampus-{{ $kampus['id'] }}" class="peer" />
        <label for="kampus-{{ $kampus['id'] }}" class="collapse-title bg-teal-700 text-xl font-bold cursor-pointer select-none px-4 py-3 flex justify-between items-center">
            {{ $kampus['nama'] }}
        </label>
        <div class="collapse-content grid gap-3 bg-white peer-checked:pt-5 px-4 pb-4 rounded-b text-white">
            @foreach($kampus['gedung'] as $gedung)
            <div class="bg-teal-700 collapse collapse-arrow border border-gray-300 rounded">
                <input type="checkbox" id="gedung-{{ $gedung['id'] }}" class="peer" />
                <label for="gedung-{{ $gedung['id'] }}" class="collapse-title bg-teal-700 text-lg font-semibold cursor-pointer select-none px-4 py-2 flex justify-between items-center">
                    {{ $gedung['nama'] }}
                </label>
                <div class="collapse-content grid gap-2 bg-white peer-checked:pt-4 px-4 pb-4 rounded-b text-white">
                    @foreach($gedung['lantai'] as $lantai)
                    <div class="bg-teal-700 collapse collapse-arrow border border-gray-300 rounded">
                        <input type="checkbox" id="lantai-{{ $lantai['id'] }}" class="peer" />
                        <label for="lantai-{{ $lantai['id'] }}" class="collapse-title bg-teal-700 text-base font-medium cursor-pointer select-none px-4 py-2 flex justify-between items-center">
                            {{ $lantai['nama'] }}
                        </label>
                        <div class="collapse-content peer-checked:pt-3 px-4 pb-4 rounded-b text-black">
                            <ul class="space-y-2">
                                @foreach($lantai['ruangan'] as $ruangan)
                                <li class="flex items-center bg-white rounded px-4 py-2 justify-between">
                                    <span class="flex-1">{{ $ruangan['nama'] }}</span>
                                    <button class="bg-teal-700 text-white px-6 py-1 rounded hover:bg-teal-800 text-sm">Details</button>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
