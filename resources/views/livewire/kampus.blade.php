<div class="min-h-screen py-8 px-4 bg-white">
    <!-- Breadcrumb Navigation -->
    <div class="max-w-7xl mx-auto mb-6">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="/kampus" class="inline-flex items-center text-sm font-medium text-black-400 hover:text-gray">
                        Kampus
                    </a>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 max-w-7xl mx-auto">
        @foreach(range('A', 'D') as $building)
            <div class="bg-green-900 rounded-lg shadow-md overflow-hidden border border-gray-700 transition-transform hover:scale-[1.02]">
                <!-- Gambar Kampus -->
                <div class="h-48 bg-gray-800 flex items-center justify-center">
                    <img src="logos/kampus.png" alt="Gedung {{ $building }}" class="h-full w-full object-cover opacity-90">
                </div>
                
                <!-- Konten Alamat -->
                <div class="p-4">
                    <h2 class="text-xl font-bold text-white mb-3">Kampus {{ $building }}</h2>
                    
                    <div class="space-y-1 text-gray-300 text-sm">
                        <p>
                            Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, DKI Jakarta 13220
                        </p>
                    </div>
                    
                    <!-- Tombol Details -->
                    <div class="mt-4 text-center">
                        <button class="px-4 py-2 bg-white text-black rounded-md hover:bg-gray-200 transition-colors text-sm font-medium w-full">
                            Details
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>