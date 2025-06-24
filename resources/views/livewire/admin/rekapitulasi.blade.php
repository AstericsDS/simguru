<div class="container mt-4">

  <!-- Judul -->
  <div class="flex justify-center text-center items-center mb-6 mt-6">
    <span class="text-2xl font-bold text-gray-800">
      Rekapitulasi Gedung Universitas Negeri Jakarta
    </span>
  </div>

  <!-- Tombol -->
  <div class="flex justify-end items-center gap-2 mt-10 mb-3">
    <button
      class="flex items-center px-4 py-2 bg-yellow-400 text-black rounded-lg shadow hover:bg-yellow-500">
      Buat Laporan Gedung
    </button>

    <button data-modal-target="modalTambahGedung" data-modal-toggle="modalTambahGedung"
      class="flex items-center px-4 py-2 bg-teal-700 text-white rounded-lg shadow hover:bg-teal-800">
      Tambah Rekap Gedung
    </button>
  </div>

  <!-- Modal Tambah Gedung -->
  <div id="modalTambahGedung" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
      <div class="relative bg-white rounded-lg shadow">

        <!-- Header Modal -->
        <div
          class="flex items-center justify-between p-4 border-b rounded-t border-gray-200">
          <h3 class="text-lg font-semibold text-gray-900">
            Tambah Rekapitulasi Gedung UNJ
          </h3>
          <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
            data-modal-hide="modalTambahGedung">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>

        <!-- Body Modal -->
        <form class="p-6 space-y-4 overflow-y-auto max-h-[70vh]">

          <div class="bg-blue-50 border-l-4 border-blue-400 text-blue-700 p-3 rounded">
            Silakan isi form di bawah ini untuk menambahkan Kampus Baru.
          </div>

          <div>
            <label for="nama_kampus" class="block mb-1 font-medium text-gray-700">Nama Kampus</label>
            <input type="text" id="nama_kampus"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-teal-600 focus:outline-none"
              required>
          </div>

          <div>
            <label for="alamat_kampus" class="block mb-1 font-medium text-gray-700">Alamat Kampus</label>
            <input type="text" id="alamat_kampus"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-teal-600 focus:outline-none"
              required>
          </div>

          <div>
            <label for="no_telp_kampus" class="block mb-1 font-medium text-gray-700">No Telp Kampus</label>
            <input type="text" id="no_telp_kampus"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-teal-600 focus:outline-none"
              required>
          </div>

          <div>
            <label for="email_kampus" class="block mb-1 font-medium text-gray-700">Email Kampus</label>
            <input type="email" id="email_kampus"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-teal-600 focus:outline-none"
              required>
          </div>

          <div>
            <label for="jumlah_gedung" class="block mb-1 font-medium text-gray-700">Jumlah Gedung</label>
            <input type="number" id="jumlah_gedung" min="1"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-teal-600 focus:outline-none"
              required>
          </div>

          <div>
            <label class="block mb-1 font-medium text-gray-700">Fakultas / Unit</label>
            <div class="space-y-2">
              <div class="flex gap-2">
                <input type="text"
                  class="flex-1 border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-teal-600 focus:outline-none"
                  placeholder="Fakultas / Unit" required>
                <button type="button"
                  class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">-</button>
              </div>
              <button type="button"
                class="mt-2 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">+ Tambah Fakultas/Unit</button>
            </div>
          </div>

          <div>
            <label for="luas_kampus" class="block mb-1 font-medium text-gray-700">Jumlah Luas Wilayah Kampus</label>
            <input type="text" id="luas_kampus"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-teal-600 focus:outline-none"
              required>
          </div>

          <div>
            <label for="deskripsi_kampus" class="block mb-1 font-medium text-gray-700">Deskripsi Kampus</label>
            <textarea id="deskripsi_kampus" rows="4"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-teal-600 focus:outline-none"
              required></textarea>
          </div>

          <div>
            <label class="block mb-1 font-medium text-gray-700">Upload Foto Kampus</label>
            <input type="file" multiple accept="image/*"
              class="w-full border border-gray-300 rounded px-3 py-2 cursor-pointer">
          </div>

          <div>
            <label class="block mb-1 font-medium text-gray-700">Upload Dokumen Kampus</label>
            <input type="file" multiple accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.zip,.rar"
              class="w-full border border-gray-300 rounded px-3 py-2 cursor-pointer">
            <small class="text-gray-500 block mt-1">Pilih satu atau beberapa dokumen (PDF, Word, Excel, PPT, TXT, ZIP, RAR).</small>
          </div>

          <div class="flex justify-end gap-3 mt-6">
            <button type="button" data-modal-hide="modalTambahGedung"
              class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 text-gray-800 font-semibold">
              Tutup
            </button>
            <button type="submit"
              class="px-5 py-2 bg-teal-700 text-white rounded hover:bg-teal-800 font-semibold flex items-center gap-2">
              <i class="fas fa-save"></i> Simpan
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <!-- Tabel Rekap Gedung -->
  <div class="overflow-x-auto bg-white rounded shadow mt-8 max-h-[70vh] overflow-y-auto">
    <table class="min-w-full text-xs md:text-sm border-collapse border border-gray-300 table table-bordered">
      <thead class="bg-teal-700 text-white text-center table-success sticky top-0 z-10">
        <tr>
          <th>No</th>
          <th>Nama Kampus</th>
          <th>Nama Gedung</th>
          <th>Fakultas / Unit</th>
          <th>Jumlah Lantai</th>
          <th>Ruang Kantor / Dosen / Pegawai</th>
          <th>Ruang Kuliah / Kelas / R. Test</th>
          <th>Ruang Rapat / R. Sidang / R. Konsultasi / R. Diskusi</th>
          <th>Ruang Laboratorium / Produksi / Praktek</th>
          <th>Coridor / Selasar / Lorong</th>
          <th>Tangga / Exit Darurat</th>
          <th>Toilet / Kamar Mandi</th>
          <th>Gudang / R. Arsip</th>
          <th>Perpustakaan / Ruang Baca</th>
          <th>BEM / BPM / Kegiatan Kemahasiswaan</th>
          <th>Mushalla</th>
          <th>R. Dapur / R. Makan / Smooking Room / R. Laktasi / Pantry / Janitor</th>
          <th>Loby / R. Tunggu / ATM / Teras</th>
          <th>Ruang Server / R. Operator / R. Kontrol</th>
          <th>Anjungan Akademi / R. Pameran</th>
          <th>R. Teknisi / Program</th>
          <th>Asrama / Kamar</th>
          <th>R. Studio</th>
          <th>DAK</th>
          <th>R. LIFT / R. Panel</th>
          <th>Toko / Warung / Foto Copy / Mart / Kantin</th>
          <th>Kosong</th>
          <th>Panggung</th>
          <th>Jumlah (M2)</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="bg-white text-black text-center">
        <tr>
          <td>1</td>
          <td>Rawamangun Muka</td>
          <td>Gedung Rektorat</td>
          <td>Pusat</td>
          <td>03</td>
          <td>809,08</td>
          <td>-</td>
          <td>244,00</td>
          <td>-</td>
          <td>137,88</td>
          <td>128,33</td>
          <td>124,86</td>
          <td>54,60</td>
          <td>-</td>
          <td>-</td>
          <td>9,94</td>
          <td>123,99</td>
          <td>-</td>
          <td>31,55</td>
          <td>-</td>
          <td>-</td>
          <td>42,50</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>1.706,74</td>
          <td class="flex flex-col gap-2">
            <a href="" type="button" class="inline-flex items-center gap-2 px-3 py-1.5 text-xs font-medium text-center text-white bg-green-700 rounded-sm hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              </svg>
              Detail
            </a>
            <a href="edit-kampus" type="button" class="inline-flex items-center gap-2 px-1 py-1.5 text-xs font-medium text-center text-white bg-yellow-500 rounded-sm hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
              </svg>
              Edit
            </a>
            <a href="" type="button" class="inline-flex items-center gap-2 px-1 py-1.5 text-xs font-medium text-center text-white bg-red-700 rounded-sm hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
              </svg>
              Hapus
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

</div>
