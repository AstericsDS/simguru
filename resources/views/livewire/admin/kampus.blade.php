<div class="container mx-auto px-4 py-6" x-data="{ showGedung: false }">
  <div class="flex flex-col md:flex-row gap-8">
    {{-- Slider Foto Kampus --}}
    <div class="md:w-1/3">
      <div id="kampus-carousel" class="relative w-full" data-carousel="slide">
        <div class="relative h-56 overflow-hidden rounded-lg md:h-72">
          <div class="duration-700 ease-in-out" data-carousel-item="active">
            <img
              src="{{ asset("images/kampus_a.jpg") }}"
              class="absolute block w-full h-full object-cover"
              alt="Kampus A"
            />
          </div>
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img
              src="{{ asset("images/unj_bersih.jpeg") }}"
              class="absolute block w-full h-full object-cover"
              alt="Plaza Kampus A"
            />
          </div>
        </div>
        <button
          type="button"
          class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
          data-carousel-prev
        >
          <span
            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 group-hover:bg-white/50"
          >
            <svg
              class="w-5 h-5 text-gray-800"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 19l-7-7 7-7"
              ></path>
            </svg>
          </span>
        </button>
        <button
          type="button"
          class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
          data-carousel-next
        >
          <span
            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 group-hover:bg-white/50"
          >
            <svg
              class="w-5 h-5 text-gray-800"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 5l7 7-7 7"
              ></path>
            </svg>
          </span>
        </button>
      </div>
    </div>

    {{-- Informasi Kampus (sejajar, tabel-like) --}}
    <div class="md:w-2/3 flex flex-col">
      <h2 class="text-2xl font-bold mb-6">
        Kampus Rawamangun Muka Universitas Negeri Jakarta
      </h2>
      <div class="w-full">
        <div class="grid grid-cols-1 sm:grid-cols-12 gap-y-3 gap-x-2">
          <div class="sm:col-span-3 font-semibold text-gray-500">
            Nama Kampus
          </div>
          <div class="sm:col-span-9 text-gray-800">
            Kampus Rawamangun Muka Universitas Negeri Jakarta
          </div>

          <div class="sm:col-span-3 font-semibold text-gray-500">Alamat</div>
          <div class="sm:col-span-9 text-gray-800">
            Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung,
            Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220
          </div>

          <div class="sm:col-span-3 font-semibold text-gray-500">
            No Telpon Kampus
          </div>
          <div class="sm:col-span-9 text-gray-800">(021) 4898486</div>

          <div class="sm:col-span-3 font-semibold text-gray-500">
            E-Mail Kampus
          </div>
          <div class="sm:col-span-9 text-gray-800">
            HumasKomunikasiDigital@unj.ac.id
          </div>

          <div class="sm:col-span-3 font-semibold text-gray-500">
            Jumlah Gedung
          </div>
          <div class="sm:col-span-9 text-gray-800">15</div>

          <div class="sm:col-span-3 font-semibold text-gray-500">
            Jumlah Unjt
          </div>
          <div class="sm:col-span-9 text-gray-800">10</div>

          <div class="sm:col-span-3 font-semibold text-gray-500">
            Fakultas / Unit
          </div>
          <div class="sm:col-span-9 text-gray-800">
            FMIPA, FBS, FIK, FIS, FE, FPP, FIKK, FIKTI, FPPM, FMIPA
          </div>

          <div class="sm:col-span-3 font-semibold text-gray-500">
            Luas Wilayah Kampus
          </div>
          <div class="sm:col-span-9 text-gray-800">100.000 m2</div>

          <div class="sm:col-span-3 font-semibold text-gray-500">
            Deskripsi Kampus
          </div>
          <div class="sm:col-span-9 text-gray-800 text-justify">
            Kampus A Universitas Negeri Jakarta (UNJ) merupakan kampus utama
            yang berlokasi di Jalan Rawamangun Muka, Jakarta Timur. Kampus ini
            menjadi pusat administrasi universitas dan menyediakan berbagai
            fasilitas penting, seperti perpustakaan pusat, auditorium, serta
            beberapa gedung perkuliahan untuk Fakultas Ilmu Pendidikan, Fakultas
            Bahasa dan Seni, dan Fakultas Ilmu Sosial
          </div>

          <div class="sm:col-span-3 font-semibold text-gray-500">
            Dokumen Kampus
          </div>
          <div class="sm:col-span-9 text-gray-800">Dokumen.pdf</div>
        </div>
      </div>
      <div class="flex gap-2 mt-8">
        <button
          @click="showGedung = !showGedung"
          type="button"
          class="inline-flex items-center px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 transition"
        >
          Lihat Gedung Kampus A UNJ
        </button>
        <a
          href="/detail-all"
          class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition"
        >
          Kembali ke Daftar Kampus
        </a>
      </div>
    </div>
  </div>

  {{-- Daftar Gedung Kampus --}}
  <div
    x-show="showGedung"
    x-transition:enter="transition transform ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-x-full"
    x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition transform ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 translate-x-full"
    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-10"
  >
    {{-- Card Gedung, ulangi/loop sesuai data --}}
    <div
      class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden"
    >
      <img
        src="{{ asset("images/kampus_a.jpg") }}"
        alt="Rawamangun Muka"
        class="w-full h-40 object-cover"
      />
      <div class="p-4">
        <h5 class="text-lg font-semibold mb-2">Gedung Rektorat</h5>
        <p class="text-gray-600 text-sm mb-4">
          Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung,
          Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220
        </p>
        <a
          href="veiw-gedung-rektorat"
          class="block w-full text-center px-4 py-2 bg-cyan-600 text-white rounded hover:bg-cyan-700 transition"
        >
          Lihat Detail Gedung
        </a>
      </div>
    </div>
    <div
      class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden"
    >
      <img
        src="{{ asset("images/kampus_a.jpg") }}"
        alt="Kampus Pemuda"
        class="w-full h-40 object-cover"
      />
      <div class="p-4">
        <h5 class="text-lg font-semibold mb-2">Gedung Pustikom</h5>
        <p class="text-gray-600 text-sm mb-4">
          Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung,
          Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220
        </p>
        <a
          href="#"
          class="block w-full text-center px-4 py-2 bg-cyan-600 text-white rounded hover:bg-cyan-700 transition"
        >
          Lihat Detail Kampus
        </a>
      </div>
    </div>
    <div
      class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden"
    >
      <img
        src="{{ asset("images/kampus_a.jpg") }}"
        alt="Kampus Pemuda"
        class="w-full h-40 object-cover"
      />
      <div class="p-4">
        <h5 class="text-lg font-semibold mb-2">Gedung Raden Dewi Sartika</h5>
        <p class="text-gray-600 text-sm mb-4">
          Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung,
          Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220
        </p>
        <a
          href="#"
          class="block w-full text-center px-4 py-2 bg-cyan-600 text-white rounded hover:bg-cyan-700 transition"
        >
          Lihat Detail Kampus
        </a>
      </div>
    </div>
    <div
      class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden"
    >
      <img
        src="{{ asset("images/kampus_a.jpg") }}"
        alt="Kampus Pemuda"
        class="w-full h-40 object-cover"
      />
      <div class="p-4">
        <h5 class="text-lg font-semibold mb-2">Gedung Raden Ajeng Kartini</h5>
        <p class="text-gray-600 text-sm mb-4">
          Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung,
          Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220
        </p>
        <a
          href="#"
          class="block w-full text-center px-4 py-2 bg-cyan-600 text-white rounded hover:bg-cyan-700 transition"
        >
          Lihat Detail Kampus
        </a>
      </div>
    </div>
    {{-- Tambahkan card lain sesuai kebutuhan --}}
  </div>
</div>
